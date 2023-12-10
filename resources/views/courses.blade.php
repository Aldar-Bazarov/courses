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
            @if (isset($languageName))
            <h1>{{$languageName}}</h1>
            @else
            <h1>Языковая школа LINGVO</h1>
            @endif
    </header>
    <!-- ######################## Section ######################## -->
    <section>
        <div class="section_main">
            <div class="row">
                <section class="eight columns">
                    <div class="filters">
                        <a href="{{ url('/') }}">
                            <button class="button">Все</button>
                        </a>
                        <a href="{{ url('/?filter=active') }}">
                            <button class="button">Активная запись</button>
                        </a>
                        <a href="{{ url('/?filter=past') }}">
                            <button class="button">Запись прошла</button>
                        </a>
                        <a href="{{ url('/?filter=no-spots') }}">
                            <button class="button">Нет мест</button>
                        </a>
                    </div>
                    @foreach($courses as $course)
                    <article class="blog_post">
                        <div class="three columns">
                            <a href="{{ asset('storage/images/' . $course->photo) }}" class="th">
                                <img src="{{ asset('storage/images/' . $course->photo) }}" alt="desc" />
                            </a>
                        </div>
                        <div class="nine columns">
                            <a href="/course/{{$course->id}}">
                                <h4>{{$course->name}}</h4>
                            </a>
                            <p>{{$course->description}}</p>
                        </div>
                    </article>
                    @endforeach
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