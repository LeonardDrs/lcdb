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
				Tools::redirect('index.php?id_product=1029&controller=product');
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

		$zipcodes = array();

		// get zipcodes list
		if ($this->context->customer->id){
			$customer_adresses = $this->context->customer->getAddresses($this->context->language->id);
			foreach ($customer_adresses as $key => $address) {
				if(isset($address["postcode"]) && ($address["postcode"] != "")){
					$zipcodes[] = $address["postcode"];
				}
			}
		}
		
		$leftcol = Category::getLeftColumn($this->context->language->id, $zipcodes);
		$rightcol = Category::getRightColumn($this->context->language->id);

		$this->context->smarty->assign(array(
				'left_col' => $leftcol,
				'right_col' => $rightcol
			));
		
	}
	
		protected function assignSubcategories()
	{
		if ($subCategories = $this->category->getFullSubCategories($this->context->language->id, true, $this->orderBy, $this->orderWay))
		{
			$this->context->smarty->assign(array(
				'subcategories' => $subCategories,
				'subcategories_nb_total' => count($subCategories),
				'subcategories_nb_half' => ceil(count($subCategories) / 2)
			));
		}
	}
}

