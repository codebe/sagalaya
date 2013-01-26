<?php

namespace sagalaya\tests\mocks\models;

/**
 * @Entity
 * @Table(name="mock_profiles")
 */
class MockProfile extends \sagalaya\extensions\data\Model
{

    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $fullName;

    protected $validations = array(
        'fullName' => array(
            array('notEmpty', 'message' => 'Fullname can\'t be empty'),
            array('custom', 'message' => 'Fullname can\'t be George Bush',
            'function' => 'return strcasecmp($object->fullName, "Anonymous") != 0;')
        )
    );
}
