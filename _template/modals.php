<!-- phpinfo Modal -->
<div class="modal fade" id="phpModal" tabindex="-1" role="dialog" aria-labelledby="phpModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-white border-dark bg-darker">
        <h5 class="modal-title" id="phpModalLabel">phpinfo()</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-dark">
        <iframe src="<?=url('/dashboard/phpinfo.php', true)?>" width="100%" height="800px" frameBorder="0"></iframe>
      </div>
      <div class="modal-footer border-dark bg-darker">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- ini_get_all Modal -->
<div class="modal fade" id="iniModal" tabindex="-1" role="dialog" aria-labelledby="iniModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-white border-dark bg-darker">
        <h5 class="modal-title" id="iniModalLabel">ini_get_all()</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-dark">
        <div class="table-responsive">
          <table class="table table-dark table-hover table-bordered shadow">
            <thead>
              <tr>
                <th>Name</th>
                <th>Global Value <i data-toggle="tooltip" data-placement="bottom" title="Values set in <i>php.ini</i>" data-html="true" class="fas fa-question-circle"></i></th>
                <th>Local Value <i data-toggle="tooltip" data-placement="bottom" title="Values set with <i>ini_set()</i>" data-html="true" class="fas fa-question-circle"></i></th>
                <th>Access <i data-toggle="tooltip" data-placement="bottom" title="Write permission to configuration" class="fas fa-question-circle"></i></th>
              </tr>
            </thead>
            <?php foreach( ini_get_all() as $k => $v ): ?>
            <tr>
              <th><?=$k?></th>
              
              <td><?=$v['global_value']?></td>
              <td><?=$v['local_value']?></td>
              <td><?=$v['access']?></td>
            </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
      <div class="modal-footer border-dark bg-darker">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>