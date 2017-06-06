<?php

return [
    'list' => [
        'menu' => [
            'actions' => [
                'title' => 'Actions',
                'submenus' => [
                    'create' => [
                        'title' => 'Create'
                    ]
                ]
            ]
        ],
        'title' => "Chat Rooms' List",
        'table' => [
            'head' => [
                'id' => 'ID',
                'name' => 'Name',
                'description' => 'Description',
                'created_at' => 'Created At',
                'join' => 'Join',
            ],
            'content' => [
                'join' => 'Join'
            ]
        ]
    ],
    'create' => [
        'title' => 'Create Chat Room',
        'fields' => [
            'name' => [
                'label' => 'Name',
                'placeholder' => 'Insert name here'
            ],
            'description' => [
                'label' => 'Description',
                'placeholder' => 'Insert description here'
            ]
        ],
        'buttons' => [
            'close' => [
                'label' => 'Close'
            ],
            'confirm' => [
                'label' => 'Confirm'
            ],
            'sending' => [
                'label' => "Sending"
            ]
        ]
    ]
];