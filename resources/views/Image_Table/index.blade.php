<x-app-layout>

    <h1 class="text-center">Tabla de imagenes</h1>

    <br>
    <br>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card d-grid gap-2 d-md-block justify-content-md-end">
                <button type="button" class="btn btn-primary" >
                    <a href="/Image_Table/newImage" style="color: white">
                        Nueva Imagen
                    </a>
                </button>
                <div class="card-body">
                        <table class="table table-border">
                            <thead>
                                <tr>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Ruta</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Fecha de creacion</th>
                                <th scope="col">Fecha de Modificacion</th>
                                <th scope="col">Status</th>
                                <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


</x-app-layout>