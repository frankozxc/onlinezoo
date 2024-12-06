<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать клетку</title>

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
        <h1 class="text-center mb-4">Редактировать клетку</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('cages.update', $cage) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Название клетки</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $cage->name) }}"
                    required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="capacity" class="form-label">Вместимость</label>
                <input type="number" id="capacity" name="capacity" class="form-control"
                    value="{{ old('capacity', $cage->capacity) }}" required>
                @error('capacity')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Обновить клетку</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>