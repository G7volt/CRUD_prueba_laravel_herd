<x-app-layout>

    <br>
    <br>

    <h1 >Aca se mostraran todos los posts</h1>

     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <a href="/" style="color: white">
            Volver
        </a>
    </button>

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
                <th scope="col">Fecha y Hora de Creacion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                <th href="/posts/{{$post->id}}">{{$post -> id}}</th>
                <td><a href="/posts/{{$post->id}}">{{$post -> title}}</a></td>
                <td href="/posts/{{$post->id}}">{{$post -> category}}</td>
                <td href="/posts/{{$post->id}}">{{$post -> created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


</x-app-layout>