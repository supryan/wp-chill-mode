<?php
/*
*
* Chill Mode - Custom Template
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
    }

    if ($gaID) {
      echo "
        <!-- Google Analytics -->
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', '".$gaID."', 'auto');
          ga('send', 'pageview');
        </script>
      ";
    } ?>

  </head>
  <body>

    <div class="error-box"><?php

      if ($image && $image !== null) {
        echo '<img src="'. $image['url'] .'" alt="'. $title .'">';
      } ?>

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
       echo '<script type="text/javascript" src="/content/plugins/'. basename(__DIR__) .'/js/main.js"></script>';
    } ?>

  </body>
</html>