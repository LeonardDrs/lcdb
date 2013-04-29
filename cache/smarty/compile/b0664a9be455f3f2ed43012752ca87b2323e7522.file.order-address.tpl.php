<?php /* Smarty version Smarty-3.1.8, created on 2013-04-29 19:38:50
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/order-address.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1223527512517eb02aaa94a4-40466783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0664a9be455f3f2ed43012752ca87b2323e7522' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/order-address.tpl',
      1 => 1367257128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1223527512517eb02aaa94a4-40466783',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'formatedAddressFieldsValuesList' => 0,
    'addresses' => 0,
    'address' => 0,
    'address_key' => 0,
    'ignoreList' => 0,
    'id_address' => 0,
    'address_key_number' => 0,
    'address_content' => 0,
    'opc' => 0,
    'currencySign' => 0,
    'currencyRate' => 0,
    'currencyFormat' => 0,
    'currencyBlank' => 0,
    'back_order_page' => 0,
    'back' => 0,
    'link' => 0,
    'type' => 0,
    'field_name' => 0,
    'pattern_name' => 0,
    'cart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_517eb02af07208_90464208',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517eb02af07208_90464208')) {function content_517eb02af07208_90464208($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/function.counter.php';
if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
?>
<?php $_smarty_tpl->tpl_vars["back_order_page"] = new Smarty_variable("order.php", null, 0);?>


<?php if (!isset($_smarty_tpl->tpl_vars['formatedAddressFieldsValuesList']->value)){?>
	<?php $_smarty_tpl->createLocalArrayVariable('ignoreList', null, 0);
$_smarty_tpl->tpl_vars['ignoreList']->value[0] = "id_address";?>
	<?php $_smarty_tpl->createLocalArrayVariable('ignoreList', null, 0);
$_smarty_tpl->tpl_vars['ignoreList']->value[1] = "id_country";?>
	<?php $_smarty_tpl->createLocalArrayVariable('ignoreList', null, 0);
$_smarty_tpl->tpl_vars['ignoreList']->value[2] = "id_state";?>
	<?php $_smarty_tpl->createLocalArrayVariable('ignoreList', null, 0);
$_smarty_tpl->tpl_vars['ignoreList']->value[3] = "id_customer";?>
	<?php $_smarty_tpl->createLocalArrayVariable('ignoreList', null, 0);
$_smarty_tpl->tpl_vars['ignoreList']->value[4] = "id_manufacturer";?>
	<?php $_smarty_tpl->createLocalArrayVariable('ignoreList', null, 0);
$_smarty_tpl->tpl_vars['ignoreList']->value[5] = "id_supplier";?>
	<?php $_smarty_tpl->createLocalArrayVariable('ignoreList', null, 0);
$_smarty_tpl->tpl_vars['ignoreList']->value[6] = "date_add";?>
	<?php $_smarty_tpl->createLocalArrayVariable('ignoreList', null, 0);
$_smarty_tpl->tpl_vars['ignoreList']->value[7] = "date_upd";?>
	<?php $_smarty_tpl->createLocalArrayVariable('ignoreList', null, 0);
$_smarty_tpl->tpl_vars['ignoreList']->value[8] = "active";?>
	<?php $_smarty_tpl->createLocalArrayVariable('ignoreList', null, 0);
$_smarty_tpl->tpl_vars['ignoreList']->value[9] = "deleted";?>

	
	<?php if (isset($_smarty_tpl->tpl_vars['addresses']->value)){?>
		<?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['address']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['addresses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value){
$_smarty_tpl->tpl_vars['address']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['address']->key;
?>
			<?php echo smarty_function_counter(array('start'=>0,'skip'=>1,'assign'=>'address_key_number'),$_smarty_tpl);?>

			<?php $_smarty_tpl->tpl_vars['id_address'] = new Smarty_variable($_smarty_tpl->tpl_vars['address']->value['id_address'], null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['address_content'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['address_content']->_loop = false;
 $_smarty_tpl->tpl_vars['address_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['address']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['address_content']->key => $_smarty_tpl->tpl_vars['address_content']->value){
$_smarty_tpl->tpl_vars['address_content']->_loop = true;
 $_smarty_tpl->tpl_vars['address_key']->value = $_smarty_tpl->tpl_vars['address_content']->key;
?>
				<?php if (!in_array($_smarty_tpl->tpl_vars['address_key']->value,$_smarty_tpl->tpl_vars['ignoreList']->value)){?>
					<?php $_smarty_tpl->createLocalArrayVariable('formatedAddressFieldsValuesList', null, 0);
$_smarty_tpl->tpl_vars['formatedAddressFieldsValuesList']->value[$_smarty_tpl->tpl_vars['id_address']->value]['ordered_fields'][$_smarty_tpl->tpl_vars['address_key_number']->value] = $_smarty_tpl->tpl_vars['address_key']->value;?>
					<?php $_smarty_tpl->createLocalArrayVariable('formatedAddressFieldsValuesList', null, 0);
$_smarty_tpl->tpl_vars['formatedAddressFieldsValuesList']->value[$_smarty_tpl->tpl_vars['id_address']->value]['formated_fields_values'][$_smarty_tpl->tpl_vars['address_key']->value] = $_smarty_tpl->tpl_vars['address_content']->value;?>
					<?php echo smarty_function_counter(array(),$_smarty_tpl);?>

				<?php }?>
			<?php } ?>
		<?php } ?>
	<?php }?>
<?php }?>

<script type="text/javascript">
// <![CDATA[
	<?php if (!$_smarty_tpl->tpl_vars['opc']->value){?>
	var orderProcess = 'order';
	var currencySign = '<?php echo html_entity_decode($_smarty_tpl->tpl_vars['currencySign']->value,2,"UTF-8");?>
';
	var currencyRate = '<?php echo floatval($_smarty_tpl->tpl_vars['currencyRate']->value);?>
';
	var currencyFormat = '<?php echo intval($_smarty_tpl->tpl_vars['currencyFormat']->value);?>
';
	var currencyBlank = '<?php echo intval($_smarty_tpl->tpl_vars['currencyBlank']->value);?>
';
	var txtProduct = "<?php echo smartyTranslate(array('s'=>'product','js'=>1),$_smarty_tpl);?>
";
	var txtProducts = "<?php echo smartyTranslate(array('s'=>'products','js'=>1),$_smarty_tpl);?>
";
	<?php }?>

	var addressMultishippingUrl = "<?php ob_start();?><?php echo urlencode('&multi-shipping=1');?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['back']->value){?><?php echo "&mod=";?><?php echo urlencode($_smarty_tpl->tpl_vars['back']->value);?>
<?php }?><?php $_tmp2=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('address',true,null,"back=".($_smarty_tpl->tpl_vars['back_order_page']->value)."?step=1".$_tmp1.$_tmp2);?>
";
	var addressUrl = "<?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['back']->value){?><?php echo "&mod=";?><?php echo $_smarty_tpl->tpl_vars['back']->value;?><?php }?><?php $_tmp3=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('address',true,null,"back=".($_smarty_tpl->tpl_vars['back_order_page']->value)."?step=1".$_tmp3);?>
";

	var formatedAddressFieldsValuesList = new Array();

	<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_smarty_tpl->tpl_vars['id_address'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['formatedAddressFieldsValuesList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
 $_smarty_tpl->tpl_vars['id_address']->value = $_smarty_tpl->tpl_vars['type']->key;
?>
		formatedAddressFieldsValuesList[<?php echo $_smarty_tpl->tpl_vars['id_address']->value;?>
] =
		{
			'ordered_fields':[
				<?php  $_smarty_tpl->tpl_vars['field_name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_name']->_loop = false;
 $_smarty_tpl->tpl_vars['num_field'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['type']->value['ordered_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['field_name']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['field_name']->key => $_smarty_tpl->tpl_vars['field_name']->value){
$_smarty_tpl->tpl_vars['field_name']->_loop = true;
 $_smarty_tpl->tpl_vars['num_field']->value = $_smarty_tpl->tpl_vars['field_name']->key;
 $_smarty_tpl->tpl_vars['field_name']->index++;
 $_smarty_tpl->tpl_vars['field_name']->first = $_smarty_tpl->tpl_vars['field_name']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['inv_loop']['first'] = $_smarty_tpl->tpl_vars['field_name']->first;
?>
					<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['inv_loop']['first']){?>,<?php }?>"<?php echo $_smarty_tpl->tpl_vars['field_name']->value;?>
"
				<?php } ?>
			],
			'formated_fields_values':{
					<?php  $_smarty_tpl->tpl_vars['field_name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_name']->_loop = false;
 $_smarty_tpl->tpl_vars['pattern_name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['type']->value['formated_fields_values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['field_name']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['field_name']->key => $_smarty_tpl->tpl_vars['field_name']->value){
$_smarty_tpl->tpl_vars['field_name']->_loop = true;
 $_smarty_tpl->tpl_vars['pattern_name']->value = $_smarty_tpl->tpl_vars['field_name']->key;
 $_smarty_tpl->tpl_vars['field_name']->index++;
 $_smarty_tpl->tpl_vars['field_name']->first = $_smarty_tpl->tpl_vars['field_name']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['inv_loop']['first'] = $_smarty_tpl->tpl_vars['field_name']->first;
?>
						<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['inv_loop']['first']){?>,<?php }?>"<?php echo $_smarty_tpl->tpl_vars['pattern_name']->value;?>
":"<?php echo $_smarty_tpl->tpl_vars['field_name']->value;?>
"
					<?php } ?>
				}
		}
	<?php } ?>

	function getAddressesTitles()
	{
		return {
						'invoice': "<?php echo smartyTranslate(array('s'=>'Your billing address','js'=>1),$_smarty_tpl);?>
",
						'delivery': "<?php echo smartyTranslate(array('s'=>'Your delivery address','js'=>1),$_smarty_tpl);?>
"
			};

	}


	function buildAddressBlock(id_address, address_type, dest_comp)
	{
		var adr_titles_vals = getAddressesTitles();
		var li_content = formatedAddressFieldsValuesList[id_address]['formated_fields_values'];
		var ordered_fields_name = ['title'];

		ordered_fields_name = ordered_fields_name.concat(formatedAddressFieldsValuesList[id_address]['ordered_fields']);
		ordered_fields_name = ordered_fields_name.concat(['update']);

		dest_comp.html('');

		li_content['title'] = adr_titles_vals[address_type];
		li_content['update'] = '<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('address',true,null,"id_address");?>
'+id_address+'&amp;back=<?php echo $_smarty_tpl->tpl_vars['back_order_page']->value;?>
?step=1<?php if ($_smarty_tpl->tpl_vars['back']->value){?>&mod=<?php echo $_smarty_tpl->tpl_vars['back']->value;?>
<?php }?>" title="<?php echo smartyTranslate(array('s'=>'Update','js'=>1),$_smarty_tpl);?>
">&raquo; <?php echo smartyTranslate(array('s'=>'Update','js'=>1),$_smarty_tpl);?>
</a>';

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

<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Addresses'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php $_smarty_tpl->tpl_vars['current_step'] = new Smarty_variable('address', null, 0);?>

<div id="columns" class="content clearfix">
	<div class="bloc-checkout">
		<?php echo $_smarty_tpl->getSubTemplate ("./order-steps.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<form action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink($_smarty_tpl->tpl_vars['back_order_page']->value,true);?>
" method="post">
			
			<div id="content-wrapper" class="clearfix">
				<div class="bloc content-address-invoice">
					<h2>Adresse de facturation</h2>
					<select>
						<option>Adresse Principale</option>
						<option>Adresse Secondaire</option>
					</select>
					<ul id="saved-address-invoice">
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
						<input type="submit" class="red-button gradient" value="ENREGISTRER" id="adress-submit-invoice" />
					</div>
					<a href="#" title="annuler" id="cancel-address-invoice" class="hidden">Annuler</a>
					<a href="#" title="modifier votre adresse de livraison" id="modify-address-invoice">&rarr;&nbsp;<span>Modifier cette adresse</span></a>
				</div>
				<div class="bloc content-address-delivery">
					<h2>Adresse de livraison</h2>
					<div id="delivery-address">
						<select>
							<option>Adresse Principale</option>
							<option>Adresse Secondaire</option>
						</select>
						<ul id="saved-address-delivery">
							<li>Pierre DURAN</li>
							<li>3, rue du chêne</li>
							<li>BAT A, appt 23, code : 4738</li>
							<li><span class="postal-code">75003</span></li>
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
							<input type="submit" class="red-button gradient" value="ENREGISTRER" id="address-submit-delivery" />
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
							<input type="submit" class="red-button gradient" value="ENREGISTRER" id="add-address-submit-delivery" />
						</div>
						<div><a href="#" title="annuler" id="cancel-address-delivery" class="hidden">Annuler</a></div>
						<div><a href="#" title="modifier votre adresse de livraison" id="modify-address-delivery">&rarr;&nbsp;<span>Modifier cette adresse</span></a></div>
						<div><a href="<?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['back']->value){?><?php echo "&mod=";?><?php echo $_smarty_tpl->tpl_vars['back']->value;?><?php }?><?php $_tmp4=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('address',true,null,"back=".($_smarty_tpl->tpl_vars['back_order_page']->value)."?step=1".$_tmp4);?>
" title="ajouter une nouvelle adresse" id="add-address-delivery">&rarr;&nbsp;<span>Ajouter une nouvelle adresse</span></a></div>
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
								<p>Choisissez votre point relais</p>
								<div class="clearfix">
									<div id="left-side">
										<ul id="relay-list">
										</ul>
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
						<li>
							<p>
								<label class="radio" for="home-office"><input type="radio" name="delivery" id="home-office" checked/><span class="bold">Livraison à domicile ou au bureau</span> Livraison offerte</label>
							</p>
							<p class="description">En choisissant ce mode de livraison, vous pourrez nous indiquer à la prochaine étape le créneau horaire durant lequel vous souhaitez être livré.</p>
						</li>
						<li>
							<p>
								<label class="radio" for="relay"><input type="radio" name="delivery" id="relay" /><span class="bold">Livraison en point relais</span> Livraison offerte</label>
							</p>
							<p class="description">Avec la livraison en Point Relais vous avez l'avantage de disposer d'horaires beaucoup plus souples. Vous récupérez votre Colis quand cela vous arrange dans la journée, chez l'un de vos commerçants de proximité (presse, fleuriste, pressing...) du réseau Point Relais des Colis du Boucher.</p>
						</li>
					</ul>
					<hr class="dashed" />
					<div id="colis-cadeau-wrapper">
						<label for="colis-cadeau" id="colis-cadeau-toggle" class="checkbox"><input type="checkbox" id="colis-cadeau"/> Je souhaite que ma commande soit envoyée par <a href="#">colis cadeau</a> <span class="price">+ 1,60 &euro;</span></label>
						<textarea placeholder="Saisissez le message qui sera joint au cadeau" id="colis-cadeau-message" class="hidden" disabled="disabled"></textarea>
					</div>
					<hr class="dashed" />
					<p id="total-price">Le montant TTC de votre commande est de <span class="price"><span id="final-price">64,20</span> &euro;</span></p>
					<input type="hidden" class="hidden" name="step" value="2" />
					<input type="hidden" name="back" value="<?php echo $_smarty_tpl->tpl_vars['back']->value;?>
" />
					<input type="submit" value="valider" id="submit-address" class="disabled-button gradient" disabled />
				</div>
			</div>
			<div>
				<a href="#" title="Continuer mes achats">&rarr;&nbsp;<span>Continuer mes achats</span></a>
			</div>
			
			<div class="addresses clearfix">
				<p class="address_delivery select">
					<label for="id_address_delivery"><?php if ($_smarty_tpl->tpl_vars['cart']->value->isVirtualCart()){?><?php echo smartyTranslate(array('s'=>'Choose a billing address:'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'Choose a delivery address:'),$_smarty_tpl);?>
<?php }?></label>
					<select name="id_address_delivery" id="id_address_delivery" class="address_select" onchange="updateAddressesDisplay();<?php if ($_smarty_tpl->tpl_vars['opc']->value){?>updateAddressSelection();<?php }?>">

					<?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['address']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['addresses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value){
$_smarty_tpl->tpl_vars['address']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['address']->key;
?>
						<option value="<?php echo intval($_smarty_tpl->tpl_vars['address']->value['id_address']);?>
" <?php if ($_smarty_tpl->tpl_vars['address']->value['id_address']==$_smarty_tpl->tpl_vars['cart']->value->id_address_delivery){?>selected="selected"<?php }?>><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['address']->value['alias'], 'htmlall', 'UTF-8');?>
</option>
					<?php } ?>

					</select>
				</p>
				<p class="checkbox addressesAreEquals" <?php if ($_smarty_tpl->tpl_vars['cart']->value->isVirtualCart()){?>style="display:none;"<?php }?>>
					<input type="checkbox" name="same" id="addressesAreEquals" value="1" onclick="updateAddressesDisplay();<?php if ($_smarty_tpl->tpl_vars['opc']->value){?>updateAddressSelection();<?php }?>" <?php if ($_smarty_tpl->tpl_vars['cart']->value->id_address_invoice==$_smarty_tpl->tpl_vars['cart']->value->id_address_delivery||count($_smarty_tpl->tpl_vars['addresses']->value)==1){?>checked="checked"<?php }?> />
					<label for="addressesAreEquals"><?php echo smartyTranslate(array('s'=>'Use the delivery address as the billing address.'),$_smarty_tpl);?>
</label>
				</p>

				<p id="address_invoice_form" class="select" <?php if ($_smarty_tpl->tpl_vars['cart']->value->id_address_invoice==$_smarty_tpl->tpl_vars['cart']->value->id_address_delivery){?>style="display: none;"<?php }?>>

				<?php if (count($_smarty_tpl->tpl_vars['addresses']->value)>1){?>
					<label for="id_address_invoice" class="strong"><?php echo smartyTranslate(array('s'=>'Choose a billing address:'),$_smarty_tpl);?>
</label>
					<select name="id_address_invoice" id="id_address_invoice" class="address_select" onchange="updateAddressesDisplay();<?php if ($_smarty_tpl->tpl_vars['opc']->value){?>updateAddressSelection();<?php }?>">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['address'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['address']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['address']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['addresses']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['address']['step'] = ((int)-1) == 0 ? 1 : (int)-1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['address']['name'] = 'address';
$_smarty_tpl->tpl_vars['smarty']->value['section']['address']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['address']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['address']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['address']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['address']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['address']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['address']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['address']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['address']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['address']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['address']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['address']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['address']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['address']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['address']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['address']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['address']['total']);
?>
						<option value="<?php echo intval($_smarty_tpl->tpl_vars['addresses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['address']['index']]['id_address']);?>
" <?php if ($_smarty_tpl->tpl_vars['addresses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['address']['index']]['id_address']==$_smarty_tpl->tpl_vars['cart']->value->id_address_invoice&&$_smarty_tpl->tpl_vars['cart']->value->id_address_delivery!=$_smarty_tpl->tpl_vars['cart']->value->id_address_invoice){?>selected="selected"<?php }?>><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['addresses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['address']['index']]['alias'], 'htmlall', 'UTF-8');?>
</option>
					<?php endfor; endif; ?>
					</select>
					<?php }else{ ?>
						<a style="margin-left: 221px;" href="<?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['back']->value){?><?php echo "&mod=";?><?php echo $_smarty_tpl->tpl_vars['back']->value;?><?php }?><?php $_tmp5=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('address',true,null,"back=".($_smarty_tpl->tpl_vars['back_order_page']->value)."?step=1&select_address=1".$_tmp5);?>
" title="<?php echo smartyTranslate(array('s'=>'Add'),$_smarty_tpl);?>
" class="button_large"><?php echo smartyTranslate(array('s'=>'Add a new address'),$_smarty_tpl);?>
</a>
					<?php }?>
				</p>
				<div class="clearfix">
					<ul class="address item" id="address_delivery" <?php if ($_smarty_tpl->tpl_vars['cart']->value->isVirtualCart()){?>style="display:none;"<?php }?>>
					</ul>
					<ul class="address alternate_item <?php if ($_smarty_tpl->tpl_vars['cart']->value->isVirtualCart()){?>full_width<?php }?>" id="address_invoice">
					</ul>
				</div>
			</div>
		</form>
	</div>
</div><?php }} ?>