<?php

namespace app\controllers;

use app\models\User;

class UsersController extends \lithium\action\Controller {
	
	public $publicActions = array('index');
	
	public function index() {
        $user = new User();
        $user::test();
        $user::testOne('one');
        $user::testTwo('one', 'two');
        $user::testThree('one', 'two', 'three');
        $user::testFour('one', 'two', 'three', 'four');
        $user::testFive('one', 'two', 'three', 'four', 'five');
		die('end here..');
	}
	
}