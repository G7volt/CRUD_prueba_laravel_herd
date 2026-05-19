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
                                <input type="file" class="form-control" id="image_url" name="image_url">
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar Imagen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>