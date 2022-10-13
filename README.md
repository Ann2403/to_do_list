# to_do_list
Test task

Юзер має можливість зареєструватись та увійти у свій аккаунт використовуючи пошту та пароль. В аккаунті юзера
відображаються створені картки задач, та текстове поле для створення нових карток. У кожної картки задачі є індикатор
статусу зроблена/не зроблена, що юзер може змінити. Картки задач можна видаляти. Пагінація карток - інфініті скрол.
Реалізувати бекенд на Laravel. Фронтенд на Vue. Для верстки можна використовувати фреймворки.


Installation:

    docker-compose build
    docker-compose up
    composer install

Copy file .env.example and rename to .env, run:

    php artisan key:generate

Run migration to database:

    php artisan migrate

Run application:

    docker-compose build
    docker-compose up
    composer update