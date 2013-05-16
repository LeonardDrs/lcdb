$(function ($) {

	/*page FAQ*/
	$(window).load(function() {
	
		/*clic sur un lien"*/
		$(".liste_FAQ li a").click(function(e){
			e.preventDefault();
			if(!$(this).parent().hasClass("FAQ_open"))
			{
				$(".bloc_"+$(this).parent().attr('id')).css("display", "block");
				$(this).parent().addClass("FAQ_open");
			}
			else
			{
				$(".bloc_"+$(this).parent().attr('id')).css("display", "none");
				$(this).parent().removeClass("FAQ_open");
			}
		});
		
	});
	
});
