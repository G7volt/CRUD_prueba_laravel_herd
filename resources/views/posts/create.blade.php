<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel 12 || Posts</title>
</head>
<body>
<!--
    <div class="modal fade" id="newPostModal" tabindex="-1" aria-labelledby="newPostModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="newPostTitle">Crear un Post</h1>
                </div>
                <div class="modal-body">
                   <form action="/posts" method="POST">
                        @csrf
                        <label>
                            Titulo:
                            <input type="text" name="title" id="title">
                        </label>
                                <br>
                                <br>
                        <label>
                            Categoria:
                            <input type="text" name="category" id="category">
                        </label>
                                <br>
                                <br>
                        <label>
                            contenido
                            <br>
                            <textarea name="content" id="content" cols="50" rows="5"></textarea>
                        </label>
                        
                        <br>
                        <br>
                        <button type="submit">
                            Agregar Post
                        </button>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Agregar Post</button>
                </div>
            </div>
        </div>
    </div>
-->

    <h1>formulario para crear un Post</h1>

    <form action="/posts" method="POST">
        @csrf
        <label>
            Titulo:
            <input type="text" name="title" id="title">
        </label>
                <br>
                <br>
        <label>
            Categoria:
            <input type="text" name="category" id="category">
        </label>
                <br>
                <br>
        <label>
            contenido
            <br>
            <textarea name="content" id="content" cols="50" rows="5"></textarea>
        </label>
        
        <br>
        <br>
        <button type="submit">
            Agregar Post
        </button>
        
    </form>
</body>
</html>