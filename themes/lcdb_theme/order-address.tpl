
{assign var="back_order_page" value="order.php"}

{* Will be deleted for 1.5 version and more *}
{if !isset($formatedAddressFieldsValuesList)}
	{$ignoreList.0 = "id_address"}
	{$ignoreList.1 = "id_country"}
	{$ignoreList.2 = "id_state"}
	{$ignoreList.3 = "id_customer"}
	{$ignoreList.4 = "id_manufacturer"}
	{$ignoreList.5 = "id_supplier"}
	{$ignoreList.6 = "date_add"}
	{$ignoreList.7 = "date_upd"}
	{$ignoreList.8 = "active"}
	{$ignoreList.9 = "deleted"}

	{* PrestaShop 1.4.0.17 compatibility *}
	{if isset($addresses)}
		{foreach from=$addresses key=k item=address}
			{counter start=0 skip=1 assign=address_key_number}
			{$id_address = $address.id_address}
			{foreach from=$address key=address_key item=address_content}
				{if !in_array($address_key, $ignoreList)}
					{$formatedAddressFieldsValuesList.$id_address.ordered_fields.$address_key_number = $address_key}
					{$formatedAddressFieldsValuesList.$id_address.formated_fields_values.$address_key = $address_content}
					{counter}
				{/if}
			{/foreach}
		{/foreach}
	{/if}
{/if}

<script type="text/javascript">
// <![CDATA[
	{if !$opc}
	var orderProcess = 'order';
	var currencySign = '{$currencySign|html_entity_decode:2:"UTF-8"}';
	var currencyRate = '{$currencyRate|floatval}';
	var currencyFormat = '{$currencyFormat|intval}';
	var currencyBlank = '{$currencyBlank|intval}';
	var txtProduct = "{l s='product' js=1}";
	var txtProducts = "{l s='products' js=1}";
	{/if}
	var img_folder = '{$img_dir}';

	var addressMultishippingUrl = "{$link->getPageLink('address', true, NULL, "back={$back_order_page}?step=1{'&multi-shipping=1'|urlencode}{if $back}&mod={$back|urlencode}{/if}")}";
	var addressUrl = "{$link->getPageLink('address', true, NULL, "back={$back_order_page}?step=1{if $back}&mod={$back}{/if}")}";

	var formatedAddressFieldsValuesList = new Array();

	{foreach from=$formatedAddressFieldsValuesList key=id_address item=type}
		formatedAddressFieldsValuesList[{$id_address}] =
		{ldelim}
			'ordered_fields':[
				{foreach from=$type.ordered_fields key=num_field item=field_name name=inv_loop}
					{if !$smarty.foreach.inv_loop.first},{/if}"{$field_name}"
				{/foreach}
			],
			'formated_fields_values':{ldelim}
					{foreach from=$type.formated_fields_values key=pattern_name item=field_name name=inv_loop}
						{if !$smarty.foreach.inv_loop.first},{/if}"{$pattern_name}":"{$field_name}"
					{/foreach}
				{rdelim}
		{rdelim}
	{/foreach}

	function getAddressesTitles()
	{
		return {
						'invoice': "{l s='Your billing address' js=1}",
						'delivery': "{l s='Your delivery address' js=1}"
			};

	}


	function buildAddressBlock(id_address, address_type, dest_comp)
	{
		// var adr_titles_vals = getAddressesTitles();
		var li_content = formatedAddressFieldsValuesList[id_address]['formated_fields_values'];
		var ordered_fields_name = ['title'];

		ordered_fields_name = ordered_fields_name.concat(formatedAddressFieldsValuesList[id_address]['ordered_fields']);
		ordered_fields_name = ordered_fields_name.concat(['update']);

		dest_comp.html('');

		// li_content['title'] = adr_titles_vals[address_type];
		li_content['update'] = '<a href="{$link->getPageLink('address', true, NULL, "id_address")}'+id_address+'&amp;back={$back_order_page}?step=1{if $back}&mod={$back}{/if}" title="{l s='Update' js=1}">&raquo; {l s='Update' js=1}</a>';

		appendAddressList(dest_comp, li_content, ordered_fields_name);
	}

	function appendAddressList(dest_comp, values, fields_name)
	{
		for (var item in fields_name)
		{
			var name = fields_name[item];
			var value = getFieldValue(name, values);
			if (value != "")
			{
				var new_li = document.createElement('li');
				new_li.className = 'address_'+ name;
				new_li.innerHTML = getFieldValue(name, values);
				dest_comp.append(new_li);
			}
		}
	}

	function getFieldValue(field_name, values)
	{
		var reg=new RegExp("[ ]+", "g");

		var items = field_name.split(reg);
		var vals = new Array();

		for (var field_item in items)
		{
			items[field_item] = items[field_item].replace(",", "");
			vals.push(values[items[field_item]]);
		}
		return vals.join(" ");
	}

