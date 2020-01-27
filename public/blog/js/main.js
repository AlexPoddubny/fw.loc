$(function () {
	$('#lang').change(function(){
		window.location = '/lang/change?lang=' + $(this).val();
	});
});