# Философия сайта
Мы приветствуем минимализм и стараемся следовать этой концепции и на сайте.

Средний размер файла и «вес» веб-сайтов стали немного смешными. В апреле 2016 года [было отмечено](https://mobiforge.com/research-analysis/the-web-is-doom), что средняя страница теперь больше, чем в игре DOOM.

Это не дело!

## Минимальный javascript - не переворачивайте веб-пирамиду

Существует концепция «пирамиды», которая использовалась много лет, когда люди говорят о строительстве для Интернета. Обычно он показывает прочную основу HTML, слой CSS, а вершиной пирамиды является javascript.

![Пирамида html, css и js](/uploads/content/html-css-js.jpeg)

Однако современная веб-разработка фактически перевернула эту пирамиду с ног на голову. Для клиентского javascript стало стандартом доставлять и даже генерировать HTML и CSS. Многие базовые текстовые сайты (например, блоги) больше ничего не отображают без javascript.

Мы считаю, что полагаться на javascript на этом уровне - принципиально неправильный подход к сети, поэтому этот сайт построен «традиционным» способом. Javascript используется как можно меньше и в идеале только тогда, когда это единственный вариант для чего-то. И из-за этого...

### Полностью функциональный для просмотра без javascript

Данный сайт всегда будет работоспособен для просмотра без включенного javascript. Кто-то с отключенным javascript должен иметь возможность просматривать все списки на сайте, читать все типы сообщений и так далее.

Взаимодействие без javascript не будет приоритетом. Некоторые функции могут в конечном итоге не работать естественным образом из-за того, как они реализованы, но мы не будем беспокоиться о том, чтобы сделать такие вещи, как голосование, функциональными, когда javascript отключен.

### Отсутствие голосов против

На сайте нет отрицательных голосов ни за темы, ни за комментарии. Причина этого в том, что я считаю, что мы можем реализовать различные механизмы, которые заменят «правильное» использование голосов против, не допуская при этом всех злоупотреблений ими.

Идеальное использование отрицательного голоса - это общий способ выразить «это не способствует», но на практике они чаще используются как **«я не согласен» или «мне это не нравится»**.

За качественные публикации часто голосуют против, потому что другие пользователи не согласны с этим мнением, а в сообществах, основанных на вкусе (например, связанных с музыкой), целые категории допустимых публикаций могут оказаться нежизнеспособными, потому что за них просто проголосуют против пользователей с другими вкусами.

### Какие технологии использует сайт?
С технической стороны сайт стремится использовать современные версии простых, надежных, «скучных» технологий. Это особенно важно для проекта с открытым исходным кодом, рассчитывающего на участие извне, поскольку это означает, что людям гораздо легче участвовать.

Основными технологиями являются php (с использованием веб-фреймворка HLEB), css, html и разметка Markdown. 

> HLEB — это PHP-фреймворк с очень маленьким размером, созданный для разработчиков, которым нужен простой и элегантный инструментарий для создания полнофункциональных веб-приложений.

[phphleb.ru](https://phphleb.ru/)

Несколько других систем используются для конкретных нужд.

*Документация в стадии разработки...*