//]]>
</script>
{literal}
        <script type="text/javascript">
            
            var relays     = [
                                {
                                    'nom'       : 'Diététique DP',
                                    'adresse'   : ['210 bis Boulevard Pereire', '75017 Paris'],
                                    'telephone' : '01 45 74 75 51',
                                    'mention'   : 'Retrait des Colis 12h à 18h',
                                    'lat'       : '48.8796788',
                                    'lon'       : '2.2871024999999463'

                                },
                                {
                                    'nom'       : 'Bio Prestige',
                                    'adresse'   : ['92 Boulevard Batignolles', '75017 Paris'],
                                    'telephone' : '01 45 22 53 52',
                                    'mention'   : 'Retrait des Colis entre 12h et 19h',
                                    'lat'       : '48.8817472',
                                    'lon'       : '2.317602899999997'
                                },
                                {
                                    'nom'       : 'Bio Prestige',
                                    'adresse'   : ['92 Boulevard Batignolles', '75017 Paris'],
                                    'telephone' : '01 45 22 53 52',
                                    'mention'   : 'Retrait des Colis entre 12h et 19h',
                                    'lat'       : '48.8817472',
                                    'lon'       : '2.317602899999997'
                                },
                                {
                                    'nom'       : 'Bio Prestige',
                                    'adresse'   : ['92 Boulevard Batignolles', '75017 Paris'],
                                    'telephone' : '01 45 22 53 52',
                                    'mention'   : 'Retrait des Colis entre 12h et 19h',
                                    'lat'       : '48.8817472',
                                    'lon'       : '2.317602899999997'
                                },
                                {
                                    'nom'       : 'Bio Prestige',
                                    'adresse'   : ['92 Boulevard Batignolles', '75017 Paris'],
                                    'telephone' : '01 45 22 53 52',
                                    'mention'   : 'Retrait des Colis entre 12h et 19h',
                                    'lat'       : '48.8817472',
                                    'lon'       : '2.317602899999997'
                                },
                                {
                                    'nom'       : 'Bio Prestige',
                                    'adresse'   : ['92 Boulevard Batignolles', '75017 Paris'],
                                    'telephone' : '01 45 22 53 52',
                                    'mention'   : 'Retrait des Colis entre 12h et 19h',
                                    'lat'       : '48.8817472',
                                    'lon'       : '2.317602899999997'
                                },
                                {
                                    'nom'       : 'Bio Prestige',
                                    'adresse'   : ['92 Boulevard Batignolles', '75017 Paris'],
                                    'telephone' : '01 45 22 53 52',
                                    'mention'   : 'Retrait des Colis entre 12h et 19h',
                                    'lat'       : '48.8817472',
                                    'lon'       : '2.317602899999997'
                                }/*,
                                    PHP -> suite points relai
                                */
                            ],
                zipCodes   = { // codes postaux proche et grande banlieue
                                'proche' : ['93','94','92000','92100','92110','92120','92130','92140','92150','92160','92170','92190','92200','92210','92220','92230','92240','92250','92260','92270','92290','92300','92310','92320','92330','92340','92350','92360','92370'],
                                'grande' : ['77','78','91','95']
                            };
        </script>
        {/literal}



