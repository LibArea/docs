# Как добавить код счетчика Яндекс.Метрики?

Сайт LibArea использует технологию *Content Security Policy*. Чтобы добавить счетчик выполните следующие действия...

В дириктории: `/views/default/` вашего шаблона создайте файл: `metrica.php`, а в диритории: `/assets/js/` файл `metrica.js`.

В подвал (`footer.php` шаблона) вашего сайте подключите файл `metrica.php` следующим образом:

```php
<?= Tpl::import('/metrica'); ?>
```

В файле `metriсa.php` необходимо разместить код:

```php
<script src="/assets/js/metrica.js"></script>
<noscript><div>
<img src="https://mc.yandex.ru/watch/XXXXXX" class="yandex" /></div>
</noscript>
```

Заменив XXXXXX на номер своего счетчика.

А в файл `metrica.js` добавить:

```javascript
(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
m[i].l=1*new Date();
k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,
k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(XXXXXXXX, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
});
```

Где за XXXXXXXX номер вашего счетчика в системе Яндекс.Метрика.

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