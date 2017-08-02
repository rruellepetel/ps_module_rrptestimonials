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
      $dbquery->select('id_blog,blog_name,blog_description,date_blog');
      $dbquery->from('blog');
      $dbquery->where('id_blog ='.$id);

      return Db::getInstance()->ExecuteS($dbquery);
    }
  }
