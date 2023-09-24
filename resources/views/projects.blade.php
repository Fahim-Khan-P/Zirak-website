<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    integrity="sha512-..." crossorigin="anonymous" />
  <title>Our projects</title>
  <style>
    .nav {
      position: sticky;
      top: 0;
      z-index: 100;
      display: flex;
      flex-direction: row;
      justify-content: flex-start;
      padding: 12px;
      background: linear-gradient(45deg, #1de099, #1dc8cd);
    }

    .nav ul {
      list-style-type: none;
      display: flex;
      justify-content: center;
      justify-self: center;
      gap: 40px;
      padding-top: 12px;
    }

    .nav ul li i {
      padding-top: 18px;
    }

    .nav ul li:hover {
      cursor: pointer;
    }

    .parent-container {
      display: flex;
      flex-direction: column;
      padding: 24px;
      min-height: 100vh;
      /* Add this line */
    }

    .post {
      padding: 24px;
      border: 1px solid gray;
      border-radius: 10px;
      align-items: center;
      width: 90%;
      align-self: center;
      margin-top: 50px;
      animation: fade-in 0.5s ease-in-out;
      background-color: #eeedeb89;
      transition: transform 0.5s ease;
    }

    .post:hover {
      transform: rotateY(30deg);
    }

    .image-container {
      position: relative;
      overflow: hidden;
      width: 100%;
      height: 300px;
      border-radius: 10px;
    }

    .image-div {
      width: 100%;
      height: 100%;
    }

    .no-image {
      background-color: #ccc;
    }

    .content {
      width: 90%;
      padding: 10px;
    }

    .project-title {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .project-date {
      font-size: 14px;
      margin-bottom: 5px;
    }

    .project-info {
      font-size: 16px;
      line-height: 1.5;
    }

    @keyframes fade-in {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .carousel-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .carousel-container {
      width: 100%;
      height: 300px;
      /* Adjust this value to your desired height */
    }
  </style>
</head>

<body>
  <nav class="nav">
    <ul>
      <li class="back"><a href="#"><i class="fa-solid fa-arrow-left fa-2xl"></i></a></li>
      <li class="our-project">
        <h3>
          Our Projects
        </h3>
      </li>
    </ul>
  </nav>
  <div class="parent-container">
    @foreach ($posts as $post)
    @php
    $images = DB::select('select path from images where post_id=?', [$post->id]);
    @endphp

    <div class="post">
      <div class="image-container">
        @if (count($images) == 0)
        @if ($lang == 'en')
        <div class="image-div no-image"></div>
        @elseif ($lang == 'fa')
        <div class="image-div no-image"></div>
        @elseif ($lang == 'ps')
        <div class="image-div no-image"></div>
        @endif

        @elseif (count($images) == 1)
        <img src="{{ asset($images[0]->path) }}" class="image-div" alt="sdfsdf">

        @else
        <div id="carousel{{ $post->id }}" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            @for ($i = 0; $i < count($images); $i++) <button type="button" data-bs-target="#carousel{{ $post->id }}"
              data-bs-slide-to="{{ $i }}" @if ($i==0) class="active" @endif aria-current="true"
              aria-label="Slide {{ $i + 1 }}"></button>
              @endfor
          </div>
          <div class="carousel-inner">
            @foreach ($images as $index => $image)
            <div class="carousel-item @if ($index == 0) active @endif">
              <img src="{{ asset($image->path) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}">
            </div>
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $post->id }}"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $post->id }}"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        @endif
      </div>
      <div class="content">
        @if ($lang == 'en')
        <p class="project-title">Project Title: {{$post->title}}</p>
        <p class="project-date">Start Date: {{$post->started_at}}</p>
        <p class="project-date">End Date: {{$post->ended_at}}</p>
        <p class="project-info" style="overflow: hidden; width: 90;">Project Information: {{$post->content}}</p>
        @elseif ($lang == 'fa')
        <p class="project-title">{{$post->title}}: عنوان پروژه</p>
        <p class="project-date">{{$post->started_at}}: شروع پروژه</p>
        <p class="project-date">{{$post->ended_at}}: ختم پروژه</p>
        <p class="project-info">{{$post->content_fa}}: معلومات پروژه</p>
        @elseif ($lang == 'ps')
        <p class="project-title">{{$post->title}}: د پروژی عنوان</p>
        <p class="project-date">{{$post->started_at}}: د پروژه پیل</p>
        <p class="project-date">{{$post->ended_at}}: د پروژه پای</p>
        <p class="project-info">{{$post->content_ps}}: د پروژه معلومات</p>
        @endif
      </div>
    </div>
    @endforeach
  </div>

  <script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      if (n > slides.length) {
        slideIndex = 1;
      }
      if (n < 1) {
        slideIndex = slides.length;
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>