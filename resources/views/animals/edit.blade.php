<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать животное</title>

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
        <h1 class="text-center mb-4">Редактировать животное</h1>

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

        <form action="{{ route('animals.update', $animal) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Имя животного</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $animal->name) }}"
                    required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="species" class="form-label">Вид</label>
                <input type="text" id="species" name="species" class="form-control"
                    value="{{ old('species', $animal->species) }}" required>
                @error('species')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Возраст</label>
                <input type="number" id="age" name="age" class="form-control" value="{{ old('age', $animal->age) }}"
                    required>
                @error('age')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Обновить животное</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>