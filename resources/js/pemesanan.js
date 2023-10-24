// window.addEventListener("DOMContentLoaded", () => {
//     document.getElementById("id_transportasi").value = "Pesawat";
// });

// document.getElementById("pesawat").addEventListener("click", (e) => {
//     let value = e.target.value;
//     document.getElementById("id_transportasi").value = value;
// });

// document.getElementById("keretaApi").addEventListener("click", (e) => {
//     let value = e.target.value;
//     document.getElementById("id_transportasi_kereta").value = value;
// });

// Dapatkan elemen select untuk rute_awal dan rute_akhir
let selectRuteAwal = document.querySelector('#id_rute[name="rute_awal"]');
let selectRuteAkhir = document.querySelector(
    '#id_rute[name="rute_akhir"]'
);

// Tambahkan event listener untuk event change
selectRuteAwal.addEventListener("change", fetchTransportasiType);
selectRuteAkhir.addEventListener("change", fetchTransportasiType);

function fetchTransportasiType() {
    // Dapatkan nilai yang dipilih pengguna
    let ruteAwal = selectRuteAwal.options[selectRuteAwal.selectedIndex].value;
    let ruteAkhir =
        selectRuteAkhir.options[selectRuteAkhir.selectedIndex].value;

    // Kirim permintaan ke server dengan Fetch API
    fetch(`/getTransportasiType/${ruteAwal}/${ruteAkhir}`)
        .then((response) => response.json())
        .then((data) => {
            // Dapatkan id_type_transportasi dari data yang dikembalikan server
            let id_type_transportasi = data.id_type_transportasi;
            document.getElementById("id_transportasi").value =
                id_type_transportasi;

            // Lakukan sesuatu dengan id_type_transportasi...
        })
        .catch((error) => console.error("Error:", error));
}
document.getElementById("id_rute").addEventListener("change", function (e) {
    let rute_awal = e.target.value;

    // fetch("/getTransportasi/" + id_rute)
    //     .then((response) => response.json())
    //     .then((data) => {
    //         console.log(data);
    //         let inputKodeKursi = document.getElementById("kode_kursi");
    //         let inputKodeKursiDisplay =
    //             document.getElementById("kode_kursi_display");
    //         let inputIdTransportasi =
    //             document.getElementById("id_transportasi");
    //         inputKodeKursi.innerHTML = "";
    //         inputKodeKursiDisplay.innerHTML = "";

    //         data.transportasis.forEach(function (transportasi) {
    //             inputKodeKursiDisplay.value =
    //                 transportasi.kode + " - " + transportasi.jumlah_kursi;
    //             inputKodeKursi.value = transportasi.kode;

    //             inputIdTransportasi.value = transportasi.id_type_transportasi;
    //         });
    //     });
});

// document
//     .getElementById("id_rute_kereta")
//     .addEventListener("change", function (e) {
//         let id_rute = e.target.value;
//         console.log(id_rute);

//         fetch("/getTransportasi/" + id_rute)
//             .then((response) => response.json())
//             .then((data) => {
//                 console.log(data);
//                 let inputKodeKursi =
//                     document.getElementById("kode_kursi_kereta");
//                 let inputKodeKursiDisplay = document.getElementById(
//                     "kode_kursi_display_kereta"
//                 );
//                 let inputIdTransportasi = document.getElementById(
//                     "id_transportasi_kereta"
//                 );
//                 inputKodeKursi.innerHTML = "";
//                 inputKodeKursiDisplay.innerHTML = "";

//                 data.transportasis.forEach(function (transportasi) {
//                     inputKodeKursiDisplay.value =
//                         transportasi.kode + " - " + transportasi.jumlah_kursi;
//                     inputKodeKursi.value = transportasi.kode;

//                     inputIdTransportasi.value =
//                         transportasi.id_type_transportasi;
//                 });
//             });
//     });

// Pesawat
let dropdownAwal = document.getElementById("dropdown_awal");
let dropdownAkhir = document.getElementById("dropdown_akhir");
let optionsAwal = dropdownAwal.getElementsByClassName("optionAwal");
let optionsAkhir = dropdownAkhir.getElementsByClassName("optionAkhir");
let searchAwal = document.getElementById("searchAwal");
let searchAkhir = document.getElementById("searchAkhir");

