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
                 
                 'value_options' => array(
                     '1' => '比赛通知',
                     '2' => '往届比赛信息',
                     '3' => '经验交流',
                     '4' => '共享资源',
                 ),
             ),
             'attributes' => array(
                 'class'=>'dropdown-toggle',
                  
             ),//这里
         ));
        $this->add(array(
            'type' => 'text',
            'name' => 'ptitle',
            //'placeholder'=>"请输入标题",
            'options' => array(
               
            ),
            'attributes' => array(  //设置attibute，注意,不要忘加
                'id'=>'exampleInputEmail1',//id="editor1"
                'class'=>'biaoti',
            ),//这里
        ));
        
        $this->add(array(
            'type' => 'textarea',
            'name' => 'pcontent',//这里的逗号
            'attributes' => array(  //设置attibute，注意,不要忘加
                'id'=>'editor1', //id="editor1"
                'rows'=>'10',
                'cols'=>'80',//这里
            ),//这里
        ));
        $this->add(array(
            'type' => 'Radio',
            'name' => 'pallow',
            'options' => array(
                //'label' => '是否允许其他学校查看本文?',
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
                'id'=>'youridhere',
                'class'=>'yourclasshere',
            ),
            'options' => array(
                //'label' => '附加文件'
            )
        ));
        $this->add(array(
            'name' => 'submit',
            'type'  => 'Submit',
            'attributes' => array(
                'value' => '确认提交',
                'class'=>'am-btn am-btn-primary',
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