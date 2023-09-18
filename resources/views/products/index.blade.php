<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>Produtos</h1>
        @foreach ($products as $row => $product)
          <div class="d-flex justify-content-between">
            <a href="{{ route('products.show', $product['id']) }}">
                {{$product["name"]}}
            </a>
            <a class="btn btn-primary" href="{{ route('products.edit', $product['id']) }}">Editar</a>
            <form  action="{{ route('products.destroy', $product['id']) }}" method="get">
                <input class="btn btn-primary" type="submit" value="Deletar produto">
            </form>
            <hr>
          </div>
        @endforeach
        <a class="btn btn-primary" href="{{ route('products.create');}}">Cadastrar produto</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>