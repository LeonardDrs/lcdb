<?php

class ProductController extends ProductControllerCore
{
	public function initContent()
	{
		parent::initContent();
		
		// get left col of category page
		$parent = new Category(3, $this->context->language->id);
		$left_col = $parent->getSubCategoriesByDepth(2, 4, $this->context->language->id);
		$this->context->smarty->assign('left_col', $left_col);
		
	}
}

