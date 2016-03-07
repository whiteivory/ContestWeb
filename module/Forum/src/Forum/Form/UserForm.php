<?php
namespace Forum\Form;

use Zend\Captcha\AdapterInterface as CaptchaAdapter;
use Zend\Form\Element;
use Zend\Form\Form;

class UserForm extends Form
{
//     protected $captcha;

    public function __construct($name = null)
    {

        parent::__construct('user');

//       S  $this->captcha = $captcha;

        // add() can take either an Element/Fieldset instance,
        // or a specification, from which the appropriate object
        // will be built.

        $this->add(array(
            'name' => 'userID',
            'type'  => 'hidden',
        ));
        $this->add(array(
            'type' => 'text',
            'name' => 'username',

            'options' => array( 
            ),
            'attributes'=>array(
                'class'=>'form-control',
                'id'=>'inputPassword',
  
            'options' => array(
            ),
                )
         ));
        
        $this->add(array(
            'type' => 'password',
            'name' => 'upassword',
            'options' => array(
               // 'label' => 'Your password'
            ),
            'attributes'=>array(
                'class'=>'form-control',
                'id'=>'inputPassword',
            )
        ));
        $this->add(array(
            'name' => 'submit',
            'type'  => 'Submit',
            'attributes' => array(
                'value' => 'Submit',
                'class' => 'btn btn-lg btn-primary btn-block',
            ),
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'schoolID',
            'options' => array(
                'label' => '你所在的学校',
                'value_options' => array(
                    '1' => '山东大学（威海）'
                ),
            )
        ));
      /*   $this->add(array(
            'type' => 'Zend\Form\Element\Email',
            'name' => 'email',
            'options' => array(
                'label' => 'Your email address',
            ),
        ));
        $this->add(array(
            'name' => 'subject',
            'options' => array(
                'label' => 'Subject',
            ),
            'type'  => 'Text',
        ));
        $this->add(array(
            'type' => 'Zend\Form\Element\Textarea',
            'name' => 'message',
            'options' => array(
                'label' => 'Message',
            ),
        ));
        $this->add(array(
            'type' => 'Zend\Form\Element\Captcha',
            'name' => 'captcha',
            'options' => array(
                'label' => 'Please verify you are human.',
                'captcha' => $this->captcha,
            ),
        ));
        $this->add(new Element\Csrf('security'));
        
 */
        // We could also define the input filter here, or
        // lazy-create it in the getInputFilter() method.
    }
}
