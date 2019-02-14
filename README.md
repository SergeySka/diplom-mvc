* config.php - настройки БД
* dimplom.sql - дамп БД

## Описание клиентской части
* Пользователи могут просматривать категории, вопросы и ответы.
* Любой пользователь может задать вопрос, указав своё имя, адрес электронной почты, выбрав категорию и написав текст вопроса.
* Вопросы без ответов не публикуются на сайте.

## Вход в интерфейс администратора
* Для попадания в интерфейс администратора нужно ввести логин и пароль.
* По умолчанию создан администратор с логином `admin` и паролем `admin`.

## Возможности в интерфейсе администратора
* Просматривать список администраторов.
* Создавать новых администраторов.
* Изменять пароли существующих администраторов.
* Удалять существующих администраторов.
* Просматривать список тем. По каждой теме в списке видно сколько всего вопросов в ней, сколько опубликовано, сколько без ответов.
* Создавать новые темы.
* Удалять существующие темы и все вопросы в них.
* Просматривать вопросы в каждой теме. По каждому вопросу видно дату создания, статус (ожидает ответа / опубликован / скрыт).
* Удалять любой вопрос из темы.
* Скрывать опубликованные вопросы.
* Публиковать скрытые вопросы.
* Редактировать автора, текст вопроса и текст ответа.
* Перемещать вопрос из одной темы в другую.
* Добавлять ответ на вопрос с публикацией на сайте, либо со скрытием вопроса.
* Видеть список всех вопросов без ответа во всех темах в порядке их добавления. И иметь возможность их редактировать и удалять.
