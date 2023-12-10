<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Языковая школа LINGVO</title>
    <link rel="stylesheet" href="{{asset('stylesheets/foundation.min.css')}}">
    <link rel="stylesheet" href="{{asset('stylesheets/main.css')}}">
    <link rel="stylesheet" href="{{asset('stylesheets/app.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/ligature.css')}}">
    <script src="{{asset('javascripts/modernizr.foundation.js')}}"></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:400italic'
        rel='stylesheet' type='text/css' />
</head>

<body>
    @include('menu', ['languages' => $languages, 'isAdmin' => $isAdmin])
    <!-- ######################## Header (featured posts) ######################## -->
    <header>
        <div class="row">
            <h1>Языковая школа LINGVO</h1>
    </header>
    <!-- ######################## Section ######################## -->
    <section>
        <div class="section_main">
            <div class="row">
                <section class="eight columns">
                    @if(session('error'))
                    <h1>
                        {{ session('error') }}
                    </h1>
                    @endif
                    @if(session('success'))
                    <h1>
                        {{ session('success') }}
                    </h1>
                    @endif
                    @foreach($courses as $course)
                    <article class="blog_post">
                        <div class="three columns">
                            <a href="{{ asset('storage/images/' . $course->photo) }}" class="th">
                                <img src="{{ asset('storage/images/' . $course->photo) }}" alt="desc" />
                            </a>
                        </div>
                        <div class="nine columns">
                            <a href="/enrollments/{{$course->id}}">
                                <h4>{{$course->name}}</h4>
                            </a>
                            <p>{{$course->description}}</p>
                            <a href="/deletecourse/{{$course->id}}">Удалить</a>
                        </div>
                    </article>
                    @endforeach
                </section>

                <section class="four columns">
                    <H3> &nbsp; </H3>
                    <div class="panel">
                        <h3>Админ-панель</h3>
                        <ul class="accordion">
                            <li class="active">
                                <div class="title">
                                    <a href="/createcourse">
                                        <h5>Добавить курс</h5>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </section>
    @include('images')
    @include('footer')
    <!-- ######################## Scripts ######################## -->
    <script src="javascripts/foundation.min.js" type="text/javascript"></script>
    <script src="javascripts/app.js" type="text/javascript"></script>
</body>

</html>