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
        <h2>Thêm Mới User</h2>
        <form action="{{route('users.addPostUsers')}}" method="POST">
            @csrf
           <div class="mb-3">
            <label for="name">Tên Đơn Vị</label>
            <input type="text" class="form-control" id="name" name="name">
           </div>
           <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
           </div>
           <div class="mb-3">
            <label for="phongban">Phòng Ban</label>
            <select name="phongban" id="phongban" class="form-control">
                @foreach ($phongban as $value)
                <option value="{{$value->id}}">{{$value->ten_donvi}}</option>
                @endforeach
            </select>
           </div>
           <div class="mb-3">
            <label for="tuoi">Tuổi</label>
            <input type="number" class="form-control" id="tuoi" name="tuoi">
           </div>
           <button type="submit" class="btn btn-success">Thêm mới</button>
        </form>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>