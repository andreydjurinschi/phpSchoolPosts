## Djurinschi Andrei I2302
### Лабораторная работа номер 4

# Руководство по запуску проекта

1. Установите xampp на свой компьютер.
2. Клонируйте репозиторий в папку `htdocs` вашего xampp
```bash
cd <путь/к/папке>
git clone https://github.com/andreydjurinschi/phpSchoolPosts.git
```
3. Запустите xampp и включите Apache и MySQL.
4. Откройте бд `phpSchoolPosts` в phpMyAdmin и импортируйте файл `usmphpbd.sql`.
файл можно скачать тут [tim dim](https://drive.google.com/file/d/1KrrNd5yg6PNLhGISabzHZ2Dbtde_GSA7/view?usp=drive_link)

# Контрольные вопросы
> Какие методы HTTP применяются для отправки формы?

Методы Http GET и POST. GET испольщуется для получения данных из сервера, а POST для отправки данных на сервер.

> Что такое валидация данных, и чем она отличается от фильтрации?

Валидация данных - это контроль над отправленной информацией пользователя, гарантирующий, что она будет соответствовать определенным критериям.
Пример валидации в моем проекте
```php
/**
* Проверка на пустоту поля
* @return - false если поле пустое, true если поле заполнено
*/
public function requiredField($data)
{
    return !empty($data);
}

/***
* @param $data - информация, которую нужно проверить
* @param $minLength - минимальная длина
* @param $maxLength - максимальная длина
* @return bool - true если длина в пределах, false если нет
 */
public function validateLength($data, $minLength, $maxLength)
{
    return strlen($data) >= $minLength && strlen($data) <= $maxLength;
}
```

Фильтрация - это процесс удаления нежелательных символов из данных, которые были отправлены пользователем. Например, удаление пробелов в начале и конце строки или удаление HTML-тегов из строки.
Пример фильтрации в моем проекте
```php

/**
* @param $data - информация, которую нужно отфильтровать
* @return - отфильтрованная информация
*/

public function sanitizeData($data)
{
    return htmlspecialchars($data);
}

```
`htmlspecialchars` - это встроенная функция PHP, которая преобразует специальные символы в HTML-сущности. Например, символ символ `<` будет преобразован в `&lt;`. Это позволяет избежать выполнения вредоносного кода на странице.

результат:

что мы видим на странице:

![](https://i.imgur.com/dsWK7Fs.png)

что мы видим в базе данных:

![](https://i.imgur.com/epz5YMy.png)

КОД
```php
    public function createPost(?int $cat_id = null, string $title, string $content): array{

       $title = $this->validator->sanitizeData($title);
       $content = $this->validator->sanitizeData($content);

        if(!$this->validator->requiredField($title) || !$this->validator->requiredField($content)){
            return ["Empty error" => "Title and Content can't be empty"];
        }

        if(!$this ->validator->validateLength($title, 3, 100) || !$this->validator->validateLength($content, 10, 500)){
            return ["Length error" => "Title must be between 5 and 100 characters and content must be between 10 and 500 characters"];
        }
        $this->postRepository->createPost($cat_id, $title, $content);
        return ["success" => "Post created"];
    }
```

> Какой метод используется для фильтрации данных в PHP?