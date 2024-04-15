<x-layout title="Login">
    <form method="POST">
        @csrf 
        <div class="container">
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password">
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </div>
    </form>
</x-layout>
