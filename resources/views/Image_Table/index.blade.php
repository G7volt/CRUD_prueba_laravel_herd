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
                                <th scope="col">Fecha de modificacion</th>
                                <th scope="col">Status</th>
                                <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($images as $image)
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
                                            <a class="dropdown-item" href="/Image_Table/{{$image->id}}/editImage">Editar</a>
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
                                        </div>
                                    </div>
                                </td>
                               </tr>
                               @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    <nav aria-label="Page navigation example position-absolute">
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