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
        'roleName_required'             => 'Please provide a name.',
        'roleName_maxlength_10'         => 'The maximum length of this field is 10.',
        'roleName_unique'               => 'Role Name must be unique in roles table.',
    ],
    'header'          => [
        'create'            => 'Create Role',
        'edit'              => 'Edit Role',
    ],
];
