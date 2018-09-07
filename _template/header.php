<?php
if (!array_key_exists('styles', $_page)) $_page['styles'] = [];
if (!array_key_exists('scripts', $_page)) $_page['scripts'] = [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?=!empty($_page['title']) ? $_page['title'] : getenv('title') ?></title>

  <link rel="stylesheet" href="<?=$_info::url('/dashboard/assets/css/bootstrap.min.css')?>" />
  <link rel="stylesheet" href="<?=$_info::url('/dashboard/assets/css/custom.min.css')?>" />
  <?php foreach($_page['styles'] as $style): ?>
  <link rel="stylesheet" href="<?=$_info::url('/dashboard/assets/css/' . $style)?>" />
  <?php endforeach; ?>
</head>
<body>
