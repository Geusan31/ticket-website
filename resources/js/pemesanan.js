document.getElementById("id_rute").addEventListener("change", function (e) {
    let id_rute = e.target.value;

    fetch("/getTransportasi/" + id_rute)
        .then((response) => response.json())
        .then((data) => {
            let inputKodeKursi = document.getElementById("kode_kursi");
            let inputKodeKursiDisplay = document.getElementById("kode_kursi_display");
            let inputIdTransportasi =
                document.getElementById("id_transportasi");
            inputKodeKursi.innerHTML = "";
            inputKodeKursiDisplay.innerHTML = "";

            data.transportasis.forEach(function (transportasi) {
                inputKodeKursiDisplay.value =
                    transportasi.kode + " - " + transportasi.jumlah_kursi;
                inputKodeKursi.value = transportasi.kode;

                inputIdTransportasi.value = transportasi.id_type_transportasi;
            });
        });
});
