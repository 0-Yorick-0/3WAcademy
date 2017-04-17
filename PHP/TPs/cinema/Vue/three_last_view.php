<?php foreach ($req as $value): ?>
  <div class="col-md-4">
    <h2><?= $value['title']?></h2>
    <img src="<?= $value['image']?>" alt="" style="max-width:40%">
    <p><?= $value['date_release']?></p>
  </div>
<?php endforeach; ?>
