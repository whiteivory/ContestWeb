<?php
namespace Forum\Form;

use Zend\Form\Form;

class RFollowForm extends Form{
    public function __construct($name = null){
        parent::__construct('rfollow');
        $this->add(array(
            'type' => 'textarea',
            'name' => 'rfcontent',//这里的逗号
            'attributes' => array(  //设置attibute，注意,不要忘加
                'id'=>'followtext', //id="editor1"
            ),//这里
        ));
        $this->add(array(
            'name' => 'submit',
            'type'  => 'Submit',
            'attributes' => array(
                'value' => '提交评论',
                'id'=>'submitstyle',
            ),
        ));
    }
}