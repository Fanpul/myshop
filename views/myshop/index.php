<?php 
	//define('ISHOP', TRUE);
	defined('ISHOP') or die('Access denied');
	require_once 'inc/header.php';
	require_once 'inc/leftbar.php' 
?>
	<div class="center_content">
		<?php include $view. '.php' ?>
   	</div><!-- end of center content -->
<?php 
	require_once 'inc/rightbar.php' 
?>
	<div class="clr"></div>	

<?php 
	require_once 'inc/footer.php' 
?>
<script>
	var query = '<?=$_SERVER['QUERY_STRING']?>';
	$(".grid_list").click(function(){
		var display = $(this).attr("id"); 
		display = (display == "grid") ? "grid" : "list";
		if(display == $.cookie("display")){
			return false; 
		}
		else{
			$.cookie("display", display); 
			window.location = "?" + query;
			return false;
		}
	});
</script>