<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use App\Models\Penumpang;
use App\Models\Petugas;
use App\Models\Rute;
use App\Models\Transportasi;
use App\Models\Type_transportasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class PemesananController extends Controller
{
    public function pesan(Request $request)
    {
        // dd($request->all());
        $result = $request->validate([
            'rute_awal' => 'required|exists:rutes,rute_awal',
            'rute_akhir' => 'required|exists:rutes,rute_akhir',
            'tanggal_berangkat' => 'required',
        ]);

        $types = type_transportasi::where('nama_type', $request->id_type_transportasi)->get();


        $rute = Rute::where('rute_awal', $result['rute_awal'])
            ->where('rute_akhir', $result['rute_akhir'])
            ->whereIn('id_type_transportasi', $types->pluck('id_type_transportasi'))
            ->first();

        // $type_transportasi = Type_transportasi::where('id_type_transportasi', $rute->id_type_transportasi)->first();

        if (!$rute) {
            return redirect('/')->with(
                'not_found',
                'Rute tidak ditemukan',
            );
        }

        // dd($rute->id_type_transportasi, $type_transportasi->id_type_transportasi);
        // dd($type_transportasi->id_type_transportasi);

        if ($request->id_transportasi == null) {
            return redirect('/')->with(
                'not_found',
                'Transportasi tidak ditemukan',
            );
        }

        $result['id_rute'] = $rute->id_rute;

        $id_rute = Rute::find($rute->id_rute);
        $kodeTerbesar = Pemesanan::max('kode_pemesanan');
        $kodeBaru = str_pad($kodeTerbesar + 1, 3, '0', STR_PAD_LEFT);
        // $totalBayar = $id_rute->harga;
        $tujuan = $id_rute->tujuan;
        $tanggal_berangkat = Carbon::parse($result['tanggal_berangkat']);
        $petugasIds = Petugas::pluck('id_petugas')->toArray();
        $randomPetugasId = $petugasIds[array_rand($petugasIds)];

        $jam_berangkat = $tanggal_berangkat->addHours();
        $jam_cekin = $tanggal_berangkat->addMinutes(30);

        $result['jam_berangkat'] = $jam_berangkat->format('H:i');
        $result['jam_cekin'] = $jam_cekin->format('H:i');

        $result['kode_pemesanan'] = $kodeBaru;
        $result['tanggal_pemesanan'] = Carbon::now()->format('Y-m-d');
        // $result['harga'] = $result['qty'] * $id_rute->harga;
        $result['id_penumpang'] = Auth::guard('penumpang')->user()->id_penumpang;
        $result['id_transportasi'] = $request->id_transportasi;
        $result['kode_kursi'] = $request->id_transportasi;
        // $result['total_bayar'] = $totalBayar;
        $result['tujuan'] = $tujuan;
        $result['id_petugas'] = $randomPetugasId;

        if ($request->id_transportasi == null || $rute != null) {
            // Ambil data dari tabel rutes dan transportasis
            $transportasi = Transportasi::find($request->id_transportasi);
            $type_transportasi = Type_transportasi::find($rute->id_type_transportasi);

            return redirect()->back()->with([
                'success' => true,
                'kode_pemesanan' => $kodeBaru,
                'tanggal_pemesanan' => Carbon::now()->format('Y-m-d'),
                'id_penumpang' => Auth::guard('penumpang')->user()->id_penumpang,
                'id_transportasi' => $request->id_transportasi,
                'id_rute' => $rute->id_rute,
                'tanggal_berangkat' => $result['tanggal_berangkat'],
                'jam_berangkat' => $jam_berangkat->format('H:i'),
                'jam_cekin' => $jam_cekin->format('H:i'),
                'rute_awal' => $rute->rute_awal,
                'rute_akhir' => $rute->rute_akhir,
                'jumlah_kursi' => $transportasi->jumlah_kursi,
                'id_petugas' =>  $randomPetugasId,
                'tujuan' => $rute->tujuan,
                'nama_type' => $type_transportasi->nama_type,
            ]);
        }
    }

    public function pesanStore(Request $request) {
        $pemesanan = pemesanan::create($request->all());
        $request->session()->forget([
            'success',
            'kode_pemesanan',
            'tanggal_pemesanan',
            'id_penumpang',
            'id_transportasi',
            'jam_berangkat',
            'jam_cekin',
            'rute_awal',
            'rute_akhir',
            'jumlah_kursi',
            'id_petugas',
            'tujuan',
            'nama_type',
        ]);

        $id_penumpang = Auth::guard('penumpang')->user()->id_penumpang;
        $orders = Pemesanan::where('id_penumpang', $id_penumpang)->get();

        $total = 0;
        foreach ($orders as $order) {
            $total += $order->rute->harga;
        }

        $serverKeyMidtrans = config('midtrans.server_key');

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = $serverKeyMidtrans;
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $pemesanan->id_pemesanan,
                'gross_amount' => $total,
            ),
            'customer_details' => array(
                'nama_penumpang' => $pemesanan->penumpang->nama_penumpang,
                'username' => $pemesanan->penumpang->username,
                'alamat_penumpang' => $pemesanan->penumpang->alamat_penumpang,
                'tanggal_lahir' => $pemesanan->penumpang->tanggal_lahir,
                'jenis_kelamin' => $pemesanan->penumpang->jenis_kelamin,
            ),
        );

        try{
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            // return response()->json(['Snap Token' => $pemesanan->id_pemesanan]);
            session()->put('snapToken', $snapToken);
            return response()->json(['status' => 'Pemesanan Berhasil'], 200);
        }catch(\Exception $e) {
            return response()->json([
                'Message' => $e->getMessage(),
                'Order Id' => $pemesanan->id_pemesanan
            ]);
            // return $e->getMessage();
        }

        // return redirect('/order')->with('pesanan', 'Pesanan telah dibuat');
    }

    public function update(Request $request, $id)
    {
        $pemesanan = pemesanan::find($id);
        $pemesanan->validate = $request->get('validate') == '2' ? 'success' : 'pending';
        $pemesanan->id_petugas = Auth::guard('petugas')->user()->id_petugas;
        $pemesanan->save();

        return back();
    }

    public function callback(Request $request)
    {
        $serverKey = config("midtrans.serve_key");
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                pemesanan::where('id_pemesanan', $request->order_id)->update(['validate' => 'success']);
            }
        }
    }
}
