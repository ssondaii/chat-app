<?php
return [
    'title'          => 'Management Role',
    'fields'         => [
        'column1'            => 'STT',
        'column2'            => 'Name',
        'column3'            => 'Is Admin',
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
        'role_id_required'              => 'role id must be required.',
        'role_id_exist'                 => 'this role is not exist.',
        'role_admin_required'           => 'checkbox value must be required.',
        'role_admin_boolean'            => 'checkbox value must be boolean( true, false, 1, 0).',
    ],
    'header'          => [
        'create'            => 'Create Role',
        'edit'              => 'Edit Role',
    ],
];
