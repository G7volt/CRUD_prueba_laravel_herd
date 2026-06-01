<x-app-layout>

    <button type="button" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
        </svg>
        <a href="/posts" style="color: white">Cancelar</a>
    </button>

   @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    </div>

    <form action="/posts" method="POST">
        @csrf
        <label>
            Titulo:
            <input type="text" name="title" id="title" value="{{old('title')}}">
        </label>
                <br>
                <br>
        <label>
            Categoria:
            <input type="text" name="category" id="category" value="{{old('category')}}">
        </label>
                <br>
                <br>
        <label>
            contenido
            <br>
            <textarea name="content" id="content" cols="50" rows="5">{{old('content')}}</textarea>
        </label>

        <br>
        <br>
        <button type="submit button" class="btn btn-primary">
            Agregar Post
        </button>
        
    </form>

</x-app-layout>