<x-layout title="Séries">
    <form method="POST" action="/series/salvar">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nome:</label>
            <input type="text" class="form-control" name="nome" id="exampleFormControlInput1" placeholder="Fulano de Tal">
        </div>        
        <button type="submit" class="btn btn-dark">Enviar</button>
    </form>
</x-layout>
