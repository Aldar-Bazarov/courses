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
            <div class="card-header">Регистрация</div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">ФИО</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                    </div>
                    @error('name')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    @error('email')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

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

                    <div class="form-group">
                        <label for="password-confirm">Подтвердите пароль</label>
                        <input id="password-confirm" type="password" name="password_confirmation"
                            value="{{ old('password_confirmation') }}" required>
                    </div>
                    @error('password-confirm')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="form-group">
                        <label for="avatar">Аватар</label>
                        <input id="avatar" type="file" name="avatar" accept="image/jpeg" value="{{ old('avatar') }}"
                            required>
                    </div>
                    @error('avatar')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <a href="/login" style="text-decoration: none;">
                        Войти
                    </a>

                    <div class="form-group">
                        <button type="submit" class="btn-primary">
                            Регистрация
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>