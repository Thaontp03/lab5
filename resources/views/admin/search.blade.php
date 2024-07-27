<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách phim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('moive.index')}}">Danh sách</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('moive.create') }}">Thêm mới</a>
        </li>
      </ul>
      <form class="d-flex mb-3" action="{{route('search')}}" role="search" method="get" >
        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Tên phim</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Giới thiệu</th>
                <th scope="col">Ngày chiếu</th>
                <th scope="col">Thể loại phim</th>
                <th scope="col">
                    <a href="{{ route('moive.create') }}" class="btn btn-primary">Thêm mới</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($moives as $moive)
                <tr>
                    <th scope="row">{{ $moive->id }}</th>
                    <td>{{ $moive->title }}</td>
                    <td>
                        <img src="{{ asset('/storage/' . $moive->poster) }}" width="50" alt="">
                    </td>
                    <td>{{ $moive->intro }}</td>
                    <td>{{ $moive->release_date }}</td>
                    <td>{{ $moive->gene->name }}</td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('moive.detail', $moive)}}" class="btn btn-success">Chitiết</a>
                        <a href="{{ route('moive.edit', $moive) }}" class="btn btn-primary">Sửa</a>
                        <form action="{{ route('moive.destroy', $moive) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn có muốn xóa không?')" type="submit"
                                class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
    
  </body>
</html>