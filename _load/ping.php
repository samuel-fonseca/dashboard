<?php

header('Content-Type: application/json');

if( $_REQUEST['ping'] ) {
  echo json_encode([
    'error' => false,
    'message' => 'Page has been loaded.'
  ]);
}
