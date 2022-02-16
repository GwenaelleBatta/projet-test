<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wordpress</title>
</head>
<body>
    <header class="header">
        <h1 class="header__title"><?php echo get_bloginfo('name');?></h1>
        <p class="header_tagline"><?php echo get_bloginfo('description');?></p>
        <nav class="header__nav nav">
            <h2 class="nav__title">Navigation principale</h2>
            <p class="nav__placeholder">TODO...</p>
        </nav>

    </header>
