<?php
return [
    'title'          => 'Management Role',
    'fields'         => [
        'column1'            => 'STT',
        'column2'            => 'Name',
        'column3'            => 'isAdmin',
        'column4'            => 'Action',
    ],
    'label'           => [
        'label1'            => 'Name',
        'label2'            => 'isAdmin',
    ],
    'validate'           => [
        'userName_required'             => 'Please provide a name.',
        'userEmail_required'            => 'Please provide a email.',
        'userEmail_email'               => 'Email must be in proper format.',
        'userEmail_unique'              => 'Email must be unique in users table.',
        'userId_required'               => 'Id must be required.',
        'userId_exist'                  => 'User is not exist.',
    ],
    'header'          => [
        'create'            => 'Create Role',
        'edit'              => 'Edit Role',
    ],
];
