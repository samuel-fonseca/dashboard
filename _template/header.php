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

  <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
</head>
<body>
  
<style>

  body {
    background-color: #222527;
  }

  .bg-darker {
    color: #fff;
    background-color: #212529;
  }

  .bg-darker-action:hover {
    background-color: #303539 !important;
  }
  .bg-darker-action:focus {
    background-color: #353a3f !important;
  }

  .border-darker {
    border-color: rgba(0, 0, 0, 0.35) !important;
  }

  .mdc-elevation--z3 {
    -webkit-box-shadow: 0 3px 3px -2px rgba(0,0,0,.2),0 3px 4px 0 rgba(0,0,0,.14),0 1px 8px 0 rgba(0,0,0,.12);
    box-shadow: 0 3px 3px -2px rgba(0,0,0,.2),0 3px 4px 0 rgba(0,0,0,.14),0 1px 8px 0 rgba(0,0,0,.12);
  }

  .word-breaker {
    word-wrap: break-word;
    overflow: hidden;
  }

  .button-break {
    white-space: normal !important;

  }

  .sticky-top-offset {
    top: 57px !important;
  }

  .cursor-pointer {
    cursor: pointer !important;
  }

</style>