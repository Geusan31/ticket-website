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

document.getElementById('pesawat').addEventListener('click', (e) => {
    let transportasi = e.target.value;

    fetchTypeTransportasiData(transportasi);
})

document.getElementById('keretaApi').addEventListener('click', (e) => {
    let transportasi = e.target.value;

    fetchTypeTransportasiData(transportasi);
})

function fetchTypeTransportasiData(transportasi) {
    fetch(`/getTypeTransportasi/${transportasi}`)
        .then(response => {
            if(response.status === 200) {
                return response.json();
            } else {
                throw new Error('Transportasi tidak ditemukan')
            }
        })
        .then(data => {
            // console.log(data)
            let select = document.getElementById("id_rute");
            select.innerHTML = "";
            data.forEach(function (rute) {
                console.log(rute)
                let option = document.createElement("option");
                option.value = rute.id_rute;
                option.text = rute.rute_awal + " - " + rute.rute_awal;
                option.setAttribute("selected", "selected");
                option.selected = true;
                select.add(option);
            });
        })
        .catch(err => {
            console.log(err)
        })
}