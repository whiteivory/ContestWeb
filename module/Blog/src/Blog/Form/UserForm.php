<?php
namespace Blog\Form;

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
                'label' => 'Your username'
            )
        ));
        
        $this->add(array(
            'type' => 'text',
            'name' => 'upassword',
            'options' => array(
                'label' => 'Your password'
            )
        ));
        $this->add(array(
            'name' => 'submit',
            'type'  => 'Submit',
            'attributes' => array(
                'value' => 'Submit',
            ),
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