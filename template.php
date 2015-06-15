<?php
/*
*
* Chill Mode - Template
* Description: The template markup and assets paths.
*
*/ ?>

<!DOCTYPE html>
<html class="no-js">
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo $title; ?></title>
    <?php
    if ( $styles && $styles !== null ) {
      echo '<style type="text/css">';
        echo $styles;
      echo '</style>';
    } else {
       echo '<link href="/content/plugins/'. basename(__DIR__) .'/css/styles.css" rel="stylesheet">';
    } ?>
  </head>
  <body>

    <div class="error-box">
      <h1><?php echo $heading; ?></h1>
      <hr>
      <p class="message"><?php echo $message; ?></p>
    </div>

    <?php
    if ( $scripts && $scripts !== null ) {
      echo '<script type="text/javascript">';
        echo $scripts;
      echo '</script>';
    } else {
       echo '<script type="text/javascript" src="/content/plugins/'. basename(__DIR__) .'/js/main.js">';
    } ?>

  </body>
</html>