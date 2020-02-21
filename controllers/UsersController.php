<?php

namespace app\controllers;

use app\controllers\Validator;
use lithium\data\Model;
use lithium\security\Auth;
use app\models\Users;
use Exception;
use lithium\security\Password;
use PHPMailer\PHPMailer\PHPMailer;


class UsersController extends \lithium\action\Controller
{

    public $data = [];
    public function index()
    {
        if (Auth::check('user')) {
            $this->_render['layout'] = 'login';
        }
        $users = Users::all();
        return compact('users');
    }

    public function add()
    {
        $user = Users::create($this->request->data);
        if (Auth::check('user')) {
            $this->_render['layout'] = 'login';
        
        }
        if ($this->request->data) {
            $user = Users::create($this->request->data);
            $user->validates();
            $errors = $user->errors();
            $success = false;
            try {
                if ($user->save($this->request->data)) {
                    $success = true;
                }
            } catch (Exception $e) {
                $data['error'] = 'Username already taken';
                return compact('user', 'data');
            }
            if ($success == true&& Auth::check('user')) {
                $this->redirect("/users/index");
            }  else if( $success==true){
                $data['success'] = 'User Rgistered';
                return compact('data');
            } 
            else {
                return compact('user', 'errors');
            }
        }
        
        return compact('errors');
    }


    public function update()
    {
        if (!Auth::check('user')) {
            return $this->redirect('Sessions::add');
        } else {
            $this->_render['layout'] = 'login';
        }
        $uploaddir = 'webroot/uploads/';
        $uploadfile = $uploaddir . basename($_FILES['image']['name']);
        $uploadfile = str_replace(' ', '', $uploadfile);

        $userDetail = Users::find('first', [
            'conditions' => ['username' => Auth::check('user')['username']]
        ]);
        $id = $userDetail->id;
        if ($this->request->data) {
            $user = Users::create($this->request->data);
            if ($this->request->data['username'] == $userDetail->username) {
                $user->validates([
                    'whitelist' => ['name', 'email']
                ]);
                $errors = $user->errors();
            } else {
                $user->validates(['whitelist' => ['name', 'email', 'username']]);
                $errors = $user->errors();
            }
            if ($errors) {
                $this->_render['layout'] = 'login';
                return compact('user');
            }
        }
        if ($this->request->data) {
            if ($this->request->data['image']['name']) {
                $this->request->data['image'] = $this->request->data['image']['name'];
                $this->request->data['image'] =   str_replace(' ', '',  $this->request->data['image']);
                Auth::set('user', ["image" => $this->request->data['image'], "name" => $this->request->data['name'], "username" => $this->request->data['username']]);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    $data['msg'] = "File Uploaded Successfully";
                } else {
                    echo "Possible file upload attack!\n";
                }
            } else {
                $this->request->data['image'] = Auth::check('user')['image'];
            }
            if (Users::update($this->request->data, ['id' => $id])) {
                Auth::set('user', ["image" => $this->request->data['image'], "name" => $this->request->data['name'], "username" => $this->request->data['username']]);
                $data['success'] = 'User updated';
                $this->_render['template'] = 'index';
                $this->_render['layout'] = 'login';
                $users = Users::find('all');
                return compact('data', 'users');
            }
        }
        $user = $userDetail;
        $this->_render['layout'] = 'login';
        return compact('user');
    }

    public function updateuser()
    {
        if (!Auth::check('user')) {
            return $this->redirect('Sessions::add');
        } else {
            $this->_render['layout'] = 'login';
        }
        $id = $this->request->args[0];
        $uploaddir = 'webroot/uploads/';
        $uploadfile = $uploaddir . basename($_FILES['image']['name']);
        $uploadfile = str_replace(' ', '', $uploadfile);

        $userDetail = Users::find('first', [
            'conditions' => ['id' => $id]
        ]);
        var_dump($userDetail);
        $id = $userDetail->id;
        if ($this->request->data) {
            $user = Users::create($this->request->data);
            if ($this->request->data['username'] == $userDetail->username) {
                $user->validates([
                    'whitelist' => ['name', 'email']
                ]);
                $errors = $user->errors();
            } else {
                $user->validates(['whitelist' => ['name', 'email', 'username']]);
                $errors = $user->errors();
            }
            if ($errors) {
                $this->_render['layout'] = 'login';
                return compact('user');
            }
        }
        if ($this->request->data) {
            if ($this->request->data['image']['name']) {
                $this->request->data['image'] = $this->request->data['image']['name'];
                $this->request->data['image'] =   str_replace(' ', '',  $this->request->data['image']);
                Auth::set('user', ["image" => $this->request->data['image'], "name" => $this->request->data['name'], "username" => $this->request->data['username']]);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    $data['msg'] = "File Uploaded Successfully";
                } else {
                    echo "Possible file upload attack!\n";
                }
            } else {
                $this->request->data['image'] = Auth::check('user')['image'];
            }
            if (Users::update($this->request->data, ['id' => $id])) {
                Auth::set('user', ["image" => $this->request->data['image'], "name" => $this->request->data['name'], "username" => $this->request->data['username']]);
                $data['success'] = 'User updated';
                $this->_render['template'] = 'index';
                $this->_render['layout'] = 'login';
                $users = Users::find('all');
                return compact('data', 'users');
            }
        }
        $user = $userDetail;
        $this->_render['layout'] = 'login';
        return compact('user');
    }
    public function mail()
    {
        if ($this->request->data) {
            $user = Users::find('first', [
                'conditions' => ['username' => $this->request->data['username']]
            ]);
        }

        if ($user) {
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Mailer = "smtp";
            $mail->SMTPDebug  = 1;
            $mail->SMTPAuth   = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port       = 587;
            $mail->Host       = "smtp.gmail.com";
            $mail->Username   = "chhavi.gupta412@gmail.com";
            $mail->Password   = "Chhavi@1997";
            $mail->IsHTML(true);
            $mail->AddAddress($this->request->data['email'], $this->request->data['username']);
            $mail->SetFrom("chhavi@gmail.com", 'BLog');
            $mail->Subject = "Password Reset";
            $content = "Yout password is admin";
            $mail->MsgHTML($content);
            if (!$mail->Send()) {
                echo "Error while sending Email.";
            } else {
                echo "Email sent successfully";
            }
            $data['password'] = Password::hash("admin");

            Users::update($data, ['id' => $user->id]);
        }
        return true;
    }
}
