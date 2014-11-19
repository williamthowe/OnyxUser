<?php
namespace OnyxUser\Model;

use Zend\Db\TableGateway\TableGateway;

/**
 * UserTable model
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

// @TODO
/*
 *  Rename the table to prefix with module name
 * 
 */
class UserTable
{

    public $tableGateway = null;

    /**
     * build the model
     */
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    /**
     * Return all data
     */
    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    /**
     * retrieve object by id
     *
     * @id The primary key of the object
     */
    public function getById($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
        	return false;
        }
        return $row;
    }

    /**
     * retrieve object by id
     *
     * @id The primary key of the object
     */
    public function save(User $user)
    {
        $data = array(
        	'id' => $user->id,
        	'username' => $user->username,
        	'password' => $user->password,
        	'salt' => $user->salt,
        	'firstname' => $user->firstname,
        	'lastname' => $user->lastname,
        	'phone' => $user->phone,
        	'mobile' => $user->mobile,
        	'email' => $user->email,
        	'twitter' => $user->twitter,
        	'passwordhint' => $user->passwordhint,
        	'gender' => $user->gender,
        	'dateofbirth' => $user->dateofbirth,
        	'facebookid' => $user->facebookid,
        	'phoneguid' => $user->phoneguid,
        	'subscribe' => $user->subscribe,
        	'mobilesubscribe' => $user->mobilesubscribe,
        	'role' => $user->role,
        	'terms' => $user->terms,
        	'facebookdata' => $user->facebookdata,
        	'token' => $user->token,
            'tokenexpire' => $user->tokenexpire,    
        	'isactive' => $user->isactive,
        	'logindate' => $user->logindate,
        	'lastupdate' => $user->lastupdate,
        	'postdate' => $user->postdate,

        );
        $id = (int)$user->id;
        
        if ($id == 0) {
        	$data['postdate'] = date('Y-m-d H:i:s');
                $id = $this->tableGateway->insert($data);
                $user->id = $id;
        	return $id;
        } else {
        	if ($this->getById($id)) {
        		$this->tableGateway->update($data, array('id' => $id));
        	} else {
        		throw new \Exception('User id does not exist');
        	}
        }
    }

    /**
     * Delete onject by id
     *
     * @id The primary key of the object
     */
    public function delete($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }

    /**
     * update user login by id
     *
     * @id The primary key of the object
     */
    public function updateLogin($id)
    {
        $data['logindate'] = date('Y-m-d H:i:s');
        $this->tableGateway->update($data, array('id' => $id));
    }
    
    public function setNewToken($user){
        $data['token'] = md5($user->email .  time() . '09438564236jkl34h6klhkjlgdf879');
        $data['tokenexpire'] = date("Y-m-d H:i:s");
        $this->tableGateway->update($data, array('id' => $user->id));
        return $data['token'];
    }
    
    /**
     * retrieve object by token
     *
     * @token 
     */
    public function getByToken($token)
    {
        $token  = (string) $token;
        $rowset = $this->tableGateway->select(array('token' => $token));
        $row = $rowset->current();
        if (!$row) {
        	return false;
        }
        return $row;
    }
    
    /**
     * retrieve object by email
     *
     * @email 
     */
    public function getByEmail($email)
    {
        $email  = (string) $email;
        $rowset = $this->tableGateway->select(array('email' => $email));
        $row = $rowset->current();
        if (!$row) {
        	return false;
        }
        return $row;
    }


}

?>