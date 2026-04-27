<x-app-layout>
    <h1 >Aca se mostraran todos los posts</h1>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <a href="/posts/create" style="color: white">
            Nuevo Post
        </a>
    </button>
    <br>
    <table class="table table-border">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Titulo</th>
                <th scope="col">categoria</th>
                <th scope="col">Fecha de Publicacion</th>
                <th scope="col">Accion<th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                <th >{{$post -> id}}</th>
                <td >{{$post -> title}}</td>
                <td >{{$post -> category}}</td>
                <td >{{$post -> published_at}}</td>
                <td><a href="/posts/{{$post->id}}">ver post</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>


</x-app-layout>