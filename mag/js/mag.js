window.addEventListener("DOMContentLoaded", function() {
    [].forEach.call( document.querySelectorAll('#billing_phone'), function(input) {
    var keyCode;
    function mask(event) {
        event.keyCode && (keyCode = event.keyCode);
        var pos = this.selectionStart;
        if (pos < 3) event.preventDefault();
        var matrix = "+7(___)___-__-__",
            i = 0,
            def = matrix.replace(/\D/g, ""),
            val = this.value.replace(/\D/g, ""),
            new_value = matrix.replace(/[_\d]/g, function(a) {
                return i < val.length ? val.charAt(i++) || def.charAt(i) : a
            });
        i = new_value.indexOf("_");
        if (i != -1) {
            i < 5 && (i = 3);
            new_value = new_value.slice(0, i)
        }
        var reg = matrix.substr(0, this.value.length).replace(/_+/g,
            function(a) {
                return "\\d{1," + a.length + "}"
            }).replace(/[+()]/g, "\\$&");
        reg = new RegExp("^" + reg + "$");
        if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) this.value = new_value;
        if (event.type == "blur" && this.value.length < 5)  this.value = ""
    }

    input.addEventListener("input", mask, false);
    input.addEventListener("focus", mask, false);
    input.addEventListener("blur", mask, false);
    input.addEventListener("keydown", mask, false)

  });
	document.querySelector('#shipping_method li:first-child').click();

});
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
	$('.block_tabs__tab2').append($('#billing_adr'));
	$('.woocommerce-shipping-methods').on('click', 'li:not(.active)', function() {
		$(this)
		  .addClass('active').siblings().removeClass('active')
		  .closest('div.block_tabs').find('div.block_tabs_tab').removeClass('isActive').eq($(this).index()).addClass('isActive');
	  });
    function setEqualHeight(columns) {
          var tallestcolumn = 0;
          columns.each(
          function() {
              currentHeight = $(this).height();
              if(currentHeight > tallestcolumn) {
                  tallestcolumn = currentHeight;
              }
          }
      );
          columns.height(tallestcolumn);
      }
	$(document).ready(function() {
		setEqualHeight($(".card__list--block .card__list--title"));
	});
});