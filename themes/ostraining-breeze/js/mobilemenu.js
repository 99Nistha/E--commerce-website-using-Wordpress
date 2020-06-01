(function($)
{
	$(document).ready(function()
	{
		$('#mainmenu').mobileMenu({
            defaultText: 'Menu',
            className: 'mobilemenu',
            subMenuDash: '&ndash;'
        });
        $(".mobilemenu").each(function(){
            $(this).wrap('<div class="mobilemenu_wrapper">');
        });
	})
})(jQuery);