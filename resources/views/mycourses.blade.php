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
    <!-- ######################## Header ######################## -->
    <header>
        <div class="row">
            <h4> </h4>
            <article>
                <div class="twelve columns">
                    <h1>Мои курсы</h1>
                </div>
            </article>
        </div>
    </header>
    <!-- ######################## Section ######################## -->
    <section class="section_light">
        <div class="row">
            @if ($courses->isEmpty())
            <p>Вы не записаны на курсы.</p>
            @else
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
            @endif
        </div>
    </section>
    @include('footer')
    <!-- ######################## Scripts ######################## -->
    <script src="javascripts/foundation.min.js" type="text/javascript"></script>
    <script src="javascripts/app.js" type="text/javascript"></script>
</body>

</html>