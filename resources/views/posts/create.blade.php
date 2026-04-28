<x-app-layout>

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

    <button type="button" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
        </svg>
        <a href="/posts" style="color: white">Cancelar</a>
    </button>

    <h1 class="text-center">formulario para crear un Post</h1>

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
        <button type="submit button" class="btn btn-primary">
            Agregar Post
        </button>
        
    </form>

</x-app-layout>