<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        <br>
        <h2>Update Product</h2>
        <form action="{{route('products.updatePostProducts')}}" method="POST">
            @csrf
            <input type="hidden" name="idUser" value="{{$product->id}}">
           <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
           </div>
           <div class="mb-3">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}">
           </div>
           <div class="mb-3">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control">
                @foreach ($category as $value)
                <option 
                @if ($product->category_id===$value->id)
                @selected(true)
                    
                @endif
                value="{{$value->id}}">{{$value->nameCategory}}</option>
                @endforeach
            </select>
           </div>
           <div class="mb-3">
            <label for="view">View</label>
            <input type="number" class="form-control" id="view" name="view" value="{{$product->view}}">
           </div>
           
           <button type="submit" class="btn btn-success">Update</button>
        </form>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>