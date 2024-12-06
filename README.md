
## Установка

### 1. Клонирование репозитория
```bash
git clone https://github.com/username/repository-name.git
cd repository-name
```

### 2. Установка зависимостей
Убедитесь, что у вас установлен [Composer](https://getcomposer.org/). Затем выполните команду:
```bash
composer install
```

### 3. Настройка файла `.env`
Скопируйте файл `.env.example` и переименуйте его в `.env`:
```bash
cp .env.example .env
```
Затем настройте следующие параметры:
- **APP_URL**: URL вашего проекта (например, `http://localhost`)
- **DB_CONNECTION**: тип соединения с базой данных (по умолчанию `mysql`)
- **DB_HOST**: хост базы данных (например, `127.0.0.1`)
- **DB_PORT**: порт базы данных (обычно `3306`)
- **DB_DATABASE**: имя базы данных
- **DB_USERNAME**: имя пользователя базы данных
- **DB_PASSWORD**: пароль от базы данных

### 4. Генерация ключа приложения
```bash
php artisan key:generate
```

### 5. Запуск миграций
Создайте базу данных в вашей СУБД (MySQL, PostgreSQL и т.д.) и выполните миграции:
```bash
php artisan migrate
```

---

## Использование

### Запуск локального сервера разработки
Чтобы запустить сервер разработки, выполните:
```bash
php artisan serve
```
Приложение будет доступно по адресу:  
[http://localhost:8000](http://localhost:8000)

### Выполнение дополнительных команд
- **Обновление базы данных (миграции)**:  
  ```bash
  php artisan migrate
  ```

- **Откат миграций**:  
  ```bash
  php artisan migrate:rollback
  ```

- **Очистка кеша приложения**:  
  ```bash
  php artisan cache:clear
  ```






