<?php

namespace sagalaya\tests\mocks\models;

use sagalaya\extensions\data\Model;

/**
 * @Entity
 * @Table(name="mock_groups")
 */
class MockGroup extends Model
{

    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="string", unique=true)
     */
    protected $name;

    /**
     * @OneToMany(targetEntity="MockUser", mappedBy="group")
     */
    protected $users;
}

?>