// Kereta Api
let dropdownAwalKereta = document.getElementById("dropdown_awal_kereta");
let dropdownAkhirKereta = document.getElementById("dropdown_akhir_kereta");
let optionsAwalKereta =
    dropdownAwal.getElementsByClassName("optionAwal_kereta");
let optionsAkhirKereta =
    dropdownAkhir.getElementsByClassName("optionAkhir_kereta");
let searchAwalKereta = document.getElementById("searchAwal_kereta");
let searchAkhirKereta = document.getElementById("searchAkhir_kereta");

window.addEventListener("DOMContentLoaded", function () {
    fetchTypeTransportasiData("Pesawat");
});

document.getElementById("pesawat").addEventListener("click", (e) => {
    let transportasi = e.target.value;

    fetchTypeTransportasiData(transportasi);
});

document.getElementById("keretaApi").addEventListener("click", (e) => {
    let transportasi = e.target.value;

    fetchTypeTransportasiData(transportasi);
});

// function getTypeTransportasi(transportasi) {
//     fetch(`/getRuteByTypeTransportasi/${transportasi}`)
//         .then((response) => response.json())
//         .then((data) => {
//             console.log(data);
//             let selectPesawat = document.getElementById("id_rute");
//             while (selectPesawat.firstChild) {
//                 selectPesawat.removeChild(selectPesawat.firstChild);
//             }

//             let placeholder = document.createElement("option");
//             placeholder.text = "Rute";
//             placeholder.selected = true;
//             placeholder.disabled = true;

//             selectPesawat.add(placeholder);

//             data.forEach(function (rute) {
//                 var option = document.createElement("option");
//                 option.text = rute.rute_awal + " - " + rute.rute_akhir;
//                 option.value = rute.id_rute;
//                 selectPesawat.add(option);
//             });

//             let selectKereta = document.getElementById("id_rute_kereta");
//             while (selectKereta.firstChild) {
//                 selectKereta.removeChild(selectKereta.firstChild);
//             }

//             let placeholderKereta = document.createElement("option");
//             placeholderKereta.text = "Rute";
//             placeholderKereta.selected = true;
//             placeholderKereta.disabled = true;

//             selectKereta.add(placeholderKereta);

//             data.forEach(function (rute) {
//                 var option = document.createElement("option");
//                 option.text = rute.rute_awal + " - " + rute.rute_akhir;
//                 option.value = rute.id_rute;
//                 selectKereta.add(option);
//             });
//         });
// }

function fetchTypeTransportasiData(transportasi) {
    fetch(`/getRuteByTypeTransportasi/${transportasi}`)
        .then((response) => response.json())
        .then((types) => {
            // Membuat opsi dropdown
            types.forEach(function (type) {
                let optionAwal = document.createElement("div");
                optionAwal.textContent = type.rute_awal;
                optionAwal.className =
                    "cursor-pointer p-1 hover:bg-blue-100 optionAwal";
                optionAwal.addEventListener("click", function () {
                    searchAwal.value = this.textContent;
                    dropdownAwal.style.display = "none";
                });
                dropdownAwal.appendChild(optionAwal);

                let optionAkhir = document.createElement("div");
                optionAkhir.textContent = type.rute_akhir;
                optionAkhir.className =
                    "cursor-pointer p-1 hover:bg-blue-100 optionAkhir";
                optionAkhir.addEventListener("click", function () {
                    searchAkhir.value = this.textContent;
                    dropdownAkhir.style.display = "none";
                });
                dropdownAkhir.appendChild(optionAkhir);

                // Kereta
                let optionAwal_kereta = document.createElement("div");
                optionAwal_kereta.textContent = type.rute_awal;
                optionAwal_kereta.className =
                    "cursor-pointer p-1 hover:bg-blue-100 optionAwal_kereta";
                optionAwal_kereta.addEventListener("click", function () {
                    searchAwalKereta.value = this.textContent;
                    dropdownAwalKereta.style.display = "none";
                });
                dropdownAwalKereta.appendChild(optionAwal_kereta);

                let optionAkhir_kereta = document.createElement("div");
                optionAkhir_kereta.textContent = type.rute_akhir;
                optionAkhir_kereta.className =
                    "cursor-pointer p-1 hover:bg-blue-100 optionAkhir_kereta";
                optionAkhir_kereta.addEventListener("click", function () {
                    searchAkhirKereta.value = this.textContent;
                    dropdownAkhirKereta.style.display = "none";
                });
                dropdownAkhirKereta.appendChild(optionAkhir_kereta);
            });
        });
}

