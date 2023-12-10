<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('stylesheets/register.css') }}">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">Авторизация</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="login">Логин</label>
                        <input id="login" type="text" name="login" value="{{ old('login') }}" required>
                    </div>
                    @error('login')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input id="password" type="password" name="password" value="{{ old('password') }}" required>
                    </div>
                    @error('password')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <a href="/register" style="text-decoration: none;">
                        Зарегистрироваться
                    </a>

                    <div class="form-group">
                        <button type="submit" class="btn-primary">
                            Войти
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>