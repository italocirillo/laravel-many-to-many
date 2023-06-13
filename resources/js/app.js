import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

//Messaggio di errore 
const deleteBtn = document.querySelectorAll('.btn-delete');
if (deleteBtn.length > 0) {
    deleteBtn.forEach((btn) => {
        btn.addEventListener("click", function (event) {
            event.preventDefault();
            const projectTitle = btn.getAttribute('data-project-title');
            const deleteModal = new bootstrap.Modal(
                document.getElementById('delete-modal')
            );
            document.getElementById('project-title').innerText = projectTitle;
            document.getElementById('delete').addEventListener("click", function () {
                btn.parentElement.submit();
            })
            deleteModal.show();
        })
    });
}

// //Cambio Immagine dinamica
// const image = document.getElementById("image");
// const imagePreview = document.getElementById("image-preview");
// if (image && imagePreview) {
//     image.addEventListener("change", function () {
//         const selectedFile = this.files[0];
//         const reader = new FileReader();
//         reader.addEventListener("load", function () {
//             imagePreview.src = reader.result;
//             imagePreview.classList.remove('d-none');
//         });
//         reader.readAsDataURL(selectedFile);
//     })
// }