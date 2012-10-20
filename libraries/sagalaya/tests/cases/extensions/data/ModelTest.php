<?php
namespace sagalaya\tests\cases\extensions\data;

use lithium\test\Unit;
use sagalaya\tests\mocks\extensions\data\MockModel;

class User extends MockModel {
	
}

class ModelTest extends Unit {
	
	public function testInstance() {
		$user = new User();	
	}
	
}

?>