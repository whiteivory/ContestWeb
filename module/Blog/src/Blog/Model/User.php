<?php
namespace Blog\Model;

use Zend\InputFilter\Factory as InputFactory;     // <-- Add this import
use Zend\InputFilter\InputFilter;                 // <-- Add this import
use Zend\InputFilter\InputFilterAwareInterface;   // <-- Add this import
use Zend\InputFilter\InputFilterInterface;        // <-- Add this import


class User implements InputFilterAwareInterface
{
    protected $userID;
    protected $upassword;
    protected $username;
    
    protected $inputFilter;

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

 public function exchangeArray($data)
    {
        $this->userID     = (isset($data['userID']))     ? $data['userID']     : null;
        $this->username = (isset($data['username'])) ? $data['username'] : null;
        $this->upassword  = (isset($data['upassword']))  ? $data['upassword']  : null;
    }
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
    
            $inputFilter->add($factory->createInput(array(
                'name'     => 'username',
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
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));
    
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
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));
    
            $this->inputFilter = $inputFilter;
        }
    
        return $this->inputFilter;
    }
}