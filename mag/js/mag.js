$(document).ready(function(){
	$('.bapf_head').on('click', function() {
    	$(this).parent().toggleClass('isactive');
    });
	$('.orderby-block span').on('click', function() {
    	$(this).parent().toggleClass('isActive');
    });
	$('.filter_bl').on('click', function() {
    	$('.product-filter').addClass('isActive');
    });
	$('.product-filter__title').on('click', function() {
    	$('.product-filter').removeClass('isActive');
    });
	$('.product-filter__btn').on('click', function() {
    	$('.product-filter').removeClass('isActive');
    });
  
});