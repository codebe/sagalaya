<?php
namespace sagalaya\tests\cases\extensions\data;

use lithium\test\Unit;
use sagalaya\tests\mocks\models as Model;

class ModelAnnotationTest extends Unit
{
    public function testInstance()
    {
        $group = new Model\MockGroup(
            array('name' => 'Mock')
        );

        $mock = new Model\MockUser(
            array(
                'username' => 'someone',
                'email' => 'some@email.com',
                'profile' => array('fullname' => 'SomeOne'),
                'group' => $group
            )
        );

        $this->assertEqual($mock->email, 'some@email.com');
        $mock->delete();
    }
}
