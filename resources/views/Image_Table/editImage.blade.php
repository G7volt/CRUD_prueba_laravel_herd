<x-app-layout>

    <button type="button" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
        </svg>
        <a href="/posts" style="color: white">Cancelar</a>
    </button>

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
                                <label for="description" class="form-label">Descripcion</label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                            <div class="mb-3">
                                <label for="image_url" class="form-label">Ruta de la imagen</label>
                                <input type="file" class="form-control" id="image_url" name="image_url" >
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>