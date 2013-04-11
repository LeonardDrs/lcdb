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
				</div>
				<div class="simmer category">
					<div class="category-title">
						<span id="pot"></span>
						<h2>Les viande de Boeuf à mijoter</h2>
					</div>
					{if $products}
						{include file="./product-list.tpl" products=$products}
					{/if}
				</div>
				<div class="roast category">
					<div class="category-title">
						<span id="oven"></span>
						<h2>Les viande de Boeuf à rôtir</h2>
					</div>
					{if $products}
						{include file="./product-list.tpl" products=$products}
					{/if}
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