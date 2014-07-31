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
        'mobile' => array(
            'required' => false,
            'name' => 'mobile',
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
        'email' => array(
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
            'required' => false,
            'name' => 'terms',
            'validators' => array(
                
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
        )
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
        $this->id		= (isset($data["id"])) ? $data["id"] : null;
        $this->username		= (isset($data["username"])) ? $data["username"] : null;
        $this->salt		= (isset($data["salt"])) ? $data["salt"] : null;
        $this->firstname		= (isset($data["firstname"])) ? $data["firstname"] : null;
        $this->lastname		= (isset($data["lastname"])) ? $data["lastname"] : null;
        $this->phone		= (isset($data["phone"])) ? $data["phone"] : null;
        $this->mobile		= (isset($data["mobile"])) ? $data["mobile"] : null;
        $this->email		= (isset($data["email"])) ? $data["email"] : null;
        $this->twitter		= (isset($data["twitter"])) ? $data["twitter"] : null;
        $this->setPassword((isset($data["password"])) ? $data["password"] : null);
        $this->passwordhint		= (isset($data["passwordhint"])) ? $data["passwordhint"] : null;
        $this->gender		= (isset($data["gender"])) ? $data["gender"] : null;
        $this->dateofbirth		= (isset($data["dateofbirth"])) ? $data["dateofbirth"] : null;
        $this->facebookid		= (isset($data["facebookid"])) ? $data["facebookid"] : null;
        $this->phoneguid		= (isset($data["phoneguid"])) ? $data["phoneguid"] : null;
        $this->subscribe		= (isset($data["subscribe"])) ? $data["subscribe"] : null;
        $this->mobilesubscribe		= (isset($data["mobilesubscribe"])) ? $data["mobilesubscribe"] : null;
        $this->role		= (isset($data["role"])) ? $data["role"] : null;
        $this->terms		= (isset($data["terms"])) ? $data["terms"] : null;
        $this->facebookdata		= (isset($data["facebookdata"])) ? $data["facebookdata"] : null;
        $this->token		= (isset($data["token"])) ? $data["token"] : null;
        $this->tokenexpire		= (isset($data["tokenexpire"])) ? $data["tokenexpire"] : null;
        $this->isactive		= (isset($data["isactive"])) ? $data["isactive"] : null;
        $this->logindate		= (isset($data["logindate"])) ? $data["logindate"] : null;
        $this->lastupdate		= (isset($data["lastupdate"])) ? $data["lastupdate"] : null;
        $this->postdate		= (isset($data["postdate"])) ? $data["postdate"] : null;
    }

    /**
     * Set the password value as a salted hash
     *
     * @password raw password string
     */
    public function setPassword($password)
    {
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