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
            <h1>Записи на курс "{{ $course->name }}"</h1>
        </div>
    </header>
    <!-- ######################## Section ######################## -->
    <section>
        <div class="section_main">
            <div class="row">
                <section class="eight columns">
                    @if(count($enrollments) == 0)
                    <p>Записей на курс нет</p>
                    @else
                    <table>
                        <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enrollments as $enrollment)
                            <tr>
                                <td>{{ $enrollment->user->name }}</td>
                                <td>{{ $enrollment->user->email }}</td>
                                <td>
                                    <a href="/deleteEnrollment/{{$enrollment->id}}">
                                        <button type="submit">Удалить</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @endif
                </section>
            </div>
        </div>
    </section>
    @include('footer')
    <!-- ######################## Scripts ######################## -->
    <script src="javascripts/foundation.min.js" type="text/javascript"></script>
    <script src="javascripts/app.js" type="text/javascript"></script>
</body>

</html>