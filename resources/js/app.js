import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

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