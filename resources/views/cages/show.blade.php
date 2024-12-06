<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Клетка: {{ $cage->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container mt-4">
        <h1>Клетка: {{ $cage->name }}</h1>
        <p>Вместимость: {{ $cage->capacity }} мест</p>

        <h3>Животные в клетке:</h3>
        @if ($cage->animals->isEmpty())
            <p>Клетка пуста.</p>
        @else
            <ul>
                @foreach ($cage->animals as $animal)
                    <li>
                        <strong>{{ $animal->name }}</strong> ({{ $animal->species }})
                        — <a href="{{ route('animals.show', $animal) }}">Подробнее</a>
                    </li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('cages.index') }}" class="btn btn-secondary mt-3">Вернуться к списку клеток</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
