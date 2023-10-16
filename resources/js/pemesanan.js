document.getElementById("rute").addEventListener("change", function () {
    let id_rute = this.value;

    fetch("/getTransportasi/" + id_rute)
        .then((response) => response.json())
        .then((data) => {
            // Menghapus opsi lama
            let inputKodeKursi = document.getElementById("kode_kursi");
            let inputKodeKursiDisplay = document.getElementById("kode_kursi_display");
            let inputIdTransportasi =
                document.getElementById("id_transportasi");
            inputKodeKursi.innerHTML = "";
            inputKodeKursiDisplay.innerHTML = "";

            // Menambahkan opsi baru
            data.transportasis.forEach(function (transportasi) {
                // Mengatur nilai input untuk kode_kursi
                inputKodeKursiDisplay.value =
                    transportasi.kode + " - " + transportasi.jumlah_kursi;
                inputKodeKursi.value = transportasi.kode;

                // Mengatur nilai input tersembunyi untuk id_transportasi
                inputIdTransportasi.value = transportasi.id_type_transportasi;
            });
        });
});
