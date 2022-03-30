<?= includeTemplate('header', ['desc' => $desc, 'title' => $title, 'type' => $type]); ?>
<div class="box-flex">
  <?= Data::LOGO_BIG; ?>
  <div class="text-max-w500">
    <?= $help; ?>.
  </div>
</div>

<div class="box-flex">
  <a class="button-large" href="<?= getUrlByName('welcome', ['lang' => 'ru']); ?>">Русский</a>
  <a class="button-large" href="<?= getUrlByName('welcome', ['lang' => 'en']); ?>">English</a>
</div>

<?= includeTemplate('footer'); ?>