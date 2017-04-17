<table class="table table-striped">
  <thead>
    <tr>
      <th>Image</th>
      <th>Prénom</th>
      <th>Nom</th>
      <th>Métier</th>
      <th>Date de naissance</th>
    </tr>
  </thead>

  <?php
    foreach ($req as $value) :?>
    <tr>
      <td><img src="<?= $value['image']?>" alt="<?= $value['title']?>" style="max-width: 10%"></td>
      <td><?= $value['firstname']?></td>
      <td><?= $value['lastname']?></td>
      <td><?= $metier?></td>
      <td><?= $value['dob']?></td>
    </tr>
    <?php
  endforeach;
   ?>



</table>