{capture name=path}{l s='Addresses'}{/capture}
{assign var='current_step' value='address'}
<div id="columns" class="content clearfix">
	<div class="bloc-checkout">
		{include file="./order-steps.tpl"}
		{include file="$tpl_dir./errors.tpl"}
		<form action="{$link->getPageLink($back_order_page, true)}" method="post">
			
			<div id="content-wrapper" class="clearfix">
				<div class="bloc content-address-invoice">
					<h2>Adresse de facturation</h2>
					<select name="id_address_invoice" id="id_address_invoice" class="address_select" onchange="updateAddressesDisplay();{if $opc}updateAddressSelection();{/if}">
						{foreach from=$addresses key=k item=address}
							<option value="{$address.id_address|intval}" {if $address.id_address == $cart->id_address_delivery}selected="selected"{/if}>{$address.alias|escape:'htmlall':'UTF-8'}</option>
						{/foreach}
					</select>
					<ul id="address_invoice">
						<li>Pierre DURAN</li>
						<li>3, rue du chêne</li>
						<li>BAT A, appt 23, code : 4738</li>
						<li>75003</li>
						<li>Paris</li>
						<li>0616186327</li>
					</ul>
					<div id="form-address-invoice" class="hidden">
						<label for="nom-invoice">Nom</label>
						<input type="text" id="nom-invoice" value="DURAND"/>
						<label for="prenom-invoice">Prénom</label>
						<input type="text" id="prenom-invoice" value="Pierre"/>
						<label for="adresse-1-invoice">Adresse</label>
						<input type="text" id="adresse-1-invoice" value="3, rue du chêne"/>
						<label for="adresse-2-invoice">Adresse compl&eacute;mentaire</label>
						<input type="text" id="adresse-2-invoice" value="BAT A, appt 23, code : 4738"/>
						<label for="code-postal-invoice">Code Postal</label>
						<input type="text" id="code-postal-invoice" value="75003"/>
						<label for="ville-invoice">Ville</label>
						<input type="text" id="ville-invoice" value="Paris"/>
						<label for="telephone-invoice">T&eacute;l&eacute;phone</label>
						<input type="text" id="telephone-invoice" value="0616186327"/>
						<div class="submit-wrapper clearfix">
							<a href="#" title="annuler" id="cancel-address-invoice" class="hidden">Annuler</a>
							<input type="submit" class="red-button gradient" value="ENREGISTRER" id="adress-submit-invoice" />
						</div>
					</div>
					<!-- <a href="#" title="annuler" id="cancel-address-invoice" class="hidden">Annuler</a> -->
					<a href="#" title="modifier votre adresse de livraison" id="modify-address-invoice">&rarr;&nbsp;<span>Modifier cette adresse</span></a>
				</div>
				<div class="bloc content-address-delivery">
					<h2>Adresse de livraison</h2>
					<div id="delivery-address">
						<select name="id_address_delivery" id="id_address_delivery" class="address_select" onchange="updateAddressesDisplay();{if $opc}updateAddressSelection();{/if}">
							{foreach from=$addresses key=k item=address}
								<option value="{$address.id_address|intval}" {if $address.id_address == $cart->id_address_delivery}selected="selected"{/if}>{$address.alias|escape:'htmlall':'UTF-8'}</option>
							{/foreach}
						</select>
						<ul id="address_delivery">
							<li>Pierre DURAN</li>
							<li>3, rue du chêne</li>
							<li>BAT A, appt 23, code : 4738</li>
							<li><span class="postal-code check">75120</span></li>
							<li>Paris</li>
							<li>0616186327</li>
						</ul>
						<div id="form-address-delivery" class="hidden">
							<label for="nom">Nom</label>
							<input type="text" id="nom" value="DURAND"/>
							<label for="prenom">Prénom</label>
							<input type="text" id="prenom" value="Pierre"/>
							<label for="adresse-1">Adresse</label>
							<input type="text" id="adresse-1" value="3, rue du chêne"/>
							<label for="adresse-2">Adresse compl&eacute;mentaire</label>
							<input type="text" id="adresse-2" value="BAT A, appt 23, code : 4738"/>
							<label for="code-postal">Code Postal</label>
							<input type="text" id="code-postal" value="75003"/>
							<label for="ville">Ville</label>
							<input type="text" id="ville" value="Paris"/>
							<label for="telephone">T&eacute;l&eacute;phone</label>
							<input type="text" id="telephone" value="0616186327"/>
							<div class="submit-wrapper clearfix">
								<a href="#" title="annuler" id="cancel-address-delivery" class="hidden">Annuler</a>
								<input type="submit" class="red-button gradient" value="ENREGISTRER" id="address-submit-delivery" />
							</div>
						</div>
						<div id="form-add-address-delivery" class="hidden">
							<label for="new-title">Libellé de l'adresse</label>
							<input type="text" id="new-title" value="" />
							<label for="new-company">Raison sociale (optionnel)</label>
							<input type="text" id="new-company"/>
							<label for="new-address-1">Adresse</label>
							<input type="text" id="new-address-1"/>
							<label for="new-address-2">Adresse compl&eacute;mentaire</label>
							<input type="text" id="new-address-2"/>
							<label for="new-code-postal">Code Postal</label>
							<input type="text" id="new-code-postal"/>
							<label for="new-ville">Ville</label>
							<input type="text" id="new-ville"/>
							<label for="new-telephone">T&eacute;l&eacute;phone</label>
							<input type="text" id="new-telephone"/>
							<div class="submit-wrapper clearfix">
								<a href="#" title="annuler" id="cancel-add-address-delivery" class="hidden">Annuler</a>
								<input type="submit" class="red-button gradient" value="ENREGISTRER" id="add-address-submit-delivery" />
							</div>
						</div>
						<!-- <div><a href="#" title="annuler" id="cancel-address-delivery" class="hidden">Annuler</a></div> -->
						<div><a href="#" title="modifier votre adresse de livraison" id="modify-address-delivery">&rarr;&nbsp;<span>Modifier cette adresse</span></a></div>
						<div><a href="{$link->getPageLink('address', true, NULL, "back={$back_order_page}?step=1{if $back}&mod={$back}{/if}")}" title="ajouter une nouvelle adresse" id="add-address-delivery">&rarr;&nbsp;<span>Ajouter une nouvelle adresse</span></a></div>
					</div>
					<div id="delivery-relay" class="hidden">
						<p>Adresse Point Relais</p>
						<ul id="saved-address-relay">
							<li>Bio Prestige</li>
							<li>3, rue du chêne</li>
							<li><span class="postal-code">75003</span> Paris</li>
						</ul>
						<div><a href="#" title="afficher la carte des points relais" id="show-map">&rarr;&nbsp;<span>afficher la carte des points relais</span></a></div>
						<div id="relays">
							<div class="popin">
								<a href="#" title="Fermer" class="popin-close"></a>
								<p class="popin-title">Choisissez votre point relais</p>
								<div class="clearfix content-wrapper">
									<div id="left-side">
										<ul id="relay-list"></ul>
									</div>
									<div id="right-side">
										<div id="map"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="bloc content-delivery-mode">
					<h2>Modes de livraison</h2>
					<ul>
						<li id="delivery-home-li">
							<p>
								<label class="radio" for="home-office"><input type="radio" name="delivery" id="home-office" value="home" checked/><span class="bold">Livraison à domicile ou au bureau</span> <span class="delivery-cost"></span></label>
							</p>
							<p class="description">En choisissant ce mode de livraison, vous pourrez nous indiquer à la prochaine étape le créneau horaire durant lequel vous souhaitez être livré.</p>
						</li>
						<li id="delivery-relay-li">
							<p>
								<label class="radio" for="relay"><input type="radio" name="delivery" id="relay" value="relay"/><span class="bold">Livraison en point relais</span> <span class="delivery-cost"></span></label>
							</p>
							<p class="description">Avec la livraison en Point Relais vous avez l'avantage de disposer d'horaires beaucoup plus souples. Vous récupérez votre Colis quand cela vous arrange dans la journée, chez l'un de vos commerçants de proximité (presse, fleuriste, pressing...) du réseau Point Relais des Colis du Boucher.</p>
						</li>
						<li id="delivery-frozen-li">
							<p>
								<label class="radio" for="frozen"><input type="radio" name="delivery" id="frozen" value="frozen"/><span class="bold">Transport en colis réfrigéré</span> <span class="delivery-cost"></span></label>
							</p>
							<p class="description">Avec la livraison en Point Relais vous avez l'avantage de disposer d'horaires beaucoup plus souples. Vous récupérez votre Colis quand cela vous arrange dans la journée, chez l'un de vos commerçants de proximité (presse, fleuriste, pressing...) du réseau Point Relais des Colis du Boucher.</p>
						</li>
					</ul>
					<div id="colis-cadeau-wrapper">
						<hr class="dashed" />
						<label for="colis-cadeau" id="colis-cadeau-toggle" class="checkbox"><input value="1" name="gift" type="checkbox" id="colis-cadeau"/> Je souhaite que ma commande soit envoyée par <a href="#">colis cadeau</a> <span class="price">+ <span id="sup">1,60</span> &euro;</span></label>
						<textarea name="gift_message" placeholder="Saisissez le message qui sera joint au cadeau" id="gift_message">{$cart->gift_message|escape:'htmlall':'UTF-8'}</textarea>
					</div>
					<hr class="dashed" />
					<p id="total-price">Le montant TTC de votre commande est de <span class="price"><span data-price="67" id="final-price">67</span> &euro;</span></p>
					<div id="error-price">
						<p><span class="bold">Minimum de commande non atteint.</span> Nous vous invitons &agrave; continuer vos achats.<br />Pour une livraison dans le <span id="error-postal"></span>, le montant de votre commande doit &ecirc;tre au minimum de <span id="error-minimum-price"></span> &euro;.<br />Il est actuellement de <span id="error-current-price"></span>&euro;.</p>
					</div>
					<input type="hidden" class="hidden" name="step" value="2" />
					<input type="hidden" name="back" value="{$back}" />
				</div>
			</div>
			<div id="continue-shopping">
				<input type="submit" value="valider" id="submit-address" class="disabled-button gradient" disabled />
				<a href="#" title="Continuer mes achats">&rarr;&nbsp;<span>Continuer mes achats</span></a>
			</div>


