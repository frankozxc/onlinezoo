<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подробнее о животном</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('index') }}">Виртуальный зоопарк</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cages.create') }}">Добавить клетку</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('animals.create') }}">Добавить животное</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cages.index') }}">Список клеток</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('animals.index') }}">Список животных</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Подробнее о животном</h1>

        <div class="card">
            <div class="card-header">
                <h3>{{ $animal->name }}</h3>
            </div>
            <div class="card-body">
                <<h1>{{ $animal->name }}</h1>
                    <p><strong>Вид:</strong> {{ $animal->species }}</p>
                    <p><strong>Возраст:</strong> {{ $animal->age }}</p>
                    <p><strong>Описание:</strong> {{ $animal->description }}</p>

                    <p><strong>Клетка:</strong>
                        @if($animal->cage)
                            {{ $animal->cage->name }}
                        @else
                            Нет клетки
                        @endif
                    </p>
            </div>
            <div class="card-footer text-muted">
                <a href="{{ route('animals.edit', $animal) }}" class="btn btn-warning btn-sm">Редактировать</a>
                <form action="{{ route('animals.destroy', $animal) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Вы уверены, что хотите удалить это животное?')">Удалить</button>
                </form>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('animals.index') }}" class="btn btn-secondary">Назад к животным</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>