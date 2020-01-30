<?php
return [
    'title'          => 'Management User',
    'fields'         => [
        'column1'            => 'ID',
        'column2'            => 'Name',
        'column3'            => 'Email',
        'column4'            => 'Roles',
        'column5'            => 'Action',
    ],
    'label'           => [
        'create_name'       => 'Name',
        'create_email'      => 'Email',
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
        'create'            => 'Create User',
        'edit'              => 'Edit User',
    ],
];