<div class="delivery_options_address">
	{if isset($delivery_option_list)}
		{foreach $delivery_option_list as $id_address => $option_list}
			<h3>
				{if isset($address_collection[$id_address])}
					{l s='Choose a shipping option for this address:'} {$address_collection[$id_address]->alias}
				{else}
					{l s='Choose a shipping option'}
				{/if}
			</h3>
			<div class="delivery_options">
			{foreach $option_list as $key => $option}
				<div class="delivery_option {if ($option@index % 2)}alternate_{/if}item">
					<input class="delivery_option_radio" type="radio" name="delivery_option[{$id_address}]" onchange="{if $opc}updateCarrierSelectionAndGift();{else}updateExtraCarrier('{$key}', {$id_address});{/if}" id="delivery_option_{$id_address}_{$option@index}" value="{$key}" {if isset($delivery_option[$id_address]) && $delivery_option[$id_address] == $key}checked="checked"{/if} />
					<label for="delivery_option_{$id_address}_{$option@index}">
						<table class="resume">
							<tr>
								<td class="delivery_option_logo">
									{foreach $option.carrier_list as $carrier}
										{if $carrier.logo}
											<img src="{$carrier.logo}" alt="{$carrier.instance->name}"/>
										{else if !$option.unique_carrier}
											{$carrier.instance->name}
											{if !$carrier@last} - {/if}
										{/if}
									{/foreach}
								</td>
								<td>
								{if $option.unique_carrier}
									{foreach $option.carrier_list as $carrier}
										<div class="delivery_option_title">{$carrier.instance->name}</div>
									{/foreach}
									{if isset($carrier.instance->delay[$cookie->id_lang])}
										<div class="delivery_option_delay">{$carrier.instance->delay[$cookie->id_lang]}</div>
									{/if}
								{/if}
								{if count($option_list) > 1}
									{if $option.is_best_grade}
										{if $option.is_best_price}
										<div class="delivery_option_best delivery_option_icon">{l s='The best price and speed'}</div>
										{else}
										<div class="delivery_option_fast delivery_option_icon">{l s='The fastest'}</div>
										{/if}
									{else}
										{if $option.is_best_price}
										<div class="delivery_option_best_price delivery_option_icon">{l s='The best price'}</div>
										{/if}
									{/if}
								{/if}
								</td>
								<td>
								<div class="delivery_option_price">
									{if $option.total_price_with_tax && !$free_shipping}
										{if $use_taxes == 1}
											{convertPrice price=$option.total_price_with_tax} {l s='(tax incl.)'}
										{else}
											{convertPrice price=$option.total_price_without_tax} {l s='(tax excl.)'}
										{/if}
									{else}
										{l s='Free!'}
									{/if}
								</div>
								</td>
							</tr>
						</table>
						<table class="delivery_option_carrier {if isset($delivery_option[$id_address]) && $delivery_option[$id_address] == $key}selected{/if} {if $option.unique_carrier}not-displayable{/if}">
							{foreach $option.carrier_list as $carrier}
							<tr>
								{if !$option.unique_carrier}
								<td class="first_item">
								<input type="hidden" value="{$carrier.instance->id}" name="id_carrier" />
									{if $carrier.logo}
										<img src="{$carrier.logo}" alt="{$carrier.instance->name}"/>
									{/if}
								</td>
								<td>
									{$carrier.instance->name}
								</td>
								{/if}
								<td {if $option.unique_carrier}class="first_item" colspan="2"{/if}>
									<input type="hidden" value="{$carrier.instance->id}" name="id_carrier" />
									{if isset($carrier.instance->delay[$cookie->id_lang])}
										{$carrier.instance->delay[$cookie->id_lang]}<br />
										{if count($carrier.product_list) <= 1}
											({l s='product concerned:'}
										{else}
											({l s='products concerned:'}
										{/if}
										{* This foreach is on one line, to avoid tabulation in the title attribute of the acronym *}
										{foreach $carrier.product_list as $product}
										{if $product@index == 4}<acronym title="{/if}{if $product@index >= 4}{$product.name}{if !$product@last}, {else}">...</acronym>){/if}{else}{$product.name}{if !$product@last}, {else}){/if}{/if}{/foreach}
									{/if}
								</td>
							</tr>
						{/foreach}
						</table>
					</label>
				</div>
			{/foreach}
			</div>
			<div class="hook_extracarrier" id="HOOK_EXTRACARRIER_{$id_address}">{if isset($HOOK_EXTRACARRIER_ADDR) &&  isset($HOOK_EXTRACARRIER_ADDR.$id_address)}{$HOOK_EXTRACARRIER_ADDR.$id_address}{/if}</div>
			{foreachelse}
			<p class="warning" id="noCarrierWarning">
				{foreach $cart->getDeliveryAddressesWithoutCarriers(true) as $address}
					{if empty($address->alias)}
						{l s='No carriers available.'}
					{else}
						{l s='No carriers available for the address "%s".' sprintf=$address->alias}
					{/if}
					{if !$address@last}
					<br />
					{/if}
				{/foreach}
			</p>
		{/foreach}
	{/if}
	
	</div>








		</form>
	</div>
</div>