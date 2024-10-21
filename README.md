Начало работы
Зайдите в терминал и в корне проекта запустите следующие команды:
--------------------------------------
1) docker-compose up nginx -d
--------------------------------------
2) docker-compose run composer install
--------------------------------------
3) скопируйте .env.example и переименуйте в .env
--------------------------------------
4) docker-compose run artisan key:generate
--------------------------------------
5) docker-compose run artisan config:clear (не обязательно)
--------------------------------------
6) docker-compose run artisan config:cache (не обязательно)
--------------------------------------
7) docker-compose run artisan migrate
--------------------------------------
8) docker-compose run artisan db:seed (фиктивные данные были добавлены без учета формата номеров)
--------------------------------------
"chmod o+w ./storage/ -R"
запустить команду внутри контейнера php если возникнет ошибка 
"The stream or file "/var/www/laravel/storage/logs/laravel.log" could not be opened
 in append mode: Failed to open stream: Permission denied 
The exception occurred while attempting to log "
--------------------------------------

эндпоинты:

получить всех гостей: 
метод: GET
/api/guests

формат ответа: 
{
    "data": [
        {
            "id": 1,
            "first_name": "Mr. Berry Okuneva II",
            "last_name": "Hessel",
            "email": "armstrong.emerald@example.org",
            "phone": "816.274.7116",
            "country": "Belize",
            "created_at": "2024-10-21T07:21:56.000000Z"
        },
        {
          .
          .
          .
        }
    ]
}

получить конкретного гостя: 
метод: GET
/api/guests/1

формат ответа: 
{
    "data": {
        "id": 1,
        "first_name": "Mr. Berry Okuneva II",
        "last_name": "Hessel",
        "email": "armstrong.emerald@example.org",
        "phone": "816.274.7116",
        "country": "Belize",
        "created_at": "2024-10-21T07:21:56.000000Z"
    }
}

добавить гостя:

метод: POST
/api/guests

данные передаются в теле метода 
поля:
first_name
last_name
phone
email
country

при отсутствии поля country - страна будет браться автоматически из номера телефона

формат ответа: 
{
    "data": {
        "id": 1,
        "first_name": "Mr. Berry Okuneva II",
        "last_name": "Hessel",
        "email": "armstrong.emerald@example.org",
        "phone": "816.274.7116",
        "country": "Belize",
        "created_at": "2024-10-21T07:21:56.000000Z"
    }
}

изменить данные гостя:

метод: POST
/api/guests/{id}

данные передаются в теле метода 
поля:
_method:"PUT" - всегда указывается
first_name
last_name
phone
email
country


при отсутствии поля country - страна будет браться автоматически из номера телефона

формат ответа: 
{
    "data": {
        "id": 1,
        "first_name": "Mr. Berry Okuneva II",
        "last_name": "Hessel",
        "email": "armstrong.emerald@example.org",
        "phone": "816.274.7116",
        "country": "Belize",
        "created_at": "2024-10-21T07:21:56.000000Z"
    }
}

удалить данные гостя:
метод: POST
/api/guests/{id}
поля:
_method:"DELETE" - всегда указывается

Возвращается ответ со статус кодом 204 no content

так же в репозитории лежит файл для postman, используйте его для тестирования api