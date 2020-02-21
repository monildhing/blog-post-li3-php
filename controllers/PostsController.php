<?php

namespace app\controllers;

use app\models\Posts;
use app\models\Users;
use lithium\security\Auth;

class PostsController extends \lithium\action\Controller
{
    protected function _init()
    {
        parent::_init();
        $this->_render['layout'] = 'login';
    }
    public function index()
    {
        if (!Auth::check('user')) {
            return $this->redirect('Sessions::add');
        }
        $posts = Posts::find('all', [
            'conditions' => ['uid' => Auth::check('user')['username']]
        ]);
        return compact('posts');
    }

    public function add()
    {
        if (!Auth::check('user')) {
            return $this->redirect('Sessions::add');
        }

        if ($this->request->data) {
            $post = Posts::create($this->request->data);
            $post->validates();
            $errors = $post->errors();
            $success = false;
            $this->request->data['uid'] = Auth::check('user')['username'];
            if ($post->save($this->request->data)) {
                $success = true;
            }
            if ($success == true) {
                $this->redirect("/posts/index");
            } else {
                return compact('post');
            }
        }
        return compact('true');
    }
    public function delete()
    {
        $title = $this->request->args[0];
        $post = Posts::find('first', [
            'conditions' => ['id' => $title]
        ]);
        Posts::delete($post, ['conditions' => ['id' => $post->id]]);
        return $this->redirect("/posts/index");
    }
    public function update()
    {
        if (!Auth::check('user')) {
            return $this->redirect('Sessions::add');
        }

        $title = $this->request->args[0];
        $post = Posts::find('first', [
            'conditions' => ['id' => $title]
        ]);
        if ($this->request->data) {
            $post = Posts::create($this->request->data);
            if ($post->validates()) {
                $data['title'] = $this->request->data["title"];
                $data['content'] = $this->request->data["content"];
                Posts::update($data, ['id' => $title]);
                return $this->redirect("/posts/index");
            } else {
                $post->errors();
            }
        }
        return compact('post');
    }
}
