<?php

class AdminPostControllerCore extends AdminController
{
	protected $category;

//	public $id_post_category;

	protected $position_identifier = 'id_post';

	public function __construct()
	{
		$this->table = 'post';
		$this->className = 'Post';
		$this->lang = true;
		$this->addRowAction('view');
		$this->addRowAction('edit');
		$this->addRowAction('delete');
		$this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?')));

		$this->fields_list = array(
			'id_post' => array('title' => $this->l('ID'), 'align' => 'center', 'width' => 25),
			'title' => array('title' => $this->l('Title'), 'width' => '300', 'filter_key' => 'b!title'),
			'position' => array('title' => $this->l('Position'), 'width' => 40,'filter_key' => 'position', 'align' => 'center', 'position' => 'position'),
			'active' => array('title' => $this->l('Displayed'), 'width' => 25, 'align' => 'center', 'active' => 'status', 'type' => 'bool', 'orderby' => false)
			);

		$this->_select = 'a.position ';

		parent::__construct();
		
	}

	public function renderForm()
	{
		$this->display = 'edit';
		$this->toolbar_btn['save-and-preview'] = array(
			'href' => '#',
			'desc' => $this->l('Save and preview')
		);
		$this->initToolbar();
		if (!$this->loadObject(true))
			return;

		$this->fields_form = array(
			'tinymce' => true,
			'legend' => array(
				'title' => $this->l('Post Page'),
				'image' => '../img/admin/tab-categories.gif'
			),
			'input' => array(
				// custom template
				array(
					'type' => 'text',
					'label' => $this->l('Title:'),
					'name' => 'title',
					'lang' => true,
					'required' => true,
					'class' => 'copy2friendlyUrl',
					'size' => 50
				),
				array(
					'type' => 'textarea',
					'label' => $this->l('Article'),
					'name' => 'content',
					'autoload_rte' => true,
					'lang' => true,
					'rows' => 5,
					'cols' => 40,
					'hint' => $this->l('Invalid characters:').' <>;=#{}'
				),
				array(
					'type' => 'text',
					'label' => $this->l('Link:'),
					'name' => 'link',
					'lang' => true,
					'size' => 50
				),
				array(
					'type' => 'radio',
					'label' => $this->l('Displayed:'),
					'name' => 'active',
					'required' => false,
					'class' => 't',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'active_on',
							'value' => 1,
							'label' => $this->l('Enabled')
						),
						array(
							'id' => 'active_off',
							'value' => 0,
							'label' => $this->l('Disabled')
						)
					),
				),
			),
			'submit' => array(
				'title' => $this->l('   Save   '),
				'class' => 'button'
			)
		);

		if (Shop::isFeatureActive())
		{
			$this->fields_form['input'][] = array(
				'type' => 'shop',
				'label' => $this->l('Shop association:'),
				'name' => 'checkBoxShopAsso',
			);
		}

		$this->tpl_form_vars = array(
			'active' => $this->object->active,
			'PS_ALLOW_ACCENTED_CHARS_URL', (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL')
		);
		return parent::renderForm();
	}

	public function renderList()
	{
		$this->toolbar_title = $this->l('Posts');
		$this->toolbar_btn['new'] = array(
			'href' => self::$currentIndex.'&amp;add'.$this->table./*'&amp;id_post_category='.(int)$this->id_post_category.*/'&amp;token='.$this->token,
			'desc' => $this->l('Add new')
		);

		return parent::renderList();
	}

	public function displayList($token = null)
	{
		/* Display list header (filtering, pagination and column names) */
		$this->displayListHeader($token);
		if (!count($this->_list))
			echo '<tr><td class="center" colspan="'.(count($this->fields_list) + 2).'">'.$this->l('No items found').'</td></tr>';

		/* Show the content of the table */
		$this->displayListContent($token);

		/* Close list table and submit button */
		$this->displayListFooter($token);
	}

	/**
	 * Modifying initial getList method to display position feature (drag and drop)
	 */
	public function getList($id_lang, $order_by = null, $order_way = null, $start = 0, $limit = null, $id_lang_shop = false)
	{
		if ($order_by && $this->context->cookie->__get($this->table.'Orderby'))
			$order_by = $this->context->cookie->__get($this->table.'Orderby');
		else
			$order_by = 'position';

		parent::getList($id_lang, $order_by, $order_way, $start, $limit, $id_lang_shop);
	}

	public function postProcess()
	{
		if (Tools::isSubmit('viewpost') && ($id_post = (int)Tools::getValue('id_post')) && ($post = new Post($id_post, $this->context->language->id)) && Validate::isLoadedObject($post))
		{
			$redir = $this->context->link->getPostLink($post);
			if (!$post->active)
			{
				$admin_dir = dirname($_SERVER['PHP_SELF']);
				$admin_dir = substr($admin_dir, strrpos($admin_dir, '/') + 1);
				$redir .= '?adtoken='.Tools::getAdminTokenLite('AdminPostContent').'&ad='.$admin_dir.'&id_employee='.(int)$this->context->employee->id;
			}
			Tools::redirectAdmin($redir);
		}
		elseif (Tools::isSubmit('deletepost'))
		{
			if (Tools::getValue('id_post') == Configuration::get('PS_CONDITIONS_POST_ID'))
			{
				Configuration::updateValue('PS_CONDITIONS', 0);
				Configuration::updateValue('PS_CONDITIONS_POST_ID', 0);
			}
			$post = new Post((int)Tools::getValue('id_post'));
	//		$post->cleanPositions($post->id_post_category);
			if (!$post->delete())
				$this->errors[] = Tools::displayError('An error occurred while deleting object.')
					.' <b>'.$this->table.' ('.Db::getInstance()->getMsgError().')</b>';
			else
				Tools::redirectAdmin(self::$currentIndex./*'&id_post_category='.$post->id_post_category.*/'&conf=1&token='.Tools::getAdminTokenLite('AdminPostContent'));
		}/* Delete multiple objects */
		elseif (Tools::getValue('submitDel'.$this->table))
		{
			if ($this->tabAccess['delete'] === '1')
			{
				if (Tools::isSubmit($this->table.'Box'))
				{
					$post = new Post();
					$result = true;
					$result = $post->deleteSelection(Tools::getValue($this->table.'Box'));
					if ($result)
					{
					//	$post->cleanPositions((int)Tools::getValue('id_post_category'));
						$token = Tools::getAdminTokenLite('AdminPostContent');
						Tools::redirectAdmin(self::$currentIndex.'&conf=2&token='.$token/*.'&id_category='.(int)Tools::getValue('id_post_category')*/);
					}
					$this->errors[] = Tools::displayError('An error occurred while deleting selection.');

				}
				else
					$this->errors[] = Tools::displayError('You must select at least one element to delete.');
			}
			else
				$this->errors[] = Tools::displayError('You do not have permission to delete here.');
		}
		elseif (Tools::isSubmit('submitAddpost') || Tools::isSubmit('submitAddpostAndPreview'))
		{
			parent::validateRules();
			if (!count($this->errors))
			{
				if (!$id_post = (int)Tools::getValue('id_post'))
				{
					$post = new Post();
					$this->copyFromPost($post, 'post');
					if (!$post->add())
						$this->errors[] = Tools::displayError('An error occurred while creating object.')
							.' <b>'.$this->table.' ('.Db::getInstance()->getMsgError().')</b>';
					else
						$this->updateAssoShop($post->id);
				}
				else
				{
					$post = new Post($id_post);
					$this->copyFromPost($post, 'post');
					if (!$post->update())
						$this->errors[] = Tools::displayError('An error occurred while updating object.')
							.' <b>'.$this->table.' ('.Db::getInstance()->getMsgError().')</b>';
					else
						$this->updateAssoShop($post->id);

				}
                if (Tools::isSubmit('submitAddpostAndPreview'))
                {
                    $alias = $this->getFieldValue($post, 'link_rewrite', $this->context->language->id);
                    $preview_url = $this->context->link->getPostLink($post, $alias, $this->context->language->id);

                    if (!$post->active)
                    {
                    	$admin_dir = dirname($_SERVER['PHP_SELF']);
                        $admin_dir = substr($admin_dir, strrpos($admin_dir, '/') + 1);
                    	
                    	$params = http_build_query(array(
                    		'adtoken' => Tools::getAdminTokenLite('AdminPostContent'),
                    		'ad' => $admin_dir,
                    		'id_employee' => (int)$this->context->employee->id)
                    		);
                    	if (Configuration::get('PS_REWRITING_SETTINGS'))
                    		$params = '?'.$params;
                    	else
                    		$params = '&'.$params;
                    	
                    	$preview_url .= $post->active ? '' : $params;
                    }
                    Tools::redirectAdmin($preview_url);
                }
                else
					Tools::redirectAdmin(self::$currentIndex./*'&id_post_category='.$post->id_post_category.*/'&conf=4&token='.Tools::getAdminTokenLite('AdminPostContent'));
			}
		}
		elseif (Tools::getValue('position'))
		{
			if ($this->tabAccess['edit'] !== '1')
				$this->errors[] = Tools::displayError('You do not have permission to edit here.');
			elseif (!Validate::isLoadedObject($object = $this->loadObject()))
				$this->errors[] = Tools::displayError('An error occurred while updating status for object.')
					.' <b>'.$this->table.'</b> '.Tools::displayError('(cannot load object)');
			elseif (!$object->updatePosition((int)Tools::getValue('way'), (int)Tools::getValue('position')))
				$this->errors[] = Tools::displayError('Failed to update the position.');
			else
				Tools::redirectAdmin(self::$currentIndex.'&'.$this->table.'Orderby=position&'.$this->table.'Orderway=asc'./*'&conf=4'.(($id_category = (int)Tools::getValue('id_post_category')) ? ('&id_post_category='.$id_category) : '').*/'&token='.Tools::getAdminTokenLite('AdminPostContent'));
		}
		/* Change object statuts (active, inactive) */
		elseif (Tools::isSubmit('statuspost') && Tools::isSubmit($this->identifier))
		{
			if ($this->tabAccess['edit'] === '1')
			{
				if (Validate::isLoadedObject($object = $this->loadObject()))
				{
					if ($object->toggleStatus())
						Tools::redirectAdmin(self::$currentIndex./*'&conf=5'.((int)Tools::getValue('id_post_category') ? '&id_post_category='.(int)Tools::getValue('id_post_category') : '').*/'&token='.Tools::getValue('token'));
					else
						$this->errors[] = Tools::displayError('An error occurred while updating status.');
				}
				else
					$this->errors[] = Tools::displayError('An error occurred while updating status for object.')
						.' <b>'.$this->table.'</b> '.Tools::displayError('(cannot load object)');
			}
			else
				$this->errors[] = Tools::displayError('You do not have permission to edit here.');
		}
		else
			parent::postProcess(true);
	}
}


