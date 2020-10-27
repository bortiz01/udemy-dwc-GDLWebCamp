<head>
  <meta charset="utf-8" />
  <title></title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <meta property="og:title" content="" />
  <meta property="og:type" content="" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="" />

  <link rel="manifest" href="site.webmanifest" />
  <link rel="apple-touch-icon" href="icon.png" />
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css" />

  <!-- ----------------------------- Begin - Custom Style ----------------------------- -->
  <link rel="stylesheet" href="css/all.min.css" />
  <!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&family=PT+Sans&display=swap" rel="stylesheet" /> -->
  <link rel="stylesheet" href="css/fonts.css" />
  <link rel="stylesheet" href="css/maps/leaflet.css" />

  <?php
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);

    if ($pagina == 'invitados' || $pagina == 'index') {
      echo '<link rel="stylesheet" href="css/colorbox/colorbox.css">';
    }elseif ($pagina == 'conferencia') {
      echo '<link rel="stylesheet" href="css/lightbox/lightbox.css">';
    };
  ?>

  <!-- <link rel="stylesheet" href="css/lightbox/lightbox.css">  
  <link rel="stylesheet" href="css/colorbox/colorbox.css"> -->
  <!-- ----------------------------- End - Custom Style ----------------------------- -->

  <link rel="stylesheet" href="css/main.css" />
  <meta name="theme-color" content="#fafafa" />
</head>