// Dropdown search
searchAwal.addEventListener("click", function (event) {
    dropdownAwal.style.display = "block";
    event.stopPropagation();
});
searchAkhir.addEventListener("click", function (event) {
    dropdownAkhir.style.display = "block";
    event.stopPropagation();
});

// Dropdown search
searchAwalKereta.addEventListener("click", function (event) {
    dropdownAwalKereta.style.display = "block";
    event.stopPropagation();
});
searchAkhirKereta.addEventListener("click", function (event) {
    dropdownAkhirKereta.style.display = "block";
    event.stopPropagation();
});

Array.from(optionsAwal).forEach(function (option) {
    option.addEventListener("click", function () {
        searchAwal.value = this.textContent;
        dropdownAwal.style.display = "none";
    });
});

Array.from(optionsAkhir).forEach(function (option) {
    option.addEventListener("click", function () {
        searchAkhir.value = this.textContent;
        dropdownAkhir.style.display = "none";
    });
});

Array.from(optionsAwalKereta).forEach(function (option) {
    option.addEventListener("click", function () {
        searchAwalKereta.value = this.textContent;
        dropdownAwalKereta.style.display = "none";
    });
});

Array.from(optionsAkhirKereta).forEach(function (option) {
    option.addEventListener("click", function () {
        searchAkhirKereta.value = this.textContent;
        dropdownAkhirKereta.style.display = "none";
    });
});

searchAwal.addEventListener("keyup", filterFunctionAwal);
searchAkhir.addEventListener("keyup", filterFunctionAkhir);

searchAwalKereta.addEventListener("keyup", filterFunctionAwalKereta);
searchAkhirKereta.addEventListener("keyup", filterFunctionAkhirKereta);

function filterFunctionAwal() {
    var filter = searchAwal.value.toUpperCase();

    for (var i = 0; i < optionsAwal.length; i++) {
        let txtValue = optionsAwal[i].textContent || optionsAwal[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            optionsAwal[i].style.display = "";
        } else {
            optionsAwal[i].style.display = "none";
        }
    }
}

function filterFunctionAkhir() {
    var filter = searchAkhir.value.toUpperCase();

    for (var i = 0; i < optionsAkhir.length; i++) {
        let txtValue = optionsAkhir[i].textContent || optionsAkhir[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            optionsAkhir[i].style.display = "";
        } else {
            optionsAkhir[i].style.display = "none";
        }
    }
}

function filterFunctionAwalKereta() {
    var filter = searchAwalKereta.value.toUpperCase();

    for (var i = 0; i < optionsAwalKereta.length; i++) {
        let txtValue =
            optionsAwalKereta[i].textContent || optionsAwalKereta[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            optionsAwalKereta[i].style.display = "";
        } else {
            optionsAwalKereta[i].style.display = "none";
        }
    }
}

function filterFunctionAkhirKereta() {
    var filter = searchAkhirKereta.value.toUpperCase();

    for (var i = 0; i < optionsAkhirKereta.length; i++) {
        let txtValue =
            optionsAkhirKereta[i].textContent ||
            optionsAkhirKereta[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            optionsAkhirKereta[i].style.display = "";
        } else {
            optionsAkhirKereta[i].style.display = "none";
        }
    }
}

window.addEventListener("click", function () {
    dropdownAwal.style.display = "none";
    dropdownAkhir.style.display = "none";

    dropdownAwalKereta.style.display = "none";
    dropdownAkhirKereta.style.display = "none";
});

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
