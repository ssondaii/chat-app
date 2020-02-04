<?php
return [
    'title'          => 'Management Permission',
    'fields'         => [
        'column1'            => 'ID',
        'column2'            => 'Name',
        'column3'            => 'Update Time',
        'column4'            => 'Action',
    ],
    'label'           => [
        'label1'            => 'Name',
    ],
    'validate'           => [
        'permissionName_required'             => 'Please provide a name.',
        'permissionName_maxlength_25'         => 'The maximum length of this field is 25.',
        'permissionName_unique'               => 'Permission Name must be unique in roles table.',
        'permission_id_required'              => 'Permission id must be required.',
        'permission_id_exist'                 => 'This Permission is not exist.',
    ],
    'header'          => [
        'create'            => 'Create Permission',
        'edit'              => 'Edit Permission',
        'delete'            => 'Confirm Delete Permission',
    ],
];
