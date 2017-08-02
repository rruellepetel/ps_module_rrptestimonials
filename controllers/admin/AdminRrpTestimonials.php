<?php


class AdminRrpTestimonialsController extends ModuleAdminController

{

    public function __construct()
 {

    $this->table='rrptestimonials';
    $this->className='Testimonials';
    $this->actions = array('delete');
    $this->bootstrap=True;

     $this->fields_list = array(

       'author' => array(
           'title' => $this->l('author'),
       ),
       'testimonial' => array(
           'title' => $this->l('testimonial'),
       ),
       'date_creation' => array(
           'title' => $this->l('date_creation'),
       ),
   );

   parent::__construct();


   $this->fields_form = array(
  'legend' => array(
    'title' => $this->l('Edit'),
  ),
  'input' => array(
    array(
      'type' => 'text',
      'name' => 'author',
      'label'=> 'Author'
     ),
    array(
      'type' => 'textarea',
      'name' => 'testimonial',
      'label'=> 'Testimonial'
     ),
  ),
  'submit' => array(
    'title' => $this->l('Save'),
    'class' => 'btn btn-default pull-right'
  )
);
 }

}
