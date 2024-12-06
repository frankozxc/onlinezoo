<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить животное</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">


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
        <h1 class="text-center mb-4">Добавить животное</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('animals.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Имя животного</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="species" class="form-label">Вид животного</label>
                <input type="text" id="species" name="species" class="form-control" value="{{ old('species') }}"
                    required>
                @error('species')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Возраст животного</label>
                <input type="number" id="age" name="age" class="form-control" value="{{ old('age') }}" required>
                @error('age')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Описание животного</label>
                <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cage_id" class="form-label">Выберите клетку</label>
                <select id="cage_id" name="cage_id" class="form-control" required>
                    <option value="">Выберите клетку</option>
                    @foreach ($cages as $cage)
                        <option value="{{ $cage->id }}" {{ old('cage_id') == $cage->id ? 'selected' : '' }}>
                            {{ $cage->name }} ({{ $cage->capacity - $cage->animals->count() }} мест свободно)
                        </option>
                    @endforeach
                </select>
                @error('cage_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Добавить животное</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>