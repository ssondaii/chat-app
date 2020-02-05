<?php
return [
    'title'                 => 'Management Role',
    'title_role_permission' => 'Management Role - Permission',
    'fields'         => [
        'column1'            => 'ID',
        'column2'            => 'Name',
        'column3'            => 'Permission',
        'column4'            => 'Update Time',
        'column5'            => 'Action',
    ],
    'label'           => [
        'label1'            => 'Name',
        'label2'            => 'isAdmin',
    ],
    'validate'           => [
        'roleName_required'             => 'Please provide a name.',
        'roleName_maxlength_10'         => 'The maximum length of this field is 10.',
        'roleName_unique'               => 'Role Name must be unique in roles table.',
        'role_id_required'              => 'Role id must be required.',
        'role_id_exist'                 => 'This role is not exist.',
        'role_id_integer'               => 'Role id must be integer.',
    ],
    'header'          => [
        'create'            => 'Create Role',
        'edit'              => 'Edit Role',
        'delete'            => 'Confirm Delete Role',
    ],
];
