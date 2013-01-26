<?php

namespace sagalaya\tests\mocks\models;

use sagalaya\extensions\data\Model;

/**
 * @Entity
 * @Table(name="mock_users")
 */
class MockUser extends Model
{

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="string", length=32, unique=true, nullable=false)
     */
    protected $email;

    /**
     * @Column(type="string")
     */
    protected $username;

    /**
     * @ManyToOne(targetEntity="MockGroup", cascade={"all"})
     */
    protected $group;

    /**
     * @OneToOne(targetEntity="MockProfile", cascade={"all"})
     */
    protected $profile;

    protected $validations = array(
        'email' => array(
            array('notEmpty', 'message' => 'Email can\'t be empty'),
            array('unique', 'message' => 'Email has been used, try another!')
        )
    );
}

?>
