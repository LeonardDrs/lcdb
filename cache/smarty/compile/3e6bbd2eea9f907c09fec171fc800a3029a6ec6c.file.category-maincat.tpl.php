<?php /* Smarty version Smarty-3.1.8, created on 2013-04-02 15:07:20
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/category-maincat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2107140015515ad8087d7075-45203138%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e6bbd2eea9f907c09fec171fc800a3029a6ec6c' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/category-maincat.tpl',
      1 => 1364907663,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2107140015515ad8087d7075-45203138',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'categoryNameComplement' => 0,
    'products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515ad808858979_34323391',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515ad808858979_34323391')) {function content_515ad808858979_34323391($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
?>		<div class="big-bloc">
			<div class="title_list_product">
				<span id="big_cow"></span>
				<h1>
					<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['category']->value->name, 'htmlall', 'UTF-8');?>
<?php if (isset($_smarty_tpl->tpl_vars['categoryNameComplement']->value)){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['categoryNameComplement']->value, 'htmlall', 'UTF-8');?>
<?php }?>
				</h1>
				<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				<?php if (isset($_smarty_tpl->tpl_vars['category']->value->description)){?>
					<p><?php echo $_smarty_tpl->tpl_vars['category']->value->description;?>
</p>
				<?php }?>
			</div>
			<div class="block-sort">
				<?php echo $_smarty_tpl->getSubTemplate ("./product-sort.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				<span>Trier par: </span>
				<form id="form-sort" method="post">
					<select name="sort" id="sort">
						<option value="ordre_alphabetique">Ordre Alphabétique...</option>
					</select>
				</form>
			</div>
			<div class="list-product">
				<div class="grill category">
					<div class="category-title">
						<span id="big_stove"></span>
						<h2>Les viande de Boeuf à griller</h2>
					</div>
					<?php if ($_smarty_tpl->tpl_vars['products']->value){?>
						<?php echo $_smarty_tpl->getSubTemplate ("./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('products'=>$_smarty_tpl->tpl_vars['products']->value), 0);?>

					<?php }?>
					<div class="block-product" itemscope itemtype="http://schema.org/Product">
						<div class="infos">
							<div class="identification-description">
								<div class="identification label-bio label">
									<h3 itemprop="name">Titre produit en taille 15 = 43 caractères</h3>
									<p itemprop="description">2 pièces de 160 - 180g</p>
								</div>
							</div>
							<div class="detail">
								<span class="person">x2</span>
								<span class="preservation">10j</span>
							</div>
							<div class="price" itemscope itemtype="http://schema.org/Offer">
								<div class="selling_price">
									<p class="price-piece" itemprop="price">8 €</p>
									<p class="price-kg">25,62€/kg</p>
								</div>
							</div>
						</div>
						<div class="action-product">
							<a href="#" class="Voir ce produit">Voir ce produit</a>
							<form class="form-panier" method="get">
								<button class="moreless minus" name="minus" type="button">-</button>
								<input class="quantity" type="text" disabled="" name="quantity" value="0" maxlength="2">
								<button class="moreless plus" name="plus" type="button">+</button>
								<input type="hidden" name="product-name" value="Titre produit en taille 15 = 43 caractères" />
								<input type="hidden" name="product-price" value="8" />
								<button class="ajout-panier" name="submit" type="submit">Ajouter au panier</button>
							</form>
						</div>
					</div>
					<div class="block-product" itemscope itemtype="http://schema.org/Product">
						<div class="infos">
							<div class="identification-description">
								<div class="identification label-rouge label">
									<h3 itemprop="name">Titre produit en taille 15 = 43 caractères</h3>
									<p itemprop="description">2 pièces de 160 - 180g de viande moelleuse et tendre à souhait </p>
								</div>
								<p class="warning" itemscope itemtype="http://schema.org/Offer">
									Plus que 5 produits restants. Livrable jusqu'au <span itemprop="availabilityEnds">30/04/2013</span>
								</p>
							</div>
							<div class="detail">
								<span class="person">x2</span>
								<span class="preservation">10j</span>
							</div>
							<div class="price" itemscope itemtype="http://schema.org/Offer">
								<div class="selling_price">
									<p class="price-piece" itemprop="price">8 €</p>
									<p class="price-kg">25,62€/kg</p>
								</div>
							</div>
						</div>
						<div class="action-product">
							<a href="#" class="Voir ce produit">Voir ce produit</a>
							<form class="form-panier" method="get">
								<button class="moreless minus" name="minus" type="button">-</button>
								<input class="quantity" type="text" disabled="" name="quantity" value="0" maxlength="2">
								<button class="moreless plus" name="plus" type="button">+</button>
								<input type="hidden" name="product-name" value="Titre produit en taille 15 = 43 caractères" />
								<input type="hidden" name="product-price" value="8" />
								<button class="ajout-panier" name="submit" type="submit">Ajouter au panier</button>
							</form>
						</div>
					</div>
					<div class="block-product" itemscope itemtype="http://schema.org/Product">
						<div class="infos">
							<div class="identification-description">
								<div class="identification label-rouge label">
									<h3 itemprop="name">Titre produit en taille 15 = 43 caractères</h3>
									<p itemprop="description">2 pièces de 160 - 180g</p>
								</div>
								<p class="warning" itemscope itemtype="http://schema.org/Offer">
									Plus que 5 produits restants. Livrable jusqu'au <span itemprop="availabilityEnds">30/04/2013</span>
								</p>
							</div>
							<div class="detail">
								<span class="person">x2</span>
								<span class="preservation">10j</span>
							</div>
							<div class="price reduction" itemscope itemtype="http://schema.org/Offer">
								<p class="reduction_rate">-20%</p>
								<div class="full_price">
									<p class="price-piece"><span>10 €</span></p>
									<p class="price-kg"><span>26,62€/kg</span></p>
								</div>
								<div class="selling_price">
									<p class="price-piece" itemprop="price">8 €</p>
									<p class="price-kg">25,62€/kg</p>
								</div>
							</div>
						</div>
						<div class="action-product">
							<a href="#" class="Voir ce produit">Voir ce produit</a>
							<form class="form-panier" method="get">
								<button class="moreless minus" name="minus" type="button">-</button>
								<input class="quantity" type="text" disabled="" name="quantity" value="0" maxlength="2">
								<button class="moreless plus" name="plus" type="button">+</button>
								<input type="hidden" name="product-name" value="Titre produit en taille 15 = 43 caractères" />
								<input type="hidden" name="product-price" value="8" />
								<button class="ajout-panier" name="submit" type="submit">Ajouter au panier</button>
							</form>
						</div>
					</div>
					<div class="block-product" itemscope itemtype="http://schema.org/Product">
						<div class="infos">
							<div class="identification-description">
								<div class="identification label-rouge label">
									<h3 itemprop="name">Titre produit en taille 15 = 43 caractères</h3>
									<p itemprop="description">2 pièces de 160 - 180g</p>
								</div>
								<p class="warning" itemscope itemtype="http://schema.org/Offer">
									Plus que 5 produits restants. Livrable jusqu'au <span itemprop="availabilityEnds">30/04/2013</span>
								</p>
							</div>
							<div class="detail">
								<span class="person">x2</span>
								<span class="preservation">10j</span>
							</div>
							<div class="price" itemscope itemtype="http://schema.org/Offer">
								<div class="selling_price">
									<p class="price-piece" itemprop="price">8 €</p>
									<p class="price-kg">25,62€/kg</p>
								</div>
							</div>
						</div>
						<div class="action-product">
							<a href="#" class="Voir ce produit">Voir ce produit</a>
							<form class="form-panier" method="get">
								<button class="moreless minus" name="minus" type="button">-</button>
								<input class="quantity" type="text" disabled="" name="quantity" value="0" maxlength="2">
								<button class="moreless plus" name="plus" type="button">+</button>
								<input type="hidden" name="product-name" value="Titre produit en taille 15 = 43 caractères" />
								<input type="hidden" name="product-price" value="8" />
								<button class="ajout-panier" name="submit" type="submit">Ajouter au panier</button>
							</form>
						</div>
					</div>
				</div>
				<div class="simmer category">
					<div class="category-title">
						<span id="pot"></span>
						<h2>Les viande de Boeuf à mijoter</h2>
					</div>
					<div class="block-product" itemscope itemtype="http://schema.org/Product">
						<div class="infos">
							<div class="identification-description">
								<div class="identification label-rouge label">
									<h3 itemprop="name">Titre produit en taille 15 = 43 caractères</h3>
									<p itemprop="description">2 pièces de 160 - 180g</p>
								</div>
							</div>
							<div class="detail">
								<span class="person">x2</span>
								<span class="preservation">10j</span>
							</div>
							<div class="price" itemscope itemtype="http://schema.org/Offer">
								<div class="selling_price">
									<p class="price-piece" itemprop="price">8 €</p>
									<p class="price-kg">25,62€/kg</p>
								</div>
							</div>
						</div>
						<div class="action-product">
							<a href="#" class="Voir ce produit">Voir ce produit</a>
							<form class="form-panier" method="get">
								<button class="moreless minus" name="minus" type="button">-</button>
								<input class="quantity" type="text" disabled="" name="quantity" value="0" maxlength="2">
								<button class="moreless plus" name="plus" type="button">+</button>
								<input type="hidden" name="product-name" value="Titre produit en taille 15 = 43 caractères" />
								<input type="hidden" name="product-price" value="8" />
								<button class="ajout-panier" name="submit" type="submit">Ajouter au panier</button>
							</form>
						</div>
					</div>
					<div class="block-product" itemscope itemtype="http://schema.org/Product">
						<div class="infos">
							<div class="identification-description">
								<div class="identification label-rouge label">
									<h3 itemprop="name">Titre produit en taille 15 = 43 caractères</h3>
									<p itemprop="description">2 pièces de 160 - 180g</p>
								</div>
								<p class="warning" itemscope itemtype="http://schema.org/Offer">
									Plus que 5 produits restants. Livrable jusqu'au <span itemprop="availabilityEnds">30/04/2013</span>
								</p>
							</div>
							<div class="detail">
								<span class="person">x2</span>
								<span class="preservation">10j</span>
							</div>
							<div class="price" itemscope itemtype="http://schema.org/Offer">
								<div class="selling_price">
									<p class="price-piece" itemprop="price">8 €</p>
									<p class="price-kg">25,62€/kg</p>
								</div>
							</div>
						</div>
						<div class="action-product">
							<a href="#" class="Voir ce produit">Voir ce produit</a>
							<form class="form-panier" method="get">
								<button class="moreless minus" name="minus" type="button">-</button>
								<input class="quantity" type="text" disabled="" name="quantity" value="0" maxlength="2">
								<button class="moreless plus" name="plus" type="button">+</button>
								<input type="hidden" name="product-name" value="Titre produit en taille 15 = 43 caractères" />
								<input type="hidden" name="product-price" value="8" />
								<button class="ajout-panier" name="submit" type="submit">Ajouter au panier</button>
							</form>
						</div>
					</div>
					<div class="block-product" itemscope itemtype="http://schema.org/Product">
						<div class="infos">
							<div class="identification-description">
								<div class="identification label-rouge label">
									<h3 itemprop="name">Titre produit en taille 15 = 43 caractères</h3>
									<p itemprop="description">2 pièces de 160 - 180g</p>
								</div>
								<p class="warning" itemscope itemtype="http://schema.org/Offer">
									Plus que 5 produits restants. Livrable jusqu'au <span itemprop="availabilityEnds">30/04/2013</span>
								</p>
							</div>
							<div class="detail">
								<span class="person">x2</span>
								<span class="preservation">10j</span>
							</div>
							<div class="price reduction" itemscope itemtype="http://schema.org/Offer">
								<p class="reduction_rate">-100%</p>
								<div class="full_price">
									<p class="price-piece"><span>10 €</span></p>
									<p class="price-kg"><span>26,62€/kg</span></p>
								</div>
								<div class="selling_price">
									<p class="price-piece" itemprop="price">8 €</p>
									<p class="price-kg">25,62€/kg</p>
								</div>
							</div>
						</div>
						<div class="action-product">
							<a href="#" class="Voir ce produit">Voir ce produit</a>
							<form class="form-panier" method="get">
								<button class="moreless minus" name="minus" type="button">-</button>
								<input class="quantity" type="text" disabled="" name="quantity" value="0" maxlength="2">
								<button class="moreless plus" name="plus" type="button">+</button>
								<input type="hidden" name="product-name" value="Titre produit en taille 15 = 43 caractères" />
								<input type="hidden" name="product-price" value="8" />
								<button class="ajout-panier" name="submit" type="submit">Ajouter au panier</button>
							</form>
						</div>
					</div>
					<div class="block-product" itemscope itemtype="http://schema.org/Product">
						<div class="infos">
							<div class="identification-description">
								<div class="identification label-rouge label">
									<h3 itemprop="name">Titre produit en taille 15 = 43 caractères</h3>
									<p itemprop="description">2 pièces de 160 - 180g</p>
								</div>
								<p class="warning" itemscope itemtype="http://schema.org/Offer">
									Plus que 5 produits restants. Livrable jusqu'au <span itemprop="availabilityEnds">30/04/2013</span>
								</p>
							</div>
							<div class="detail">
								<span class="person">x2</span>
								<span class="preservation">10j</span>
							</div>
							<div class="price" itemscope itemtype="http://schema.org/Offer">
								<div class="selling_price">
									<p class="price-piece" itemprop="price">8 €</p>
									<p class="price-kg">25,62€/kg</p>
								</div>
							</div>
						</div>
						<div class="action-product">
							<a href="#" class="Voir ce produit">Voir ce produit</a>
							<form class="form-panier" method="get">
								<button class="moreless minus" name="minus" type="button">-</button>
								<input class="quantity" type="text" disabled="" name="quantity" value="0" maxlength="2">
								<button class="moreless plus" name="plus" type="button">+</button>
								<input type="hidden" name="product-name" value="Titre produit en taille 15 = 43 caractères" />
								<input type="hidden" name="product-price" value="8" />
								<button class="ajout-panier" name="submit" type="submit">Ajouter au panier</button>
							</form>
						</div>
					</div>
				</div>
				<div class="roast category">
					<div class="category-title">
						<span id="oven"></span>
						<h2>Les viande de Boeuf à rôtir</h2>
					</div>
					<div class="block-product" itemscope itemtype="http://schema.org/Product">
						<div class="infos">
							<div class="identification-description">
								<div class="identification label-rouge label">
									<h3 itemprop="name">Titre produit en taille 15 = 43 caractères</h3>
									<p itemprop="description">2 pièces de 160 - 180g</p>
								</div>
							</div>
							<div class="detail">
								<span class="person">x2</span>
								<span class="preservation">10j</span>
							</div>
							<div class="price" itemscope itemtype="http://schema.org/Offer">
								<div class="selling_price">
									<p class="price-piece" itemprop="price">8 €</p>
									<p class="price-kg">25,62€/kg</p>
								</div>
							</div>
						</div>
						<div class="action-product">
							<a href="#" class="Voir ce produit">Voir ce produit</a>
							<form class="form-panier" method="get">
								<button class="moreless minus" name="minus" type="button">-</button>
								<input class="quantity" type="text" disabled="" name="quantity" value="0" maxlength="2">
								<button class="moreless plus" name="plus" type="button">+</button>
								<input type="hidden" name="product-name" value="Titre produit en taille 15 = 43 caractères" />
								<input type="hidden" name="product-price" value="8" />
								<button class="ajout-panier" name="submit" type="submit">Ajouter au panier</button>
							</form>
						</div>
					</div>
					<div class="block-product" itemscope itemtype="http://schema.org/Product">
						<div class="infos">
							<div class="identification-description">
								<div class="identification label-rouge label">
									<h3 itemprop="name">Titre produit en taille 15 = 43 caractères</h3>
									<p itemprop="description">2 pièces de 160 - 180g</p>
								</div>
								<p class="warning" itemscope itemtype="http://schema.org/Offer">
									Plus que 5 produits restants. Livrable jusqu'au <span itemprop="availabilityEnds">30/04/2013</span>
								</p>
							</div>
							<div class="detail">
								<span class="person">x2</span>
								<span class="preservation">10j</span>
							</div>
							<div class="price" itemscope itemtype="http://schema.org/Offer">
								<div class="selling_price">
									<p class="price-piece" itemprop="price">8 €</p>
									<p class="price-kg">25,62€/kg</p>
								</div>
							</div>
						</div>
						<div class="action-product">
							<a href="#" class="Voir ce produit">Voir ce produit</a>
							<form class="form-panier" method="get">
								<button class="moreless minus" name="minus" type="button">-</button>
								<input class="quantity" type="text" disabled="" name="quantity" value="0" maxlength="2">
								<button class="moreless plus" name="plus" type="button">+</button>
								<input type="hidden" name="product-name" value="Titre produit en taille 15 = 43 caractères" />
								<input type="hidden" name="product-price" value="8" />
								<button class="ajout-panier" name="submit" type="submit">Ajouter au panier</button>
							</form>
						</div>
					</div>
					<div class="block-product" itemscope itemtype="http://schema.org/Product">
						<div class="infos">
							<div class="identification-description">
								<div class="identification label-rouge label">
									<h3 itemprop="name">Titre produit en taille 15 = 43 caractères</h3>
									<p itemprop="description">2 pièces de 160 - 180g</p>
								</div>
								<p class="warning" itemscope itemtype="http://schema.org/Offer">
									Plus que 5 produits restants. Livrable jusqu'au <span itemprop="availabilityEnds">30/04/2013</span>
								</p>
							</div>
							<div class="detail">
								<span class="person">x2</span>
								<span class="preservation">10j</span>
							</div>
							<div class="price reduction" itemscope itemtype="http://schema.org/Offer">
								<p class="reduction_rate">-20%</p>
								<div class="full_price">
									<p class="price-piece"><span>10 €</span></p>
									<p class="price-kg"><span>26,62€/kg</span></p>
								</div>
								<div class="selling_price">
									<p class="price-piece" itemprop="price">8 €</p>
									<p class="price-kg">25,62€/kg</p>
								</div>
							</div>
						</div>
						<div class="action-product">
							<a href="#" class="Voir ce produit">Voir ce produit</a>
							<form class="form-panier" method="get">
								<button class="moreless minus" name="minus" type="button">-</button>
								<input class="quantity" type="text" disabled="" name="quantity" value="0" maxlength="2">
								<button class="moreless plus" name="plus" type="button">+</button>
								<input type="hidden" name="product-name" value="Titre produit en taille 15 = 43 caractères" />
								<input type="hidden" name="product-price" value="8" />
								<button class="ajout-panier" name="submit" type="submit">Ajouter au panier</button>
							</form>
						</div>
					</div>
				</div>
				<div class="more-product">
					<p class="blod">Vous chercher un produit particulier que nous ne proposons pas ?</p>
					<p>
						<a href="#" title="Contactez-nous !">Contactez-nous !</a>
						Nos éleveurs ont sûrement ce dont vous avez besoin.
					</p>
				</div>
			</div>
		</div><?php }} ?>