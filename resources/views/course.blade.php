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
                    <h1>{{$course->name}}</h1>
                    <p class="excerpt">
                        Начало курса: <b>{{$course->start_date}}</b>.
                    </p>
                    <p class="excerpt">
                        Количество мест: <b>{{$course->people_count}}</b>.
                    </p>
                    @if (!$isAdmin)
                    <form action="{{ route('enroll', ['course' => $course->id]) }}" method="post">
                        @csrf
                        @method('post')
                        @if ($isEnrolled)
                        @if ($course->start_date > now()->setTimezone('Asia/Yekaterinburg')->addDay())
                        <button type="submit" class="button">Отменить запись</button>
                        @else
                        <button type="submit" class="button" disabled>Отменить запись</button>
                        @endif
                        @else
                        @if ($course->people_count > 0 && $course->start_date > now())
                        <button type="submit" class="button">Записаться на курс</button>
                        @else
                        <button type="submit" class="button" disabled>Нельзя записаться на курс</button>
                        @endif
                        @endif
                    </form>
                    @endif
                </div>
            </article>
        </div>
    </header>
    <!-- ######################## Section ######################## -->
    <section class="section_light">
        <div class="row">
            <img src="{{asset('storage/images/' . $course->photo)}}" alt="desc" width=400 align=left hspace=30>
            <p>{{$course->description}}</p>
        </div>
    </section>
    @include('footer')
    <!-- ######################## Scripts ######################## -->
    <script src="javascripts/foundation.min.js" type="text/javascript"></script>
    <script src="javascripts/app.js" type="text/javascript"></script>
</body>

</html>