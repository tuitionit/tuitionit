<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Alert Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain alert messages for various scenarios
    | during CRUD operations. You are free to modify these language lines
    | according to your application's requirements.
    |
    */

    'backend' => [
        'roles' => [
            'created' => 'The role was successfully created.',
            'deleted' => 'The role was successfully deleted.',
            'updated' => 'The role was successfully updated.',
        ],

        'users' => [
            'confirmation_email'  => 'A new confirmation e-mail has been sent to the address on file.',
            'created'             => 'The user was successfully created.',
            'deleted'             => 'The user was successfully deleted.',
            'deleted_permanently' => 'The user was deleted permanently.',
            'restored'            => 'The user was successfully restored.',
            'session_cleared'      => "The user's session was successfully cleared.",
            'updated'             => 'The user was successfully updated.',
            'updated_password'    => "The user's password was successfully updated.",
        ],

        'institutes' => [
            'created' => 'The institute was successfully created.',
            'deleted' => 'The institute was successfully deleted.',
            'deleted_permanently' => 'The institute was deleted permanently.',
            'restored' => 'The institute was successfully restored.',
            'updated' => 'The institute was successfully updated.',
            'not_linked' => 'You are not assigned to any institute yet. Please contact the admin.',
        ],

        'students' => [
            'created' => 'The student was successfully created.',
            'deleted' => 'The student was successfully deleted.',
            'deleted_permanently' => 'The student was deleted permanently.',
            'restored' => 'The student was successfully restored.',
            'updated' => 'The student was successfully updated.',
        ],
    ],
];
