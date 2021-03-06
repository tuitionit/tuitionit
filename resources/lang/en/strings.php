<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Strings Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in strings throughout the system.
    | Regardless where it is placed, a string can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'general' => [
            'all_rights_reserved' => 'All Rights Reserved.',
            'are_you_sure'        => 'Are you sure you want to do this?',
            'boilerplate_link'    => 'Laravel 5 Boilerplate',
            'continue'            => 'Continue',
            'member_since'        => 'Member since',
            'minutes'             => ' minutes',
            'search_placeholder'  => 'Search...',
            'timeout'             => 'You were automatically logged out for security reasons since you had no activity in ',
            'click_to_select'     => 'Click to select',
            'export_to_csv'       => 'Export to CSV. Open and edit the exported file with Excel.',

            'see_all' => [
                'messages'      => 'See all messages',
                'notifications' => 'View all',
                'tasks'         => 'View all tasks',
            ],

            'status' => [
                'online'  => 'Online',
                'offline' => 'Offline',
            ],

            'you_have' => [
                'messages'      => '{0} You don\'t have messages|{1} You have 1 message|[2,Inf] You have :number messages',
                'notifications' => '{0} You don\'t have notifications|{1} You have 1 notification|[2,Inf] You have :number notifications',
                'tasks'         => '{0} You don\'t have tasks|{1} You have 1 task|[2,Inf] You have :number tasks',
            ],
        ],

        'search' => [
            'type' => 'Type for hints...',
            'empty'      => 'Please enter a search term.',
            'incomplete' => 'You must write your own search logic for this system.',
            'title'      => 'Search Results',
            'results'    => 'Search Results for :query',
        ],

        'welcome' => 'Welcome!',

        'dashboard' => [
            'title'   => 'Administrative Dashboard',
            'welcome' => 'Welcome',
            'courses' => 'Courses',
            'batches' => 'Batches',
            'sessions' => 'Sessions',
            'students' => 'Students',
            'teachers' => 'Teachers',
        ],

        'charts' => [
            'income_over_year' => 'Income Over Year',
            'income' => 'Income',
            'students_attendance' => 'Students Attendance',
            'students_registered_for_sessions' => 'Total student sessions',
            'students_attended_for_sessions' => 'Monthly attendance',
        ],

        'access' => [
            'users' => [
                'delete_user_confirm'  => 'Are you sure you want to delete this user permanently? Anywhere in the application that references this user\'s id will most likely error. Proceed at your own risk. This can not be un-done.',
                'if_confirmed_off'     => '(If confirmed is off)',
                'restore_user_confirm' => 'Restore this user to its original state?',
            ],
        ],

        'locations' => [
            'empty' => 'Add locations where your institute has branches. There should be at least one location.',
        ],

        'rooms' => [
            'empty' => 'Add all rooms in this location to schedule sessions at them. There should be at least one room at each location.',
        ],

        'teachers' => [
            'select_user' => 'This teacher already has a user account',
            'select_user_description' => 'Joining teacher profile with a user account will allow teachers to manage their profiles easily.',
        ],

        'student' => [
            'joined_on' => 'Joined on: :date',
            'payments_description' => 'All completed payments by student.'
        ],

        'batches' => [
            'select_students' => 'Select students to add to the batch. Start typing the name of a student to search for students.',
        ],

        'sessions' => [
            'time_from_to' => ':start - :end',
        ],

        'attendances' => [
            'select_session' => 'Select a session to start marking attendance.',
            'no_sessions' => 'No sessions scheduled for today. Create new session to start marking attendance.',
            'id' => 'Enter student ID',
            'empty_student_id' => 'Please enter a student ID',
            'saving' => 'Saving. Please wait...',
            'failed' => 'Communication error. Please try again!',
            'student_not_found' => 'Student not found!',
            'student_not_in_batch' => 'Student not registered for the batch!',
            'success' => 'Accepted!',
        ],
    ],

    'emails' => [
        'auth' => [
            'error'                   => 'Whoops!',
            'greeting'                => 'Hello!',
            'regards'                 => 'Regards,',
            'trouble_clicking_button' => 'If you’re having trouble clicking the ":action_text" button, copy and paste the URL below into your web browser:',
            'thank_you_for_using_app' => 'Thank you for using our application!',

            'password_reset_subject'    => 'Reset Password',
            'password_cause_of_email'   => 'You are receiving this email because we received a password reset request for your account.',
            'password_if_not_requested' => 'If you did not request a password reset, no further action is required.',
            'reset_password'            => 'Click here to reset your password',

            'click_to_confirm' => 'Click here to confirm your account:',
        ],
    ],

    'frontend' => [
        'test' => 'Test',

        'tests' => [
            'based_on' => [
                'permission' => 'Permission Based - ',
                'role'       => 'Role Based - ',
            ],

            'js_injected_from_controller' => 'Javascript Injected from a Controller',

            'using_blade_extensions' => 'Using Blade Extensions',

            'using_access_helper' => [
                'array_permissions'     => 'Using Access Helper with Array of Permission Names or ID\'s where the user does have to possess all.',
                'array_permissions_not' => 'Using Access Helper with Array of Permission Names or ID\'s where the user does not have to possess all.',
                'array_roles'           => 'Using Access Helper with Array of Role Names or ID\'s where the user does have to possess all.',
                'array_roles_not'       => 'Using Access Helper with Array of Role Names or ID\'s where the user does not have to possess all.',
                'permission_id'         => 'Using Access Helper with Permission ID',
                'permission_name'       => 'Using Access Helper with Permission Name',
                'role_id'               => 'Using Access Helper with Role ID',
                'role_name'             => 'Using Access Helper with Role Name',
            ],

            'view_console_it_works'          => 'View console, you should see \'it works!\' which is coming from FrontendController@index',
            'you_can_see_because'            => 'You can see this because you have the role of \':role\'!',
            'you_can_see_because_permission' => 'You can see this because you have the permission of \':permission\'!',
        ],

        'user' => [
            'change_email_notice' => 'If you change your e-mail you will be logged out until you confirm your new e-mail address.',
            'email_changed_notice' => 'You must confirm your new e-mail address before you can log in again.',
            'profile_updated'  => 'Profile successfully updated.',
            'password_updated' => 'Password successfully updated.',
        ],

        'welcome_to' => 'Welcome to :place',
    ],
];
