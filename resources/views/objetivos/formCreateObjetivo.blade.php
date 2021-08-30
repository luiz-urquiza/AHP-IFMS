<form method="POST" action="/profile">
    @csrf

    <div class="form-group">
    <label for="Descricao">Descrição :</label>
    <input type="text" class="form-control" placeholder="Enter descricao" id="descricao">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

</form>