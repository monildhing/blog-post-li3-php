<?php
use app\models\Users;
use lithium\aop\Filters;
use lithium\security\Password;

Filters::apply(Users::class, 'save', function($params, $next) {
	if ($params['data']) {
		$params['entity']->set($params['data']);
		$params['data'] = [];
	}
	if (!$params['entity']->exists()) {
		$params['entity']->password = Password::hash($params['entity']->password);
	}
	return $next($params);
});