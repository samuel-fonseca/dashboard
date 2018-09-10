
<script src="<?=assets('/js/jquery-3.3.1.slim.min.js')?>"></script>
<script src="<?=assets('/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?=assets('/js/fontawesome.min.js')?>"></script>
<script src="<?=assets('/js/view.js')?>"></script>

<?php foreach( $_page['scripts'] as $script ): ?>
<script src="<?=assets("/js/$script")?>"></script>
<?php endforeach; ?>

</body>
</html>