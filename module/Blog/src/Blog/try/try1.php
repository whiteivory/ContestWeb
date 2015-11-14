<?php
use Zend\Captcha;
use Zend\Form\Element;
use Zend\Form\Fieldset;
use Zend\Form\Form;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;

$name = new Element('name');
$name->setLabel('Your name');
$name->setAttributes(array(
    'type'  => 'text'
));

$email = new Element\Email('email');
$email->setLabel('Your email address');

$subject = new Element('subject');
$subject->setLabel('Subject');
$subject->setAttributes(array(
    'type'  => 'text'
));

$message = new Element\Textarea('message');
$message->setLabel('Message');

$captcha = new Element\Captcha('captcha');
$captcha->setCaptcha(new Captcha\Dumb());
$captcha->setLabel('Please verify you are human');

$csrf = new Element\Csrf('security');

$send = new Element('send');
$send->setValue('Submit');
$send->setAttributes(array(
    'type'  => 'submit'
));


$form = new Form('contact');
$form->add($name);
$form->add($email);
$form->add($subject);
$form->add($message);
$form->add($captcha);
$form->add($csrf);
$form->add($send);

$nameInput = new Input('name');
// configure input... and all others
$inputFilter = new InputFilter();
// attach all inputs

$form->setInputFilter($inputFilter);
$sender = new Fieldset('sender');
$sender->add($name);
$sender->add($email);

$details = new Fieldset('details');
$details->add($subject);
$details->add($message);

$form = new Form('contact');
$form->add($sender);
$form->add($details);
$form->add($captcha);
$form->add($csrf);
$form->add($send);