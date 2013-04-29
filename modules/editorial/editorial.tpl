
<div class="order-meat-message">
	<div class="cow">
		<span class="clip"></span>
		<span class="corner-top"></span>
		<span class="corner-right"></span>
		<span class="corner-bottom"></span>
		<span class="corner-left"></span>
		{if $homepage_logo}
			<img src="{$link->getMediaLink($image_path)}" alt="{$editorial->body_logo_subheading|stripslashes}" {if $image_width}width="{$image_width}"{/if} {if $image_height}height="{$image_height}" {/if}/>
		{/if}
	</div>
	<div class="label-message">
		<span class="illustration"></span>
		<div class="label">
			<p><span></span>Viandes certifiées<span></span></p>
			<ul>
				<li><span>Label Rouge</span></li>
				<li><span>Agriculture Biologique</span></li>
			</ul>
		</div>
		<div class="message">
			<span></span>
			{if $editorial->body_paragraph}
				{$editorial->body_paragraph|stripslashes}
			{/if}
			<p class="signature">Guy & Melchior</p>
		</div>
	</div>
	<div class="order-meat">
		<a href="#" title="Commander nos viandes"><span></span>Commander nos viandes<span></span></a>
	</div>
</div>
