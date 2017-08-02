<?php


    class Testimonials extends ObjectModel
    {

        public $id_rrptestimonials;
        public $author;
        public $testimonial;
        public $date_creation;
        public static $definition = array(
            'table' => 'rrptestimonials',
            'primary' => 'id_rrptestimonials',
            'fields' => array(
                'author' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
                'testimonial' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            ),
        );
    }
