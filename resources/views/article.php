<?= includeTemplate('header', ['desc' => $desc, 'title' => $title, 'type' => $type]); ?>

<div id="contentWrapper" class="wrap">
  <main>
    <?= $data['contents']; ?> 
  </main>  
  <?php if($data['headings']) { ?> 
    <?php if($data['headings']) { ?> 
      <aside>
        <?= $data['headings']; ?> 
      </aside>
    <?php } ?> 
  <?php } ?>   
</div>  

<?= includeTemplate('footer'); ?>
