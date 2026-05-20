<x-app-layout>

    <h1 class="text-center">Editar Imagen</h1>

    <br>
    <br>

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
                        <form action="/Image_Table/{{$image->id}}" method="POST" enctype="multipart/form-data">

                            @csrf

                            @method('PUT')

                            <div class="mb-3">
                                <label for="description" class="form-label">
                                    Descripcion
                                </label>
                                 <input type="text" class="form-control" id="description" name="description" value="{{$image->description}}">
                            </div>

                            <div class="mb-3">
                                <label for="image_url" class="form-label">
                                    Nueva imagen
                                </label>
                                <input type="file" class="form-control" id="image_url" name="image_url" onchange="previewImage(event)">
                            </div>

                            <div class="mb-3">
                                <img id="imagePreview" src="{{ $image->image_url }}" alt="Imagen actual" style="max-width: 200px; max-height: 200px;">
                            </div>     

                            <button type="submit" class="btn btn-primary">Actualizar</button>

                        </form>
                    </div>
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