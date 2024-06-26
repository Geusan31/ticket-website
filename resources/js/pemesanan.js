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
let selectRuteAkhir = document.querySelector('#id_rute[name="rute_akhir"]');
// Kerta
let selectRuteAwalKereta = document.getElementById('searchAwal_kereta');
let selectRuteAkhirKereta = document.getElementById('searchAkhir_kereta');

// Tambahkan event listener untuk event change
selectRuteAwal.addEventListener("change", fetchTransportasiType);
selectRuteAkhir.addEventListener("change", fetchTransportasiType);

// Kereta
selectRuteAwalKereta.addEventListener("change", fetchTransportasiTypeKereta);
selectRuteAkhirKereta.addEventListener("change", fetchTransportasiTypeKereta);

async function fetchTransportasiType() {
    // Dapatkan nilai yang dipilih pengguna
    let ruteAwal = selectRuteAwal.options[selectRuteAwal.selectedIndex].value;
    let ruteAkhir =
        selectRuteAkhir.options[selectRuteAkhir.selectedIndex].value;
    // Kirim permintaan ke server dengan Fetch API
    await fetch(`/getTransportasiType/${ruteAwal}/${ruteAkhir}`)
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

async function fetchTransportasiTypeKereta() {
    // Dapatkan nilai yang dipilih pengguna
    let ruteAwal = selectRuteAwalKereta.options[selectRuteAwalKereta.selectedIndex].value;
    let ruteAkhir =
        selectRuteAkhirKereta.options[selectRuteAkhirKereta.selectedIndex].value;

    // Kirim permintaan ke server dengan Fetch API
    await fetch(`/getTransportasiType/${ruteAwal}/${ruteAkhir}`)
        .then((response) => response.json())
        .then((data) => {
            let id_type_transportasi = data.id_type_transportasi;
            document.getElementById("id_transportasi_kereta").value =
                id_type_transportasi;

            // Lakukan sesuatu dengan id_type_transportasi...
        })
        .catch((error) => console.error("Error:", error));
}

const buttonData = document.getElementById("button");
const modal = document.getElementById("staticModal");
const pilihKursi = document.getElementById("pilihKursi");
pilihKursi.addEventListener("click", function () {
    buttonData.dataset.session = false;
    const modal = document.getElementById("staticModal");
    modal.style.display = "none";
});
console.log(buttonData.dataset.session);
if (buttonData.dataset.session == true) {
    modal.style.display = "flex";
}

const kursiButtons = document.querySelectorAll(".kursi-button");

kursiButtons.forEach((button) => {
    button.addEventListener("click", async () => {
        const kursi = button.dataset.kursi;
        const url = "/pesan_store";
        const token = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");
        console.log(kursi, url);

        // Buat objek data untuk dikirim dengan permintaan POST
        const data = {
            kode_pemesanan: buttonData.dataset.kode_pemesanan,
            tanggal_pemesanan: buttonData.dataset.tanggal_pemesanan,
            id_penumpang: buttonData.dataset.id_penumpang,
            kode_kursi: kursi,
            id_transportasi: buttonData.dataset.id_transportasi,
            id_rute: buttonData.dataset.id_rute,
            tanggal_berangkat: buttonData.dataset.tanggal_berangkat,
            jam_cekin: buttonData.dataset.jam_cekin,
            jam_berangkat: buttonData.dataset.jam_berangkat,
            id_petugas: buttonData.dataset.id_petugas,
        };

        console.log(JSON.stringify(data));
        // console.log(token);

        await fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token,
            },
            body: JSON.stringify(data),
        })
            .then((response) => {
                console.log(response);
                if (response.ok) {
                    // Berhasil mengirim data
                    console.log("Data telah berhasil dikirim");
                    return response.json()
                } else {
                    // Gagal mengirim data
                    console.error("Gagal mengirim data");
                    throw new Error('Network response was not ok');
                }
            })
            .then(data => {
                console.log(data)
                if(data.status === 'Pemesanan Berhasil') {
                    window.location.href = '/order'
                } else {
                    alert('Id Pemesanan Sudah Digunakan, Silahkan Coba lain waktu')
                }
            })
            .catch((error) => {
                console.error("Terjadi kesalahan:", error);
            });
    });
});

// document.getElementById("id_rute").addEventListener("change", function (e) {
//     let rute_awal = e.target.value;

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
// });

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

// // Pesawat
// let dropdownAwal = document.getElementById("dropdown_awal");
// let dropdownAkhir = document.getElementById("dropdown_akhir");
// let optionsAwal = dropdownAwal.getElementsByClassName("optionAwal");
// let optionsAkhir = dropdownAkhir.getElementsByClassName("optionAkhir");
// let searchAwal = document.getElementById("searchAwal");
// let searchAkhir = document.getElementById("searchAkhir");

// // Kereta Api
// let dropdownAwalKereta = document.getElementById("dropdown_awal_kereta");
// let dropdownAkhirKereta = document.getElementById("dropdown_akhir_kereta");
// let optionsAwalKereta =
//     dropdownAwal.getElementsByClassName("optionAwal_kereta");
// let optionsAkhirKereta =
//     dropdownAkhir.getElementsByClassName("optionAkhir_kereta");
// let searchAwalKereta = document.getElementById("searchAwal_kereta");
// let searchAkhirKereta = document.getElementById("searchAkhir_kereta");

window.addEventListener("DOMContentLoaded", function () {
    getTypeTransportasi("Pesawat");
});

