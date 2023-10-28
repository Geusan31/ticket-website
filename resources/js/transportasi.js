document.getElementById("rute").addEventListener("change", function (e) {
    let id_rute = e.target.value;
    console.log(id_rute);
    fetch("/get-transportasi/" + id_rute)
        .then((response) => response.json())
        .then((data) => {
            // var select = document.getElementById("transportasi");
            // select.innerHTML = "";
            // data.forEach(function (transportasi) {
            // });
            // var option = document.createElement("option");
            // option.value = data.id_type_transportasi;
            // option.text = data.nama_type + " - " + data.keterangan;
            // option.setAttribute("selected", "selected");
            // option.selected = true;
            // select.add(option);
            let displayInput = document.getElementById("transportasi_display");
            let valueInput = document.getElementById("transportasi");
            if (data) {
                valueInput.value = data.id_type_transportasi;
                displayInput.value = data.nama_type + " - " + data.keterangan;
            } else {
                displayInput.value = "Data tidak ada";
            }
        });
});
