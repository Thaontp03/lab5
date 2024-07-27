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
    <div class="container w-50">
        <h1>Sửa</h1>
        <a href="{{ route('moive.index') }}" class="btn btn-primary">Danh sách phim</a>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Tên phim</label>
                <input type="text" class="form-control" name="title" value="{{ $moive->title }}">
            </div>

            <!--Hình ảnh-->
            <div class="mb-3">
                <label class="form-label">Hình ảnh</label>
                <input class="form-control" type="file" name="poster" id="fileImage"><br>
                <img id="img" src="{{asset('/storage/' .$moive->poster)}}" width="60" alt="{{$moive->title}}">
            </div>

            <div class="mb-3">
                <label class="form-label">Giới thiệu</label>
                <textarea class="form-control" name="intro" rows="3" >{{ $moive->title }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Ngày chiếu</label>
                <input type="date" name="release_date" class="form-control" value="{{ $moive->release_date }}" >
            </div>

            <div class="mb-3">
                <label class="form-label">Thể loại phim</label>
                <select name="genre_id" class="form-select">
                    @foreach ($genes as $gene)
                        <option value="{{ $gene->id }}" 
                        @if ($moive->gene_id == $gene->id)
                        selected
                        @endif>
                        {{ $gene->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-b">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>
    </div>
    <script>
        var fileImage =document.querySelector("#fileImage")
        var img =document.querySelector("#img");
        fileImage.addEventListener('change', function(e){
            e.preventDefault()
            img.src = URL.createObjectURL(this.files[0])
        })
    </script>
</body>

</html>