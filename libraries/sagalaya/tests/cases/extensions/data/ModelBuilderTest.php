<?php
namespace sagalaya\tests\cases\extensions\data;

use lithium\test\Unit;
use sagalaya\tests\mocks\models as Model;

class ModelBuilderTest extends Unit
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
                'profile' => array('fullName' => 'SomeOne'),
                'group' => $group
            )
        );
        $mock->save();
        $this->assertEqual($mock->email, 'some@email.com');
        $mock->properties = array(
            'username' => 'others',
            'email' => 'other@email.com',
            'profile' => array('fullName' => 'others'),
            'group' => $group
        );
        $this->assertEqual($mock->email, 'other@email.com');
        $this->assertEqual($mock->profile->fullName, 'others');
        $profile = new Model\MockProfile(array(
            'fullName' => 'mysterious'
        ));
        $mock->profile = $profile;
        $this->assertEqual($mock->profile->fullName, 'mysterious');
        $mock->delete();
    }
}
