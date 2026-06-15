<div class="modal fade" id="editImage" tabindex="-1" role="dialog" aria-labelledby="editImageTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="text-center">Editar Imagen</h1>
      </div>
      <div class="modal-body">
        <form action="{{ route('images.edit', $image->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="description" class="form-label">Descripcion</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{$image->description}}" required>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image_url" class="form-label">Nueva imagen</label>
                    <input type="file" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" onchange="previewImage(event)">
                    @errr('image_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            <div class="d-flex justify-content-center mt-3 mb-3">
                <img id="imagePreview" src="{{ $image->image_url }}" alt="Imagen actual" style="max-width: 400px; max-height: 400px;" hidden required>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="d-flex justify-content-center mt-1 mb-0.5">
            <button type="submit" class="btn btn-primary me-1">Actualizar</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                cancelar
            </button>
        </div>
      </div>
    </div>
  </div>
</div>

    <script>

        document.getElementById('modalEditar').addEventListener('show.bs.modal', function(event) {
    const id = event.relatedTarget.getAttribute('data-id');

    fetch(`/Image_Table/${id}/edit`)
        .then(response => response.json())
        .then(image => {
            document.getElementById('editDescription').value = image.description;
            document.getElementById('editForm').action = `/Image_Table/${id}`;
        });
});
            //Funcion para mostrar la imagen seleccionada antes de subir una imagen nueva
            function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');

            // Verificamos si el usuario seleccionó un archivo
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Actualizamos el atributo src de la etiqueta img con la imagen leída
                    preview.src = e.target.result;
                    // Mostramos la imagen
                    preview.style.display = 'block';

                    preview.hidden = false;
                }

                // Leemos el archivo como una URL de datos
                reader.readAsDataURL(input.files[0]);
            } else {
                // Ocultamos la imagen si el usuario cancela la selección
                preview.src = '#';
                preview.style.display = 'none';
            }
        }
    </script>