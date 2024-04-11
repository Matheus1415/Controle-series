<x-layout title="Séries">
    <form method="POST" action="{{ isset($nome) ? route('series.update', $serie->id) : route('series.store') }}">
        @csrf
        @isset($nome->name)
            @method('PUT')
        @endisset
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nome:</label>
            <input 
                type="text" 
                class="form-control" 
                name="nome" 
                id="exampleFormControlInput1" 
                placeholder="Fulano de Tal"
                value="{{ $nome ?? '' }}"
            >
        </div>        
        <button type="submit" class="btn btn-dark">Enviar</button>
    </form>
</x-layout>
