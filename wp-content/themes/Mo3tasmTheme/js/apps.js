/*-----------------------------------------------------------------------------------*/
/*	Preloader
/*-----------------------------------------------------------------------------------*/

$(window).load(function()
{
  $(".preloader sk-chasing-dots").fadeOut(500);

  $(".preloader").fadeOut(500);
});

$(window).load(function() {

});


/*-----------------------------------------------------------------------------------*/
/*	Navigation Menu
/*-----------------------------------------------------------------------------------*/

	$(document).ready(function () {
		$('.js-activated').dropdownHover({
			instantlyCloseOthers: false,
			delay: 0
		}).dropdown();


		$('.dropdown-menu a, .social .dropdown-menu, .social .dropdown-menu input').click(function (e) {
			e.stopPropagation();
		});

	});

	/*-----------------------------------------------------------------------------------*/
	/*	Search Input
	/*-----------------------------------------------------------------------------------*/

	$(document).ready(function(){
    var submitIcon = $('.searchbox-icon');
    var inputBox = $('.searchbox-input');
    var searchBox = $('.searchbox');
    var isOpen = false;
    submitIcon.click(function(){
        if(isOpen === false){
            searchBox.addClass('searchbox-open');
            inputBox.focus();
            isOpen = true;
        } else {
            searchBox.removeClass('searchbox-open');
            inputBox.focusout();
            isOpen = false;
        }
    });
     submitIcon.mouseup(function(){
            return false;
        });
    searchBox.mouseup(function(){
            return false;
        });
    $(document).mouseup(function(){
            if(isOpen === true){
                $('.searchbox-icon').css('display','block');
                submitIcon.click();
            }
        });
			});
    function buttonUp(){
        var inputVal = $('.searchbox-input').val();
        inputVal = $.trim(inputVal).length;
        if( inputVal !== 0){
            $('.searchbox-icon').css('display','none');
        } else {
            $('.searchbox-input').val('');
            $('.searchbox-icon').css('display','block');
        }
    }

  /*-----------------------------------------------------------------------------------*/
	/*	Start Menu fadeInUp
	/*-----------------------------------------------------------------------------------*/


	$(document).ready(function () {
	 parent_list = jQuery('li.parent-list');
			parent_list.on({
				'mouseover': function () {
					jQuery(this).find('ul:first').addClass('animated fadeInDown');
				},
				'mouseleave': function () {
					jQuery(this).find('ul:first').removeClass('animated fadeInDown');
				}
			});

	});
