$(document).ready(function(){
	$(".xxx").on('click', function() {
		var id = $(this).attr("message-id");
		// var $ele = $(this).parent();
		$.ajax({
			type: 'POST',
			url: 'action/deleteMessage.php',
			data: {'id': id},
			success: function(res){
				// res = JSON.parse(res);
				console.log(res);
				
			}
		});
	});
});