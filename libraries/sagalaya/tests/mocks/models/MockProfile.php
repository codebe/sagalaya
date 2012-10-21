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
    protected $fullname;
}