document.getElementById("pesawat").addEventListener("click", (e) => {
    let transportasi = e.target.value;
    console.log(transportasi)

    getTypeTransportasi(transportasi);
});

document.getElementById("keretaApi").addEventListener("click", (e) => {
    let transportasi = e.target.value;
    console.log(transportasi)

    getTypeTransportasi(transportasi);
});

async function getTypeTransportasi(transportasi) {
    await fetch(`/getRuteByTypeTransportasi/${transportasi}`)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
        });
}

// function fetchTypeTransportasiData(transportasi) {
//     fetch(`/getRuteByTypeTransportasi/${transportasi}`)
//         .then((response) => response.json())
//         .then((types) => {
//             // Membuat opsi dropdown
//             types.forEach(function (type) {
//                 let optionAwal = document.createElement("div");
//                 optionAwal.textContent = type.rute_awal;
//                 optionAwal.className =
//                     "cursor-pointer p-1 hover:bg-blue-100 optionAwal";
//                 optionAwal.addEventListener("click", function () {
//                     searchAwal.value = this.textContent;
//                     dropdownAwal.style.display = "none";
//                 });
//                 dropdownAwal.appendChild(optionAwal);

//                 let optionAkhir = document.createElement("div");
//                 optionAkhir.textContent = type.rute_akhir;
//                 optionAkhir.className =
//                     "cursor-pointer p-1 hover:bg-blue-100 optionAkhir";
//                 optionAkhir.addEventListener("click", function () {
//                     searchAkhir.value = this.textContent;
//                     dropdownAkhir.style.display = "none";
//                 });
//                 dropdownAkhir.appendChild(optionAkhir);

//                 // Kereta
//                 let optionAwal_kereta = document.createElement("div");
//                 optionAwal_kereta.textContent = type.rute_awal;
//                 optionAwal_kereta.className =
//                     "cursor-pointer p-1 hover:bg-blue-100 optionAwal_kereta";
//                 optionAwal_kereta.addEventListener("click", function () {
//                     searchAwalKereta.value = this.textContent;
//                     dropdownAwalKereta.style.display = "none";
//                 });
//                 dropdownAwalKereta.appendChild(optionAwal_kereta);

//                 let optionAkhir_kereta = document.createElement("div");
//                 optionAkhir_kereta.textContent = type.rute_akhir;
//                 optionAkhir_kereta.className =
//                     "cursor-pointer p-1 hover:bg-blue-100 optionAkhir_kereta";
//                 optionAkhir_kereta.addEventListener("click", function () {
//                     searchAkhirKereta.value = this.textContent;
//                     dropdownAkhirKereta.style.display = "none";
//                 });
//                 dropdownAkhirKereta.appendChild(optionAkhir_kereta);
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

// // Dropdown search
// searchAwalKereta.addEventListener("click", function (event) {
//     dropdownAwalKereta.style.display = "block";
//     event.stopPropagation();
// });
// searchAkhirKereta.addEventListener("click", function (event) {
//     dropdownAkhirKereta.style.display = "block";
//     event.stopPropagation();
// });

// Array.from(optionsAwal).forEach(function (option) {
//     option.addEventListener("click", function () {
//         searchAwal.value = this.textContent;
//         dropdownAwal.style.display = "none";
//     });
// });

// Array.from(optionsAkhir).forEach(function (option) {
//     option.addEventListener("click", function () {
//         searchAkhir.value = this.textContent;
//         dropdownAkhir.style.display = "none";
//     });
// });

// Array.from(optionsAwalKereta).forEach(function (option) {
//     option.addEventListener("click", function () {
//         searchAwalKereta.value = this.textContent;
//         dropdownAwalKereta.style.display = "none";
//     });
// });

// Array.from(optionsAkhirKereta).forEach(function (option) {
//     option.addEventListener("click", function () {
//         searchAkhirKereta.value = this.textContent;
//         dropdownAkhirKereta.style.display = "none";
//     });
// });

// searchAwal.addEventListener("keyup", filterFunctionAwal);
// searchAkhir.addEventListener("keyup", filterFunctionAkhir);

// searchAwalKereta.addEventListener("keyup", filterFunctionAwalKereta);
// searchAkhirKereta.addEventListener("keyup", filterFunctionAkhirKereta);

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

// function filterFunctionAwalKereta() {
//     var filter = searchAwalKereta.value.toUpperCase();

//     for (var i = 0; i < optionsAwalKereta.length; i++) {
//         let txtValue =
//             optionsAwalKereta[i].textContent || optionsAwalKereta[i].innerText;
//         if (txtValue.toUpperCase().indexOf(filter) > -1) {
//             optionsAwalKereta[i].style.display = "";
//         } else {
//             optionsAwalKereta[i].style.display = "none";
//         }
//     }
// }

// function filterFunctionAkhirKereta() {
//     var filter = searchAkhirKereta.value.toUpperCase();

//     for (var i = 0; i < optionsAkhirKereta.length; i++) {
//         let txtValue =
//             optionsAkhirKereta[i].textContent ||
//             optionsAkhirKereta[i].innerText;
//         if (txtValue.toUpperCase().indexOf(filter) > -1) {
//             optionsAkhirKereta[i].style.display = "";
//         } else {
//             optionsAkhirKereta[i].style.display = "none";
//         }
//     }
// }

// window.addEventListener("click", function () {
//     dropdownAwal.style.display = "none";
//     dropdownAkhir.style.display = "none";

//     dropdownAwalKereta.style.display = "none";
//     dropdownAkhirKereta.style.display = "none";
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
