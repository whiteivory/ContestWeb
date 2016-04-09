<?php
namespace Forum\Form;

use Zend\Captcha\AdapterInterface as CaptchaAdapter;
use Zend\Form\Element;
use Zend\Form\Form;

class RecruitForm extends Form
{
//     protected $captcha;

    public function __construct($name = null)
    {

        parent::__construct('recruit');

//       S  $this->captcha = $captcha;

        // add() can take either an Element/Fieldset instance,
        // or a specification, from which the appropriate object
        // will be built.

        //学校和比赛是多对多的关系，帖子和比赛是多对一的关系，需要schID是为了如果设置成不对外校显示需要一个ID来说明对哪个学校显示
    /*
         $this->add(array(
             'type' => 'Select',
             'name' => 'tag',
             'options' => array(
                     'value_options' => array(
                             '代码' => '代码',
                             '美工' => '美工',
                             '宣传' => '宣传',
                     ),
             )
     ));*/
        $this->add(array(
            'type' => 'text',
            'name' => 'tag',
        ));
         $this->add(array(
             'type' => 'Select',
             'name' => 'type',
             'options' => array(
                 'value_options' => array(
                     '1' => '个人招募',
                     '2' => '组队招募',
                 ),
             )
         ));
        $this->add(array(
            'type' => 'text',
            'name' => 'rtitle',
            'attributes' => array(  //设置attibute，注意,不要忘加
                'id'=>'biaoti',
                'class'=>'biaoti',
            ),//这里
        ));
        
        $this->add(array(
            'type' => 'textarea',
            'name' => 'rcontent',//这里的逗号
            'attributes' => array(  //设置attibute，注意,不要忘加
                'id'=>'editor1', //id="editor1"
                'rows'=>'10',
                'cols'=>'80',//这里
            ),//这里
        ));
/*         $this->add(array(
            'type' => 'Radio',
            'name' => 'pallow',
            'options' => array(
                'label' => '是否允许其他学校查看本文?',
                'value_options' => array(
                    '1' => '是',
                    '0' => '否',
                ),
            ),
        )); */
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