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
  'title' => 'XAMPP Dashboard',

  /**
   * Set custom scripts here in a 1d array
   */
  'scripts' => [
    'mdc.switch.min.js',
    'mdc.ripple.min.js'
  ],

  /**
   * Stylesheets in a 1d array
   */
  'styles' => [
    'mdc.switch.min.css',
    'mdc.ripple.min.css'
  ],
];

include $_template->header();
include $_template->navbar();

$folders = $_directory::target_folder(pathinfo(__DIR__ . '/../'))->read()->sort('ASC')->list_folders();
?>

<div class="container-fluid">

  <div class="row">

    <div class="col-sm-12 col-md-5 col-lg-4 border border-darker p-4" id="sidebar">

      <?php include $_template->server_info_sidebar(); ?>

    </div>



    <div class="col-sm-12 col-md-7 col-lg-8 bg-dark shadow p-4 text-white" id="main-view">

      <h2 class="pt-2 border-bottom border-secondary pb-3 mb-4">Project Folder</h2>

      <div id="navigation"></div>

      <div id="projects">

        <div class="list-group" id="dir">

          <?php foreach( $folders['dirs'] as $folder ): ?>
          
          <a class="list-group-item list-group-item-action bg-darker text-white border-darker bg-darker-action item-local-action" href="<?=$_info->url('/' . $folder)?>" data-folder-name="<?=$folder?>">
            <span class="file-icon pr-3"><i class="fas fa-folder"></i></span>
            <span class="file-title"><?=$folder?></span>
          </a>
          
          <?php endforeach; ?>

        </div>

        <h4 class="pt-4 border-bottom border-secondary pb-3 mb-4">Individual Files</h4>

        <div class="list-group" id="files">

          <?php foreach( $folders['files'] as $file ): ?>

          <a class="list-group-item list-group-item-action bg-darker text-white border-darker bg-darker-action d-flex justify-content-between align-items-center item-local-action" href="<?=$_info->url('/' . $file['name'])?>">
            <span class="file">
              <span class="file-icon pr-3">
                <i class="<?=$file['icon']?>"></i>
              </span>
              <span class="file-title"><?=$file['name']?></span>
            </span>
            <small class=""><?=$file['size']?></small>
          </a>

          <?php endforeach; ?>

        </div>

        <p class="mt-2">Total count: <?=count($folders['dirs']) + count($folders['files'])?> Entries

      </div>

    </div>

  </div>

  <div class="row justify-content-center d-none" id="debug_status_parent">
    <div class="col-sm-12 col-md-auto shadow-lg" id="debug_status_alert">
      <div id="debug_status_message"></div>
    </div>
  </div>
  
</div>
<?php
include $_template->modals();
require $_template->footer();
?>
