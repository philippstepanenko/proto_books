# Proto_books
# v. 0.2
Данное программное решение позволяет ускорить процесс добавления информации о книгах.
# Как начать использовать?
1.  Клонируйте содержимое репозитория на ваш сервер.
2.  Создайте БД MySQL (код хранится в create.sql) и пропишите необходимую информацию в config.php.
3.  Добавьте пользователей в таблицу БД "users", которые будут добавлять информацию о книгах.
# Что теперь? Как добавить книгу?
Все те, кто авторизуются могут добавлять книги и жанры. Особое внимание обратите на принцип добавления книг.
Можно воспользоваться распознователем речи (кнопка распознать). Для этого продиктуйте название книги, автора и год издания вставляя между слово "дальше". Добавляем распознанный текст в первое текстовое поле in.php и другую необходимую информацию. Готово! Книга добавлена.