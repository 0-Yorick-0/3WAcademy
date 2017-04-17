<?php

  $req = $bdd->query('SELECT orderNumber, orderDate, shippedDate, status FROM orders ORDER BY orderNumber DESC');

 ?>
