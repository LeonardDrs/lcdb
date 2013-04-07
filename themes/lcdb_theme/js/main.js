$(document).ready(function(){
	rplc_cufon();
	//menu_hover();
	submenu();
	//infosForm();

	$('input, textarea').placeholder();

	// Plus/minus buttons to choose the quantity of items to add to cart
	if ($('#form-panier').length > 0) {
		var $quantity = $('#quantity'),
			value;
		$('.plus').click(function(){
			value = parseInt($quantity.val()) + 1;
			$quantity.val(value);
		});
		$('.minus').click(function(){
			value = (parseInt($quantity.val()) === 0) ? 0 : parseInt($quantity.val()) - 1;
			$quantity.val(value);
		});
	}

	if ($('#form-adresse').length > 0) {
		$('#modify-address').click(function(){
			$('#saved-adresse').fadeOut('fast', function(){
				$('#form-adresse').fadeIn('fast');
			});
			$('#modify-address').fadeOut('fast', function(){
				$('#cancel-address').fadeIn('fast');
			});
			return false;
		});
		$('#cancel-address').click(function(){
			$('#form-adresse').fadeOut('fast', function(){
				$('#saved-adresse').fadeIn('fast');
			});
			$('#cancel-address').fadeOut('fast', function(){
				$('#modify-address').fadeIn('fast');
			});
			return false;
		});

		$('#villes').click(function(){
			$('#villes-abonnees').css({'height': $(document).height()});
			$('#villes-abonnees').fadeIn('fast');
			return false;
		});

		$('.popin-close').click(function(){
			$('#villes-abonnees').fadeOut('fast');
			return false;
		});

		$('#adress-submit').click(function(){
			//send ajax request to save the address
			return false;
		});
	}
});

function rplc_cufon(){
	 //Cufon.replace('li', { hover: true, hoverables: { li: true } }); 
	 Cufon.replace('.global .footer-top ul li > p.push');
}

function menu_hover(){
	var nav = $('header nav');
	nav.find("li").each(function(){
		if ($(this).find("ul").length > 0) {
			$(this).mouseenter(function(){
				$(this).find("ul").stop(true, true).slideDown();
			});
			$(this).mouseleave(function(){
				$(this).find("ul").stop(true, true).slideUp();
			});
		}
	});
}

/* Animation du sous-menu contenant les différentes catégories de recettes (Boeuf, Veau, Agneau, ...) */
function submenu(){
	var submenu = $('.secondary-menu-item ul.submenu');
	submenu.children("li").each(function(){
		$(this).children('a').click(function(event){
			event.preventDefault();
			$('.submenu > li ul').stop(true, true).slideUp("fast");
			if ($(this).parent().find("ul").length > 0) {
				$(this).parent().find("ul").stop(true, true).slideDown("fast");
			}
		});
	});
}



// remplacé par le plugin jquery-placeholder
// il suffit juste dans le html de l'input d'ajouter l'attribut : placeholder="texte par défaut"
// pour le style du placeholder il faut le faire en css :
// http://stackoverflow.com/questions/2610497/change-an-inputs-html5-placeholder-color-with-css/2610741#2610741
// pour les vieux navigateurs le plugin ajoute automatiquement une classe "placeholder" :
// .placeholder { color: #aaa; } par exemple

/*function infosForm(){
	//Valeur par défaut formulaire
	$('#email').val("votre mail ici");
	
	$('#form-newsletter input').focusin(function(){
		$(this).addClass('stateClick');
		$(this).val("");
	});
	$('#form-newsletter input').focusout(function(){
		if ($.trim($(this).val()) == "") {
			if ($(this).attr('id') == "email") {
				$('#email').val("votre mail ici");
			}
		};
	});
	$('#form-newsletter button').click(function(event){
		event.preventDefault();
		$('#form-newsletter input').removeClass('stateClick');
	});
}*/