<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all'     => 'All',
        'yes'     => 'Yes',
        'no'      => 'No',
        'custom'  => 'Custom',
        'actions' => 'Actions',
        'active'  => 'Active',
        'buttons' => [
            'save'   => 'Save',
            'update' => 'Update',
        ],
        'hide'              => 'Hide',
        'inactive'          => 'Inactive',
        'none'              => 'None',
        'show'              => 'Show',
        'toggle_navigation' => 'Toggle Navigation',
    ],

    'teacher' => [
        'title' => [
            'mr' => 'Mr.',
            'mrs' => 'Mrs.',
            'ms' => 'Ms',
            'mx' => 'Mx.',
            'dr' => 'Dr.',
            'prof' => 'Prof.',
            'rev' => 'Rev.',
        ]
    ],

    'batch' => [
        'type' => [
            'standard' => 'Standard',
            'group' => 'Group',
            'individual' => 'Individual',
            'seminar' => 'Seminar',
            'test' => 'Test',
            'other' => 'Other',
        ]
    ],

    'payment' => [
        'type' => [
            'monthly' => 'Monthly',
            'installment' => 'Installment',
            'session' => 'Session',
            'other' => 'Other',
        ],
        'payment_method' => [
            'cash' => 'Cash',
            'bank' => 'Bank Payment',
            'cheque' => 'Cheque',
            'credit_card' => 'Credit Card',
            'other' => 'Other',
        ],
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create'     => 'Create Role',
                'edit'       => 'Edit Role',
                'management' => 'Role Management',

                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions'     => 'Permissions',
                    'role'            => 'Role',
                    'sort'            => 'Sort',
                    'total'           => 'role total|roles total',
                ],
            ],

            'users' => [
                'active'              => 'Active Users',
                'all_permissions'     => 'All Permissions',
                'change_password'     => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'create'              => 'Create User',
                'deactivated'         => 'Deactivated Users',
                'deleted'             => 'Deleted Users',
                'edit'                => 'Edit User',
                'management'          => 'User Management',
                'no_permissions'      => 'No Permissions',
                'no_roles'            => 'No Roles to set.',
                'permissions'         => 'Permissions',

                'table' => [
                    'confirmed'      => 'Confirmed',
                    'created'        => 'Created',
                    'email'          => 'E-mail',
                    'id'             => 'ID',
                    'last_updated'   => 'Last Updated',
                    'name'           => 'Name',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted'     => 'No Deleted Users',
                    'roles'          => 'Roles',
                    'total'          => 'user total|users total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history'  => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'Avatar',
                            'confirmed'    => 'Confirmed',
                            'created_at'   => 'Created At',
                            'deleted_at'   => 'Deleted At',
                            'email'        => 'E-mail',
                            'last_updated' => 'Last Updated',
                            'name'         => 'Name',
                            'status'       => 'Status',
                        ],
                    ],
                ],

                'view' => 'View User',
            ],
        ],

        'institute' => [
            'title' => 'Institute',
            'overview' => 'Overview',
            'locations' => 'Locations',
        ],

        'institutes' => [
            'all' => 'All Institutes',
            'create' => 'New Institute',
            'edit' => 'Edit Institute',
            'active' => 'Active Institutes',
            'inactive' => 'Inactive Institutes',
            'management' => 'Institutes Management',

            'table' => [
                'id' => 'ID',
                'code' => 'Code',
                'name' => 'Name',
                'city' => 'City',
                'created' => 'Created',
                'last_updated' => 'Last Updated',
            ],
        ],

        'locations' => [
            'management' => 'Locations',
            'create' => 'Add New Location',
            'edit' => 'Edit Details',
            'general' => 'General Details',
            'contact' => 'Contact Details',
            'overview' => 'Overview',
            'rooms' => 'Rooms',
        ],

        'rooms' => [
            'management' => 'Rooms',
            'create' => 'Add New Room',
            'edit' => 'Edit Details',
            'general' => 'General Details',
            'contact' => 'Contact Details',
            'overview' => 'Overview',
            'rooms' => 'Rooms',
        ],

        'student' => [
            'title' => 'Student',
            'overview' => 'Overview',
            'batches' => 'Batches',
            'cources' => 'Cources',
            'profile' => 'Profile',
            'reports' => 'Reports',
            'sessions' => 'Sessions',
            'payments' => 'Payments',
            'settings' => 'Settings',
            'upcoming_sessions' => 'Upcoming Sessions',
            'past_sessions' => 'Past Sessions',
        ],

        'teachers' => [
            'all' => 'All Teachers',
            'create' => 'New Teacher',
            'edit' => 'Edit Teacher',
            'active' => 'Active Teachers',
            'inactive' => 'Inactive Teachers',
            'management' => 'Teachers Management',

            'table' => [
                'id' => 'ID',
                'name' => 'Name',
                'short_name' => 'Short Name',
                'title' => 'Title',
                'level' => 'Level',
                'cv' => 'CV',
                'bio' => 'Bio',
                'user_id' => 'User',
                'status' => 'Status',
                'created' => 'Joined',
                'last_updated' => 'Updated',
            ],
        ],

        'students' => [
            'all' => 'All Students',
            'create' => 'New Student',
            'edit' => 'Edit Student',
            'active' => 'Active Students',
            'inactive' => 'Inactive Students',
            'management' => 'Students Management',

            'table' => [
                'id' => 'ID',
                'index_number' => 'Index No.',
                'name' => 'Name',
                'phone' => 'Phone',
                'status' => 'Status',
                'created' => 'Joined',
                'last_updated' => 'Updated',
            ],
        ],

        'subjects' => [
            'all' => 'All Subjects',
            'create' => 'New Subject',
            'edit' => 'Edit Subject',
            'active' => 'Active Subjects',
            'inactive' => 'Inactive Subjects',
            'management' => 'Subjects Management',

            'table' => [
                'id' => 'ID',
                'name' => 'Name',
                'description' => 'Description',
                'status' => 'Status',
                'created' => 'Created',
                'last_updated' => 'Last Updated',
            ],
        ],

        'courses' => [
            'all' => 'All Courses',
            'create' => 'New Course',
            'edit' => 'Edit Course',
            'active' => 'Active Courses',
            'inactive' => 'Inactive Courses',
            'management' => 'Courses Management',

            'table' => [
                'id' => 'ID',
                'name' => 'Name',
                'description' => 'Description',
                'status' => 'Status',
                'created' => 'Created',
                'last_updated' => 'Last Updated',
            ],
        ],

        'batch' => [
            'overview' => 'Overview',
            'students' => 'Students',
            'add_students' => 'Add Students',
        ],

        'batches' => [
            'all' => 'All Batches',
            'create' => 'New Batch',
            'edit' => 'Edit Batch',
            'active' => 'Active Batches',
            'inactive' => 'Inactive Batches',
            'management' => 'Batches Management',

            'table' => [
                'id' => 'ID',
                'name' => 'Name',
                'description' => 'Description',
                'status' => 'Status',
                'created' => 'Created',
                'last_updated' => 'Last Updated',
            ],
        ],

        'session' => [
            'overview' => 'Overview',
            'students' => 'Students',
            'attending_students' => 'Attending Students',
        ],

        'sessions' => [
            'all' => 'All Sessions',
            'create' => 'New Session',
            'edit' => 'Edit Session',
            'active' => 'Active Sessions',
            'inactive' => 'Inactive Sessions',
            'management' => 'Sessions Management',

            'table' => [
                'id' => 'ID',
                'name' => 'Name',
                'description' => 'Description',
                'start_time' => 'Start',
                'end_time' => 'End',
                'subject' => 'Subject',
                'room' => 'Room',
                'location' => 'Location',
                'teacher' => 'Teacher',
                'batch' => 'Batch',
                'course' => 'Course',
                'status' => 'Status',
                'created' => 'Created',
                'last_updated' => 'Last Updated',
            ],
        ],

        'payment' => [
            'overview' => 'Overview',
        ],

        'payments' => [
            'all' => 'All Payments',
            'create' => 'Add Payment',
            'edit' => 'Edit Payment',
            'management' => 'Payments Management',

            'table' => [
                'id' => 'ID',
                'student' => 'Student',
                'amount' => 'Amount',
                'type' => 'Type',
                'installment' => 'Installment',
                'month' => 'Month',
                'paid_by' => 'Paid By',
                'paid_at' => 'Paid At',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title'    => 'Login',
            'login_button'       => 'Login',
            'login_with'         => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button'    => 'Register',
            'remember_me'        => 'Remember Me',
        ],

        'passwords' => [
            'forgot_password'                 => 'Forgot Your Password?',
            'reset_password_box_title'        => 'Reset Password',
            'reset_password_button'           => 'Reset Password',
            'send_password_reset_link_button' => 'Send Password Reset Link',
        ],

        'macros' => [
            'country' => [
                'alpha'   => 'Country Alpha Codes',
                'alpha2'  => 'Country Alpha 2 Codes',
                'alpha3'  => 'Country Alpha 3 Codes',
                'numeric' => 'Country Numeric Codes',
            ],

            'macro_examples' => 'Macro Examples',

            'state' => [
                'mexico' => 'Mexico State List',
                'us'     => [
                    'us'       => 'US States',
                    'outlying' => 'US Outlying Territories',
                    'armed'    => 'US Armed Forces',
                ],
            ],

            'territories' => [
                'canada' => 'Canada Province & Territories List',
            ],

            'timezone' => 'Timezone',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar'             => 'Avatar',
                'created_at'         => 'Created At',
                'edit_information'   => 'Edit Information',
                'email'              => 'E-mail',
                'last_updated'       => 'Last Updated',
                'name'               => 'Name',
                'update_information' => 'Update Information',
            ],
        ],

    ],
];
