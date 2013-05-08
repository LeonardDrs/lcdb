<?php /* Smarty version Smarty-3.1.8, created on 2013-05-02 13:56:32
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/authentication.tpl" */ ?>
<?php /*%%SmartyHeaderCode:55893908051825470477078-76533697%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c226303e6ee32cad0d2d68e6dd62e24a5cdadfcc' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/authentication.tpl',
      1 => 1367349113,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55893908051825470477078-76533697',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'countries' => 0,
    'country' => 0,
    'state' => 0,
    'address' => 0,
    'vat_management' => 0,
    'email_create' => 0,
    'link' => 0,
    'back' => 0,
    'inOrderProcess' => 0,
    'PS_GUEST_CHECKOUT_ENABLED' => 0,
    'genders' => 0,
    'gender' => 0,
    'days' => 0,
    'day' => 0,
    'sl_day' => 0,
    'months' => 0,
    'k' => 0,
    'sl_month' => 0,
    'month' => 0,
    'years' => 0,
    'year' => 0,
    'sl_year' => 0,
    'newsletter' => 0,
    'dlv_all_fields' => 0,
    'field_name' => 0,
    'v' => 0,
    'sl_country' => 0,
    'stateExist' => 0,
    'HOOK_CREATE_ACCOUNT_FORM' => 0,
    'HOOK_CREATE_ACCOUNT_TOP' => 0,
    'PS_REGISTRATION_PROCESS_TYPE' => 0,
    'one_phone_at_least' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_518254710a52f0_97696649',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518254710a52f0_97696649')) {function content_518254710a52f0_97696649($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
?>
<script type="text/javascript">
// <![CDATA[
idSelectedCountry = <?php if (isset($_POST['id_state'])){?><?php echo intval($_POST['id_state']);?>
<?php }else{ ?>false<?php }?>;
countries = new Array();
countriesNeedIDNumber = new Array();
countriesNeedZipCode = new Array();
<?php if (isset($_smarty_tpl->tpl_vars['countries']->value)){?>
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
].push({'id' : '<?php echo intval($_smarty_tpl->tpl_vars['state']->value['id_state']);?>
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
<?php }?>
$(function(){
	$('.id_state option[value=<?php if (isset($_POST['id_state'])){?><?php echo intval($_POST['id_state']);?>
<?php }else{ ?><?php if (isset($_smarty_tpl->tpl_vars['address']->value)){?><?php echo intval($_smarty_tpl->tpl_vars['address']->value->id_state);?>
<?php }?><?php }?>]').attr('selected', true);
});
//]]>
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
</script>


<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Login'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<div id="columns" class="content clearfix">
	<div class="bloc-checkout">
		<?php echo $_smarty_tpl->getSubTemplate ("./order-steps.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		
		<?php $_smarty_tpl->tpl_vars['stateExist'] = new Smarty_variable(false, null, 0);?>
		<?php if (!isset($_smarty_tpl->tpl_vars['email_create']->value)){?>
		
			<script type="text/javascript">
				
				$(document).ready(function(){
					// Retrocompatibility with 1.4
					if (typeof baseUri === "undefined" && typeof baseDir !== "undefined")
					baseUri = baseDir;
					$('#create-account_form').submit(function(){
						submitFunction();
						return false;
					});
					$('#SubmitCreate').click(function(){
						submitFunction();
					});
				});
				function submitFunction()
				{
					$('#create_account_error').html('').hide();
					//send the ajax request to the server
					$.ajax({
						type: 'POST',
						url: baseUri,
						async: true,
						cache: false,
						dataType : "json",
						data: {
							controller: 'authentication',
							SubmitCreate: 1,
							ajax: true,
							email_create: $('#email_create').val(),
							token: token
						},
						success: function(jsonData)
						{
							if (jsonData.hasError)
							{
								var errors = '';
								for(error in jsonData.errors)
									//IE6 bug fix
									if(error != 'indexOf')
										errors += '<li>'+jsonData.errors[error]+'</li>';
								$('#create_account_error').html('<ol>'+errors+'</ol>').show();
							}
							else
							{
								// adding a div to display a transition
								$('#center_column').html('<div id="noSlide">'+$('#center_column').html()+'</div>');
								$('#noSlide').fadeOut('slow', function(){
									$('#noSlide').html(jsonData.page);
									// update the state (when this file is called from AJAX you still need to update the state)
									bindStateInputAndUpdate();
								});
								$('#noSlide').fadeIn('slow');
								document.location = '#account-creation';
							}
						},
						error: function(XMLHttpRequest, textStatus, errorThrown)
						{
							alert("TECHNICAL ERROR: unable to load form.\n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
						}
					});
				}
				
			</script>
		
			<div class="clearfix">
				<div class="bloc content-register">
					<h2>Première commande chez les Colis du Boucher ?</h2>
					<p>C'est le moment de <span class="bold">créer votre compte</span>.</p>
					<p>Vous bénéficierez ainsi de tous les avantages du village et gagnerez du temps lors de vos prochaines commandes sur le site.</p>
					<p>L'inscription est <span class="bold">simple, rapide et sans engagement de commande</span>.</p>
					<div class="register-button">
						<a href="#" class="red-button gradient">créer mon compte</a>
					</div>  
					<form action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('authentication',true);?>
" method="post" >
						<fieldset>
							<span><input type="text" id="email_create" name="email_create" value="<?php if (isset($_POST['email_create'])){?><?php echo stripslashes($_POST['email_create']);?>
<?php }?>" class="account_input" /></span>
							<?php if (isset($_smarty_tpl->tpl_vars['back']->value)){?><input type="hidden" class="hidden" name="back" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['back']->value, 'htmlall', 'UTF-8');?>
" /><?php }?>
							<input type="submit" value="<?php echo smartyTranslate(array('s'=>'Create your account'),$_smarty_tpl);?>
" />
							<input type="hidden" class="hidden" name="SubmitCreate" value="<?php echo smartyTranslate(array('s'=>'Create your account'),$_smarty_tpl);?>
" />
						</fieldset>
					</form>
				</div>
				<div class="bloc content-login">
					<h2>Vous avez déja commandé ou disposez d’un compte ?</h2>
					<form action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('authentication',true);?>
" method="post" >
						
						<label for="mail-address">Adresse e-mail</label>
						<input type="text" id="mail-address" name="email" value="<?php if (isset($_POST['email'])){?><?php echo stripslashes($_POST['email']);?>
<?php }?>" />
						<label for="password">Mot de passe</label>
						<input type="password" id="password" name="passwd" value="<?php if (isset($_POST['passwd'])){?><?php echo stripslashes($_POST['passwd']);?>
<?php }?>"/>
						<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('password');?>
" class="green-title" title="Mot de passe oublié ?">Mot de passe oublié ?</a>

						<label class="checkbox" for="remember-me"><input type="checkbox" id="remember-me" name="remember-me" />Se souvenir de moi lors des prochaines visites</label>

						<div class="login-button">
							<?php if (isset($_smarty_tpl->tpl_vars['back']->value)){?><input type="hidden" class="hidden" name="back" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['back']->value, 'htmlall', 'UTF-8');?>
" /><?php }?>
							<input type="submit" name="SubmitLogin" class="red-button gradient" value="me connecter" />
						</div>
					</form>
				</div>
			</div>
			
			<?php if (isset($_smarty_tpl->tpl_vars['inOrderProcess']->value)&&$_smarty_tpl->tpl_vars['inOrderProcess']->value&&$_smarty_tpl->tpl_vars['PS_GUEST_CHECKOUT_ENABLED']->value){?>
				<form action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('authentication',true,null,"back=".($_smarty_tpl->tpl_vars['back']->value));?>
" method="post" id="new_account_form" class="std clearfix">
					<fieldset>
						<h3><?php echo smartyTranslate(array('s'=>'Instant Checkout'),$_smarty_tpl);?>
</h3>
						<div id="opc_account_form" style="display: block; ">
							<!-- Account -->
							<p class="required text">
								<label for="guest_email"><?php echo smartyTranslate(array('s'=>'E-mail address'),$_smarty_tpl);?>
 <sup>*</sup></label>
								<input type="text" class="text" id="guest_email" name="guest_email" value="<?php if (isset($_POST['guest_email'])){?><?php echo $_POST['guest_email'];?>
<?php }?>">
							</p>
							<p class="radio required">
								<span><?php echo smartyTranslate(array('s'=>'Title'),$_smarty_tpl);?>
</span>
								<?php  $_smarty_tpl->tpl_vars['gender'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['gender']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['genders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['gender']->key => $_smarty_tpl->tpl_vars['gender']->value){
$_smarty_tpl->tpl_vars['gender']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['gender']->key;
?>
									<input type="radio" name="id_gender" id="id_gender<?php echo $_smarty_tpl->tpl_vars['gender']->value->id;?>
" value="<?php echo $_smarty_tpl->tpl_vars['gender']->value->id;?>
" <?php if (isset($_POST['id_gender'])&&$_POST['id_gender']==$_smarty_tpl->tpl_vars['gender']->value->id){?>checked="checked"<?php }?> />
									<label for="id_gender<?php echo $_smarty_tpl->tpl_vars['gender']->value->id;?>
" class="top"><?php echo $_smarty_tpl->tpl_vars['gender']->value->name;?>
</label>
								<?php } ?>
							</p>
							<p class="required text">
								<label for="firstname"><?php echo smartyTranslate(array('s'=>'First name'),$_smarty_tpl);?>
 <sup>*</sup></label>
								<input type="text" class="text" id="firstname" name="firstname" onblur="$('#customer_firstname').val($(this).val());" value="<?php if (isset($_POST['firstname'])){?><?php echo $_POST['firstname'];?>
<?php }?>">
								<input type="hidden" class="text" id="customer_firstname" name="customer_firstname" value="<?php if (isset($_POST['firstname'])){?><?php echo $_POST['firstname'];?>
<?php }?>">
							</p>
							<p class="required text">
								<label for="lastname"><?php echo smartyTranslate(array('s'=>'Last name'),$_smarty_tpl);?>
 <sup>*</sup></label>
								<input type="text" class="text" id="lastname" name="lastname" onblur="$('#customer_lastname').val($(this).val());" value="<?php if (isset($_POST['lastname'])){?><?php echo $_POST['lastname'];?>
<?php }?>">
								<input type="hidden" class="text" id="customer_lastname" name="customer_lastname" value="<?php if (isset($_POST['lastname'])){?><?php echo $_POST['lastname'];?>
<?php }?>">
							</p>
							<p class="select">
								<span><?php echo smartyTranslate(array('s'=>'Date of Birth'),$_smarty_tpl);?>
</span>
								<select id="days" name="days">
									<option value="">-</option>
									<?php  $_smarty_tpl->tpl_vars['day'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['day']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['days']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['day']->key => $_smarty_tpl->tpl_vars['day']->value){
$_smarty_tpl->tpl_vars['day']->_loop = true;
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['day']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['sl_day']->value==$_smarty_tpl->tpl_vars['day']->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['day']->value;?>
&nbsp;&nbsp;</option>
									<?php } ?>
								</select>
							
								<select id="months" name="months">
									<option value="">-</option>
									<?php  $_smarty_tpl->tpl_vars['month'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['month']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['months']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['month']->key => $_smarty_tpl->tpl_vars['month']->value){
$_smarty_tpl->tpl_vars['month']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['month']->key;
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['sl_month']->value==$_smarty_tpl->tpl_vars['k']->value)){?> selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>$_smarty_tpl->tpl_vars['month']->value),$_smarty_tpl);?>
&nbsp;</option>
									<?php } ?>
								</select>
								<select id="years" name="years">
									<option value="">-</option>
									<?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['year']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['years']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value){
$_smarty_tpl->tpl_vars['year']->_loop = true;
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['sl_year']->value==$_smarty_tpl->tpl_vars['year']->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
&nbsp;&nbsp;</option>
									<?php } ?>
								</select>
							</p>
							<?php if (isset($_smarty_tpl->tpl_vars['newsletter']->value)&&$_smarty_tpl->tpl_vars['newsletter']->value){?>
								<p class="checkbox">
									<input type="checkbox" name="newsletter" id="newsletter" value="1" <?php if (isset($_POST['newsletter'])&&$_POST['newsletter']=='1'){?>checked="checked"<?php }?>>
									<label for="newsletter"><?php echo smartyTranslate(array('s'=>'Sign up for our newsletter'),$_smarty_tpl);?>
</label>
								</p>
								<p class="checkbox">
									<input type="checkbox" name="optin" id="optin" value="1" <?php if (isset($_POST['optin'])&&$_POST['optin']=='1'){?>checked="checked"<?php }?>>
									<label for="optin"><?php echo smartyTranslate(array('s'=>'Receive special offers from our partners'),$_smarty_tpl);?>
</label>
								</p>
							<?php }?>
							<h3><?php echo smartyTranslate(array('s'=>'Delivery address'),$_smarty_tpl);?>
</h3>
							<?php  $_smarty_tpl->tpl_vars['field_name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_name']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dlv_all_fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_name']->key => $_smarty_tpl->tpl_vars['field_name']->value){
$_smarty_tpl->tpl_vars['field_name']->_loop = true;
?>
								<?php if ($_smarty_tpl->tpl_vars['field_name']->value=="company"){?>
									<p class="text">
										<label for="company"><?php echo smartyTranslate(array('s'=>'Company'),$_smarty_tpl);?>
</label>
										<input type="text" class="text" id="company" name="company" value="<?php if (isset($_POST['company'])){?><?php echo $_POST['company'];?>
<?php }?>" />
									</p>
									<?php }elseif($_smarty_tpl->tpl_vars['field_name']->value=="vat_number"){?>
									<div id="vat_number" style="display:none;">
										<p class="text">
											<label for="vat_number"><?php echo smartyTranslate(array('s'=>'VAT number'),$_smarty_tpl);?>
</label>
											<input type="text" class="text" name="vat_number" value="<?php if (isset($_POST['vat_number'])){?><?php echo $_POST['vat_number'];?>
<?php }?>" />
										</p>
									</div>
									<?php }elseif($_smarty_tpl->tpl_vars['field_name']->value=="address1"){?>
									<p class="required text">
										<label for="address1"><?php echo smartyTranslate(array('s'=>'Address'),$_smarty_tpl);?>
 <sup>*</sup></label>
										<input type="text" class="text" name="address1" id="address1" value="<?php if (isset($_POST['address1'])){?><?php echo $_POST['address1'];?>
<?php }?>">
									</p>
									<?php }elseif($_smarty_tpl->tpl_vars['field_name']->value=="postcode"){?>
									<p class="required postcode text">
										<label for="postcode"><?php echo smartyTranslate(array('s'=>'Zip / Postal Code'),$_smarty_tpl);?>
 <sup>*</sup></label>
										<input type="text" class="text" name="postcode" id="postcode" value="<?php if (isset($_POST['postcode'])){?><?php echo $_POST['postcode'];?>
<?php }?>" onblur="$('#postcode').val($('#postcode').val().toUpperCase());">
									</p>
									<?php }elseif($_smarty_tpl->tpl_vars['field_name']->value=="city"){?>
									<p class="required text">
										<label for="city"><?php echo smartyTranslate(array('s'=>'City'),$_smarty_tpl);?>
 <sup>*</sup></label>
										<input type="text" class="text" name="city" id="city" value="<?php if (isset($_POST['city'])){?><?php echo $_POST['city'];?>
<?php }?>">
									</p>
									<!--
										   if customer hasn't update his layout address, country has to be verified
										   but it's deprecated
									   -->
									<?php }elseif($_smarty_tpl->tpl_vars['field_name']->value=="Country:name"||$_smarty_tpl->tpl_vars['field_name']->value=="country"){?>
									<p class="required select">
										<label for="id_country"><?php echo smartyTranslate(array('s'=>'Country'),$_smarty_tpl);?>
 <sup>*</sup></label>
										<select name="id_country" id="id_country">
											<option value="">-</option>
											<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id_country'];?>
" <?php if (($_smarty_tpl->tpl_vars['sl_country']->value==$_smarty_tpl->tpl_vars['v']->value['id_country'])){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
											<?php } ?>
										</select>
									</p>
									<?php }elseif($_smarty_tpl->tpl_vars['field_name']->value=="State:name"){?>
									<?php $_smarty_tpl->tpl_vars['stateExist'] = new Smarty_variable(true, null, 0);?>

									<p class="required id_state select">
										<label for="id_state"><?php echo smartyTranslate(array('s'=>'State'),$_smarty_tpl);?>
 <sup>*</sup></label>
										<select name="id_state" id="id_state">
											<option value="">-</option>
										</select>
									</p>
									<?php }elseif($_smarty_tpl->tpl_vars['field_name']->value=="phone"){?>
									<p class="required text">
										<label for="phone"><?php echo smartyTranslate(array('s'=>'Phone'),$_smarty_tpl);?>
 <sup>*</sup></label>
										<input type="text" class="text" name="phone" id="phone" value="<?php if (isset($_POST['phone'])){?><?php echo $_POST['phone'];?>
<?php }?>">
									</p>
								<?php }?>
							<?php } ?>
							<?php if ($_smarty_tpl->tpl_vars['stateExist']->value==false){?>
								<p class="required id_state select">
									<label for="id_state"><?php echo smartyTranslate(array('s'=>'State'),$_smarty_tpl);?>
 <sup>*</sup></label>
									<select name="id_state" id="id_state">
										<option value="">-</option>
									</select>
								</p>
							<?php }?>
							<input type="hidden" name="alias" id="alias" value="<?php echo smartyTranslate(array('s'=>'My address'),$_smarty_tpl);?>
">
							<input type="hidden" name="is_new_customer" id="is_new_customer" value="0">
							<!-- END Account -->
						</div>
					</fieldset>
					<fieldset class="account_creation dni">
						<h3><?php echo smartyTranslate(array('s'=>'Tax identification'),$_smarty_tpl);?>
</h3>

						<p class="required text">
							<label for="dni"><?php echo smartyTranslate(array('s'=>'Identification number'),$_smarty_tpl);?>
</label>
							<input type="text" class="text" name="dni" id="dni" value="<?php if (isset($_POST['dni'])){?><?php echo $_POST['dni'];?>
<?php }?>" />
							<span class="form_info"><?php echo smartyTranslate(array('s'=>'DNI / NIF / NIE'),$_smarty_tpl);?>
</span>
						</p>
					</fieldset>
					<?php echo $_smarty_tpl->tpl_vars['HOOK_CREATE_ACCOUNT_FORM']->value;?>

					<p class="cart_navigation required submit">
						<span><sup>*</sup><?php echo smartyTranslate(array('s'=>'Required field'),$_smarty_tpl);?>
</span>
						<input type="hidden" name="display_guest_checkout" value="1" />
						<input type="submit" class="exclusive" name="submitGuestAccount" id="submitGuestAccount" value="<?php echo smartyTranslate(array('s'=>'Continue'),$_smarty_tpl);?>
">
					</p>
				</form>
			<?php }?>
		<?php }else{ ?>
			
			<div class="clearfix">
				<div class="bloc content-register-form">
					<h1>Création de compte</h1>
					<p>Inscrivez-vous grâce au formulaire ci-dessous pour pouvoir poursuivre votre commande. Les champs suivis d'un astérisque ( <span class="required">*</span> ) sont obligatoires.</p>
					<form action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('authentication',true);?>
" method="post" id="account-creation_form" class="std">
						<?php echo $_smarty_tpl->tpl_vars['HOOK_CREATE_ACCOUNT_TOP']->value;?>

						
						<div class="left-side">
							<label>Civilité <span class="required">*</span></label>
							<?php  $_smarty_tpl->tpl_vars['gender'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['gender']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['genders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['gender']->key => $_smarty_tpl->tpl_vars['gender']->value){
$_smarty_tpl->tpl_vars['gender']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['gender']->key;
?>
								<label class="radio" for="id_gender<?php echo $_smarty_tpl->tpl_vars['gender']->value->id;?>
">
									<input type="radio" name="id_gender" id="id_gender<?php echo $_smarty_tpl->tpl_vars['gender']->value->id;?>
" <?php if (isset($_POST['id_gender'])&&$_POST['id_gender']==$_smarty_tpl->tpl_vars['gender']->value->id){?>checked="checked"<?php }?> />
									<?php echo $_smarty_tpl->tpl_vars['gender']->value->name;?>

								</label>
							<?php } ?>
							<label for="nom">Nom <span class="required">*</span></label>
							<input type="text" id="customer_lastname" name="customer_lastname" value="<?php if (isset($_POST['customer_lastname'])){?><?php echo $_POST['customer_lastname'];?>
<?php }?>" />
							<label for="prenom">Prénom <span class="required">*</span></label>
							<input type="text" id="customer_firstname" name="customer_firstname" value="<?php if (isset($_POST['customer_firstname'])){?><?php echo $_POST['customer_firstname'];?>
<?php }?>" />
							<label for="prenom">Date de naissance <span class="required">*</span></label>
							<select id="days" name="days">
								<option value="">-</option>
								<?php  $_smarty_tpl->tpl_vars['day'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['day']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['days']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['day']->key => $_smarty_tpl->tpl_vars['day']->value){
$_smarty_tpl->tpl_vars['day']->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['day']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['sl_day']->value==$_smarty_tpl->tpl_vars['day']->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['day']->value;?>
&nbsp;&nbsp;</option>
								<?php } ?>
							</select>
							
							<select id="months" name="months">
								<option value="">-</option>
								<?php  $_smarty_tpl->tpl_vars['month'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['month']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['months']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['month']->key => $_smarty_tpl->tpl_vars['month']->value){
$_smarty_tpl->tpl_vars['month']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['month']->key;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['sl_month']->value==$_smarty_tpl->tpl_vars['k']->value)){?> selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>$_smarty_tpl->tpl_vars['month']->value),$_smarty_tpl);?>
&nbsp;</option>
								<?php } ?>
							</select>
							<select id="years" name="years">
								<option value="">-</option>
								<?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['year']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['years']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value){
$_smarty_tpl->tpl_vars['year']->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['sl_year']->value==$_smarty_tpl->tpl_vars['year']->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
&nbsp;&nbsp;</option>
								<?php } ?>
							</select>
							<label for="adresse">Adresse <span class="required">*</span></label>
							<input type="text" id="adresse" name="adresse" />
							<label for="adresseplus">Complément d'adresse</label>
							<input type="text" id="adresseplus" name="adresseplus" />
							<label for="codepostal">Code postal <span class="required">*</span></label>
							<input type="text" id="codepostal" name="codepostal" />
							<label for="ville">Ville <span class="required">*</span></label>
							<input type="text" id="ville" name="ville" />
							<p>Veuillez saisir au moins un numéro de téléphone<span class="required">*</span></p>
							<label for="telfixe">Téléphone fixe</label>
							<input type="text" id="telfixe" name="telfixe" />
							<label for="portable">Téléphone portable</label>
							<input type="text" id="portable" name="portable" />
						</div>
						
						<div class="right-side">
							<label for="email">Adresse e-mail <span class="required">*</span></label>
							<input type="text" id="email" name="email" value="<?php if (isset($_POST['email'])){?><?php echo $_POST['email'];?>
<?php }?>"id="email" name="email" />
							<label for="emailconf">Confirmez votre adresse e-mail <span class="required">*</span></label>
							<input type="text" id="emailconf" name="emailconf" />
							<label for="password">Mot de passe <span class="required">*</span></label>
							<input type="password" name="passwd" id="passwd" />
							<label for="passwordconf">Confirmez votre mot de passe <span class="required">*</span></label>
							<input type="password" id="passwordconf" name="passwordconf" />
							
							<label id="come-from-ce">Venez-vous de la part d'un comité d'entreprise/groupement ?</label>
							<label class="radio" for="ce-oui" id="ce-more"><input type="radio" name="ce" id="ce-oui" />Oui</label>
							<label class="radio" for="ce-non" id="ce-less"><input type="radio" name="ce" id="ce-non" />Non</label>
							<div id="from-ce">
								<label for="entreprise">De quel entreprise/groupement ? <span class="required">*</span></label>
								<select id="entreprise" name="entreprise" disabled>
									<option>Fondation pour la Nature et l'Homme</option>
									<option>Fondation pour la Nature et l'Homme</option>
									<option>Fondation pour la Nature et l'Homme</option>
									<option>Fondation pour la Nature et l'Homme</option>
								</select>
							</div>
							
							<label for="parrain">Si vous avez été parrainé, veuillez saisir l'e-mail de votre parrain</label>
							<input type="text" id="parrain" name="parrain" />
							
							<?php if ($_smarty_tpl->tpl_vars['newsletter']->value){?>
								<p class="checkbox" >
									<input type="checkbox" name="newsletter" id="newsletter" value="1" <?php if (isset($_POST['newsletter'])&&$_POST['newsletter']==1){?> checked="checked"<?php }?> />
									<label for="newsletter"><?php echo smartyTranslate(array('s'=>'Sign up for our newsletter'),$_smarty_tpl);?>
</label>
								</p>
								
								<label>J'accepte de recevoir par e-mail des offres, anecdotes de la part des Colis du Boucher <span class="required">*</span></label>
								<p class="annotation">Les informations vous concernant ne seront jamais vendues, louées ou cédées à des tiers.</p>
								<label class="radio" for="newsletter-oui"><input type="radio" name="newsletter" id="newsletter-oui" checked />Oui</label>
								<label class="radio" for="newsletter-non"><input type="radio" name="newsletter" id="newsletter-non" />Non</label>
							<?php }?>
							
							<label class="checkbox" for="cgu"><input type="checkbox" id="cgu" name="cgu" />J'accepte les <a href="#">conditions générales d'utilisation</a> des Colis du Boucher <span class="required">*</span></label>
							
							<div class="register-button">
								<input type="hidden" name="email_create" value="1" />
								<input type="hidden" name="is_new_customer" value="1" />
								<?php if (isset($_smarty_tpl->tpl_vars['back']->value)){?><input type="hidden" class="hidden" name="back" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['back']->value, 'htmlall', 'UTF-8');?>
" /><?php }?>
								<input type="submit" class="red-button gradient" value="m'inscrire" name="submitAccount" id="submitAccount" />
							</div>  
						</div>
						
						<?php if (isset($_smarty_tpl->tpl_vars['PS_REGISTRATION_PROCESS_TYPE']->value)&&$_smarty_tpl->tpl_vars['PS_REGISTRATION_PROCESS_TYPE']->value){?>
							<fieldset class="account_creation">
								<h3><?php echo smartyTranslate(array('s'=>'Your address'),$_smarty_tpl);?>
</h3>
								<?php  $_smarty_tpl->tpl_vars['field_name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_name']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dlv_all_fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_name']->key => $_smarty_tpl->tpl_vars['field_name']->value){
$_smarty_tpl->tpl_vars['field_name']->_loop = true;
?>
									<?php if ($_smarty_tpl->tpl_vars['field_name']->value=="company"){?>
										<p class="text">
											<label for="company"><?php echo smartyTranslate(array('s'=>'Company'),$_smarty_tpl);?>
</label>
											<input type="text" class="text" id="company" name="company" value="<?php if (isset($_POST['company'])){?><?php echo $_POST['company'];?>
<?php }?>" />
										</p>
									<?php }elseif($_smarty_tpl->tpl_vars['field_name']->value=="vat_number"){?>
										<div id="vat_number" style="display:none;">
											<p class="text">
												<label for="vat_number"><?php echo smartyTranslate(array('s'=>'VAT number'),$_smarty_tpl);?>
</label>
												<input type="text" class="text" name="vat_number" value="<?php if (isset($_POST['vat_number'])){?><?php echo $_POST['vat_number'];?>
<?php }?>" />
											</p>
										</div>
									<?php }elseif($_smarty_tpl->tpl_vars['field_name']->value=="firstname"){?>
										<p class="required text">
											<label for="firstname"><?php echo smartyTranslate(array('s'=>'First name'),$_smarty_tpl);?>
 <sup>*</sup></label>
											<input type="text" class="text" id="firstname" name="firstname" value="<?php if (isset($_POST['firstname'])){?><?php echo $_POST['firstname'];?>
<?php }?>" />
										</p>
									<?php }elseif($_smarty_tpl->tpl_vars['field_name']->value=="lastname"){?>
										<p class="required text">
											<label for="lastname"><?php echo smartyTranslate(array('s'=>'Last name'),$_smarty_tpl);?>
 <sup>*</sup></label>
											<input type="text" class="text" id="lastname" name="lastname" value="<?php if (isset($_POST['lastname'])){?><?php echo $_POST['lastname'];?>
<?php }?>" />
										</p>
									<?php }elseif($_smarty_tpl->tpl_vars['field_name']->value=="address1"){?>
										<p class="required text">
											<label for="address1"><?php echo smartyTranslate(array('s'=>'Address'),$_smarty_tpl);?>
 <sup>*</sup></label>
											<input type="text" class="text" name="address1" id="address1" value="<?php if (isset($_POST['address1'])){?><?php echo $_POST['address1'];?>
<?php }?>" />
											<span class="inline-infos"><?php echo smartyTranslate(array('s'=>'Street address, P.O. box, company name, c/o'),$_smarty_tpl);?>
</span>
										</p>
									<?php }elseif($_smarty_tpl->tpl_vars['field_name']->value=="address2"){?>
										<p class="text">
											<label for="address2"><?php echo smartyTranslate(array('s'=>'Address (Line 2)'),$_smarty_tpl);?>
</label>
											<input type="text" class="text" name="address2" id="address2" value="<?php if (isset($_POST['address2'])){?><?php echo $_POST['address2'];?>
<?php }?>" />
											<span class="inline-infos"><?php echo smartyTranslate(array('s'=>'Apartment, suite, unit, building, floor, etc.'),$_smarty_tpl);?>
</span>
										</p>
									<?php }elseif($_smarty_tpl->tpl_vars['field_name']->value=="postcode"){?>
										<p class="required postcode text">
											<label for="postcode"><?php echo smartyTranslate(array('s'=>'Zip / Postal Code'),$_smarty_tpl);?>
 <sup>*</sup></label>
											<input type="text" class="text" name="postcode" id="postcode" value="<?php if (isset($_POST['postcode'])){?><?php echo $_POST['postcode'];?>
<?php }?>" onkeyup="$('#postcode').val($('#postcode').val().toUpperCase());" />
										</p>
									<?php }elseif($_smarty_tpl->tpl_vars['field_name']->value=="city"){?>
										<p class="required text">
											<label for="city"><?php echo smartyTranslate(array('s'=>'City'),$_smarty_tpl);?>
 <sup>*</sup></label>
											<input type="text" class="text" name="city" id="city" value="<?php if (isset($_POST['city'])){?><?php echo $_POST['city'];?>
<?php }?>" />
										</p>
										<!--
											if customer hasn't update his layout address, country has to be verified
											but it's deprecated
										-->
									<?php }elseif($_smarty_tpl->tpl_vars['field_name']->value=="Country:name"||$_smarty_tpl->tpl_vars['field_name']->value=="country"){?>
										<p class="required select">
											<label for="id_country"><?php echo smartyTranslate(array('s'=>'Country'),$_smarty_tpl);?>
 <sup>*</sup></label>
											<select name="id_country" id="id_country">
												<option value="">-</option>
												<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id_country'];?>
" <?php if (($_smarty_tpl->tpl_vars['sl_country']->value==$_smarty_tpl->tpl_vars['v']->value['id_country'])){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
												<?php } ?>
											</select>
										</p>
									<?php }elseif($_smarty_tpl->tpl_vars['field_name']->value=="State:name"||$_smarty_tpl->tpl_vars['field_name']->value=='state'){?>
										<?php $_smarty_tpl->tpl_vars['stateExist'] = new Smarty_variable(true, null, 0);?>
										<p class="required id_state select">
											<label for="id_state"><?php echo smartyTranslate(array('s'=>'State'),$_smarty_tpl);?>
 <sup>*</sup></label>
											<select name="id_state" id="id_state">
												<option value="">-</option>
											</select>
										</p>
									<?php }?>
								<?php } ?>
								<?php if ($_smarty_tpl->tpl_vars['stateExist']->value==false){?>
									<p class="required id_state select">
										<label for="id_state"><?php echo smartyTranslate(array('s'=>'State'),$_smarty_tpl);?>
 <sup>*</sup></label>
										<select name="id_state" id="id_state">
											<option value="">-</option>
										</select>
									</p>
								<?php }?>
								<p class="textarea">
									<label for="other"><?php echo smartyTranslate(array('s'=>'Additional information'),$_smarty_tpl);?>
</label>
									<textarea name="other" id="other" cols="26" rows="3"><?php if (isset($_POST['other'])){?><?php echo $_POST['other'];?>
<?php }?></textarea>
								</p>
								<?php if ($_smarty_tpl->tpl_vars['one_phone_at_least']->value){?>
									<p class="inline-infos"><?php echo smartyTranslate(array('s'=>'You must register at least one phone number'),$_smarty_tpl);?>
</p>
								<?php }?>
								<p class="text">
									<label for="phone"><?php echo smartyTranslate(array('s'=>'Home phone'),$_smarty_tpl);?>
</label>
									<input type="text" class="text" name="phone" id="phone" value="<?php if (isset($_POST['phone'])){?><?php echo $_POST['phone'];?>
<?php }?>" />
								</p>
								<p class="text">
									<label for="phone_mobile"><?php echo smartyTranslate(array('s'=>'Mobile phone'),$_smarty_tpl);?>
 <?php if ($_smarty_tpl->tpl_vars['one_phone_at_least']->value){?><sup>*</sup><?php }?></label>
									<input type="text" class="text" name="phone_mobile" id="phone_mobile" value="<?php if (isset($_POST['phone_mobile'])){?><?php echo $_POST['phone_mobile'];?>
<?php }?>" />
								</p>
								<p class="required text" id="address_alias">
									<label for="alias"><?php echo smartyTranslate(array('s'=>'Assign an address alias for future reference'),$_smarty_tpl);?>
 <sup>*</sup></label>
									<input type="text" class="text" name="alias" id="alias" value="<?php if (isset($_POST['alias'])){?><?php echo $_POST['alias'];?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'My address'),$_smarty_tpl);?>
<?php }?>" />
								</p>
							</fieldset>
							<fieldset class="account_creation dni">
								<h3><?php echo smartyTranslate(array('s'=>'Tax identification'),$_smarty_tpl);?>
</h3>
								<p class="required text">
									<label for="dni"><?php echo smartyTranslate(array('s'=>'Identification number'),$_smarty_tpl);?>
</label>
									<input type="text" class="text" name="dni" id="dni" value="<?php if (isset($_POST['dni'])){?><?php echo $_POST['dni'];?>
<?php }?>" />
									<span class="form_info"><?php echo smartyTranslate(array('s'=>'DNI / NIF / NIE'),$_smarty_tpl);?>
</span>
								</p>
							</fieldset>
						<?php }?>
						
						<?php echo $_smarty_tpl->tpl_vars['HOOK_CREATE_ACCOUNT_FORM']->value;?>

						
					</form>
					
					<p class="required-fields"><span class="required">*</span> Champs obligatoires</p>
					<p class="cnil">Les Colis du Boucher s'engagent à protéger les données qui vous concernent. Conformément à la loi « informatique et libertés » du 06/01/1978, modifiée par la loi du 6 août 2004, le traitement de ces informations nominatives a fait l'objet de la part de lescolisduboucher.com d'une déclaration auprès de la Commission Nationale de l'Informatique et des Libertés (CNIL).</p>
					<p class="cnil">Conformément à l'article 34 de cette même loi, vous disposez d'un droit d'accès, de modification, de rectification et de suppression des données qui vous concernent. Vous pourrez modifier vos informations personnelles directement dans la rubrique « Mon Compte » du site et pourrez supprimer vos données personnelles par email ou courrier en indiquant vos nom, prénom, adresse et email ayant servi à votre enregistrement sur le site lescolisduboucher.com.</p>
				</div>
			</div>
		<?php }?>
		
		
	</div>
</div><?php }} ?>