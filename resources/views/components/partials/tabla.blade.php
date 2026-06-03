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
            <a class="dropdown-item" href="{{ route('images.edit', $image->id) }}" data-bs-toggle="modal" data-bs-target="#editImage">
                Editar
            </a>
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