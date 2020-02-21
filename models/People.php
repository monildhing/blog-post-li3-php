<?php   
namespace app\models;

class People extends \lithium\data\Model {
    public $validates = [
		'name' => [
			[
				'notEmpty',
                'required' => true,
                'message' => 'Please supply a title.',
			]
		],
		'contact' => [
			[
				'notEmpty',
				'required' => true,
                'message' => 'Please supply a Content.',
			]
		]
	];
}