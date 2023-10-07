document.getElementById("role").addEventListener("change", (e) => {
    const penumpangForm = document.getElementById("penumpangForm");
    const petugasForm = document.getElementById("petugasForm");

    if (e.target.value === "penumpang") {
        penumpangForm.classList.add("block");
        penumpangForm.classList.remove("hidden");
        petugasForm.classList.add("hidden");
        petugasForm.classList.remove("block");
    } else if (e.target.value === "petugas") {
        petugasForm.classList.add("block");
        petugasForm.classList.remove("hidden");
        penumpangForm.classList.add("hidden");
        penumpangForm.classList.remove("block");
    } else {
        petugasForm.classList.add("hidden");
        petugasForm.classList.remove("block");
        penumpangForm.classList.add("block");
        penumpangForm.classList.remove("hidden");
    }
});

// Form
document.getElementById("myForm").addEventListener("submit", () => {
    const role = document.getElementById("role").value;
    document.cookie = "role=" + role;

    if (role == "penumpang") {
        const petugasField = document.querySelectorAll(".petugasField");
        const penumpangField = document.querySelectorAll(".penumpangField");
        petugasField.forEach((field) => {
            field.disabled = true;
        });
        penumpangField.forEach((field) => {
            field.disabled = false;
        });
    } else if (role == "petugas") {
        const petugasField = document.querySelectorAll(".petugasField");
        const penumpangField = document.querySelectorAll(".penumpangField");
        penumpangField.forEach((field) => {
            field.disabled = true;
        });
        petugasField.forEach((field) => {
            field.disabled = false;
        });
    }
});

// reload
document.addEventListener("DOMContentLoaded", function () {
    const role = document.cookie.replace(
        /(?:(?:^|.*;\s*)role\s*\=\s*([^;]*).*$)|^.*$/,
        "$1"
    );
    const penumpangForm = document.getElementById("penumpangForm");
    const petugasForm = document.getElementById("petugasForm");
    if (role === "penumpang") {
        penumpangForm.classList.add("block");
        penumpangForm.classList.remove("hidden");
        petugasForm.classList.add("hidden");
        petugasForm.classList.remove("block");
    } else if (role === "petugas") {
        petugasForm.classList.add("block");
        petugasForm.classList.remove("hidden");
        penumpangForm.classList.add("hidden");
        penumpangForm.classList.remove("block");
    }
});
