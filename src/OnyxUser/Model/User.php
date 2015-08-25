<?php
namespace OnyxUser\Model;

/**
 * User model
 *
 * This is a class generated with Paul's Zend MVC Model Generator.
 *
 * @author Paul Headington
 * @createdOn
 * @license Copyright (c) 2014, Paul HeadingtonAll rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 * 1. Redistributions of source code must retain the above copyright
 * notice, this list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above copyright
 * notice, this list of conditions and the following disclaimer in the
 * documentation and/or other materials provided with the distribution.
 * 3. All advertising materials mentioning features or use of this software
 * must display the following acknowledgement:
 * This product includes software developed by the <organization>.
 * 4. Neither the name of the <organization> nor the
 * names of its contributors may be used to endorse or promote products
 * derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY Paul Headington 'AS IS' AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL Paul Headington BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */
class User
{

    use \GetSet\SetterGetter;

    public $id = null;

    public $username = null;

    public $password = null;

    public $salt = null;

    public $firstname = null;

    public $lastname = null;

    public $phone = null;

    public $mobile = null;

    public $email = null;

    public $twitter = null;

    public $passwordhint = null;

    public $gender = null;

    public $dateofbirth = null;

    public $facebookid = null;

    public $phoneguid = null;

    public $subscribe = 0;

    public $mobilesubscribe = 0;

    public $role = null;

    public $terms = null;

    public $facebookdata = null;

    public $token = null;
    
    public $tokenexpire = null;

    public $isactive = 0;

    public $logindate = null;

    public $lastupdate = null;

    public $postdate = null;

    const filter = null;

