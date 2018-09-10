<?php
/**
 * Copyright 2018 Samuel Fonseca
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *     http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

require __DIR__ . '/_backend/preload.php';

$_page = [
  /**
   * You can set the title here
   */
  'title' => 'About XAMPP Dashboard',

  /**
   * Stylesheets in a 1d array
   */
  'styles' => [
    'custom.min.css',
  ],
];


include $_template->header();
include $_template->navbar();

$Parsedown = new Parsedown();

?>

<style>
  img {
    max-width: 100%;
    border-radius: 4px;
    box-shadow: 1px 5px 10px #333;
  }
</style>

<div class="container bg-dark p-4 mt-4 rounded shadow text-white">
  <div class="row">
    <div class="col-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-darker shadow-sm">
          <li class="breadcrumb-item"><a href="<?=url()?>">Home</a></li>
          <li class="breadcrumb-item active text-light" aria-current="page">About</li>
        </ol>
      </nav>
    </div>
    <div class="col-12">
      <?=$Parsedown->text(file_get_contents(__DIR__ . '/README.md'));?>
    </div>
  </div>
</div>

<?php

include $_template->footer();
