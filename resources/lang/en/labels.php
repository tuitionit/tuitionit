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
        'months' => [
            'january'   => 'January',
            'february'  => 'February',
            'march'     => 'March',
            'april'     => 'April',
            'may'       => 'May',
            'june'      => 'June',
            'july'      => 'July',
            'august'    => 'August',
            'september' => 'September',
            'october'   => 'October',
            'november'  => 'November',
            'december'  => 'December',
        ],
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

    'session' => [
        'type' => [
            'standard' => 'Standard',
            'group' => 'Group',
            'individual' => 'Individual',
            'seminar' => 'Seminar',
            'test' => 'Test',
            'other' => 'Other',
        ]
    ],

    'session_group' => [
        'repeat_type' => [
            'daily' => 'Daily',
            'weekly' => 'Weekly',
            'monthly' => 'Monthly',
            'yearly' => 'Yearly',
        ],
        'frequency' => [
            'days' => 'Days',
            'weeks' => 'Weeks',
            'months' => 'Months',
            'years' => 'Years',
        ],
        'repeat_on' => [
            'su' => 'Su',
            'mo' => 'Mo',
            'tu' => 'Tu',
            'we' => 'We',
            'th' => 'Th',
            'fr' => 'Fr',
            'sa' => 'Sa',
            'sunday' => 'Sunday',
            'monday' => 'Monday',
            'tuesday' => 'Tuesday',
            'wednesday' => 'Wednesday',
            'thursday' => 'Thursday',
            'friday' => 'Friday',
            'saturday' => 'Saturday',
        ],
        'repeat_by' => [
            'day_of_month' => 'Day of month',
            'day_of_week' => 'Day of week',
        ],
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
        'dashboard' => [
            'add_new' => 'Add New',
            'student' => 'Student',
            'session' => 'Session',
            'payment' => 'Payment',
            'batch' => 'Batch',
            'course' => 'Course',
            'teacher' => 'Teacher',
            'location' => 'Location',
            'room' => 'Room',
        ],

        'table' => [
            'filters' => 'Filters',
        ],

        'access' => [
            'roles' => [
                'create'     => 'Create Role',
                'edit'       => 'Edit Role',
                'management' => 'Roles',

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
                'management'          => 'Users',
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

        'attendance' => [
            'title' => 'Attendance',
        ],

        'attendances' => [
            'all' => 'All Attendances',
            'create' => 'New Institute',
            'edit' => 'Edit Institute',
            'active' => 'Active Institutes',
            'inactive' => 'Inactive Institutes',
            'management' => 'Attendance',
            'select_session' => 'Select Session',

            'table' => [
                'id' => 'ID',
                'student' => 'Student',
                'session' => 'Session',
                'batch' => 'Batch',
                'marking_method' => 'Marking Method',
                'in_time' => 'In Time',
                'out_time' => 'Out Time',
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
            'management' => 'Institutes',

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
            'timeline' => 'Timeline',
            'reports' => 'Reports',
            'sessions' => 'Sessions',
            'payments' => 'Payments',
            'settings' => 'Settings',
            'parent' => 'Parent',
            'batches' => 'Batches',
            'next_session' => 'Next Session',
            'next_payment' => 'Next Payment',
            'upcoming_sessions' => 'Upcoming Sessions',
            'past_sessions' => 'Past Sessions',
            'completed_payments' => 'Completed Payments',
            'pending_payments' => 'Pending Payments',
        ],

        'teachers' => [
            'all' => 'All Teachers',
            'create' => 'New Teacher',
            'edit' => 'Edit Teacher',
            'active' => 'Active Teachers',
            'inactive' => 'Inactive Teachers',
            'management' => 'Teachers',

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
            'management' => 'Students',

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
            'management' => 'Subjects',

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
            'management' => 'Courses',

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
            'management' => 'Batches',

            'table' => [
                'id' => 'ID',
                'name' => 'Name',
                'description' => 'Description',
                'start_date' => 'Start Date',
                'end_date' => 'End Date',
                'course' => 'Course',
                'location' => 'Location',
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
            'management' => 'Sessions',

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
            'management' => 'Payments',

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
