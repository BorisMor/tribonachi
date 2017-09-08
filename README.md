# Трибоначи
RESTful для расчета чисел [трибоначчи](https://ru.wikipedia.org/wiki/%D0%A7%D0%B8%D1%81%D0%BB%D0%B0_%D1%82%D1%80%D0%B8%D0%B1%D0%BE%D0%BD%D0%B0%D1%87%D1%87%D0%B8)

**Установка**
```bash
./composer install
```

**unit-тест**

Находится в каталоге unit
```bash
./vendor/bin/phpunit unit
```

**Описание**

Используется фреймворк [Slim](https://www.slimframework.com/) 

Два класса для расчета:
* app/component/TribonachiSimple - Простой расчет
* app/component/TribonachiBine - Расчет через формулу Бине

```php
TribonachiSimple::process(5);
TribonachiBine::process(5);
```

REST
```bash
GET /simple/:num
GET /bine/:num
```