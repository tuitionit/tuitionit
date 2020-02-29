<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => 'The :attribute field must have a value.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [

        'backend' => [
            'access' => [
                'permissions' => [
                    'associated_roles' => 'Associated Roles',
                    'dependencies'     => 'Dependencies',
                    'display_name'     => 'Display Name',
                    'group'            => 'Group',
                    'group_sort'       => 'Group Sort',

                    'groups' => [
                        'name' => 'Group Name',
                    ],

                    'name'   => 'Name',
                    'system' => 'System?',
                ],

                'roles' => [
                    'associated_permissions' => 'Associated Permissions',
                    'name'                   => 'Name',
                    'sort'                   => 'Sort',
                ],

                'users' => [
                    'active'                  => 'Active',
                    'associated_roles'        => 'Associated Roles',
                    'confirmed'               => 'Confirmed',
                    'email'                   => 'E-mail Address',
                    'name'                    => 'Name',
                    'other_permissions'       => 'Other Permissions',
                    'password'                => 'Password',
                    'password_confirmation'   => 'Confirm Password',
                    'send_confirmation_email' => 'Send Confirmation E-mail',
                    'address' => 'Address',
                    'city' => 'City',
                    'state_province' => 'Province',
                    'country' => 'Country',
                    'postal_code' => 'Postal Code',
                    'email' => 'Email',
                    'phone' => 'Phone',
                    'fax' => 'Fax',
                    'web' => 'Web',
                ],
            ],

            'institutes' => [
                'name' => 'Name',
                'code' => 'Code',
                'domain' => 'Domain',
                'status' => 'Status',
                'active' => 'Active',
            ],

            'locations' => [
                'name' => 'Name',
                'code' => 'Code',
                'description' => 'Description',
                'address' => 'Address',
                'city' => 'City',
                'state_province' => 'Province',
                'country' => 'Country',
                'postal_code' => 'Postal Code',
                'email' => 'Email',
                'phone' => 'Phone',
                'fax' => 'Fax',
                'web' => 'Web',
                'status' => 'Status',
                'active' => 'Active',
                'institute' => 'Institute',
            ],

            'rooms' => [
                'name' => 'Name',
                'description' => 'Description',
                'capacity' => 'Capacity',
                'has_sound' => 'Sounds',
                'has_blackboard' => 'Blackboard',
                'has_whiteboard' => 'Whiteboard',
                'has_projector' => 'Projector',
                'is_airconditioned' => 'Air-conditioned',
                'location_id' => 'Location',
                'status' => 'Status',
                'active' => 'Active',
            ],

            'teachers' => [
                'name' => 'Name',
                'short_name' => 'Short Name',
                'title' => 'Title',
                'level' => 'Level',
                'cv' => 'CV',
                'bio' => 'Bio',
                'user_id' => 'User',
                'status' => 'Status',
                'active' => 'Active',
                'subjects' => 'Subjects',

                'help' => [
                    'user_id' => 'Select a user account to link this teacher profile.',
                    'subjects' => 'Select the subjects this teacher will be teaching at your institute.',
                ],
            ],

            'students' => [
                'index_number' => 'Index No.',
                'name' => 'Name',
                'phone' => 'Phone',
                'status' => 'Status',
                'active' => 'Active',
                'user_id' => 'User',
                'parent_id' => 'Parent',
                'locations' => 'Locations',

                'help' => [
                    'user_id' => 'Select if this student already has a user account. User will be able to check own sessions and reports when linked.',
                    'parent_id' => 'Select a parent for this student profile. Parent will have access to student profile and reports.',
                    'locations' => 'Select all locations this student attending for classes.',
                ],
            ],

            'subjects' => [
                'name' => 'Name',
                'description' => 'Description',
                'status' => 'Status',
                'active' => 'Active',
            ],

            'sessions' => [
                'name' => 'Name',
                'description' => 'Description',
                'type' => 'Type',
                'start_time' => 'Start Time',
                'end_time' => 'End Time',
                'location_id' => 'Location',
                'subject_id' => 'Subject',
                'room_id' => 'Room',
                'teacher_id' => 'Teacher',
                'batch_id' => 'Batch',
                'course_id' => 'Course',
                'is_template' => 'Template?',
                'teacher_comment' => 'Teacher\'s Comments',
                'status' => 'Status',
                'active' => 'Active',
                'repeat' => 'Repeat this session',

                'help' => [
                    'start_time' => 'Eg: 2018-12-25 09:00',
                    'end_time' => 'Eg: 2018-12-25 13:00',
                ],
            ],

            'session_groups' => [
                'start_date' => 'Start Date',
                'end_date' => 'End Date',
                'start' => 'Starts on',
                'end' => 'Ends',
                'ends_on' => 'On',
                'ends_after' => 'After :input sessions',
                'repeat_type' => 'Repeats',
                'frequency' => 'Repeat every',
                'repeat_on' => 'Repeat on',
                'repeat_by' => 'Repeat by',
                'count' => '',
            ],

            'courses' => [
                'name' => 'Name',
                'description' => 'Description',
                'status' => 'Status',
                'active' => 'Active',
            ],

            'batches' => [
                'name' => 'Name',
                'description' => 'Description',
                'type' => 'Type',
                'location_id' => 'Location',
                'course_id' => 'Course',
                'subject' => 'Subject',
                'start_date' => 'Start Date',
                'end_date' => 'End Date',
                'status' => 'Status',
                'active' => 'Active',

                'help' => [
                    'start_date' => 'Eg: 2017-01-15',
                    'end_date' => 'Eg: 2017-12-25',
                ],
            ],

            'payments' => [
                'amount' => 'Amount',
                'type' => 'Type',
                'installment' => 'Installment',
                'month' => 'Month',
                'paid_at' => 'Paid At',
                'paid_by' => 'Paid By',
                'paid_to' => 'Paid To',
                'student_id' => 'Student',
                'batch_id' => 'Batch',
                'session_id' => 'Session',
                'payment_method' => 'Payment Method',
                'paid' => 'Paid',
                'notes' => 'Notes',

                'help' => [
                    'month' => 'Select the month for this payment.',
                    'installment' => 'Select the installment number for this payment.',
                ]
            ],

            'attendance' => [
                'session' => 'Session'
            ],


            'assignments' => [
                'name' => 'Name',
                'description' => 'Description',
                'type' => 'Type',
                'start_time' => 'Start Time',
                'end_time' => 'End Time',
                'subject_id' => 'Subject',
                'room_id' => 'Room',
                'location_id' => 'Location',
                'teacher_id' => 'Teacher',
                'batch_id' => 'Batch',
                'course_id' => 'Course',
                'is_template' => 'Template?',
                'teacher_comment' => 'Teacher\'s Comments',
                'status' => 'Status',

                'help' => [
                    'start_time' => 'Eg: ' . date('Y-m-d') . ' 09:00',
                    'end_time' => 'Eg: ' . date('Y-m-d') . ' 13:00',
                ],
            ],
        ],

        'frontend' => [
            'email'                     => 'E-mail Address',
            'name'                      => 'Name',
            'password'                  => 'Password',
            'password_confirmation'     => 'Password Confirmation',
            'old_password'              => 'Old Password',
            'new_password'              => 'New Password',
            'new_password_confirmation' => 'New Password Confirmation',
        ],
    ],

];
