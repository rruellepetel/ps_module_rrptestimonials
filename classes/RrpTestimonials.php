<?php

class RrpTestimonials extends Module {

    public function __construct()
    {
        $this->name = 'rrptestimonials';
        $this->tab = 'front_office_features';
        $this->version = '0.0.1';
        $this->author = 'Romain';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Rrp Module');
        $this->description = $this->l('Awesome Module for Testimonials stuffs.');
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

    }

    public function install()
    {

        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }

        if (!parent::install()
            || !$this->addAdminTab()
        ) {
            return false;
        }

        return true;
    }

    public function addAdminTab()

    {


        $tab = new Tab();

        foreach(Language::getLanguages(false) as $lang)

        $tab->name[(int) $lang['id_lang']] = 'Blog';

        $tab->class_name = 'RrpTestimonials';

        $tab->module = $this->name;

        $tab->id_parent = 0;

        if (!$tab->save())

            return false;

        return true;

    }

    public function removeAdminTab()

    {

        $classNames = array('admin_blog' => 'RrpTestimonials');

        $return = true;

        foreach ($classNames as $key => $className) {

            $tab = new Tab(Tab::getIdFromClassName($className));

            $return &= $tab->delete();

        }

        return $return;

    }

    public function uninstall()

    {

        if (!parent::uninstall()


            || !$this->removeAdminTab()

        ) {

            return false;

        }

        return true;

    }

}
