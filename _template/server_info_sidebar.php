<div class="row">
  <div class="col-sm-12">
    
    <!-- PHP information -->
    <div class="border border-darker bg-darker p-4 rounded shadow-sm">
      <h5 class="border-bottom border-secondary pb-2 mb-4">PHP Info <span class="badge badge-pill badge-light"><small><?=PHP_VERSION?></small></span></h5>

      <div class="btn-group">
        <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#phpModal">
          <code>phpinfo()</code>
        </button>
        
        <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#iniModal">
          <code>ini_get_all()</code>
        </button>
      </div>
    </div>

    <div class="border border-darker bg-darker mt-4 p-4 rounded shadow">
      <h5 class="border-bottom border-secondary pb-2 mb-4">
        Server Info
        <span class="badge badge-pill <?=( $_info->is_https() ) ? 'badge-success' : 'badge-danger'?>">
          <small>
          <i class="fas <?=$_info->is_https() ? 'fa-lock' : 'fa-lock-open'?>"></i>
            <?=$_info->protocol()?>
          </small>
        </span>
      </h5>


      <p>

        <code data-toggle="tooltip" data-placement="bottom" title="Current URL"><small><?=$_info->url()?></small></code>

      </p>
      <p>

        <code data-toggle="tooltip" data-placement="bottom" title="Root Directory"><small><?=$_directory->abspath();?></small></code>
        
      </p>
      <p>

        <code data-toggle="tooltip" data-placement="bottom" title="Apache Version"><small><?=apache_get_version();?></small></code>

      </p>

      <p>

        <kbd data-toggle="tooltip" data-placement="bottom" title="Server OS"><small><i class="<?=$_server_os['icon']?>"></i> <?=$_server_os['system']?></small></kbd>

        <kbd data-toggle="tooltip" data-placement="bottom" title="Guest OS"><small><i class="<?=$_guest_os['icon']?>"></i> <?=$_guest_os['system']?></small></kbd>

        <kbd data-toggle="tooltip" data-placement="bottom" title="Browser"><small><i class="<?=$_browser['icon']?>"></i> <?=$_browser['name']?></small></kbd>

      </p>

    </div>

    <!-- Server variables -->
    <ul class="list-group mt-4 d-none d-md-block d-lg-block shadow">

      <li class="list-group-item bg-dark text-white border-darker word-breaker text-center"><h5>Server Variables</h5></li>
      <?php foreach($_SERVER as $k => $v): ?>
      <li class="list-group-item bg-darker border-darker word-breaker cursor-pointer">
        <small><b class="text-info"><?=$k?></b>="<span class="shorten-text" data-original-text="<?=$v?>"><?=substr($v, 0, 80)?></span>"</small>
      </li>
      <?php endforeach; ?>
    </ul>

  
    <ul class="list-group mt-4 d-none d-md-block d-lg-block shadow">

      <li class="list-group-item bg-dark text-white border-darker word-breaker text-center"><h5>Request Headers</h5></li>

      <?php foreach(getallheaders() as $key => $header): ?>

      <li class="list-group-item bg-darker border-darker word-breaker">
        <small><b><?=$key?>:</b> <span class="shorten-text"><?=$header?></span></small>
      </li>

      <?php endforeach; ?>

    </ul>


    <div class="col-sm-12 mt-2" id="credit">
      <small class="text-secondary">Developed by <a href="https://github.com/brazucaz">brazucaz</a></small>
    </div>
  </div>
</div>
