<?php
namespace app\controllers;

use Exception;
use lithium\security\Auth;
use app\models\Users;
class SessionsController extends \lithium\action\Controller {

	public function add() {
		if ($this->request->data && Auth::check('user',$this->request)) {
			$user = Users::find('first', [
				'conditions' => ['username' => $_SESSION['namee']]
			]);
			return $this->redirect('/posts/index');
		}
		else if($this->request->data['username']!=null){
			$data['error']='Username or Password Incorrect';
			return compact('data');
		}
		return false;
	}
	public function delete() {
		Auth::clear('user');
		return $this->redirect('/login');
	}
	/* ... */
}