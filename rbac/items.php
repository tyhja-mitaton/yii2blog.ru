<?php
return [
    'login' => [
        'type' => 2,
    ],
    'logout' => [
        'type' => 2,
    ],
    'error' => [
        'type' => 2,
    ],
    'sign-up' => [
        'type' => 2,
    ],
    'write-post' => [
        'type' => 2,
    ],
    'create-post' => [
        'type' => 2,
    ],
    'update-post' => [
        'type' => 2,
    ],
    'delete' => [
        'type' => 2,
    ],
    'check-post' => [
        'type' => 2,
    ],
    'appoint' => [
        'type' => 2,
    ],
    'guest' => [
        'type' => 1,
        'children' => [
            'login',
            'logout',
            'error',
            'sign-up',
        ],
    ],
    'moderator' => [
        'type' => 1,
        'children' => [
            'delete',
            'check-post',
            'appoint',
            'editor',
            'user',
        ],
    ],
    'editor' => [
        'type' => 1,
        'children' => [
            'create-post',
            'update-post',
            'write-post',
            'guest',
        ],
    ],
    'user' => [
        'type' => 1,
        'children' => [
            'write-post',
            'guest',
            'update-own-post',
        ],
    ],
    'update-own-post' => [
        'type' => 2,
        'description' => 'Update own post',
        'ruleName' => 'isAuthor',
        'children' => [
            'update-post',
        ],
    ],
];
