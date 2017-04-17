<?php
    // Inclusion du fichier header.php
    require_once 'app/config/include/header.php';
?>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php
            // Inclusion du header
            include_once 'app/config/include/nav.php';
        ?>
        <?php
            // insclusion du main
            include_once 'app/config/include/php-mysql/day13-14.php';
        ?>
        <?php
            // insclusion du footer
            include_once 'app/config/include/footer.php';
        ?>
