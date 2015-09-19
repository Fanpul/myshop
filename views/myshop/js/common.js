$(document).ready(function(){
	$('.kolvo').each(function(){
		var qty_start = $(this).val();

		$(this).change(function(){
			var qty = $(this).val();
			var id = $(this).attr('id');
			id = id.substr(2);
			if(!parseInt(qty)){
				qty = qty_start;
			}
			window.location = '?view=cart&qty=' + qty + '&id=' + id;
		});
	});

	$('.kolvo').keypress(function(e){
		if(e.which == 13){
			return false;
		}
	});


});