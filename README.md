## Приём платежей

## Способы оплаты
- [X] [Tinkoff](https://www.tinkoff.ru/kassa/)
- [ ] [Stripe](https://stripe.com/)

## Установка

1. Клонировать проект
2. Подключить алиас для ```sail``` [Документация](https://laravel.com/docs/10.x/sail#configuring-a-shell-alias)
3. Скопировать .env.example в .env, при необходиемости внести изменения
4. Поднять докер контейнеры ```sail up -d --build```
5. Установить composer зависимости ```sail composer install```
6. Запустить миграции ```sail artisan migrate```
7. Установить приложение ```sail artisan install```
8. Установить тестовые заказы ```sail artisan orders:install```
9. Запустить сервер ```sail artisan serve```
10. Открыть адрес [localhost](http://localhost)

При необходимости 
- Обновить курсы валют ```sail artisan currencies:prices CBRF```

