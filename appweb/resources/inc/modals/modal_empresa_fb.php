<?php require "../../../config/ini.php"; ?>

<div class="row modal-comentario">
	<div class="col-xs-12">
		<div class="fb-comments" data-colorscheme="light" data-href="http://milugar.esy.es/#<?php echo $_GET['id'];?>" data-numposts="5"></div>
		<div class="loading"><img src="<?php echo BASE_URL._DIR_ASSETS_;?>images/loading_gde.gif"/></div>
	</div>
</div>
<script>
FB.XFBML.parse();
FB.Event.subscribe('xfbml.render',
	function (response) {
		$('.loading').hide();
	}
);
</script>