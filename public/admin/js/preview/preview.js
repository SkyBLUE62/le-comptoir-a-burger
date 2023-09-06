const preview_image = document.getElementById("preview-img");
const preview_prix = document.getElementById("preview-prix");
const preview_nom = document.getElementById('preview-nom')
const previewDescription = document.getElementById("preview-description");


const fileInput = document.getElementById("inputGroupFile02");
const input_prix = document.getElementById("input-prix");
const input_nom = document.getElementById("input-nom");
const inputDescription = document.getElementById("input-description");

fileInput.addEventListener("change", (event) => {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = (event) => {
        preview_image.src = event.target.result;
    };

    reader.readAsDataURL(file);
});

// Ajouter un écouteur d'événements pour l'événement "input"
input_prix.addEventListener("input", function () {
    preview_prix.textContent = input_prix.value + " €";
});

input_nom.addEventListener("input", function () {
    preview_nom.textContent = input_nom.value;
});

inputDescription.addEventListener("input", function () {
    const inputValue = inputDescription.value;
    currentChars = inputValue.length;
    previewDescription.textContent = inputValue;

});
