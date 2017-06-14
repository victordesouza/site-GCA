$(function(){		   
	$('.floraforms input[type="checkbox"]:checked, .floraforms input[type="radio"]:checked').addClass('checked');
	$('.floraforms').on('click', 'input[type="radio"]', function(){
		$(this).closest('.floraforms').find('input[name="' + $(this).attr('name') + '"]').removeClass('checked');
		$(this).addClass('checked');
	});
	
	$('.floraforms').on('change', 'input[type="checkbox"]', function(){
		$(this).toggleClass('checked');
	});
	
});