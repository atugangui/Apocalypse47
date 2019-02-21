<?php

//Get movie title, year, and rating
$bgs = file_get_contents("C:\Users\Irene\Downloads\background_choices.csv") ;
$bgs = explode("\n", $bgs) ;
list($background, $race) = $bgs ;
?>

//Get movie overview
<head>
      <title>Test</title>
      <meta charset="utf-8" />
</head>
   <body>
      <h1><?= "$background $race"?></h1>
   </body>
