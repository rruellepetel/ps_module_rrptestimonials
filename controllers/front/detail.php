<?php

class rrptestimonialsdetailModuleFrontController extends ModuleFrontController
{
  public function initContent()
  {
    parent::initContent();
    $this->setTemplate('list.tpl');

    $post = $this->getPost(Tools::getValue('id'));
    if ($post) {
      $this->context->smarty->assign(
        array(
            'post' => $post,
        )
    );
    }
    }
     function getPost(int $id){

      $dbquery = new DbQuery();
      $dbquery->select('id_rrptestimonials,author,testimonial,date_creation');
      $dbquery->from('rrptestimonials');
      $dbquery->where('id_rrptestimonials ='.$id);

      return Db::getInstance()->ExecuteS($dbquery);
    }
  }
