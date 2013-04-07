		<div class="big-bloc">
			<div class="title_list_product">
				<span id="big_cow"></span>
				<h1>
					{strip}
						{$category->name|escape:'htmlall':'UTF-8'}
						{if isset($categoryNameComplement)}
							{$categoryNameComplement|escape:'htmlall':'UTF-8'}
						{/if}
					{/strip}
				</h1>
				{include file="$tpl_dir./errors.tpl"}
				{if isset($category->description)}
					<p>{$category->description}</p>
				{/if}
			</div>
			<div class="block-sort">
				{include file="./product-sort.tpl"}
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
					{if $products}
						{include file="./product-list.tpl" products=$products}
					{/if}
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
		</div>