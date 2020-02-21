<?php

namespace app\models;

class Users extends \lithium\data\Model
{
	public $validates = [
		'name' => [
			[
				'notEmpty',
				'required' => true,
				'message' => 'Please supply a name.'
			]

		],
		'username' => [
			[
				'notEmpty',
				'required' => true,
				'last'=>true,
				'message' => 'Please supply a username.',	
			],
			[
				'unique',
				'message' => "Username should be Unique"
			]
		],
		'email' => [
			[
				'notEmpty',
				'required' => true,
				'message' => 'Please supply a email.'
			],
			[
				'email',
				'message' => 'Invalid Mail'
			]
		],
		'password' => [
			[
				'notEmpty',
				'required' => false,
				'message' => 'Please supply a password.'
			]
		],
		'confirmpassword' => [
			[
				'notEmpty',
				'required' => false,
				'message' => 'Please supply a confirm password.'
			]

		]
	 ];
	public $hasMany = ['Posts' => [
		'to'          => 'Posts',
		'key'         => 'uid',
		'constraints' => [],
		'fields'      => [],
		'order'       => null,
		'limit'       => null
	]];
}
