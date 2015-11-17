<?php
namespace Forum\Form;

use Zend\Captcha\AdapterInterface as CaptchaAdapter;
use Zend\Form\Element;
use Zend\Form\Form;

class PageForm extends Form
{
//     protected $captcha;

    public function __construct($name = null)
    {

        parent::__construct('page');

//       S  $this->captcha = $captcha;

        // add() can take either an Element/Fieldset instance,
        // or a specification, from which the appropriate object
        // will be built.

        //学校和比赛是多对多的关系，帖子和比赛是多对一的关系，需要schID是为了如果设置成不对外校显示需要一个ID来说明对哪个学校显示

         $this->add(array(
             'type' => 'Select',
             'name' => 'secID',
             'options' => array(
                     'label' => '比赛项目',
                     'value_options' => array(
                             '1' => '科研立项',
                             '2' => '齐鲁软件',
                             '3' => '挑战杯',
                     ),
             )
     ));
         $this->add(array(
             'type' => 'Select',
             'name' => 'ptype',
             'options' => array(
                 'label' => '发帖种类',
                 'value_options' => array(
                     '1' => '比赛通知',
                     '2' => '往届比赛信息',
                     '3' => '经验交流',
                     '4' => '共享资源',
                 ),
             )
         ));
        $this->add(array(
            'type' => 'text',
            'name' => 'ptitle',
            'options' => array(
                'label' => '标题'
            )
        ));
        
        $this->add(array(
            'type' => 'textarea',
            'name' => 'pcontent',
            'attributes' => array(
                'id'=>'editor1',
                'rows'=>'10',
                'cols'=>'80',
            ),
        ));
        $this->add(array(
            'type' => 'Radio',
            'name' => 'pallow',
            'options' => array(
                'label' => '是否允许其他学校查看本文?',
                'value_options' => array(
                    '1' => '是',
                    '0' => '否',
                ),
            ),
        ));
        $this->add(array(
            'type' => 'file',
            'name' => 'filepath',
            'attributes' => array(
                'value' => 'foo',
            ),
            'options' => array(
                'label' => '附加文件'
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