$(document).ready(function(){
	submenu();
	
	Cufon.replace('.global .footer-top ul li > p.push');
	Cufon.replace('.guestbook .green-button');

	if($("#country").length > 0){
		drop_down_list_without_submit($("#country"));
	}
	if($("#subject").length > 0){
		drop_down_list_without_submit($("#subject"));
	}
	if ($("#sort").length > 0) {
		drop_down_list_with_submit($("#sort"));
	}
	if ($('#nombre-portions').length > 0) {
		drop_down_list_without_submit($('#nombre-portions'));
		drop_down_list_without_submit($('#step3 select'));

		var $bimensuelle  	= $('#bi-mensuelle-phrase'),
		    $dayNum 		= $('#day-number'),
		    $dayName		= $('#day-name'),
		    $mensuelle 		= $('#mensuelle-phrase');

		$('#hebdomadaire').change(function(){
		    if ($('#hebdomadaire').is(':checked')) {
		        $bimensuelle.hide();
		        $dayNum.hide();
		        $mensuelle.hide();
		        $dayName.show();
		    }
		});

		$('#bi-mensuelle').change(function(){
		    if ($('#bi-mensuelle').is(':checked')) {
		        $bimensuelle.show();
		        $dayNum.hide();
		        $mensuelle.hide();
		        $dayName.show();
		    }
		});

		$('#mensuelle').change(function(){
		    if ($('#mensuelle').is(':checked')) {
		        $bimensuelle.hide();
		        $dayNum.show();
		        $mensuelle.show();
		        $dayName.show();
		    }
		});

		/* ---------- Vérification du contenu du formulaire ------------*/
		$("#creneau li .sbOptions a").click(function(event){
			var hours_interval 	= 60,
				values 			= new Array(),
				i 				= 0,
				$this 			= $(this),
				$selector 		= $this.parents('li').children('.sbHolder').children('.sbSelector'),
				$button 		= $('#abonnement-submit'),
				$error 			= $('#error');

			$selector.each(function(){
				values[i] = $(this).text().split('h');
				values[i][0] *= 60;
				values[i] =  parseInt(values[i][0]) +  parseInt(values[i][1]);
				i++;
			});
			if(values[1] - values[0] < hours_interval){
				$button.attr('disabled', 'disabled').removeClass('red-button').addClass('disabled-button');
				$error.html("L'intervalle entre les heures n'est pas correct").show();
			}else if(isNaN(values[1] - values[0])){
				$error.html("").hide();
				$button.attr('disabled', 'disabled').removeClass('red-button').addClass('disabled-button');
			}else{
				$error.html("").hide();
				$button.removeAttr('disabled').removeClass('disabled-button').addClass('red-button');
			}
		});
	}
	if ($('#product').length > 0) {
		drop_down_list_without_submit($('.form-panier select'));
	}
	if ($(".meat-race").length > 0) {
		drop_down_list_without_submit($(".meat-race"));
	}
	if ($('#from-ce').length > 0) {
		drop_down_list_without_submit($('#from-ce select'));

		$('#ce-more').on('click', function(){
            $('#from-ce').stop(true, true).slideDown('slow');
            $('#entreprise').removeAttr('disabled');
            toggle = false;
		});

		$('#ce-less').on('click', function(){
			$('#from-ce').stop(true, true).slideUp('fast');
	        $('#entreprise').attr('disabled','disabled');
	    });
	}
	if ($('.scrollbar').length > 0) {
		$('.scrollbar').scrollbar();
	}
	if($("#order #form-reduc").length > 0){
		$("#order #form-reduc").submit(function(event){
			event.preventDefault();
			var code = $("#reduction").val();
			var reduc = "8,56";
			var html = '<form method="get"><input type="hidden" name="code" value="'+code+'" readonly />';
			html += '<span><label><span class="code bold">'+code+'</span> <span class="amount bold">(-'+reduc+'€)</span></label></span> ';
			html += '<button type="submit" name="submit">utilisez ce code</button></form>';
			$("#bloc-code").append(html);
		});
	}

	$('input, textarea').placeholder();
	
	if($(".guestbook #temoignage").length > 0){
		$(".guestbook #temoignage").css({'display':'none'});
		$(".guestbook #button-witness a").click(function(e){
			e.preventDefault();
			$(".guestbook #temoignage").stop(true, true).slideDown();
		});
		$(".guestbook a#put-witness").click(function(e){
			e.preventDefault();
			var the_id = $(this).attr("href");  
			$('html, body').animate({  
				scrollTop:$(the_id).offset().top  
			}, 'fast');  
			$(".guestbook #temoignage").stop(true, true).slideDown('slow');
		});
	}


	// Plus/minus buttons to choose the quantity of items to add to cart
	if ($('.form-panier').length > 0) {
		var $quantity = 0;
		$('.plus').click(function() {
			$quantity = $(this).parent().children('input.quantity');
			value = parseInt($quantity.val()) + 1;
			$quantity.val(value);
			if ($('.product-total-price').length > 0) {
				var $this 	= $(this),
					unit 	= parseFloat($this.parents('tr').find('.product-unit-price').text().replace(',','.')),
					qty  	= parseInt($this.siblings('input').val()),
					total   = unit * qty;

				$this.parents('tr').find('.product-total-price').text(total.toFixed(2).replace('.',','));
				calcTotal();
			}
		});
		$('.minus').click(function() {
			$quantity = $(this).parent().children('input.quantity');
			value = (parseInt($quantity.val()) === 1) ? 1 : parseInt($quantity.val()) - 1;
			$quantity.val(value);
			if ($('.product-total-price').length > 0) {
				var $this 		= $(this),
					unit 		= parseFloat($this.parents('tr').find('.product-unit-price').text().replace(',','.')),
					qty  		= parseFloat($this.siblings('input').val()),
					total   	= unit * qty;

				$this.parents('tr').find('.product-total-price').text(total.toFixed(2).replace('.',','));
				calcTotal();
			}
		});
	}

	function calcTotal() {
		var total = 0.00;
		$.each($('.product-total-price'), function(item, value) {
			total += parseFloat($(value).text().replace(',','.'));
		});
		$('#subtotal').text(total.toFixed(2).replace('.',','));
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

		$('#address-submit').click(function(){
			//send ajax request to save the address
			return false;
		});
	}

	if ($('.recipe-link').length > 0) {
		$('.recipe-link').click(function() {
		    var $this   = $(this),
		        $recipe = $this.siblings('.recipe-details');
		    $recipe.slideToggle();
		    if ($this.text().match('voir') != null) {
		        $this.text($this.text().replace('voir', 'masquer'));
		    } else {
		        $this.text($this.text().replace('masquer', 'voir'));
		    }
		    return false;
		});
	}
	
	if($("#form-adress").length > 0){
		var field_require = $(this).find('input[data-required]');
		var field_phone = $(this).find('#phone');
		var field_mobile = $(this).find('#mobile');
		var field_code = $(this).find('#postal_code');
		veriField(field_phone);
		veriField(field_mobile);
		veriField(field_code);
		$("#form-adress").submit(function(e){
			var isRequiredEmpty = false;
			var isEmptyPhone = false;
			var isBadFormat = false;
			var html = "<p class=\"first\">Certains champs obligatoires n'ont pas été rentrés correctement :</p>";
			$(field_require).each(function(){
				if($.trim($(this).val()) == ""){
					e.preventDefault();
					isRequiredEmpty = true;
					html += "<p>Tous les champs marqués d'un astérisque doivent être renseignés.</p>"; 
					return false;
				}
			});
			if($.trim(field_phone.val()) == "" && $.trim(field_mobile.val()) == ""){
					e.preventDefault();
					isEmptyPhone = true;
					html += "<p>Vous devez renseigné au moins un numéro de teléphone.</p>";
			}
			if($.trim(field_code.val()).length != 5){
				e.preventDefault();
				var isBadFormat = true;
				html +="<p>Le format du code postal n'est pas correct.</p>";
			}
			if(isRequiredEmpty || isEmptyPhone || isBadFormat){
				html = "<div>"+html+"</div>";
				$("#my-account .address .warning").html(html);
			}
		});
	}
	
	if($('#form-contact').length > 0 || $('#form-witness').length > 0){
		var field_require = $(this).find('[data-required]');
		var field_emailAddress = $(this).find("#e-mail");
		$("#form-contact, #form-witness").submit(function(e){
			var isRequiredEmpty = false;
			var isInvalidEmail = false;
			var html = "<p class=\"first\">Certains champs obligatoires n'ont pas été rentrés correctement :</p>";
			$(field_require).each(function(){
				if($.trim($(this).val()) == ""){
					e.preventDefault();
					isRequiredEmpty = true;
					html += "<p>Tous les champs marqués d'un astérisque doivent être renseignés.</p>"; 
					return false;
				}
			});
			if($.trim(field_emailAddress.val()) != "" && !isValidEmailAddress($.trim(field_emailAddress.val()))){
					e.preventDefault();
					isInvalidEmail = true;
					html += "<p>Le format de l'adresse e-mail est invalide.</p>";
			}
			if(isRequiredEmpty || isInvalidEmail){
				html = "<div>"+html+"</div>";
				$("#static .warning").html(html);
			}else if($('#form-witness').length > 0){
				e.preventDefault();
				var message_success = '<div class="success"><p class="italic green message-success">Message envoyé !</p>';
				message_success += '<p class="thanks">Merci.</p>';
				message_success += '<p>Votre commentaire est soumis à approbation.</p>'
				message_success += '<p>Il peut y avoir un délais entre votre validation et son apparition sur le site.</p></div>';
				$("#static .guestbook #temoignage").html(message_success);
			}
		});
	}
	
	/* Permet de vérifier le format de l'adresse e-mail saisie */
	function isValidEmailAddress(emailAddress) {
		var email_regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i;
		var isValid = email_regex.test(emailAddress);
		return isValid;
	};
	
	/* Empeche de rentrer d'autre caractère que des chiffres dans un champs */
	function veriField(field)
	{
		var allow = false;
		var key;
		$(field).keypress(function(event){
			var key = event.keyCode ? event.keyCode : event.charCode;
			var allow;
			if((key != event.which) && event.which == 0){
				allow = true;
			}else{
				allow =false;
			}
			// permettre: backspace, delete, tab, escape, and enter
			if ( key == 46 || key == 8 || key == 9 || key == 27 || key == 13 || 
				 // permettre: Ctrl+A
				(key == 65 && event.ctrlKey === true) ||
				// permettre : arrow left, arrow right
				((key == 37 || key == 39) && allow==true)){ 
					 // ok, on ne fait rien
					 return;
			}
			else {
				if((key >=48 && key <=57) || (key >=96 && key <=105)){
						var accept='0123456789';
						var car= String.fromCharCode(key);
						if(accept.indexOf(car) < 0) event.preventDefault();
				}else{
					event.preventDefault();
				}
			}
		});
	}
	
/* ------ Calendrier du checkout ----------*/
	/* Utilisation du plugin : glDatePicker.js (modifier pour s'adapter au projet) : http://glad.github.io/glDatePicker/ */
	//place_delivery: lieu de livraison de l'internaute
	//valeur possible: province, grande_banlieue, proche_banlieue, paris, point_relais
	var place_delivery="proche_banlieue";
	var selectDays = null;
	// Date spécial - Les dates de livraison déjà enregistrées et a afficher dans le calendrier
	// 0: janvier, 1:fevrier, 2:mars, 3:avril, 4: mai, 5:juin, 6:juillet, 7:août, 8:septembre, 9:octobre, 10:novembre, 11:décembre
	var recDate = [{date: new Date(2013, 3, 20), repeatMonth: true}, {date: new Date(2013, 3, 25)}];
	var satSelectable = null;
	var tabHours = Array();
	// Jour de livraison sélectionnable en fonction du lieu de résidence de l'internaute
	if(place_delivery=="point_relais"){
		selectDays = [2, 4, 5];
	}else if(place_delivery=="province"){
		selectDays = [3, 5]; // 0: Dimanche, 1:Lundi, 2:Mardi, 3:Mercredi, 4:Jeudi, 5:Vendredi, 6:Samedi
		satSelectable = [{date: new Date(2013, 3, 20)}, {date: new Date(2013, 3, 27)}];
	}else if(place_delivery=="grande_banlieue"){
		selectDays = [2, 4, 5, 6];
		tabHours = ['14h - 16h', '16h - 18h', '18h - 20h', '20h - 22h'];
	}else if(place_delivery=="proche_banlieue" || place_delivery=="paris"){
		selectDays = [2, 4, 5];
		tabHours = ['-','7h30', '8h00', '8h30', '9h00', '9h30', '10h00', '10h30', '11h00', '11h30', '12h00', '12h30', '13h00', '13h30', '14h00', 
		'14h30', '15h00', '15h30', '16h00', '16h30', '17h00', '17h30', '18h00', '18h30', '19h00', '19h30', '20h00', '20h30', '21h00', '21h30', '22h'];
	}
	
	if($('input#mydate').length > 0){
		$('input#mydate').glDatePicker({
			showAlways: true,
			selectableDates: satSelectable,
			allowMonthSelect:false,
			allowYearSelect:false,
			specialDates: recDate,
			prevArrow: '&lt;',
			nextArrow: '&gt;',
			selectableDOW: selectDays,
			selectableMonths: null,
			dowOffset:1,
			onClick: (function(el, cell, date, data) {
				var monthNames = [ 'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre' ];
				var month_value = date.getMonth(); var day_value = date.getDate(); var year_value = date.getFullYear();
				el.val(day_value+" "+monthNames[month_value]+" "+year_value);
				
				var html = "";
				var daynum = date.getDay(); 
				if(place_delivery=="paris" || place_delivery=="proche_banlieue"){
					var slot = (place_delivery == "paris") ? "1" : "2"
					$("#selected-hours").removeClass().addClass("near");
					$('.action button').attr('disabled', 'disabled');
					html = '<div class="infos-hours"><p>Précisez le ou les créneau(x) horaires souhaité(s)</p>';
					html += '<p>(avec au moins un créneau de '+slot+'h ou plus)</p></div>';
					html += '<div class="error"></div>';
					for (j=0; j<4; j++){
						if(j%2!=0){
							var label = " et ";
							var name = "end_delivery_hour_"+j;
						}else{
							var label = (j==0) ? "Entre ":"ou entre ";
							var name = "start_delivery_hour_"+j;
							html += '<div class="combobox combobox_'+j+'">';
						}
						html += '<label>'+label+'</label>';
						html = combobox_delivery(tabHours, name, html);
						if(j==3) html += '<span>(facultatif)</span>';
						if(j%2!=0) html += '</div>';
					}
					html += '<p class="infos-preferences">Votre boucher est plutôt est du matin</p>';
				}else if(place_delivery=="grande_banlieue" && (daynum!=6)){
					$("#selected-hours").removeClass().addClass("far");
					$('.action button').removeAttr('disabled');
					html = '<div class="infos-hours"><p>Précisez le créneau horaire de 2 heures souhaitées :</p></div>';
					html += '<div class="error"></div>';
					html = combobox_delivery(tabHours, "delivery_hour", html)
				}else if(place_delivery=="grande_banlieue" && (daynum==6) || place_delivery=="province" || place_delivery=="point_relais"){
					$("#selected-hours").removeClass().addClass("far far-sat");
					$('.action button').removeAttr('disabled');
					html = '<div class="infos-hours"><p>Votre colis vous sera livré entre <span class="hours">8h et 13h</span></p></div>';
				}
				$("#selected-hours").html(html);
				
				drop_down_list_without_submit($(".delivery"));
				
				/* ---------- Vérification du contenu du formulaire ------------*/
				$(".near .combobox_0 .sbOptions a").click(function(event){
					var hours_interval = 60;
					if (place_delivery == "proche_banlieue") hours_interval = 120;
					
					var values = new  Array();
					var i = 0;
					$(this).parents('.near .combobox_0').children('.sbHolder').children('.sbSelector').each(function(){
						values[i] = $(this).text().split('h');
						values[i][0] *= 60;
						values[i] =  parseInt(values[i][0]) +  parseInt(values[i][1]);
						i++;
					});
					if(values[1] - values[0] < hours_interval){
						$(this).parents('#date-livraison').find('.action button').attr('disabled', 'disabled');
						$(this).parents('#selected-hours').find('.error').html("L'intervalle entre les heures n'est pas correct");
					}else if(isNaN(values[1] - values[0])){
						$(this).parents('#selected-hours').find('.error').html("");
						$(this).parents('#date-livraison').find('.action button').attr('disabled', 'disabled');
					}else{
						$(this).parents('#selected-hours').find('.error').html("");
						$(this).parents('#date-livraison').find('.action button').removeAttr('disabled');
					}
				});
			})
		});
	}

});
	
	function combobox_delivery(tabHours, name, html){
		html += '<select name="'+name+'" class="delivery">';
			for(i=0; i<tabHours.length; i++){
				html += '<option value="'+tabHours[i]+'">'+tabHours[i]+'</option>';
			}
		html += '</select>';
		return html;
	}
	
/* -------------- Fin calendrier ------------------*/
	
	function drop_down_list_with_submit($el){
		$el.selectbox();
		$(".sbOptions a").click(function(){
			$('form').submit();
		});
	}
	
	function drop_down_list_without_submit($el){
		$el.selectbox();
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
