<?php
namespace OnyxUser\Form;

use ZfcBase\Form\ProvidesEventsForm;
use Zend\InputFilter\InputFilter;
use Zend\Stdlib\Hydrator\ArraySerializable as ArraySerializable;

class UserForm extends ProvidesEventsForm
{

    public function __construct()
    {
        parent::__construct('User');

                $this->setAttribute('method', 'post')
                     ->setHydrator(new ArraySerializable(false))
                     ->setInputFilter(new InputFilter());
                $this->add(array(
                    'type' => 'OnyxUser\Form\UserFieldset',
                    'options' => array(
                        'use_as_base_fieldset' => true
                    )
                ));
                $this->add(array(
                    'type' => 'Zend\Form\Element\Csrf',
                    'name' => 'csrf'
                ));
                $this->add(array(
                    'name' => 'submit',
                    'attributes' => array(
                        'type' => 'submit',
                        'value' => 'Send'
                    )
                ));
    }


}

?>