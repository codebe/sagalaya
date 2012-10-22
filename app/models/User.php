<?php

namespace app\models;

/**
 * @Entity(repositoryClass="app\resources\repository\UserRepository")
 * @HasLifecycleCallbacks
 * @Table(name="users")
 */
class User extends \sagalaya\extensions\data\Model
	implements \Zend\Acl\Resource\ResourceInterface, \Zend\Acl\Role\RoleInterface {
	
	/**
	 * @Id @Column(type="string", length=36) @GeneratedValue(strategy="UUID")
	 */
	protected $id = null;

    /**
     * @Column(type="string", unique=true)
     */
    protected $email;

    /**
     * @Column(type="string")
     */
    protected $password;
	
	/**
	 * (non-PHPdoc)
	 * @see Zend\Acl\Role.RoleInterface::getRoleId()
	 */
	public function getRoleId() {
		return $this->id;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Zend\Acl\Resource.ResourceInterface::getResourceId()
	 */
	public function getResourceId() {
		return $this->id;
	}
}