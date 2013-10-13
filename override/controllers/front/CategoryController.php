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
				Tools::redirect('index.php?id_product=729&controller=product');
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
		
		$leftcol = Category::getLeftColumn($this->context->language->id);
		$rightcol = Category::getRightColumn($this->context->language->id);

		$this->context->smarty->assign(array(
				'left_col' => $leftcol,
				'right_col' => $rightcol
			));
		
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

