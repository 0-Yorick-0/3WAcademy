<?php

  $req = $bdd->prepare('SELECT c.contactFirstName, c.contactLastName, c.addressLine1, c.addressLine2, c.city, c.phone, p.productCode, p.productName, od.priceEach, (od.priceEach*od.quantityOrdered) AS prix_total
    FROM customers c
    INNER JOIN orders o
    ON c.customerNumber = o.customerNumber
    INNER JOIN orderdetails od
    ON o.orderNumber = od.orderNumber
    INNER JOIN products p
    ON od.productCode = p.productCode
    WHERE o.orderNumber = :num
    ');

    $req->execute(array(
      'num' => $_GET['num']
    ));

    $donnees = $req->fetch();


 ?>
