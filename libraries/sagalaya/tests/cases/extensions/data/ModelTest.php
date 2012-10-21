<?php

namespace sagalaya\tests\cases\extensions\data;

use lithium\test\Unit;
use sagalaya\tests\mocks\models\MockUser;

class ModelTest extends Unit
{

    public function testInstance()
    {
        $group = new \sagalaya\tests\mocks\models\MockGroup(array('name' => 'Mock'));
        $mock = new MockUser(
            array(
                'username' => 'someone',
                'email' => 'some@email.com',
                'profile' => array('fullname' => 'SomeOne'),
                'group' => $group
            )
        );
        $mock->save();
        $this->assertEqual($mock->email, 'some@email.com');
        $mock->delete();
    }

}

?>