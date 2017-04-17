<table class="table table-striped">
  <thead>
    <tr>
      <th>Affiche</th>
      <th>Titre</th>
      <th>Date de sortie</th>
      <th>Note</th>
    </tr>
  </thead>

  <?php
    foreach ($req as $value) :?>
    <tr>
      <td><img src="<?= $value['image']?>" alt="<?= $value['title']?>" style="max-width: 10%"></td>
      <td><?= $value['title']?></td>
      <td><?= $value['date_release']?></td>
      <td><?= $value['note_presse']?></td>
    </tr>
    <?php
  endforeach;
   ?>



</table>
