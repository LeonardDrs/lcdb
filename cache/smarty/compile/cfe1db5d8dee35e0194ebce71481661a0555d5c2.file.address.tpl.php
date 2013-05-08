<?php /* Smarty version Smarty-3.1.8, created on 2013-05-01 00:56:42
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/address.tpl" */ ?>
<?php /*%%SmartyHeaderCode:113871842851804c2abefc22-65242313%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfe1db5d8dee35e0194ebce71481661a0555d5c2' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/address.tpl',
      1 => 1367362600,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113871842851804c2abefc22-65242313',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'address' => 0,
    'countries' => 0,
    'country' => 0,
    'state' => 0,
    'vat_management' => 0,
    'link' => 0,
    'ordered_adr_fields' => 0,
    'field_name' => 0,
    'token' => 0,
    'countries_list' => 0,
    'select_address' => 0,
    'id_address' => 0,
    'back' => 0,
    'mod' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51804c2b114e45_66961181',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51804c2b114e45_66961181')) {function content_51804c2b114e45_66961181($_smarty_tpl) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Your addresses'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<script type="text/javascript">
// <![CDATA[
idSelectedCountry = <?php if (isset($_POST['id_state'])){?><?php echo intval($_POST['id_state']);?>
<?php }else{ ?><?php if (isset($_smarty_tpl->tpl_vars['address']->value->id_state)){?><?php echo intval($_smarty_tpl->tpl_vars['address']->value->id_state);?>
<?php }else{ ?>false<?php }?><?php }?>;
countries = new Array();
countriesNeedIDNumber = new Array();
countriesNeedZipCode = new Array();
<?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value){
$_smarty_tpl->tpl_vars['country']->_loop = true;
?>
	<?php if (isset($_smarty_tpl->tpl_vars['country']->value['states'])&&$_smarty_tpl->tpl_vars['country']->value['contains_states']){?>
		countries[<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
] = new Array();
		<?php  $_smarty_tpl->tpl_vars['state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['state']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['country']->value['states']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['state']->key => $_smarty_tpl->tpl_vars['state']->value){
$_smarty_tpl->tpl_vars['state']->_loop = true;
?>
			countries[<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
].push({'id' : '<?php echo $_smarty_tpl->tpl_vars['state']->value['id_state'];?>
', 'name' : '<?php echo addslashes($_smarty_tpl->tpl_vars['state']->value['name']);?>
'});
		<?php } ?>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['country']->value['need_identification_number']){?>
		countriesNeedIDNumber.push(<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
);
	<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['country']->value['need_zip_code'])){?>
		countriesNeedZipCode[<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
] = <?php echo $_smarty_tpl->tpl_vars['country']->value['need_zip_code'];?>
;
	<?php }?>
<?php } ?>
$(function(){
	$('.id_state option[value=<?php if (isset($_POST['id_state'])){?><?php echo intval($_POST['id_state']);?>
<?php }else{ ?><?php if (isset($_smarty_tpl->tpl_vars['address']->value->id_state)){?><?php echo intval($_smarty_tpl->tpl_vars['address']->value->id_state);?>
<?php }?><?php }?>]').attr('selected', true);
});
<?php if ($_smarty_tpl->tpl_vars['vat_management']->value){?>

	$(document).ready(function() {
		$('#company').blur(function(){
			vat_number();
		});
		vat_number();
		function vat_number()
		{
			if ($('#company').val() != '')
				$('#vat_number').show();
			else
				$('#vat_number').hide();
		}
	});

<?php }?>
//]]>
</script>

<div id="columns" class="content clearfix">
	<div id="left_column">
		<?php echo $_smarty_tpl->getSubTemplate ("./account-left-col.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div><!-- / #left_column -->
	<div id="center_column" class="address">
		<div class="big-bloc">
			<h1>Mes adresses</h1>
			<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<p>Pour ajouter une adresse, veuillez remplir le formulaire ci-dessous.</p>
			<p class="information">Les champs suivis d'un astérisque (<span class="asterisque">*</span>) sont obligatoires.</p>
			<div class="warning"></div>
			
			<form action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('address',true);?>
" method="post" name="form-adress" id="form-adress">
				<div>
					<?php $_smarty_tpl->tpl_vars["stateExist"] = new Smarty_variable("false", null, 0);?>
					<?php  $_smarty_tpl->tpl_vars['field_name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_name']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ordered_adr_fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_name']->key => $_smarty_tpl->tpl_vars['field_name']->value){
$_smarty_tpl->tpl_vars['field_name']->_loop = true;
?>
						<?php if ($_smarty_tpl->tpl_vars['field_name']->value=='firstname'){?>
							<label for="firstname">Prénom <span class="asterisque">*</span></label>
							<input type="text" id="firstname" name="firstname" value="<?php if (isset($_POST['firstname'])){?><?php echo $_POST['firstname'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->tpl_vars['address']->value->firstname)){?><?php echo $_smarty_tpl->tpl_vars['address']->value->firstname;?>
<?php }?><?php }?>" required />
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['field_name']->value=='lastname'){?>
							<label for="lastname">Nom <span class="asterisque">*</span></label>
							<input type="text" id="lastname" name="lastname" value="<?php if (isset($_POST['lastname'])){?><?php echo $_POST['lastname'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->tpl_vars['address']->value->lastname)){?><?php echo $_smarty_tpl->tpl_vars['address']->value->lastname;?>
<?php }?><?php }?>" required />
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['field_name']->value=='company'){?>
							<input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
							<label for="company"><?php echo smartyTranslate(array('s'=>'Company'),$_smarty_tpl);?>
</label>
							<input type="text" id="company" name="company" value="<?php if (isset($_POST['company'])){?><?php echo $_POST['company'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->tpl_vars['address']->value->company)){?><?php echo $_smarty_tpl->tpl_vars['address']->value->company;?>
<?php }?><?php }?>" />
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['field_name']->value=='address1'){?>
							<label for="address1">Adresse <span class="asterisque">*</span></label>
							<input type="text" id="address1" name="address1" value="<?php if (isset($_POST['address1'])){?><?php echo $_POST['address1'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->tpl_vars['address']->value->address1)){?><?php echo $_smarty_tpl->tpl_vars['address']->value->address1;?>
<?php }?><?php }?>" required />
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['field_name']->value=='address2'){?>
							<label for="address2">Complément d'adresse</label>
							<input type="text" id="address2" name="address2" value="<?php if (isset($_POST['address2'])){?><?php echo $_POST['address2'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->tpl_vars['address']->value->address2)){?><?php echo $_smarty_tpl->tpl_vars['address']->value->address2;?>
<?php }?><?php }?>" />
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['field_name']->value=='postcode'){?>
							<label for="postal_code">Code postal <span class="asterisque">*</span></label>
							<input type="text"  id="postcode" name="postcode" value="<?php if (isset($_POST['postcode'])){?><?php echo $_POST['postcode'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->tpl_vars['address']->value->postcode)){?><?php echo $_smarty_tpl->tpl_vars['address']->value->postcode;?>
<?php }?><?php }?>" onkeyup="$('#postcode').val($('#postcode').val().toUpperCase());" required />
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['field_name']->value=='city'){?>
							<label for="city">Ville <span class="asterisque">*</span></label>
							<input type="text"  name="city" id="city" value="<?php if (isset($_POST['city'])){?><?php echo $_POST['city'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->tpl_vars['address']->value->city)){?><?php echo $_smarty_tpl->tpl_vars['address']->value->city;?>
<?php }?><?php }?>" required />
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['field_name']->value=='Country:name'||$_smarty_tpl->tpl_vars['field_name']->value=='country'){?>
							<div class="select">
								<label for="id_country">Pays :</label>
								<select id="id_country" name="id_country"><?php echo $_smarty_tpl->tpl_vars['countries_list']->value;?>
</select>
							</div>
						<?php }?>
					<?php } ?>
					
					<label for="comment">Informations supplémentaires</label>
					<textarea id="comment" name="other"><?php if (isset($_POST['other'])){?><?php echo $_POST['other'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->tpl_vars['address']->value->other)){?><?php echo $_smarty_tpl->tpl_vars['address']->value->other;?>
<?php }?><?php }?></textarea>
					<label for="address_title">Donnez un titre à cette adresse pour la retrouver plus facilement <span class="asterisque">*</span></label>
					<input type="text" id="address_title" name="alias" value="<?php if (isset($_POST['alias'])){?><?php echo $_POST['alias'];?>
<?php }elseif(isset($_smarty_tpl->tpl_vars['address']->value->alias)){?><?php echo $_smarty_tpl->tpl_vars['address']->value->alias;?>
<?php }elseif(isset($_smarty_tpl->tpl_vars['select_address']->value)){?><?php echo smartyTranslate(array('s'=>'My address'),$_smarty_tpl);?>
<?php }?>" required />
					
				</div>
				<div>
					<p class="information">Entrez au minimun un numéro de téléphone <span class="asterisque">*</span></p>
					<label for="phone">Téléphone Fixe</label>
					<input type="text"  id="phone" name="phone" value="<?php if (isset($_POST['phone'])){?><?php echo $_POST['phone'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->tpl_vars['address']->value->phone)){?><?php echo $_smarty_tpl->tpl_vars['address']->value->phone;?>
<?php }?><?php }?>"/>
					<label for="mobile">Téléphone Portable</label>
					<input type="text" id="phone_mobile" name="phone_mobile" value="<?php if (isset($_POST['phone_mobile'])){?><?php echo $_POST['phone_mobile'];?>
<?php }else{ ?><?php if (isset($_smarty_tpl->tpl_vars['address']->value->phone_mobile)){?><?php echo $_smarty_tpl->tpl_vars['address']->value->phone_mobile;?>
<?php }?><?php }?>" />
				</div>
				<div class="action">
					<?php if (isset($_smarty_tpl->tpl_vars['id_address']->value)){?><input type="hidden" name="id_address" value="<?php echo intval($_smarty_tpl->tpl_vars['id_address']->value);?>
" /><?php }?>
					<?php if (isset($_smarty_tpl->tpl_vars['back']->value)){?><input type="hidden" name="back" value="<?php echo $_smarty_tpl->tpl_vars['back']->value;?>
" /><?php }?>
					<?php if (isset($_smarty_tpl->tpl_vars['mod']->value)){?><input type="hidden" name="mod" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value;?>
" /><?php }?>
					<?php if (isset($_smarty_tpl->tpl_vars['select_address']->value)){?><input type="hidden" name="select_address" value="<?php echo intval($_smarty_tpl->tpl_vars['select_address']->value);?>
" /><?php }?>
					<button type="submit" name="submitAddress" id="submitAddress" class="red-button gradient">Valider cette adresse</button>
				</div>
			</form>
		</div>
	</div><!-- / #center_column -->
</div>
<?php }} ?>