
<div class="popup-content tranparent-popup">
	
</div>
<div id="color-edit">
	<nav class="color-nav"></nav>
	<div class="col-md-12">
		<div id="cp7" class="inl-bl"></div>
	</div>
	<div class="col-md-12">
    <div class="input-group">
	    <input id="color-name" type="text" class="form-control" placeholder="Nombre color">
	    <span class="input-group-btn">
	        <button onclick="addNewColor();" class="btn btn-secondary" type="button"><i style="color: rgb(28, 115, 173);" class="fa fa-floppy-o" aria-hidden="true"></i></button>
	    </span>
	    </div>
	 </div>

	 <hr style="width: 100%;">

	 <div class="col-md-12 scroll-color" >
	 	<div>
	 		<ul>
	 		<?
	 			foreach ($colores as $color) { ?>
	 				<li id="color-<?= $color['id_producto_colores'] ?>">
	 					<div style='background: <?= $color['codigo_color'] ?>'></div><?= $color['nombre_color'] ?>
	 					<i title="Eliminar" onclick="deleteColor(<?= $color['id_producto_colores'] ?>);" <?= $color['nombre_color'] ?>" class="fa fa-times" aria-hidden="true"></i>
	 				</li>
	 			<? }
	 		?>
	 		</ul>
	 	</div>
	 </div>

	<style>
	
	</style>
	<script>
	    $(function() {
	        $('#cp7').colorpicker({
	            color: '#ffaa00',
	            container: true,
	            inline: true
	        });
	    });
	</script>
</div>