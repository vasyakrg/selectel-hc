# Управление тиккетами в Selectel

- приложение полезно тем, у кого нет прямого доступа в ЛК Selectel, а есть только токен
- позволяет получать доступ к службе поддержки, создавать и управлять запросами


## Запуск
- для начала надо запросить токен у овнера (который имеет полный доступ в [кабинет](https://my.selectel.ru/profile/apikeys))
- `cp .env.example .env`
- заполняем `.env` токеном, если вдруг изменился поинт у API selectel - меняем его на правильный, смотреть [тут](https://developers.selectel.ru/docs/control-panel/tickets/)
- `./docker-start`
- идем на [http://localhost:8080](http://localhost:8080) (порт также можно изменить в `.env`)


### TODO
- пока не реализована поддержка вложений файлов
- переоткрыть запрос нельзя по причине нереализованного метода в API Selectel (в сотфе поддержка есть и может быть включена, когда\если метод реализуют)


### Автор \ Author
- **Vassiliy Yegorov** [vasyakrg](https://github.com/vasyakrg)
- [youtube](https://youtube.com/realmanual)
- [site](https://vk.com/realmanual)
- [telegram](https://t.me/realmanual)
- [any qiestions for my](https://t.me/realmanual_group)
