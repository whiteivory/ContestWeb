<?php
namespace Blog\Form;

use Zend\Form\Fieldset;
// use Blog\Model\Post;
// use Zend\Stdlib\Hydrator\ClassMethods;

class PostFieldset extends Fieldset
{
    public function __construct($name = null, $options = array())
     {
         parent::__construct($name, $options);
//          $this->setHydrator(new ClassMethods(false));
//          $this->setObject(new Post());
        $this->add(array(
            'type' => 'hidden',
            'name' => 'userID'
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'username',
            'options' => array(
                'label' => 'The Text'
            )
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'upassword',
            'options' => array(
                'label' => 'Blog Title'
            )
        ));
    }
}