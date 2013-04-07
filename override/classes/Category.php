<?php

class Category extends CategoryCore
{
	public function getSubCategoriesByDepth($id_cat, $depth, $id_lang, $active = true)
	{
		if (!Validate::isBool($active))
	 		die(Tools::displayError());

		$groups = FrontController::getCurrentCustomerGroups();
		$sql_groups = (count($groups) ? 'IN ('.implode(',', $groups).')' : '= 1');

		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT c.*, cl.id_lang, cl.name, cl.link_rewrite, cl.meta_title
			FROM `'._DB_PREFIX_.'category` c
			'.Shop::addSqlAssociation('category', 'c').'
			LEFT JOIN `'._DB_PREFIX_.'category_lang` cl
				ON (c.`id_category` = cl.`id_category`
				AND `id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('cl').')
			LEFT JOIN `'._DB_PREFIX_.'category_group` cg
				ON (cg.`id_category` = c.`id_category`)
			WHERE `id_parent` = '.(int)$id_cat.'
				'.($active ? 'AND `active` = 1' : '').'
				AND cg.`id_group` '.$sql_groups.'
			GROUP BY c.`id_category`
			ORDER BY `level_depth` ASC, category_shop.`position` ASC
		');
		
		if($result[0]['level_depth'] != $depth){
			
			foreach ($result as &$row)
			{
				$row['subcats'] = $this->getSubCategoriesByDepth($row['id_category'], $depth, $id_lang, $active);
				
			}
		}
		
		return $result;
	}
}