    protected $validation = array(
        'id' => array(
            'required' => false,
            'name' => 'id',
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'int'
                ),
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 1
                    )
                )
            )
        ),
        'username' => array(
            'required' => false,
            'name' => 'username',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 3
                    )
                )
            )
        ),
        'password' => array(
            'required' => false,
            'name' => 'password',
            'filters' => array(
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 3
                    )
                )
            )
        ),
        'salt' => array(
            'required' => false,
            'name' => 'salt',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 3
                    )
                )
            )
        ),
        'firstname' => array(
            'required' => false,
            'name' => 'firstname',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 2
                    )
                )
            )
        ),
        'lastname' => array(
            'required' => false,
            'name' => 'lastname',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 3
                    )
                )
            )
        ),
        'phone' => array(
            'required' => false,
            'name' => 'phone',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'int'
                ),
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 3
                    )
                )
            )
        ),
        'mobile' => array(
            'required' => false,
            'name' => 'mobile',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'int'
                ),
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 3
                    )
                )
            )
        ),
        'email' => array(
            'required' => false,
            'name' => 'email',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'email_address',
                    'options' => array(
                        'allow' => \Zend\Validator\Hostname::ALLOW_DNS,
                    )
                ),                
            )
        ),
        'twitter' => array(
            'required' => false,
            'name' => 'twitter',
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 3
                    )
                )
            )
        ),
        'passwordhint' => array(
            'required' => false,
            'name' => 'passwordhint',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 3
                    )
                )
            )
        ),
        'gender' => array(
            'required' => false,
            'name' => 'gender',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 3
                    )
                )
            )
        ),
        'dateofbirth' => array(
            'required' => false,
            'name' => 'dateofbirth',
            'validators' => array(
                
            )
        ),
        'facebookid' => array(
            'required' => false,
            'name' => 'facebookid',
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 3
                    )
                )
            )
        ),
        'phoneguid' => array(
            'required' => false,
            'name' => 'phoneguid',
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 3
                    )
                )
            )
        ),
        'subscribe' => array(
            'required' => false,
            'name' => 'subscribe',
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'int'
                ),
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 1
                    )
                )
            )
        ),
        'mobilesubscribe' => array(
            'required' => false,
            'name' => 'mobilesubscribe',
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'int'
                ),
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 1
                    )
                )
            )
        ),
        'role' => array(
            'required' => false,
            'name' => 'role',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 3
                    )
                )
            )
        ),
        'terms' => array(
            'required' => true,
            'name' => 'terms',
            'validators' => array(
                array(
                    'name' => 'int'
                ),
            )
        ),
        'facebookdata' => array(
            'required' => false,
            'name' => 'facebookdata',
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 3
                    )
                )
            )
        ),
        'token' => array(
            'required' => false,
            'name' => 'token',
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 3
                    )
                )
            )
        ),
        'tokenexpire' => array(
            'required' => false,
            'name' => 'tokenexpire',
            'validators' => array(
                
            )
        ),
        'isactive' => array(
            'required' => false,
            'name' => 'isactive',
            'validators' => array(
                array(
                    'name' => 'not_empty'
                ),
                array(
                    'name' => 'int'
                ),
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 1
                    )
                )
            )
        ),
        'logindate' => array(
            'required' => false,
            'name' => 'logindate',
            'validators' => array(
                
            )
        ),
        'lastupdate' => array(
            'required' => false,
            'name' => 'lastupdate',
            'validators' => array(
                
            )
        ),
        'postdate' => array(
            'required' => false,
            'name' => 'postdate',
            'validators' => array(
                
            )
        ),
        'country' => array(
            'required' => true,
            'name' => 'country',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' =>'NotEmpty', 
                      'options' => array(
                          'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'Please select your counrty' 
                        ),
                    ),
                ),
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'max' => 200
                    ),
                ),
                array(
                    'name'    => 'InArray',
                    'options' => array(
                        'haystack' => array(2,3),
                        'messages' => array(
                            \Zend\Validator\InArray::NOT_IN_ARRAY => ''  
                        ),
                    ),
                ),
                
            ),
        ),
        'region' => array(
            'required' => false,
            'name' => 'region',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 200,
                    ),
                ),
            )
        ),
        'industry' => array(
            'required' => true,
            'name' => 'industry',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' =>'NotEmpty', 
                      'options' => array(
                          'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'Please select your industry', 
                        ),
                    ),
                ),
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'max' => 200
                    ),
                ),
                array(
                    'name'    => 'InArray',
                    'options' => array(
                        'haystack' => array(2,3),
                        'messages' => array(
                            \Zend\Validator\InArray::NOT_IN_ARRAY => ''  
                        ),
                    ),
                ),
            )
        ),
        'regions-AUS' => array(
            'required' => false,
            'name' => 'region',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 200,
                    ),
                ),
            )
        ),
        'regions-GBR' => array(
            'required' => false,
            'name' => 'region',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 200,
                    ),
                ),
            )
        ),
        'regions-NZL' => array(
            'required' => false,
            'name' => 'region',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 200,
                    ),
                ),
            )
        ),
        'regions-USA' => array(
            'required' => false,
            'name' => 'region',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 200,
                    ),
                ),
            )
        ),
    );

    private $staticSalt = null;

    /**
     * build the model
     */
    public function __construct()
    {
    }

    /**
     * Validation selector
     */
    public function getValidation($dbAdapter = null)
    {
        $validators = $this->validation;
        
        if($dbAdapter != null){
            $validators['email'] = array(
                'required' => false,
                'name' => 'email',
                'validators' => array(
                    array(
                        'name' => 'not_empty'
                    ),
                    array(
                        'name' => 'email_address',
                        'options' => array(
                            'allow' => \Zend\Validator\Hostname::ALLOW_DNS,
                        )
                    ), 
                     array(
                        'name' => 'Zend\Validator\Db\NoRecordExists',
                        'options' => array(
                            'table' => 'user',
                            'field' => 'email',  
                            'adapter' => $dbAdapter,
                            'messages' => array(
                                \Zend\Validator\Db\NoRecordExists::ERROR_RECORD_FOUND => 'The specified email already exists in database' 
                            ),
                            
                        )
                    ),
                )
            );            
            
        
        }
        return $validators;
    }

    /**
     * set array data to object
     */
    public function exchangeArray($data)
    {
       
        $this->id		= (isset($data["id"])) ? $data["id"] : $this->id;
        $this->username		= (isset($data["username"])) ? $data["username"] : $this->username;
        $this->salt		= (isset($data["salt"])) ? $data["salt"] : $this->salt;
        $this->firstname		= (isset($data["firstname"])) ? $data["firstname"] : $this->firstname;
        $this->lastname		= (isset($data["lastname"])) ? $data["lastname"] : $this->lastname;
        $this->phone		= (isset($data["phone"])) ? $data["phone"] : $this->phone;
        $this->mobile		= (isset($data["mobile"])) ? $data["mobile"] : $this->mobile;
        $this->email		= (isset($data["email"])) ? $data["email"] : $this->email;
        $this->twitter		= (isset($data["twitter"])) ? $data["twitter"] : $this->twitter;
        $this->setPassword((isset($data["password"])) ? $data["password"] : null);
        $this->passwordhint		= (isset($data["passwordhint"])) ? $data["passwordhint"] : $this->passwordhint;
        $this->gender		= (isset($data["gender"])) ? $data["gender"] : $this->gender;
        $this->dateofbirth		= (isset($data["dateofbirth"])) ? $data["dateofbirth"] : $this->dateofbirth;
        $this->facebookid		= (isset($data["facebookid"])) ? $data["facebookid"] : $this->facebookid;
        $this->phoneguid		= (isset($data["phoneguid"])) ? $data["phoneguid"] : $this->phoneguid;
        $this->subscribe		= (isset($data["subscribe"])) ? $data["subscribe"] : $this->subscribe;
        $this->mobilesubscribe		= (isset($data["mobilesubscribe"])) ? $data["mobilesubscribe"] : $this->mobilesubscribe;
        $this->role		= (isset($data["role"])) ? $data["role"] : $this->role;
        $this->terms		= (isset($data["terms"])) ? $data["terms"] : $this->terms;
        $this->facebookdata		= (isset($data["facebookdata"])) ? $data["facebookdata"] : $this->facebookdata;
        $this->token		= (isset($data["token"])) ? $data["token"] : $this->token;
        $this->tokenexpire		= (isset($data["tokenexpire"])) ? $data["tokenexpire"] : $this->tokenexpire;
        $this->isactive		= (isset($data["isactive"])) ? $data["isactive"] : $this->isactive;
        $this->logindate		= (isset($data["logindate"])) ? $data["logindate"] : $this->logindate;
        $this->lastupdate		= (isset($data["lastupdate"])) ? $data["lastupdate"] : $this->lastupdate;
        $this->postdate		= (isset($data["postdate"])) ? $data["postdate"] : $this->postdate;
    }

    /**
     * Set the password value as a salted hash
     *
     * @password raw password string
     */
    public function setPassword($password)
    {
        if($password != ''){
            if(strlen($password) < 40){
                if($password != $this->password){
                    if($this->staticSalt == null){
                        throw new \Exception("No static salt set, please inital model via service manager");
                    }
                    if($this->salt == null){
                        $this->salt = \OnyxSystem\DataFunctions::getSalt();
                    }
                    $passwordHash = sha1($this->salt . $password . $this->staticSalt);
                    $this->password = $passwordHash;
                }
            }else{
                $this->password = $password;
            }
        }else{
            $this->password = null;
        }
        
    }

    /**
     * get all object vars for hydrator
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    /**
     * Set the sites static salt for password hashing
     *
     * @salt static site salt
     */
    public function setStaticSalt($salt)
    {
        $this->staticSalt = $salt;
    }


}

?>