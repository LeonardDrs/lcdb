<?php

class ProductController extends ProductControllerCore
{
	public function initContent()
	{
		parent::initContent();
		
		$leftcol = Category::getLeftColumn($this->context->language->id);

		$this->context->smarty->assign('left_col', $leftcol);
		$this->context->smarty->assign('recipes', $this->product->getRecipes($this->context->language->id));
		
	}
}

