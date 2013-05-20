<?php

class AdminCarriersController extends AdminCarriersControllerCore
{
	public function __construct()
	{
		$this->_filter = 'AND type_carrier = 0';
		parent::__construct();
	}
}

