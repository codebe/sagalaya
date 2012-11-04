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

    public function testCondition() {
        $data = array(
            'retypePassword' => 'password',
            'address1' => 'bandung',
            'address2' => 'jakarta'
        );
        $user = new User($data);
        $user->password = 'password';

        $user->addCondition(array(
            'retypePassword' => array(
                array('equalWith',
                    'with' => 'password',
                    'message' => 'Retype Password is not same with password')
            )
        ));

        if ($user->save()) {
            $this->redirect('Users::index');
        } else {
            $errors = $user->getErrors();
        }
        var_dump($errors); die;
    }
	
}