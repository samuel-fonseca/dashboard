<?php

// Response will always be JSON format
header('Content-Type: application/json');

/**
 * Return simple JSON obj
 */
echo json_encode([
  'error' => false,
  'message' => 'Page seems to be up.'
]);
