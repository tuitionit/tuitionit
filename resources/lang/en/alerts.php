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

        'locations' => [
            'created' => 'The location was successfully created.',
            'deleted' => 'The location was successfully deleted.',
            'deleted_permanently' => 'The location was deleted permanently.',
            'restored' => 'The location was successfully restored.',
            'updated' => 'The location was successfully updated.',
        ],

        'rooms' => [
            'created' => 'The room was successfully created.',
            'deleted' => 'The room was successfully deleted.',
            'deleted_permanently' => 'The room was deleted permanently.',
            'restored' => 'The room was successfully restored.',
            'updated' => 'The room was successfully updated.',
        ],

        'teachers' => [
            'created' => 'The teacher was successfully created.',
            'deleted' => 'The teacher was successfully deleted.',
            'deleted_permanently' => 'The teacher was deleted permanently.',
            'restored' => 'The teacher was successfully restored.',
            'updated' => 'The teacher was successfully updated.',
        ],

        'students' => [
            'created' => 'The student was successfully created.',
            'deleted' => 'The student was successfully deleted.',
            'deleted_permanently' => 'The student was deleted permanently.',
            'restored' => 'The student was successfully restored.',
            'updated' => 'The student was successfully updated.',
        ],

        'subjects' => [
            'created' => 'The subject was successfully created.',
            'deleted' => 'The subject was successfully deleted.',
            'deleted_permanently' => 'The subject was deleted permanently.',
            'restored' => 'The subject was successfully restored.',
            'updated' => 'The subject was successfully updated.',
        ],

        'sessions' => [
            'created' => 'The session was successfully created.',
            'deleted' => 'The session was successfully deleted.',
            'deleted_permanently' => 'The session was deleted permanently.',
            'restored' => 'The session was successfully restored.',
            'updated' => 'The session was successfully updated.',
        ],

        'courses' => [
            'created' => 'The course was successfully created.',
            'deleted' => 'The course was successfully deleted.',
            'deleted_permanently' => 'The course was deleted permanently.',
            'restored' => 'The course was successfully restored.',
            'updated' => 'The course was successfully updated.',
        ],

        'batches' => [
            'created' => 'The batch was successfully created.',
            'deleted' => 'The batch was successfully deleted.',
            'deleted_permanently' => 'The batch was deleted permanently.',
            'restored' => 'The batch was successfully restored.',
            'updated' => 'The batch was successfully updated.',
            'students_added' => '{0} No students added or all selected students are already in the batch.|{1} One student added successfully.|[2,*] :count students added successfully.',
        ],

        'payments' => [
            'created' => 'The payment was successfully added.',
            'deleted' => 'The payment was successfully deleted.',
            'deleted_permanently' => 'The payment was deleted permanently.',
            'restored' => 'The payment was successfully restored.',
            'updated' => 'The payment was successfully updated.',
        ],

        'assignments' => [
            'created' => 'The assignment was successfully created.',
            'deleted' => 'The assignment was successfully deleted.',
            'deleted_permanently' => 'The assignment was deleted permanently.',
            'restored' => 'The assignment was successfully restored.',
            'updated' => 'The assignment was successfully updated.',
        ],
    ],
];
