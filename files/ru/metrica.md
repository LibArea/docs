# Как добавить код счетчика Яндекс.Метрики?

Сайт LibArea использует технологию *Content Security Policy*. Чтобы добавить счетчик выполните следующие действия...

В дириктории: `/views/default/` вашего шаблона создайте файл: `metrica.php`.

В подвал (`footer.php` шаблона) вашего сайте подключите файл `metrica.php` следующим образом:

```php
<?= Tpl::import('/metrica'); ?>
```

В файле `metriсa.php` необходимо разместить код, в данном случае код Яндекс.Счетчика:

```php
<noscript>
<script nonce="<?= $_SERVER['nonce']; ?>">
  (function(m,e,t,r,i,k,a){m[i] и т.д.
</script>
<noscript>
<img src="https://mc.yandex.ru/watch/XXXXXX" class="yandex" /></div>
</noscript>
```

Обратите внимание, что мы добавляем к `script` конструкцию:  

```php
nonce="<?= $_SERVER['nonce']; ?>"
```

Проверьте корректность вашего подключения.


См. более подробно: [ЯндексСправка, Установка счетчика на сайт с CSP](https://yandex.ru/support/metrica/code/install-counter-csp.html)

## Размещение рекламы на сайте с CSP

На примере *Яндекса*...

Нам необходимо добавить атрибут nonce. Для «шапки сайта»:

```javascript
<script nonce="<?= $_SERVER['nonce']; ?>">window.yaContextCb = window.yaContextCb || []</script>
<script nonce="<?= $_SERVER['nonce']; ?>" src="https://yandex.ru/ads/system/context.js" async></script>
```

Для тела (вывод рекламы):

```javascript
<div class="br-box-gray p15 mb15 br-rd5 bg-white size-14">
    <h3 class="uppercase gray mt5 mb5 size-14 font-normal"><?= Translate::get('advertising'); ?></h3>
    <!-- Yandex.RTB R-A-1207153-1 -->
    <div id="yandex_rtb_R-A-1207153-1"></div>
    <script nonce="<?= $_SERVER['nonce']; ?>">window.yaContextCb.push(()=>{
      Ya.Context.AdvManager.render({
        renderTo: 'yandex_rtb_R-A-1207153-1',
        blockId: 'R-A-1207153-1'
      })
    })</script>
</div>
```

Далее, в файле `/public/index.php`, в строке:

```php
header("Content-Security-Policy: default-src 'self' an.yandex.ru...
```

Нам необходимо добавить домены из списка предоставленных Яндексом.

См. более подробно: https://yandex.ru/support/partner2/web/csp-configuration.html

—> [**Перейти на главную страницу**](/ru/)