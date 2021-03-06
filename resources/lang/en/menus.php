 <?php

return [

    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'title' => 'Access',

            'roles' => [
                'all'        => 'All Roles',
                'create'     => 'Create Role',
                'edit'       => 'Edit Role',
                'management' => 'Role Management',
                'main'       => 'Roles',
            ],

            'users' => [
                'all'             => 'All Users',
                'change-password' => 'Change Password',
                'create'          => 'Create User',
                'deactivated'     => 'Deactivated Users',
                'deleted'         => 'Deleted Users',
                'edit'            => 'Edit User',
                'main'            => 'Users',
                'view'            => 'View User',
            ],
        ],

        'attendance' => [
            'management' => 'Attendance',
        ],

        'attendances' => [
            'management' => 'Attendance',
            'all' => 'All Attendances',
            'mark' => 'Mark Attendances',
        ],

        'assignments' => [
            'management' => 'Assignments',
            'all' => 'All Assignments',
            'score' => 'Enter Scores',
        ],

        'institute' => [
            'management' => 'Institute',
        ],

        'institutes' => [
            'management' => 'Institutes',
            'all' => 'All Institutes',
            'create' => 'New Institute',
        ],

        'teachers' => [
            'management' => 'Teachers',
            'all' => 'All Teachers',
            'create' => 'New Teacher',
        ],

        'students' => [
            'management' => 'Students',
            'all' => 'All Students',
            'create' => 'New Student',
        ],

        'sessions' => [
            'management' => 'Sessions',
            'all' => 'All Sessions',
            'create' => 'New Session',
        ],

        'courses' => [
            'management' => 'Courses',
            'all' => 'All Courses',
            'create' => 'New Course',
        ],

        'batches' => [
            'management' => 'Batches',
            'all' => 'All Batches',
            'create' => 'New Batch',
        ],

        'payments' => [
            'management' => 'Payments',
            'all' => 'All Payments',
            'create' => 'Add Payment',
        ],

        'subjects' => [
            'management' => 'Subjects',
            'all' => 'All Subjects',
            'create' => 'New Subject',
        ],

        'log-viewer' => [
            'main'      => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs'      => 'Logs',
        ],

        'sidebar' => [
            'dashboard'     => 'Overview',
            'general'       => 'General',
            'system'        => 'System',
            'institutes'    => 'Institutes',
            'attendance'    => 'Attendance',
            'assignments'    => 'Assignments',
            'payments'      => 'Payments',
            'students'      => 'Students',
            'teachers'      => 'Teachers',
            'batches'       => 'Batches',
            'sessions'      => 'Sessions',
            'courses'       => 'Courses',
            'subjects'      => 'Subjects',
        ],
    ],

    'language-picker' => [
        'language' => 'Language',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar'    => 'Arabic',
            'da'    => 'Danish',
            'de'    => 'German',
            'el'    => 'Greek',
            'en'    => 'English',
            'es'    => 'Spanish',
            'fr'    => 'French',
            'id'    => 'Indonesian',
            'it'    => 'Italian',
            'nl'    => 'Dutch',
            'pt_BR' => 'Brazilian Portuguese',
            'ru'    => 'Russian',
            'sv'    => 'Swedish',
            'th'    => 'Thai',
        ],
    ],
];
