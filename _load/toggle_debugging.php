<?php

header('Content-Type: application/json');

$dismiss_button = "<button type=\"button\" class=\"close pl-2\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                  </button>";

$dismiss_button = '';
// Only accept POST request
if( empty($_REQUEST) )
{
  echo json_encode([
    'error' => true,
    'message' => 'No REQUEST has been made.'
  ]);

  exit;
}

// require needed scripts
require __DIR__ . '/../_backend/preload.php';

// Debug POST value
$debug = (int) $_REQUEST['debug'];

// Make sure $debug is numeric and it is either 1 or 0
if( !is_numeric($debug) && ($debug != 1 || $debug != 0) )
{
  echo json_encode([
    'error' => true,
    'message' => 'Incorrect REQUEST type. Try again.'
  ]);

  exit;
}

if($_info->set_debugging($debug)) {
  $status = $debug ? 'enabled' : 'disabled';
  echo json_encode([
    'error' => false,
    'message' => "Debugging has been $status!<br /><small>The page will reload automatically.</small>"
  ]);

  exit;
}
