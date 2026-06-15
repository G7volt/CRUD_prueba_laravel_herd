<x-app-layout>

    <br>
    <br>

    <h1 class="text-center">Tabla de imagenes</h1>

    <br>
    <br>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card d-grid gap-2 d-md-block justify-content-md-end">
                <div class="d-flex justify-content-end mt-3 me-3 ms-3">
                    <form action="{{ route('images.index')}}" method='GET' class="d-flex justify-content-end mt-4 me-3 ms-3">
                        <div class="input-group">
                            <input 
                            id="searchInput" 
                            class="form-control me-2" 
                            type="search" 
                            placeholder="Buscar por descripcion" 
                            aria-label="Search" 
                            name="search" 
                            value="{{request('search')}}">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </div>
                    </form>
                    <button type="button" class="btn btn-primary mt-3 ms-3" >
                    <a href="{{ route('images.create') }}" style="color: white" data-bs-toggle="modal" data-bs-target="#newImage">
                        Nueva Imagen
                    </a>
                    </button>
                </div>
                <form action="{{ route('images.index') }}"></form>
                <div class="card-body">
                        <table class="table table-border">
                            <thead>
                                <tr>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Ruta</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Fecha de creacion</th>
                                <th scope="col">Fecha de modificacion</th>
                                <th scope="col">Status</th>
                                <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tablaBody">
                                @include('Image_Table.partials.tabla'/* , ['images' => $images] */)
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    <nav aria-label="Page navigation example" class="d-flex justify-content-center mt-3">
        <ul class="pagination">
            {{$images->links()}}
        </ul>
    </nav>

<x-newImage-modal />

<x-editImage $image=image/>

<x-image-preview />

<script>
    //manda a traer el valor del input de busqueda
    const searchInput = document.getElementById('searchInput')

    //se ejecuta mientras escribes en el imput de busqueda
    searchInput.addEventListener('keyup', function(){
        buscar();
    });

    function buscar(){
        const search = searchInput.value.toLowerCase()//manda a traer el valor del input y lo transforma a minuscula

        //hace fetch a la ruta index  de imagenes, pasando el valor del input de busqueda como parametro
        fetch(`{{ route('images.index') }}?search=${search}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest' //indica que la solicitud se realiza mediante AJAX
            }
        })
        .then(response => response.json())//convierte la respuesta a json
        .then(data => {
            document.getElementById('tablaBody').innerHTML = data.html;//actualiza el contenido de la tabla con los resultados de la busqueda
        })
    }
</script>

</x-app-layout>