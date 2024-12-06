<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Виртуальный зоопарк</title>
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
        <h1 class="mb-4">Список клеток</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @foreach ($cages as $cage)
            <div class="card mb-3">
                <div class="card-header">
                    <h3>{{ $cage->name }} ({{ $cage->capacity }} мест)</h3>
                </div>
                <div class="card-body">
                    <h5>Животные в клетке:</h5>
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
                </div>
                <div class="card-footer">
                    <a href="{{ route('cages.show', $cage) }}" class="btn btn-primary">Посмотреть клетку</a>
                    <a href="{{ route('cages.edit', $cage) }}" class="btn btn-warning">Редактировать</a>

                    <form action="{{ route('cages.destroy', $cage) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Вы уверены, что хотите удалить клетку?')">Удалить</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>