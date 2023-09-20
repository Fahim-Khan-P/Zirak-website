<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Our projects</title>
  <style>
    .post {
    display: flex;
    flex-direction: column;
    padding: 24px;
    border: 1px solid gray;
    margin: 30px 30px 50px 30px;
    border-radius: 10px;
    }
    .image {
    width: 100%;
    height: 50vh;
    }

    .image-div {
      width: 100%;
      height: 100%;
    }
  </style>
</head>
<body>
  @foreach ($posts as $post)
  @php
    $images=DB::select('select path from images where post_id=?',[$post->id]);
  @endphp
    <div class="post">
      <div class="image">
        @if (count($images)==0)
          @if ($lang == 'en')
            <p>No Images Found</p>
          @elseif ($lang == 'fa')
            <p>هیچ عکسی پیدا نشد</p>
          @elseif ($lang == 'ps')
            <p>هیڅ انځور ونمندل شو</p>
          @endif

        @elseif (count($images)==1)
          <img src="{{asset($images[0]->path)}}" class="image-div" alt="sdfsdf">

        @else
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              @for ($i = 0; $i < count($images); $i++)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" @if ($i == 0) class="active" @endif aria-current="true" aria-label="Slide {{ $i + 1 }}"></button>
              @endfor
            </div>
            <div class="carousel-inner">
              @foreach ($images as $index => $image)
                <div class="carousel-item @if ($index == 0) active @endif">
                  <img src="{{asset($image->path)}}" class="d-block w-100" alt="Slide {{ $index + 1 }}">
                </div>
              @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        @endif
      </div>
      <div class="content">
        @if ($lang == 'en')
          <p>Project Title :: {{$post->title}}</p>
          <p>Start Date :: {{$post->started_at}}</p>
          <p>End Date :: {{$post->ended_at}}</p>
          <p>Project Information :: {{$post->content}}</p>
        @elseif ($lang == 'fa')
          <p>{{$post->title}} :: عنوان پروژه </p>
          <p>{{$post->started_at}} :: شروع پروژه </p>
          <p>{{$post->ended_at}} :: ختم پروژه </p>
          <p>{{$post->content_fa}} :: معلومات پروژه </p>
        @elseif ($lang == 'ps')
          <p>{{$post->title}} :: د پروژی عنوان</p>
          <p>{{$post->started_at}} :: د پروژه پیل</p>
          <p>{{$post->ended_at}} :: د پروژه پای</p>
          <p>{{$post->content_ps}} :: د پروژه معلومات </p>
        @endif
      </div>
    </div>
  @endforeach
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>