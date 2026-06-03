<div class="modal fade" id="modalImage" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-description" id="modalDescription"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImagen" src="" alt="imagen actual" class="img-fluid" style="max-width: 465px; max-height: 465px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>



<!--Mostrar preview de imagen en modal-->
<script>
    document.getElementById('modalImage').addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;

        const description = button.getAttribute('data-description');
        const url    = button.getAttribute('data-url');

        document.getElementById('modalDescription').textContent = description;
        document.getElementById('modalImagen').src = url;

        function previewImage(event) {
            const input   = event.target;
            const preview = document.getElementById('imagePreview');
            preview.style.display = 'block';
        }
    });
</script>
