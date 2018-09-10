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
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-darker border-bottom border-darker sticky-top mdc-elevation--z3">
  <a class="navbar-brand" href="<?=url();?>">
    <?=getenv('TITLE')?> <span id="connection_status" class="badge badge-pill badge-light"><small>checking...</small></span>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?=url('/dashboard/about.php')?>"><i class="fas fa-info-circle"></i> About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=url('/phpmyadmin')?>"><i class="fas fa-database"></i> PHPMyAdmin</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fab fa-php"></i> PHP
        </a>
        <div class="dropdown-menu bg-darker text-white shadow-lg" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-white bg-darker-action" target="_blank" href="http://www.php.net/">PHP.net</a>
          <a class="dropdown-item text-white bg-darker-action" target="_blank" href="https://secure.php.net/manual/en/index.php">PHP Manual</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          XAMPP
        </a>
        <div class="dropdown-menu bg-darker shadow-lg" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-white bg-darker-action" href="https://www.apachefriends.org/">Home</a>
          <a class="dropdown-item text-white bg-darker-action" href="https://www.apachefriends.org/community.html">Community</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-white bg-darker-action" href="https://www.apachefriends.org/faq_windows.html"><i class="fab fa-windows"></i> FAQ Windows</a>
          <a class="dropdown-item text-white bg-darker-action" href="https://www.apachefriends.org/faq_osx.html"><i class="fab fa-apple"></i> FAQ macOS</a>
          <a class="dropdown-item text-white bg-darker-action" href="https://www.apachefriends.org/faq_linux.html"><i class="fab fa-linux"></i> FAQ Linux</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" target="_blank" href="https://opensource.org/"><span class="text-success"><i class="fab fa-osi"></i></span> Open Source Initiative</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <label class="switch" data-toggle="tooltip" data-placement="bottom" title="Toggle Debugging">
          <input type="checkbox" id="toggle_debug" name="toggle_debug" role="switch" value="1" <?=$_info->debugging() ? 'checked' : ''?> />
          <span class="slider round"></span>
        </label>
        <i class="fas fa-bug"></i> Debugging OFF / ON
      </li>
    </ul>
  </div>
</nav>