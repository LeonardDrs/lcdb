<?php

class CategoryController extends CategoryControllerCore
{
	public function init()
	{
		
		// Get category ID
		$id_category = (int)Tools::getValue('id_category');
		
		// redirect category
		switch ($id_category) {
			case 3:
				Tools::redirect('index.php?id_category=11&controller=category');
				break;
			case 4:
				Tools::redirect('index.php?id_product=3&controller=product');
				break;
			case 7:
				Tools::redirect('index.php?id_product=4&controller=product');
				break;
			case 8:
				Tools::redirect('index.php?id_category=11&controller=category');
				break;
			default: 
				parent::init();
				break;
		}
		
	}
	
	public function initContent()
	{
		parent::initContent();
		
		// get left col of category page
		$parent = new Category(3, $this->context->language->id);
		$left_col = $parent->getSubCategoriesByDepth(2, 4, $this->context->language->id);
		$this->context->smarty->assign('left_col', $left_col);
		
	}
	
		protected function assignSubcategories()
	{
		if ($subCategories = $this->category->getFullSubCategories($this->context->language->id))
		{
			$this->context->smarty->assign(array(
				'subcategories' => $subCategories,
				'subcategories_nb_total' => count($subCategories),
				'subcategories_nb_half' => ceil(count($subCategories) / 2)
			));
		}
	}
}

