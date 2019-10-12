<?php
if (!defined('_PS_VERSION_'))
	exit;

class lesh extends Module
{

    public function __construct()
	{
		$this->name = 'lesh';
		$this->tab = 'front_office_features';
		$this->version = '1.0.0';
		$this->author = 'Leshi';
		$this->need_instance = 0;
		$this->bootstrap = true;
		parent::__construct();

		$this->displayName = $this->l('Мой модуль');
		$this->description = $this->l('Мой тестовый модуль.');
	}

	public function install()
	{
		return parent::install() && $this->registerHook('header') && $this->registerHook('footer');
	}

	public function uninstall()
	{
		return parent::uninstall();
	}


}