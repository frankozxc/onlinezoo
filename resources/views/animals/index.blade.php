<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Животные - Виртуальный зоопарк</title>

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
        <h1 class="text-center mb-4">Животные в зоопарке</h1>


        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Вид</th>
                    <th>Возраст</th>
                    <th>Клетка</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($animals as $animal)
                    <tr>
                        <td>{{ $animal->name }}</td>
                        <td>{{ $animal->species }}</td>
                        <td>{{ $animal->age }} лет</td>
                        <td>{{ $animal->cage->name }}</td>
                        <td>

                            <a href="{{ route('animals.show', $animal) }}" class="btn btn-info btn-sm">Посмотреть</a>
                            <a href="{{ route('animals.edit', $animal) }}" class="btn btn-warning btn-sm">Редактировать</a>

                            <form action="{{ route('animals.destroy', $animal) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Вы уверены, что хотите удалить это животное?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <a href="{{ route('animals.create') }}" class="btn btn-primary">Добавить новое животное</a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>