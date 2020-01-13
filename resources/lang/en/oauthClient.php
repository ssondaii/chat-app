<?php
return [
    'title'          => 'OAuth Clients',
    'title_singular' => 'OAuth Client',
    'fields'         => [
        'id'                => 'Client ID',
        'secret'            => 'Client Secret',
        'name'              => 'Name',
        'url'               => 'URL Redirect',
        'action'            => 'Action',
    ],
    'button'          => [
        'create'            => 'Create New Oauth client',
        'btn-close'         => 'Close',
        'btn-create'        => 'Create',
        'btn-confirm'       => 'Confirm',
        'btn-cancel'        => 'Cancel',
        'btn-save'          => 'Save',
        'btn-delete'        => 'Delete',
    ],
    'label'           => [
        'create_name'       => 'Name',
        'create_url'        => 'Redirect Url',
    ],
    'describe'        => [
        'create_name'       => 'Something your users will recognize and trust.',
        'create_url'        => 'Your application\'s authorization callback URL.',
    ],
    'error'           => [
        'create_clientName_required'    => 'Please provide a name.',
        'create_clientUrl_required'     => 'Please provide a redirect url.',
        'edit_clientIdEdit_required'    => 'Please provide a id.',
        'edit_clientIdEdit_notExists'   => 'This id is not exists.',
        'edit_clientNameEdit_required'  => 'Please provide a name.',
        'edit_clientUrlEdit_required'   => 'Please provide a redirect url.',
        'delete_clientIdDelete_required'    => 'Please provide a id.',
        'delete_clientIdDelete_notExists'   => 'This id is not exists.',
    ],
    'header'          => [
        'success'           => 'Success',
        'fail'              => 'Fail',
        'error'             => 'Error',
        'create'            => 'Create New Oauth client',
        'edit'              => 'Edit OAuth Client',
        'delete'            => 'Confirm Delete',
    ],
    'message'         => [
        'success'           => 'Action performed successfully.',
        'fail'              => 'action taken failed.'
    ],
];
