<?php

namespace app\models;

class Applier extends \lithium\data\Model
{
    public $validates = [
        'name' => [
            [
                'notEmpty',
                'required' => true,
                'message' => 'Please supply a title.',
            ]
        ],
        'email' => [
            [
                'notEmpty',
                'required' => true,
                'message' => 'Please supply a Content.',
            ]
        ],
        'password' => [
            [
                'notEmpty',
                'required' => true,
                'message' => 'Please supply a Content.',
            ]
        ],
        'city' => [
            [
                'notEmpty',
                'required' => true,
                'message' => 'Please supply a Content.',
            ]
        ],
        'state' => [
            [
                'notEmpty',
                'required' => true,
                'message' => 'Please supply a Content.',
            ]
        ]

    ];
}
