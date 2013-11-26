var ie = jQuery.noConflict();

ie(function(){



	// FORCE LINK AT ICON60
	ie('a.icon60-link').each(function() {

		ie(this).click(function(){

			var url = ie(this).attr('href');

			window.open (url,'_self',false);

		})

	});



});