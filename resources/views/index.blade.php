<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная - Виртуальный зоопарк</title>
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
        <div class="jumbotron text-center">
            <h1 class="display-4">Добро пожаловать в Виртуальный Зоопарк!</h1>
            <p class="lead">Исследуйте наш зоопарк, добавляйте животных и управляйте клетками.</p>
            <hr class="my-4">
            <p>Используйте меню выше, чтобы перейти к управлению зоопарком.</p>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <h2>Список клеток</h2>
                <p>Создайте новую клетку для ваших животных.</p>
                <a href="{{ route('cages.index') }}" class="btn btn-primary">Открыть</a>
            </div>
            <div class="col-md-6">
                <h2>Список животных</h2>
                <p>Добавьте новое животное и назначьте ему клетку.</p>
                <a href="{{ route('animals.index') }}" class="btn btn-primary">Открыть</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
