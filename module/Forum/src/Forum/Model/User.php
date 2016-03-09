<?php
namespace Forum\Model;

use Zend\InputFilter\Factory as InputFactory;     // <-- Add this import
use Zend\InputFilter\InputFilter;                 // <-- Add this import
use Zend\InputFilter\InputFilterAwareInterface;   // <-- Add this import
use Zend\InputFilter\InputFilterInterface;        // <-- Add this import

use Zend\Validator\ValidatorChain;
use Zend\Validator\StringLength;
use Zend\Validator\NotEmpty;


class User implements InputFilterAwareInterface
{
    protected $userID;
    protected $upassword;
    protected $username;
    protected $schoolID;
    protected $faceimgpath;
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->userID     = (isset($data['userID']))     ? $data['userID']     : null;
        $this->upassword = (isset($data['upassword'])) ? $data['upassword'] : null;
        $this->username  = (isset($data['username']))  ? $data['username']  : null;
        //         $this->userID = (isset($data['userID']))     ? $data['userID']     : null;
        //         $this->username= (isset($data['username']))     ? $data['username']     : null;
        $this->schoolID= (isset($data['schoolID']))     ? $data['schoolID']     : null;
        $this->faceimgpath= (isset($data['faceimgpath']))     ? $data['faceimgpath']     : null;
    }
    /**
     * @return the $faceimgpath
     */
    public function getFaceimgpath()
    {
        return $this->faceimgpath;
    }

 /**
     * @param field_type $faceimgpath
     */
    public function setFaceimgpath($faceimgpath)
    {
        $this->faceimgpath = $faceimgpath;
    }


    public function getSchoolID()
    {
        return $this->schoolID;
    }


 public function setSchoolID($schoolID)
    {
        $this->schoolID = $schoolID;
    }



 /**
     * @return the $userID
     */
    public function getUserID()
    {
        return $this->userID;
    }

 /**
     * @return the $upassword
     */
    public function getUpassword()
    {
        return $this->upassword;
    }

 /**
     * @return the $username
     */
    public function getUsername()
    {
        return $this->username;
    }

 /**
     * @param Ambigous <NULL, unknown> $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

 /**
     * @param Ambigous <NULL, unknown> $upassword
     */
    public function setUpassword($upassword)
    {
        $this->upassword = $upassword;
    }

 /**
     * @param Ambigous <NULL, unknown> $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
/* 
 public function exchangeArray($data)
    {
        $this->userID     = (isset($data['userID']))     ? $data['userID']     : null;
        $this->username = (isset($data['username'])) ? $data['username'] : null;
        $this->upassword  = (isset($data['upassword']))  ? $data['upassword']  : null;
        $this->schoolID = (isset($data['schoolID']))     ? $data['schoolID']     : null;
        $this->schoolname= (isset($data['schoolname']))     ? $data['schoolname']     : null;
    } */
    //Zend\Stdlib\Hydrator\ArraySerializable::extract expects the provided object to implement getArrayCopy()
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    // Add content to this method:
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }
    
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();
    
            $inputFilter->add($factory->createInput(array(
                'name'     => 'userID',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));
            
            //用户名
            $usernameif=$factory->createInput(array(
                'name'     => 'username',
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));
            $validatorChain = new ValidatorChain();
            $v = new StringLength(array('min' => 6,
                    'max' => 20, 'encoding'=>'UTF-8'));
            $v->setMessages( array(
                StringLength::TOO_SHORT =>
                '用户名 \'%value%\' 太短了，至少需要6个字符',
                StringLength::TOO_LONG  =>
                '用户名 \'%value%\' 太长了，最多20个字符',
            ));
            $validatorChain->attach($v);
            $v = new NotEmpty();
            $v->setMessage(array(
                NotEmpty::IS_EMPTY => '用户名不能为空',
            ));
            $validatorChain->attach($v);
            $usernameif->setValidatorChain($validatorChain);
            $inputFilter->add($usernameif);
    
            //密码
            $psif=$factory->createInput(array(
                'name'     => 'upassword',
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));
            $validatorChain = new ValidatorChain();
            $v = new StringLength(array('min' => 6,
                'max' => 20, 'encoding'=>'UTF-8'));
            $v->setMessages( array(
                StringLength::TOO_SHORT =>
                '密码\'%value%\' 太短了，至少需要6个字符',
                StringLength::TOO_LONG  =>
                '密码 \'%value%\' 太长了，最多20个字符',
            ));
            $validatorChain->attach($v);
            $v = new NotEmpty();
            $v->setMessage(array(
                NotEmpty::IS_EMPTY => '密码不能为空',
            ));
            $validatorChain->attach($v);
            $psif->setValidatorChain($validatorChain);
            $inputFilter->add($psif);
            
            /* 原始方法不能改变默认错误信息
            $inputFilter->add($factory->createInput(array(
                'name'     => 'upassword',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 6,
                            'max'      => 20,
                        ),
                    ),
                ),
            )));
    */
            $this->inputFilter = $inputFilter;
        }
    
        return $this->inputFilter;
    }
}