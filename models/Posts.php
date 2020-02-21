<?php   
namespace app\models;

class Posts extends \lithium\data\Model {
    public $validates = [
		'title' => [
			[
				'notEmpty',
                'required' => true,
                'message' => 'Please supply a title.',
			]
		],
		'content' => [
			[
				'notEmpty',
				'required' => true,
                'message' => 'Please supply a Content.',
			],
			[
				'lengthBetween',	
				'message'=>"Length must be between 0-255"
			]
		]

	];
}