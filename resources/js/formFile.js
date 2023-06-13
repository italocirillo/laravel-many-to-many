//Cambio Immagine dinamica
const image = document.getElementById("image");
const imagePreview = document.getElementById("image-preview");
if (image && imagePreview) {
    image.addEventListener("change", function () {
        const selectedFile = this.files[0];
        const reader = new FileReader();
        reader.addEventListener("load", function () {
            imagePreview.src = reader.result;
            imagePreview.classList.remove('d-none');
        });
        reader.readAsDataURL(selectedFile);
    })
}