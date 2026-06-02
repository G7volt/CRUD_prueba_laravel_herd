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
                            <input class="form-control me-2" type="search" placeholder="Buscar por descripcion" aria-label="Search" name="search" value="{{request('search')}}">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </div>
                    </form>
                    <button type="button" class="btn btn-primary mt-3 ms-3" >
                    <a href="{{ route('images.create') }}" style="color: white">
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
                            <tbody>
                                <!--Muestra imagenes si encuentra la descripcion, en caso contrario muestra un mensaje de 'no encontrado'-->
                                @forelse($images as $image)
                               <tr>
                                <td class="align-middle">{{ $image->description}}</td>
                                <td class="align-middle">{{ $image->image_url }}</td>
                                <td class="align-middle">{{ $image->creation_user }}</td>
                                <td class="align-middle">{{ $image->creation_date }}</td>
                                <td class="align-middle">{{ $image->modification_date }}</td>
                                <td>{{ $image->status }}</td>
                                <td >

                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Acciones
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('images.edit', $image->id) }}">Editar</a>
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modalImage"
                                            data-description="{{ $image->description }}"
                                            data-url="{{ asset('storage/' . $image->image_url) }}">
                                            Imagen Completa
                                            </a>
                                            <form action="{{ route('images.changeStatus', $image->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="dropdown-item">
                                                    Cambiar Estado
                                                </button>
                                            </form>
                                            <form action="{{ route('images.destroy', $image->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                               </tr>
                               @empty
                               <tr>
                                   <td colspan="7" class="text-center">No hay imágenes para mostrar.</td>
                               </tr>
                               @endforelse
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

</x-app-layout>