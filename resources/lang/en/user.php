<?php
return [
    'title'          => 'Management User',
    'fields'         => [
        'column1'            => 'STT',
        'column2'            => 'Name',
        'column3'            => 'Email',
        'column4'            => 'Roles',
        'column5'            => 'Action',
    ],
    'label'           => [
        'create_name'       => 'Name',
        'create_email'      => 'Email',
    ],
    'error'           => [
        'create_userName_required'    => 'Please provide a name.',
        'create_userEmail_required'     => 'Please provide a redirect url.',
        'edit_clientIdEdit_required'    => 'Please provide a id.',
        'edit_clientIdEdit_notExists'   => 'This id is not exists.',
        'edit_clientNameEdit_required'  => 'Please provide a name.',
        'edit_clientUrlEdit_required'   => 'Please provide a redirect url.',
        'delete_clientIdDelete_required'    => 'Please provide a id.',
        'delete_clientIdDelete_notExists'   => 'This id is not exists.',
    ],
    'header'          => [
        'create'            => 'Create User',
        'edit'              => 'Edit User',
    ],
];
