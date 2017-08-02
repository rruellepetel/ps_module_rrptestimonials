<?php
class rrptestimonialsdisplayModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();

        $dbquery = new DbQuery();
        $dbquery->select('id_rrptestimonials,author,testimonial,date_creation');
        $dbquery->from('rrptestimonials');

        $posts = [];

        $result = Db::getInstance()->ExecuteS($dbquery);
        if ($result) {
            foreach ($result as $post) {
                $post["link"] = $this->context->link->getModuleLink('rrptestimonials', 'detail', array('id' =>$post['id_rrptestimonials']));
                $posts[] = $post;
            }
            $this->context->smarty->assign(
                array(
                    'posts' => $posts
                )
            );
            $this->setTemplate('display.tpl');
        }
    }
}
