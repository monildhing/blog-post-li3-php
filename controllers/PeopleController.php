<?php

namespace app\controllers;

use app\models\People;
use app\models\Users;
use lithium\security\Auth;

class PeopleController extends \lithium\action\Controller
{
    protected function _init() {
        parent::_init();
        $this->_render['layout'] = 'login';
    }
    public function index()
    {
        if (!Auth::check('user')) {
            return $this->redirect('Sessions::add');
        }
        $pepoles = People::find('all');
        return compact('pepoles');
    }

    public function add()
    {
        if (!Auth::check('user')) {
            return $this->redirect('Sessions::add');
        }
        $people = People::create();
        $success = false;
        if ($this->request->data && $people->save($this->request->data)) {
            $success = true;
        }
        if ($success == true) {
            $this->redirect("/people/index");
        } else {
            return compact('people');
        }
    }
    public function delete()
    {
        $title = $this->request->args[0];
        $post = People::find('first', [
            'conditions' => ['id' => $title]
        ]);
        People::delete($post,['conditions'=>['id'=>$post->id]]);
        return $this->redirect("/posts/index");
    }
    public function update()
    {
        if (!Auth::check('user')) {
            return $this->redirect('Sessions::add');
        }

        $title = $this->request->args[0];
        $post = People::find('first', [
            'conditions' => ['id' => $title]
        ]);
        if ($this->request->data) {
            $post = People::create($this->request->data);
            if ($post->validates()) {


                $data['title'] = $this->request->data["title"];
                $data['content'] = $this->request->data["content"];
                People::update($data, ['id' => $title]);
                return $this->redirect("/posts/index");
            } else {
                $post->errors();
            }
        }
        return compact('post');
    }
}
