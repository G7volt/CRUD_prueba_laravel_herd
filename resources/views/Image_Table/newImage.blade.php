<x-app-layout>

    <br>
    <br>

    <h1 class="text-center">Nueva imagen</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card d-grid gap-2 d-md-block justify-content-md-end">
                    <button type="button" class="btn btn-primary" >
                        <a href="/Image_Table" style="color: white">
                            Volver
                        </a>
                    </button>
                    <div class="card-body">
                        <form action="/Image_Table" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="description" class="form-label">Descripcion</label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                            <div class="mb-3">
                                <label for="image_url" class="form-label">Ruta de la imagen</label>
                                <input type="file" class="form-control" id="image_url" name="image_url" onchange="previewImage(event)">
                            </div>

                            <div class="mb-3 align-middle">
                                <img id="imagePreview" src="#" alt="Imagen Seleccionada" style="max-width: 400px; max-height: 400px; ">
                            </div> 
                            <button type="submit" class="btn btn-primary">Agregar Imagen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <script>
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
</x-app-layout>

