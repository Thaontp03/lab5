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
<div class="container">
        <div class="row">
            <div class="col-4 p-3">
                <img src="{{ asset('storage/' . $moive->poster) }}" height="300px" alt="">
            </div>
            <div class="col-8 p-3">
                <h2>#{{ $moive->id }}. {{ $moive->title }}</h2>
                <p>Giới thiệu: {{ $moive->intro }}</p>
                <p>Ngày công chiếu:{{ $moive->release_date }}</p>
                <p>Thể loại phim: {{ $moive->gene->name }}</p>
            </div>
        </div>
    </div>
</body>
</html>