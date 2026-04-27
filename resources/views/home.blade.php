<x-app-layout>
    
    <x-navbar></x-navbar>
    

<div class="container">
    
    <x-presentacion></x-presentacion>

    <div>
        <x-personasImportantes></x-personasImportantes>
    </div>
    
    <div>
        <x-objetivos></x-objetivos>
    </div>
    

    <div>
        <button type="button" class="counter btn btn-primary">
        cantidad de clicks 
        </button>
        <p id="clickCount">clicks = 0</p>
    </div>
</div>

</x-app-layout>