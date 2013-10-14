		<div class="big-bloc">
			<div class="title_list_product">
				{if $category->level_depth == 3}
					{assign var=logo value="big_{$category->link_rewrite}"}
				{elseif ( $category->level_depth == 4)}
					{assign var=logo value="big_boeuf"}
				{/if}
				<span class="big_image" id="{$logo}"></span>
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
			{include file="./product-sort.tpl"}
			<div class="list-product">
				<div class="category">
					{if $products}
						{include file="./product-list.tpl" products=$products}
					{/if}
				</div>
				<div class="more-product">
					<p class="blod">Vous chercher un produit particulier que nous ne proposons pas ?</p>
					<p>
						<a href="{$link->getPageLink('contact', true)}" title="Contactez-nous !">Contactez-nous !</a>
						Nos éleveurs ont sûrement ce dont vous avez besoin.
					</p>
				</div>
			</div>
		</div>