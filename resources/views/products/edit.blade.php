<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">

        <form action="{{ route('products.update', $product['id']) }}" method="POST">
            @csrf
            <h1>Editar produtos</h1>

            @if ($errors -> any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors -> all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome do Produto</label>
                <input type="text" class="form-control" name="name" value="{{ $product['name'] }}">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Código do Produto</label>
                <input type="text" class="form-control" name="sku" value="{{ $product['sku'] }}">
            </div>
            <div class="mb-3">
                <label for="">Descrição</label>
                <textarea name="description" class="form-control" cols="30" rows="10">{{$product['description']}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>