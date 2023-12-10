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
            <div class="card-header">Создание курса</div>
            <div class="card-body">
                <form method="post" action="{{ url('/createcourse') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Название курса:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Описание курса:</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="start_date">Дата и время начала:</label>
                        <input type="datetime-local" name="start_date" id="start_date" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="people_count">Количество мест:</label>
                        <input type="number" name="people_count" id="people_count" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="photo">Фото:</label>
                        <input type="file" name="photo" id="photo" class="form-control" accept="image/*" required>
                    </div>

                    <div class="form-group">
                        <label for="language_id">Язык курса:</label>
                        <select name="language_id" id="language_id" class="form-control" required>
                            @foreach($languages as $language)
                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn-primary">
                        Добавить курс
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>