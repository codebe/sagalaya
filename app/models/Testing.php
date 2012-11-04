<?php

namespace app\models;

/**
 * @Entity(repositoryClass="app\resources\repository\TestingRepository")
 * @HasLifecycleCallbacks
 * @Table(name="users")
 */
class Testing extends \sagalaya\extensions\data\Model
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

    protected $validations = array(
        'email' => array(
            array('notEmpty', 'message' => 'Email can\'t be empty')
        )
    );
	
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