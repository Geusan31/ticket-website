document.getElementById("id_rute").addEventListener("change", function (e) {
    let id_rute = e.target.value;

    fetch("/getTransportasi/" + id_rute)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            let inputKodeKursi = document.getElementById("kode_kursi");
            let inputKodeKursiDisplay =
                document.getElementById("kode_kursi_display");
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

document
    .getElementById("id_rute_kereta")
    .addEventListener("change", function (e) {
        let id_rute = e.target.value;
        console.log(id_rute);

        fetch("/getTransportasi/" + id_rute)
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                let inputKodeKursi =
                    document.getElementById("kode_kursi_kereta");
                let inputKodeKursiDisplay = document.getElementById(
                    "kode_kursi_display_kereta"
                );
                let inputIdTransportasi = document.getElementById(
                    "id_transportasi_kereta"
                );
                inputKodeKursi.innerHTML = "";
                inputKodeKursiDisplay.innerHTML = "";

                data.transportasis.forEach(function (transportasi) {
                    inputKodeKursiDisplay.value =
                        transportasi.kode + " - " + transportasi.jumlah_kursi;
                    inputKodeKursi.value = transportasi.kode;

                    inputIdTransportasi.value =
                        transportasi.id_type_transportasi;
                });
            });
    });

// let dropdownAwal = document.getElementById("dropdown_awal");
// let dropdownAkhir = document.getElementById("dropdown_akhir");
// let optionsAwal = dropdownAwal.getElementsByClassName("optionAwal");
// let optionsAkhir = dropdownAkhir.getElementsByClassName("optionAkhir");
// let searchAwal = document.getElementById("searchAwal");
// let searchAkhir = document.getElementById("searchAkhir");

window.addEventListener("DOMContentLoaded", function () {
    getTypeTransportasi("Pesawat");
});

document.getElementById("pesawat").addEventListener("click", (e) => {
    let transportasi = e.target.value;

    getTypeTransportasi(transportasi);
});

document.getElementById("keretaApi").addEventListener("click", (e) => {
    let transportasi = e.target.value;

    getTypeTransportasi(transportasi);
});

function getTypeTransportasi(transportasi) {
    fetch(`/getRuteByTypeTransportasi/${transportasi}`)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            let selectPesawat = document.getElementById("id_rute");
            while (selectPesawat.firstChild) {
                selectPesawat.removeChild(selectPesawat.firstChild);
            }

            let placeholder = document.createElement("option");
            placeholder.text = "Rute";
            placeholder.selected = true;
            placeholder.disabled = true;

            selectPesawat.add(placeholder);

            data.forEach(function (rute) {
                var option = document.createElement("option");
                option.text = rute.rute_awal + " - " + rute.rute_akhir;
                option.value = rute.id_rute;
                selectPesawat.add(option);
            });

            let selectKereta = document.getElementById("id_rute_kereta");
            while (selectKereta.firstChild) {
                selectKereta.removeChild(selectKereta.firstChild);
            }

            let placeholderKereta = document.createElement("option");
            placeholderKereta.text = "Rute";
            placeholderKereta.selected = true;
            placeholderKereta.disabled = true;

            selectKereta.add(placeholderKereta);

            data.forEach(function (rute) {
                var option = document.createElement("option");
                option.text = rute.rute_awal + " - " + rute.rute_akhir;
                option.value = rute.id_rute;
                selectKereta.add(option);
            });
        });
}

// function fetchTypeTransportasiData(transportasi) {
//     fetch(`/getRuteByTypeTransportasi/${transportasi}`)
//         .then((response) => response.json())
//         .then((types) => {
//             console.log(types)
//             // Membuat opsi dropdown
//             types.forEach(function (type) {
//                 let optionAwal = document.createElement("div");
//                 optionAwal.textContent = type.rute_awal;
//                 optionAwal.className =
//                     "cursor-pointer p-1 hover:bg-blue-100 optionAwal";
//                 optionAwal.addEventListener("click", function () {
//                     search.value = this.textContent;
//                     dropdownAwal.style.display = "none";
//                 });
//                 dropdownAwal.appendChild(optionAwal);

//                 let optionAkhir = document.createElement("div");
//                 optionAkhir.textContent = type.rute_akhir;
//                 optionAkhir.className =
//                     "cursor-pointer p-1 hover:bg-blue-100 optionAkhir";
//                 optionAkhir.addEventListener("click", function () {
//                     search.value = this.textContent;
//                     dropdownAkhir.style.display = "none";
//                 });
//                 dropdownAkhir.appendChild(optionAkhir);
//             });
//         });
// }

// // Dropdown search
// searchAwal.addEventListener("click", function (event) {
//     dropdownAwal.style.display = "block";
//     event.stopPropagation();
// });
// searchAkhir.addEventListener("click", function (event) {
//     dropdownAkhir.style.display = "block";
//     event.stopPropagation();
// });

// Array.from(optionsAwal).forEach(function (option) {
//     option.addEventListener("click", function () {
//         search.value = this.textContent;
//         dropdownAwal.style.display = "none";
//     });
// });

// Array.from(optionsAkhir).forEach(function (option) {
//     option.addEventListener("click", function () {
//         search.value = this.textContent;
//         dropdownAkhir.style.display = "none";
//     });
// });

// searchAwal.addEventListener("keyup", filterFunctionAwal);
// searchAkhir.addEventListener("keyup", filterFunctionAkhir);

// function filterFunctionAwal() {
//     var filter = searchAwal.value.toUpperCase();

//     for (var i = 0; i < optionsAwal.length; i++) {
//         let txtValue = optionsAwal[i].textContent || optionsAwal[i].innerText;
//         if (txtValue.toUpperCase().indexOf(filter) > -1) {
//             optionsAwal[i].style.display = "";
//         } else {
//             optionsAwal[i].style.display = "none";
//         }
//     }
// }

// function filterFunctionAkhir() {
//     var filter = searchAkhir.value.toUpperCase();

//     for (var i = 0; i < optionsAkhir.length; i++) {
//         let txtValue = optionsAkhir[i].textContent || optionsAkhir[i].innerText;
//         if (txtValue.toUpperCase().indexOf(filter) > -1) {
//             optionsAkhir[i].style.display = "";
//         } else {
//             optionsAkhir[i].style.display = "none";
//         }
//     }
// }

// window.addEventListener("click", function () {
//     dropdownAwal.style.display = "none";
//     dropdownAkhir.style.display = "none";
// });

// fetch("/getRuteByTypeTransportasi?nama_type=")
//     .then((response) => response.json())
//     .then((types) => {
//         // Membuat opsi dropdown
//         types.forEach(function (type) {
//             var option = document.createElement("div");
//             option.textContent = type.nama_type;
//             option.className = "cursor-pointer p-1 hover:bg-blue-100 option";
//             option.addEventListener("click", function () {
//                 search.value = this.textContent;
//                 dropdown.style.display = "none";
//             });
//             dropdown.appendChild(option);
//         });
//     });
