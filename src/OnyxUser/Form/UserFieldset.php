<?php
namespace OnyxUser\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ArraySerializable as ArraySerializable;
use Zend\Stdlib\Hydrator\ObjectProperty as ObjectProperty; 
use OnyxUser\Model\User;

class UserFieldset extends Fieldset implements InputFilterProviderInterface
{

    public function __construct()
    {
        parent::__construct('User');
                $this->setHydrator(new ObjectProperty(false))
                     ->setObject(new User());
                $this->setLabel('User');        
                
            
            $this->add(array(
                'name' => 'id',
                'type' => 'Zend\Form\Element\Hidden',
                'options' => array(
                    'label' => 'id'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'username',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'username'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'password',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'password'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'salt',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'salt'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'firstname',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'firstname'
                ),
                'attributes' => array()
            ));

        
            $this->add(array(
                'name' => 'lastname',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'lastname'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'phone',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'phone'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'mobile',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'mobile'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'email',
                'type' => 'Zend\Form\Element\Email',
                'options' => array(
                    'label' => 'email'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'twitter',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'twitter'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'passwordhint',
                'type' => 'Zend\Form\Element\Textarea',
                'options' => array(
                    'label' => 'passwordhint'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'gender',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'gender'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'dateofbirth',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'dateofbirth'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'facebookid',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'facebookid'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'phoneguid',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'phoneguid'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'subscribe',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'subscribe'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'mobilesubscribe',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'mobilesubscribe'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'role',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'role'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'terms',
                'type' => 'Zend\Form\Element\Checkbox',
                'options' => array(
                    'label' => 'terms'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'facebookdata',
                'type' => 'Zend\Form\Element\Textarea',
                'options' => array(
                    'label' => 'facebookdata'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'token',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'token'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'isactive',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'isactive'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'logindate',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'logindate'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'lastupdate',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'lastupdate'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'postdate',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'postdate'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));
    }

    /**
     * @return array
     */
    public function getInputFilterSpecification()
    {
        $model = $this->getObject();
        return $model->getValidation();
    }


}

?>