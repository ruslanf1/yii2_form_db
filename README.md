Проект на Yii 2 версии 2.0.47 (advanced-шаблон).

1. Скрипт авторизации в console-части. Принимает в параметрах логин и пароль - возвращает токен, действующий 20 минут.
2. Скрипт во frontend-части (поддержка GET, POST). Принимает данные и сохраняет в БД, возвращая идентификатор, время и память, затраченные на обработку запроса и сохранение, тип запроса. Скрипт должен работать с аутентификацией по токену, полученному в console-части. Аутентификация должна проходить по заголовку в запросе. 
3. CRUD (без CREATE) в backend-части. Отображает все сохраненные с frontend-части объекты с возможностью редактирования и удаления объектов.

Стек: Yii2, MySQL, JQuery.