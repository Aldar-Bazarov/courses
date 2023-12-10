<!-- ######################## Main Menu ######################## -->
<nav>
    <div class="twelve columns header_nav">
        <div class="row">
            <ul id="menu-header" class="nav-bar horizontal">
                @if ($isAdmin)
                <li><a href="/admin">Главная</a></li>
                @foreach($languages as $language)
                <li>
                    <a href="/admin/language/{{ $language->id }}">
                        {{ $language->name }}
                    </a>
                </li>
                @endforeach
                @else
                <li><a href="/">Главная</a></li>
                <li><a href="/mycourses">Мои курсы</a></li>
                @foreach($languages as $language)
                <li>
                    <a href="/language/{{ $language->id }}">
                        {{ $language->name }}
                    </a>
                </li>
                @endforeach
                @endif
                @if (Auth::check())
                <li><a href="/logout">Выйти</a></li>
                @else
                <li><a href="/register">Регистрация</a></li>
                <li><a href="/login">Войти</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav><!-- END main menu -->