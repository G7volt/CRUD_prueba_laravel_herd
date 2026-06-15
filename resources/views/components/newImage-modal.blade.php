<div class="modal fade" id="newImage" tabindex="-1" role="dialog" aria-labelledby="newImageTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="text-center">Nueva imagen</h1>
      </div>
      <div class="modal-body">
        <form id="formNuevaImagen"action="{{ route('images.store') }}" {{-- method="POST" --}} enctype="multipart/form-data">
            @csrf
            <div class="mb-3"> 
                <label for="description" class="form-label">Descripcion</label>
                <input type="text" class="form-control" id="description" name="description" required>
                {{--Div para mostrar el error de campo faltante--}}
                <div class="invalid-feedback" id="errorDescription"></div>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Ruta de la imagen</label>
                <input type="file" class="form-control" id="image_url" name="image_url" onchange="previewImage(event)" required>
                {{--Div para mostrar el error de campo faltante--}}
                <div class="invalid-feedback" id="errorImageUrl"></div>
            </div>

            <div class="d-flex justify-content-center mt-3 mb-3">
                <img id="imagePreview" src="#" alt="Imagen Seleccionada" style="max-width: 400px; max-height: 400px;" hidden>
            </div> 

            <div class="d-flex justify-content-center mt-1 mb-0.5">
                <button type="submit" class="btn btn-primary me-1">Agregar Imagen</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        Volver
                </button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
document.getElementById('formNuevaImagen').addEventListener('submit', function(e) {
    e.preventDefault(); //evita que recargue la página

    // Limpia errores anteriores
    document.getElementById('description').classList.remove('is-invalid');
    document.getElementById('image_url').classList.remove('is-invalid');
    document.getElementById('errorDescription').textContent = '';
    document.getElementById('errorImageUrl').textContent    = '';

    // FormData maneja archivos automáticamente
    const formData = new FormData(this);

    fetch('{{ route("images.store") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {

        console.log(data);
        
        if (data.success) {
            // Actualiza la tabla sin recargar
            document.getElementById('tablaBody').innerHTML = data.html;

            // Cierra el modal y limpia el form
            bootstrap.Modal.getInstance(document.getElementById('newImage')).hide();
            document.getElementById('formNuevaImagen').reset();
            document.getElementById('imagePreview').hidden = true;

        } else {
            //Muestra errores dentro del modal
            if (data.errors && data.errors.description) {
                document.getElementById('description').classList.add('is-invalid');
                document.getElementById('errorDescription').textContent = data.errors.description[0];
            }
            if (data.errors && data.errors.image_url) {
                document.getElementById('image_url').classList.add('is-invalid');
                document.getElementById('errorImageUrl').textContent = data.errors.image_url[0];
            }
        }
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