<?php
return [
    'test_success' => 'Test completed successfully.',

    'invalid_credentials' => 'The credentials you entered are incorrect. Please try again.',
    'something_went_wrong' => 'An unexpected error occurred. Please try again later.',

    'current_password_incorrect' => 'The current password you entered is incorrect.',
    'password_same_as_current' => 'Your new password cannot be the same as the current password.',
    'password_updated_successfully' => 'Your password has been updated successfully.',

    'update_failed' => 'We were unable to update the data. Please try again.',
    'add_failed' => 'We were unable to add the data. Please try again.',

    'status_update_success' => 'The status has been updated successfully.',
    'status_update_failed' => 'Unable to update the status. Please try again.',

    'file_upload_success' => 'Profile photo uploaded successfully.',
    'file_upload_failed' => 'There was an issue uploading the file. Please try again.',

    'record_created_success' => 'The record was created successfully.',
    'record_creation_failed' => 'Failed to create the record. Please try again later.',

    'record_updated_success' => 'The record was updated successfully.',
    'record_updated_failed' => 'Unable to update the record. Please try again later.',

    'record_status_updated_success' => 'The record status was updated successfully.',
    'record_status_updated_failed' => 'Unable to update the record status. Please try again.',

    'record_deleted_successfully' => 'The record has been deleted successfully.',
    'record_deleted_failed' => 'Failed to delete the record. Please try again.',

    'record_archived_successfully' => 'The record has been archived successfully.',
    'record_archived_failed' => 'Failed to archived the record. Please try again.',

    'record_deleted_failed_assign_record' => 'This record cannot be deleted as it is associated with other records.',

    'record_not_found' => 'The requested record could not be found.',
    'record_access_denied' => 'You do not have permission to access this record or it was not found.',

    'access_denied' => 'Access Denied',
    'account_not_active' => 'Your account is not active yet. Please contact the business owner or support.',
    'team_not_assigned' => 'You are not assigned to any active business team. Please contact the business owner.',
    'team_not_active' => 'Your assigned business team is inactive. Please contact the business owner to resolve this issue.',
    'invitation_invalid_or_expired' => 'This invitation link is invalid or has expired.',

    'record_status_verified_success' => 'The record has been verified successfully.',
    'record_status_verified_failed' => 'Unable to verified the record. Please try again.',

    'sw_delete_title' => 'Confirm Deletion',
    'sw_delete_text' => "This action cannot be undone. Do you want to proceed?",
    'sw_delete_confirm_button' => 'Yes, delete it!',

    'unauthorized_action' => 'You are not authorized to perform this action.',

    'user_inactive' => 'Your account is inactive. Please contact support.',

    'sw_title_success' => 'Success',
    'sw_title_updated' => 'Updated',
    #'sw_delete_title' => 'Confirm Deletion',
    #'sw_delete_text' => "This action cannot be undone. Do you want to proceed?",
    #'sw_delete_confirm_button' => 'Yes, delete it!',

    'apis' => [
        'business_category_not_found' => 'Business category not found.',
        'business_type_not_found' => 'Business type not found.',
        'business_not_found' => 'Business not found.',
        'business_team_not_found' => 'Business team member not found.',
    ],

    'coming_soon' => 'Coming Soon',
    'coming_soon_section' => [
        'title' => 'Coming Soon: Stay Tuned!',
        'subtitle' => 'Something exciting is coming your way soon',
    ],

    'page_titles' => [
        'log_in' => 'Log In',
        'forgot_password' => 'Forgot Password',
        'reset_password' => 'Reset Password',
    ],

    'common_business' => [
        'loading' => 'Loading...',
        'saving' => 'Saving...',
        'save' => 'Save',
        'next' => 'Next',
        'previous' => 'Previous',
        'finish' => 'Finish',
        'dropzone' => [
            // 'default' => 'Drop files here to upload',
            'default' => 'Drag your photos here',
            'remove_file' => 'Remove file',
            'cancel_upload' => 'Cancel upload',
            'max_files' => 'You can’t upload any more files.',
        ],
        'unsaved_changes' => [
            'title' => 'You have unsaved changes on this page',
            'message' => 'If you leave this page, all unsaved changes will be lost. Are you sure you want to leave this page?',
            'leave' => 'Leave Page',
            'cancel' => 'Cancel',
        ],
    ],

    'common_statuses' => [
        'archived' => 'Archived',
        'pending' => 'Pending',
    ],

    'common_labels' => [
        'select_all' => 'Select All',
        'work_in_progress' => 'Work in progress',
        'new_uppercase' => 'NEW',
        'old_uppercase' => 'OLD',
        'checkout' => 'Checkout',
        'receipt_uppercase' => 'RECEIPT',
        'payments' => 'Payments',

        'full_name' => 'Full name',
        'email' => 'Email',
        'phone_number' => 'Phone Number',
        'phone_number_2' => 'Phone Number 2',
        'mobile_number' => 'Mobile Number',
        'website' => 'Website',
        'role' => 'Role',
        'status' => 'Status',
        'created_date' => 'Created Date',
        'last_updated_date' => 'Last Updated Date',
        'action' => 'Action',
        'actions' => 'Actions',

        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'password' => 'Password',
        'gender' => 'Gender',
        'male' => 'Male',
        'female' => 'Female',
        'status' => 'Status',
        'select_status' => 'Select Status',
        'description' => 'Description',

        'meta_title' => 'Meta Title',
        'meta_description' => 'Meta Description',
        'meta_keywords' => 'Meta Keywords',
        'main_image' => 'Main Image',

        'profile' => 'Profile',
        'update_password' => 'Update Password',
        'current_password' => 'Current Password',
        'confirm_password' => 'Confirm Password',

        'no_records_found' => 'No records found',
        'walk_in' => 'Walk-in',
        'total' => 'Total',
        'grand_total' => 'Grand total',
        'qty' => 'Qty',
        'amount_inc_vat' => 'Amount (inc. VAT)',

        'sales' => 'Sales',
        'refunds' => 'Refunds',
        'total_sales' => 'Total sales',
        'total_sales_incl_vat' => 'Total sales (incl. VAT)',
        'employee' => 'Employee',
        'sales_incl_vat' => 'Sales (incl. VAT)',

        'services' => 'Services',
        'products' => 'Products',
        'vouchers' => 'Vouchers',

        'date' => 'Date',
        'month' => 'Month',

        'no_data' => 'No data',

        'back_to' => 'Back To',
        'login' => 'Login',

        'new_password' => 'New Password',
        'confirm_password' => 'Confirm Password',

        'create_a_password' => 'Create a password',
        'email_address' => 'Email address',
        'choose_password' => 'Choose password',
        'retype_password' => 'Retype password',

        'reset_filter' => 'Reset Filter',
        'no_options' => 'No options',
        'active_and_pending' => 'Active and Pending',
        'archived' => 'Archived',
    ],

    'btns' => [
        'start_using_clickbook' => 'Start using Clickbook',

        'action' => 'Action',
        'save' => 'Save',
        'complete' => 'Complete',
        'cancel' => 'Cancel',
        'delete' => 'Delete',
        'remove' => 'Remove',
        'save_publish' => 'Save & Publish',
        'archive' => 'Archive',
        'add_new' => 'Add new',
        'save_mark_active' => 'Save & Mark Active',
        'preview' => 'Preview',
        'add_selected' => 'Add selected',

        'add_another_service' => 'Add another service',
        'repeat' => 'Repeat',
        'cancel_appointment' => 'Cancel appointment',
        'close' => 'Close',

        'receipt_copy' => 'Receipt copy',
        'add' => 'Add',
        'checkout' => 'Checkout',
        'view_on_marketplace' => 'View on Marketplace',

        'reset_password' => 'Reset Password',
        'view' => 'View',

        'get_access' => 'Get Access',
        'view_on_frontend' => 'View on Frontend',
    ],

    'dropzonejs' => [
        'dictDefaultMessage' => "Drop files here to upload",
        'dictFallbackMessage' => "Your browser does not support drag’n’drop file uploads.",
        'dictFileTooBig' => "File is too big ({{filesize}}MiB). Max allowed: {{maxFilesize}}MiB.",
        'dictInvalidFileType' => "You can’t upload files of this type.",
        'dictResponseError' => "Server responded with {{statusCode}} code.",
        'dictCancelUpload' => "Cancel upload",
        'dictUploadCanceled' => "Upload canceled",
        'dictCancelUploadConfirmation' => "Are you sure you want to cancel this upload?",
        'dictRemoveFile' => "Remove file",
        'dictMaxFilesExceeded' => "You can’t upload any more files."
    ],

    'months' => [
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May',
        6 => 'June',
        7 => 'July',
        8 => 'August',
        9 => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December',
    ],

    'duration' => [
        // 'hour' => 'h',
        // 'minute' => 'min',

        'hour' => 'hour',
        'hours' => 'hours',

        'minute' => 'minute',
        'minutes' => 'minutes',
    ],

    'navigation_menus' => [
        'calendar' => 'Calendar',
        'select_calendar' => 'Select Calendar',
        'calendar_sub_menus' => [
            'calendar' => 'Calendar',
        ],

        'dashboard' => 'Dashboard',
        'dashboard_sub_menus' => [
            'setup' => 'Setup',
            'stats' => 'Stats',
            'customer_reviews' => 'Customer Reviews',
        ],

        'menu' => 'Menu',
        'menu_sub_menus' => [
            'services' => 'Services',
            'package' => 'Package',
            'pricing_levels' => 'Pricing Levels',
            'discounts' => 'Discounts',
        ],

        'team' => 'Team',
        'team_sub_menus' => [
            'rota' => 'Rota',
            'team' => 'Team',
        ],

        'products' => 'Products',
        'products_sub_menus' => [
            'products' => 'Products',
            'suppliers' => 'Suppliers',
            'orders' => 'Orders',
        ],

        'clients' => 'Clients',
        'clients_sub_menus' => [
            'clients' => 'Clients',
        ],

        'settings_sub_menus' => [
            'venue' => 'Venue',
            'finance' => 'Finance',
            'notifications' => 'Notifications',
            'online_booking' => 'Online booking',
        ],

        'marketing' => 'Marketing',

        'reports' => 'Reports',
        'reports_sub_menus' => [
            'reports' => 'Reports',
        ],

        'refer_a_salon' => 'Refer a Salon',
        'partner_help_center' => 'Partner Help Center',
        'what_s_new' => "What's New",
        'chat_support' => "Chat Support",
    ],

    'sale' => [
        'sell_product' => 'Sell Product',
        'sell_voucher' => 'Sell Voucher',
        'employee_performing_checkout' => 'Employee performing checkout',
        'subtotal' => 'Subtotal',
        'total_paid' => 'Total paid',
        'to_pay' => 'To pay',
        'change' => 'Change',
        'includes' => 'includes',
        'tip' => 'Tip',
        'select_card_type' => 'Select card type',
        'form' => [
            'type_product_name' => 'Type product name',
            'type_voucher_name' => 'Type voucher name',
            'sold_by' => 'Sold by',
            'by' => 'by',
            'discount' => 'Discount',
        ]
    ],

    'appointment' => [
        'appointment' => 'Appointment',
        'form' => [
            'client' => 'Client',
            'search_for_client' => 'Search for client...',
            'phone' => 'Phone',
            'email' => 'Email',
            'service' => 'Service',
            'service_not_selected' => 'Service not selected',
            'date' => 'Date',
            'time' => 'Time',
            'duration' => 'Duration',
            'team_member' => 'Team member',
            'ends_on' => 'ends on',
            'add_a_note' => 'Add a note',
            'appointment_overlap_next_day' => 'Appointment cannot overlap into the next day',
            'appointment_time_unavailable' => 'Unavailable at this time',
            'notify_user'=>'Notify User'
        ],
        'confirm_cancellation' => 'Confirm cancellation',
        'booking_source' => 'Booking source',
        'direct' => 'Direct',
        'payment_type' => 'Payment type',
        'pay_at_venue' => 'Pay at venue',
        'what_will_happen_next' => 'What will happen next:',
        'appointment_client_email_notification' => 'Your client will be notified via email',
        'slot_not_available' => 'The :time slot is not available with :team_member.',
    ],

    'block' => [
        'block' => 'Block',
        'block_text' => 'Blocks are for things like lunch breaks and holidays. If you have a customer, use appointments instead so they get a reminder and you can build your digital client list.',
        'form' => [
            'team_member' => 'Team member',
            'select_team_member' => 'Select team member',
            'for_all_team_members' => 'For all team members',
            'description' => 'Description',
            'repeat' => 'Repeat',
            'start_date' => 'Start date',
            'end_date' => 'End date',
        ],
    ],

    'calendar' => [
        'calendar' => 'Calendar',
        'all_team_members' => 'All Team Members',
        'sales' => [
            'sales' => 'Sales',
            'new_sale' => 'New sale',
            'close_day' => 'Close day',
            'cash_withdrawal' => 'Cash withdrawal',
            'cash_deposit' => 'Cash deposit',
            'transaction_report' => 'Transaction report',
            'pos_help_centre' => 'POS Help Centre',
        ],
        'add' => [
            'add' => 'Add',
            'appointment' => 'Appointment',
            'block' => 'Block',
            'multiple_blocks' => 'Multiple blocks',
            'waiting_list' => 'Waiting List',
        ],
        'calendar_intro' => 'Want to use the calendar? Add your team <br />members first.',
        'goto_team_list' => 'Go to Team member list',

        'validation' => [
            'client_required' => 'Client is required.',
            'services_required' => 'Please add at least one service.',
            'service_required' => 'Service is required.',
            'service_invalid' => 'Service is invalid.',
            'attribute_invalid' => 'Attribute is invalid.',
            'team_required' => 'Team is required.',
            'team_invalid' => 'Team is invalid.',
            'date_required' => 'Date is required.',
            'date_format' => 'Date must be in format DD/MM/YYYY.',
            'start_time_required' => 'Start time is required.',
            'start_time_format' => 'Start time must be in format HH:MM.',
            'duration_required' => 'Duration is required.',
            'duration_invalid' => 'Duration must be a valid number greater than 0.',
            'end_time_format' => 'End time must be in format HH:MM.',
            'notes_text' => 'Notes must be text.',
        ],
    ],

    'dashboard' => [
        'setup' => [],
        'stats' => [
            'stats' => 'Stats',
            'earned' => 'Earned',

            'overview' => 'Overview',
            'this_month' => 'This Month',

            'view_report' => 'View report',
        ],
        'customer-reviews' => [
            'customer_review' => 'Customer Review',
            'no_reviews_yet' => 'No reviews yet.',
        ],
    ],

    'clients' => [
        'clients' => 'Clients',
        'list' => [
            'table' => [
                'full_name' => 'Full name',
                'phone' => 'Phone',
                'email' => 'Email',
                'status' => 'Status',
                'action' => 'Action',
            ]
        ],

        'add_client' => 'Add client',
        'client' => 'Client',
        'form' => [
            'full_name' => 'Full name',
            'phone' => 'Phone',
            'email' => 'Email',

            'marketing_communication' => 'Marketing communication',
            'gdpr_consent_text' => 'I confirm that I have obtained specific, informed, freely given and active consent from this customer to receive invites to rebook and other marketing emails and SMS from my salon and have a record of this consent. <a href="#" target="_blank">Learn more about GDPR requirements</a>',

            'prepayment_required' => 'Prepayment required',
            'prepayment_text' => 'Require the customer to pay in advance whenever they book with your salon online.',

            'gender' => 'Gender',
            'male' => 'Male',
            'female' => 'Female',

            'birth_month' => 'Birth Month',
            'select_month' => 'Select Month',
            'birth_day' => 'Birth Day',
            'birth_year' => 'Birth Year',

            'notes' => 'Notes',
        ],
        'record_created_success' => 'Client added successfully.',
        'record_updated_success' => 'Client updated successfully',
    ],

    'products' => [
        'products' => 'Products',
        'list' => [
            'table' => [
                'product' => 'Product',
                'supplier' => 'Supplier',
                'price' => 'Price',
                'vat' => 'VAT',
                'stock' => 'Stock',
                'action' => 'Action',
            ]
        ],
        'add_product' => 'Add Product',
        'product' => 'Product',
        'form' => [
            'enter_product_name' => 'Enter product name',
            'unit_price_including_vat' => 'e.g. 19.99',

            'product_name' => 'Product Name',
            'unit_price_incl_vat' => 'Unit Price (incl. VAT) (€)',
            'vat_rate' => 'VAT Rate (%)',
            'manage_inventory' => 'Manage Inventory',
            'quantity_in_stock' => 'Quantity in Stock',
        ],
        'record_created_success' => 'Product added successfully',
        'record_updated_success' => 'Product updated successfully',
    ],

    'enums' => [
        'BusinessAppointmentBookingStatus' => [
            'confirmed' => 'Confirmed',
            'complete' => 'Complete',
            'canceled' => 'Canceled',
        ],
        'BusinessSaleItemType' => [
            'service' => 'Service',
            'product' => 'Product',
            'voucher' => 'Voucher',
            'custom' => 'Custom',
        ]
    ],

    'reports' => [
        'reports' => 'Reports',
        'lists' => [
            'title' => 'Lists',
            'text' => 'From bookings to transactions, we’ve got all the details to improve your understanding of data.',
            'items' => [
                'bookings' => 'Bookings',
                'transactions' => 'Transactions',
                'covid_cancellations' => 'COVID-19 cancellations',
            ]
        ],
        'sales' => [
            'title' => 'Sales',
            'text' => 'Analyse your salon’s sales performance across channels, employees and more: from checked out appointments to sold hair and beauty products, know your business sales back to front.',
            'items' => [
                'sales_overview' => 'Sales overview',
                'service_sales' => 'Service sales',
                'product_sales' => 'Product sales',
                'sales_by_employee' => 'Sales by employee',
                'sales_by_channel' => 'Sales by channel',
                'daily_sales' => 'Daily sales',
                'monthly_sales' => 'Monthly sales',
                'sales_reports' => 'Sales reports',
            ]
        ],
        'clients' => [
            'title' => 'Clients',
            'text' => 'Know how your salon is performing client-wise with insights into how many first-time visitors, returning clients and total customers you get over a selected period of time.',
            'items' => [
                'client_acquisition' => 'Client acquisition',
                'client_retention' => 'Client retention',
            ]
        ],
        'pos' => [
            'title' => 'POS',
            'text' => 'Access your salon’s accurate and up-to-date transactional finances, relevant for tax and accounting purposes.',
            'items' => [
                'monthly_pos_report' => 'Monthly POS report',
                'yearly_pos_report' => 'Yearly POS report',
                'vat_report' => 'VAT report',
            ]
        ],
        'filters' => [
            'all_types' => 'All Types',
            'last_30_days' => 'Last 30 Days',
            'last_60_days' => 'Last 60 Days',
            'last_3_months' => 'Last 3 Months',
            'last_6_months' => 'Last 6 Months',
            'last_12_months' => 'Last 12 Months',
            'custom_range' => 'Custom Range',
            'this_year' => 'This year',
            'last_year' => 'Last year',
        ],
        'bookings' => [
            'bookings' => 'Bookings',
            'order_ref' => 'Order ref#',
            'order_date' => 'Order date',
            'appointment_date' => 'Appointment date',
            'employee' => 'Employee',
            'customer' => 'Customer',
            'service' => 'Service',
            'value' => 'Value',
            'status' => 'Status',
            'action' => 'Action',
        ],
        'transactions' => [
            'transactions' => 'Transactions',
            'time' => 'Time',
            'transaction_number' => 'Transaction #',
            'transaction_type'   => 'Transaction Type',
            'client'             => 'Client',
            'total_amount'       => 'Total Amount',
            'items_note'         => 'Items / Note',
            'amount'             => 'Amount',
            'vat_percent'        => 'VAT %',
            'vat_amount'         => 'VAT Amount',
            'payment'            => 'Payment',
            'type'               => 'Type',
            'payment_amount'     => 'Amount',
            'no_record_message_1' => 'No transactions yet',
            'no_record_message_2' => 'They will appear once you checkout your first customer of the day',
        ],
        'sales_overview' => [
            'sales_overview' => 'Sales Overview',
            'sales_incl_vat' => 'Sales (incl. VAT)',
            'pay_at_venue' => 'Pay at venue',
            'pre_paid' => 'Pre-paid',
        ],
        'service_sales' => [
            'service_sales' => 'Service Sales',
        ],
        'sales_by_employee' => [
            'sales_by_employee' => 'Sales By Employee',
        ],
        'daily_sales' => [
            'daily_sales' => 'Daily Sales',
        ],
        'monthly_sales' => [
            'monthly_sales' => 'Monthly Sales',
        ],
    ],

    'menu' => [
        'services' => [
            'services' => 'Services',

            'all_active_services' => 'All active services',
            'archive' => 'Archive',

            'add_to_group' => 'Add to group',

            'add_new' => 'Add new...',

            'add_service' => 'Add service',
            'service' => 'Service',
            'service_text' => 'A service is one treatment per booking – nice and simple.',

            'package_text' => 'A few services that can be booked together, typically provided by different team members.',

            'menu_group' => 'Menu group',
            'menu_group_text' => 'Menu groups are great for categorizing services and could make it easier for clients to find what they’re looking for.',

            'services_list' => 'Services List',
            'start_typing_to_filter' => 'Start typing to filter...',

            'create_your_service_list' => 'Create your service list',
            'add_instruction' => 'Just search for a service on the left – and click to add it to your menu.',

            'add_sub_service' => 'Add Sub Service',
            'add_pricing_option' => 'Add Pricing Option',
            'no_employees_assigned' => 'No employees assigned',

            'who_provides_this_service' => 'Who provides this service?',
            'select_providers' => 'Select providers',

            'menu_group_name' => 'Menu group name',

            'add_price_hint' => 'Add a price so the service can be booked',

            'no_services_yet' => 'No services added yet. Start by creating your first service to offer clients.',
            'no_services_yet_br' => 'No services added yet. Start by creating your <br />first service to offer clients.',
            'no_services_yet_label' => 'No services yet',
            'no_sub_services_available' => 'No sub-services available.',

            'remove_sub_service' => 'Remove Sub Service',

            'placeholder' => [
                'enter_name' => 'Enter name...',
                'price' => 'Price',
            ],

            'add_form' => [
                'sub_category_name' => 'Sub category name',
                'parent_service_name' => 'Parent service name',

                'sub_service' => 'Sub Service',
                'name' => 'Name',
                'duration' => 'Duration',
                'price' => 'Price (€)',
                'actions' => 'Actions',
            ],

            'edit_form' => [
                'services_pricing' => [
                    'services_pricing' => 'Services & Pricing',
                    'service_title' => 'Service title',
                    'discount' => 'Discount',
                    'no_discount' => 'No discount',
                    'team_online_appointments' => 'TEAM - who is taking online appointments for this service',

                    'pricing_level_name' => 'Pricing level name',
                    'duration' => 'Duration',
                    'price' => 'Price',
                    'sale_price' => 'Sale Price',
                ],
                'description' => [
                    'description' => 'Description',
                ]
            ],

            'validation' => [
                'invalid_service_data'   => 'Invalid service data format.',
                'invalid_parent_service' => 'Invalid parent service data.',
                'subservice_name_required' => 'Subservice name is required.',
                'team_ids_unique' => 'Selected team IDs must be unique.',
                'team_ids_invalid' => 'Some team IDs are invalid: :ids',
                'pricing_required' => 'Pricing data is required.',
                'pricing_name_required' => 'Pricing name is required.',
                'pricing_name_unique' => "Pricing name ':name' must be unique within the subservice.",
                'duration_required' => 'Valid duration is required.',
                'price_required' => 'Valid price is required.',
            ],
        ],

        'packages' => [
            'packages' => 'Packages',
            'create_new_package' => 'Create new Package',
            'package' => 'Package',
            'add_package' => 'Add package',

            'form' => [
                'services_and_pricing' => [
                    'services_and_pricing' => 'Services and Pricing',
                    'service_title' => 'Service title',
                    'discount' => 'Discount',
                    'no_discount' => 'No discount',
                    'package_services' => 'Package services',
                    'select_services_from_menu' => 'Select services from menu',
                    'sale_price' => 'Sale price',
                    'use_service_prices' => 'Use service prices',
                    'set_custom_price' => 'Set custom price',
                    'included_services_and_skus' => 'Included services and skus',
                ],
                'description' => [
                    'description' => 'Description',
                ],
                'fine_print' => [
                    'fine_print' => 'Fine print',
                    'restrictions' => 'Restrictions',
                    'good_to_know' => 'Good to know',
                ],
                'distribution' => [
                    'distribution' => 'Distribution',
                ],
            ],

            'no_services_added_yet' => 'No services added yet.',

            'no_packages_yet_label' => 'No packages yet',
            'no_packages_yet' => 'No packages added yet. Start by creating your first package to offer clients.',

            'packages_description' => "Create packages to bundle multiple services together and offer clients greater value.<br />Packages are a great way to encourage repeat bookings and boost sales.",

            'package_open_selection_limit' => "A package can contain up to two Open Selection services",
        ],

        'pricing-levels' => [
            'pricing-level' => 'Pricing Level',
            'pricing-levels' => 'Pricing Levels',

            'add_pricing_level' => 'Add pricing level',

            'empty_list' => 'This list is looking a little empty.',
            'create_info' => 'Create pricing levels here if you have different prices for specific staff groups.',
            'create_info_br' => 'Create pricing levels here if you have different prices for specific <br />staff groups.',

            'form' => [
                'name' => 'Name',
                'assigned_team_members' => 'Assigned team members',
                'reassign_message' => 'Pricing level will be re-assigned',
                'change_warning' => "Changing a team member's pricing level can lead to unpurchasable services. Make sure to define prices of this level for all applicable services.",
            ]
        ],

        'discounts' => [
            'discounts' => 'Discounts',
            'discount' => 'Discount',
            'status' => 'Status',
            'add_discount' => 'Add Discount',

            'no_discounts_yet' => 'No discounts yet',
            'smart_discount_info' => "Switch on smart discounting to get more bookings. It's the <br />easiest way to manage your pricing according to availability <br />and demand. <a href='#' target='_blank'>Learn more</a>",

            'editing_discount' => 'Editing discount',

            'active' => 'ACTIVE',
            'inactive' => 'INACTIVE',

            'applied_to_active_services' => 'Applied to :count active services',

            'form' => [
                'discount_settings' => [
                    'discount_settings' => 'Discount settings',
                    'discount_name' => 'Discount name',
                    'activate_discount' => 'Activate discount',
                    'discounts_info' => 'Discounts will only apply for bookings made through Clickbook, Booking Widget and its partners. If multiple discounts apply, only the largest will be applied. Note that it may take up to an hour to show discounts in the browse results page once enabled.',
                ],
                'assigned_services' => [
                    'assigned_services' => 'Assigned Services',
                    'select_services' => 'Select Services',
                    'all_services' => 'All Services',
                    'no_services_added_yet' => 'No services added yet.',
                ],
                'cancel' => 'Cancel',
                'save' => 'Save',
                'delete' => 'Delete',
                'save_mark_active' => 'Save & Mark Active',
            ],
            'sw_alert' => [
                'title' => 'You are about to permanently delete this discount rule',
                'sub_title' => 'If you delete this discount, it will no longer be assigned to any treatments, and any unsaved changes you have made will be lost. Are you sure you want to delete this discount?',
            ],
        ],
    ],

    'admin' => [
        'setup_profile' => [
            'intro' => 'Hello, you are just a few clicks away from accessing Clickbook - a tool to help manage your business.',
            'password_setup' => 'Please create a new password to start.',
        ],
    ],

    'team' => [
        'setup_profile' => [
            'intro' => 'Hello, you are just a few clicks away from accessing Clickbook - a tool to help manage your business.',
            'password_setup' => 'Please create a new password to start.',
        ],

        'rota' => [
            'rota' => 'Rota',
            'salon_opening_hours' => 'Salon opening hours',
            'closed' => 'Closed',

            'go_to_this_week' => 'Go to this Week',

            'add_time_off' => 'Add time off',
            'change_schedule' => 'Change schedule',

            'from' => 'From',
            'to' => 'To',

            'schedule_options' => 'Schedule Options',

            'switch_to_salon_opening_hours' => 'Switch to salon opening hours',

            'close' => 'Close',
            'confirm' => 'Confirm',

            'new_schedule' => 'New Schedule',

            'days' => 'Days',

            'schedule_saved_success' => 'Schedule saved successfully!',
            'timeoff_added_success' => 'Time off added successfully!',

            'rota_intro' => 'Want to use the rota? Add your team <br />members first.',
            'goto_team_list' => 'Go to Team member list',
        ],

        'team' => [
            'teams' => 'Teams',
            'add_team_member' => 'Add team member',

            'permissions' => [
                'owner_access' => 'Owner access',
                'can_log_in' => 'Can log in',
                'individual_access' => 'Individual access',
            ],

            'provides_services' => 'Provides services',

            'team_member' => 'Team member',

            'no_teams_yet' => 'No teams yet',

            'no_team_members_yet' => 'No team members have been added yet. Invite your team to start collaborating.',
            'no_team_members_yet_br' => 'No team members have been added yet. <br />Invite your team to start collaborating.',

            'form' => [
                'basic_info' => [
                    'basic_info' => 'Basic Info',
                    'name' => 'Name',
                    'email_address' => 'Email address',
                    'phone' => 'Phone',
                    'drop_photo_here_or_click_to_upload' => 'Drop photo here or click to upload',
                    'provides_treatments_services' => 'Provides treatments & services',
                    'employment_status' => 'Employment Status',
                    'employment_status_text' => 'You’ll be able to filter your sales reports by employment status for better business insights.',
                    'employed' => 'Employed',
                    'self_employed' => 'Self-employed',
                ],
                'pricing_services' => [
                    'pricing_services' => 'Pricing & Services',
                    'pricing_level' => 'Pricing level',
                    'default' => 'Default',
                    'employee_services_online' => 'What services can be booked for this employee online?',
                    'all_services' => 'All services',
                    'no_services_added_yet' => 'No services added yet.',
                ],
                'public_profile' => [
                    'public_profile' => 'Public Profile',
                    'profile_online_tip' => 'Your clients will see your profile online - so be sure to make a good impression.',
                    'job_title' => 'Job Title',
                    'example_job_title' => 'e.g. Senior Stylist',
                    'short_bio' => 'Short Bio',
                    'bio_placeholder' => 'Write a short bio...',
                ],
            ]
        ]
    ],

    'business-settings' => [
        'steps' => [
            'business_details' => 'Business details',
            'photos' => 'Photos',
            'opening_hours' => 'Opening hours',
        ],
        'update_business' => 'Update Business',
        'business_details' => [
            'profile_info' => 'Profile Info',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',

            'business_info' => 'Business Info',
            'business_name' => 'Business Name',
            'primary_type' => 'Primary Type',
            'select_primary_type' => 'Select Primary Type',

            'category' => 'Category',
            'select_category' => 'Select Category',

            'contact_info' => 'Contact Info',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
            'website' => 'Website',

            'address_info' => 'Address Info',
            'address' => 'Address',
            'postcode' => 'Postcode',
            'select_country' => 'Select Country',
            'country' => 'Country',
            'city' => 'City',
            'select_city' => 'Select City',

            'about_status' => 'About & Status',
            'about' => 'About',
            'select_status' => 'Select Status',
            'status' => 'Status',

            'social_media' => 'Social Media',
            'whatsapp_link' => 'Whatsapp Link',
            'facebook_link' => 'Facebook Link',
            'instagram_link' => 'Instagram Link',
            'youtube_link' => 'Youtube Link',
            'tiktok_link' => 'Tiktok Link',
            'linkedin_link' => 'LinkedIn Link',
            'x_twitter_link' => 'X (Twitter) Link',
            'google_map_embed_url' => 'Google Map Embed Url',
        ],
        'photos' => [
            'primary_image' => 'Primary image: ',
            'primary_image_text' => 'To change the primary image, drag your preferred image to the top of the photos list.',
            'upload_photos' => 'Upload Photos',
            'drag_your_photos_here' => 'Drag your photos here',
            'remove_file' => 'Remove file',
            'min_files_dropzone' => 'You must upload at least 5 images before proceeding.',
            'save_failed_dropzone' => 'Failed to save data. Please try again.',
        ],
        'opening_hours' => [
            'opening_hours' => 'Opening hours',
        ]
    ],

    'my_account_settings' => [
        'text1' => 'Account Activity and Reminders Account activity is intended as information appropriate for the full performance of the LOGO service, in order to improve your experience when using the service itself. This includes confirming and reminding you of your appointment, etc.',
        'text2' => 'Inspiration and Offers I consent to the use of my personal data to inform you about new treatments, exclusive discounts and for marketing purposes related to the services offered.',
        'options' => [
            'sms_communication' => 'SMS Communication',
            'email_communication' => 'Email Communication',
        ],
    ],

    'breadcrumb_first_li_backend' => 'Clickbook',
    'navigation_menus_backend' => [
        'dashboard' => 'Dashboard',
        'system_users' => 'System Users',
        'system_users_sub_menus' => [
            'super_admin' => 'Super Admin',
            'admin' => 'Admin',
            'user' => 'User',
        ],
        'categories' => 'Categories',
        'bookings' => 'Bookings',
        'reports' => 'Reports',
        'services' => 'Services',
        'cities' => 'Cities',
        'businesses' => 'Businesses',
        'blogs' => 'Blogs',
        'blogs_sub_menus' => [
            'blog_category' => 'Blog Category',
            'blog' => 'Blog',
        ],
        'settings' => [
            'settings' => 'Settings',
            'business_menu_settings' => 'Business menu settings',
            'home_page_buttons' => 'Home Page Buttons',
        ],
        'email_templates' => 'Email Templates',
    ],
    'dashboard_backend' => [
        'total_super_admins' => 'Total Super Admins',
        'total_admins' => 'Total Admins',
        'total_salons' => 'Total Salons',
        'total_users' => 'Total Users',
    ],
    'superadmins_backend' => [
        'super_admins' => 'Super Admins',
        'add_super_admin' => 'Add Super Admin',
        'update_super_admin' => 'Update Super Admin',
        'list' => [
            'table' => []
        ],
        'form' => [],
    ],
    'admins_backend' => [
        'admins' => 'Admins',
        'add_admin' => 'Add Admin',
        'update_admin' => 'Update Admin',
        'list' => [
            'table' => []
        ],
        'form' => [],
    ],
    'users_backend' => [
        'users' => 'Users',
        'add_user' => 'Add User',
        'update_user' => 'Update User',
        'list' => [
            'table' => []
        ],
        'form' => [],
        'tabs' => [
            'personal_details' => 'Personal Details',
            'settings' => 'Settings',
            'bookings' => 'Bookings',
            'rewards' => 'Rewards',
            'wallet' => 'Wallet',
            'invite_a_friend' => 'Invite a friend',
        ]
    ],
    'backend' => [
        'email_templates' => [
            'email_templates' => 'Email Templates',
            'add_email_template' => 'Add Email Template',
            'update_email_template' => 'Update Email Template',
            'list' => [
                'table' => [
                    'email_key' => 'Email Key',
                    'email_title' => 'Email Title',
                    'email_subject' => 'Email Subject',
                ]
            ],
            'form' => [
                'email_key' => 'Email Key',
                'email_title' => 'Email Title',
                'email_subject' => 'Email Subject',
                'email_html' => 'Email HTML',
            ],
        ],
        'categories' => [
            'add_category' => 'Add Category',
            'update_category' => 'Update Category',
            'list' => [
                'table' => [
                    'category_name_slug' => 'Category Name [Slug]',
                    'parent_category_name' => 'Parent Category Name',
                ]
            ],
            'form' => [
                'parent_category' => 'Parent Category',
                'select_parent_category' => 'Select Parent Category',
                'title' => 'Banner Title',
                'sub_title' => 'Banner Sub Title',
                'banner_image' => 'Banner Image',
                'category_name' => 'Category Name',
                'description' => 'Description',
                'upload_images_max_2' => 'Upload Images (Max 2)',
                'drop_category_images' => 'Drop category images here or click to upload',
                'is_menu' => 'Is Menu',
            ],
        ],
        'services' => [
            'add_service' => 'Add Service',
            'update_service' => 'Update Service',
            'list' => [
                'table' => [
                    'category_name_slug' => 'Category Name [Slug]',
                    'service_name_slug' => 'Service Name [Slug]',
                ]
            ],
            'form' => [
                'parent_category' => 'Parent Category',
                'service_name' => 'Service Name',
                'sub_services' => 'Sub Services',
                'sub_service_name' => 'Sub Service Name',
                'add_sub_service' => 'Add Sub Service',
                'add_sub_services' => 'Add Sub Services',

                'edit_sub_service_attributes' => 'Edit Sub Service Attributes',
            ],
        ],
        'businesses' => [
            'businesses' => 'Businesses',
            'add_business' => 'Add Business',
            'update_business' => 'Update Business',
            'list' => [
                'table' => [
                    'business_name_slug' => 'Business Name [Slug]',
                    'category' => 'Category',
                ]
            ],
            'tabs' => [
                'business_details' => 'Business Details',
                'photos' => 'Photos',
                'opening_hours' => 'Opening Hours',
            ],
            'form' => [
                'profile_info' => 'Profile Info',
                'business_info' => 'Business Info',
                'business_name' => 'Business Name',
                'contact_info' => 'Contact Info',
                'select_categories' => 'Select categories',
            ],
        ],
        'cities' => [
            'add_city' => 'Add City',
            'update_city' => 'Update City',
            'list' => [
                'table' => [
                    'city_name_slug' => 'City Name [Slug]',
                    'region_name_slug' => 'Region Name [Slug]',
                ]
            ],
            'form' => [
                'select_region' => 'Select Region',
                'region' => 'Region',
                'city_name' => 'City Name',
            ],
        ],
        'blog_categories' => [
            'blog_categories' => 'Blog Categories',
            'add_blog_category' => 'Add Blog Category',
            'update_blog_category' => 'Update Blog Category',
            'list' => [
                'table' => [
                    'blog_category_name' => 'Blog Category Name',
                ]
            ],
            'form' => [
                'blog_category_name' => 'Blog Category Name',
            ],
        ],
        'blogs' => [
            'blogs' => 'Blogs',
            'add_blog' => 'Add Blog',
            'update_blog' => 'Update Blog',
            'list' => [
                'table' => [
                    'blog_title' => 'Blog Title',
                ]
            ],
            'form' => [
                'blog_category' => 'Blog Category',
                'select_blog_category' => 'Select Blog Category',
                'blog_title' => 'Blog Title',
                'blog_content' => 'Blog Content',
            ],
        ],
        'home_page_buttons' => [
            'home_page_buttons' => 'Home Page Buttons',
            'add_home_page_button' => 'Add Home Page Button',
            'update_home_page_button' => 'Update Home Page Button',
            'list' => [
                'table' => [
                    'name_en' => 'Name EN',
                    'name_el' => 'Name EL',
                    'url' => 'URL',
                    'icon' => 'Icon',
                ]
            ],
            'form' => [
                'name_en' => 'Name EN',
                'name_el' => 'Name EL',
                'url' => 'URL',
                'icon' => 'Icon',
            ],
        ],
        'bookings' => [
            'filters' => [
                'business' => 'Business',
                'all' => 'All',
                'from_date' => 'From Date',
                'to_date' => 'To Date',
                'apply_filters' => 'Apply Filters',

            ],
            'list' => [
                'table' => [
                    'view' => 'View',
                    'app_number' => 'Appointment No',
                    'business_name' => 'Business Name',
                    'booking_status' => 'Status',
                    'created_at' => 'Created At',
                    'payment_status' => 'Payment Status',
                    'booking_by' => 'Booking By',
                    'user_info' => 'Booked By'
                ]
            ],
            'form' => [
                'business' => 'Business',
                'select_business' => 'Select Business',
                'booking_status' => 'Booking Status',
                'appointment_date' => 'Appointment Date',
                'appointment_time' => 'Appointment Time',
                'notes' => 'Notes',
            ],
        ],
    ],
    'reset_password' => [
        'title' => 'Reset Your Password',
        'description' => 'Please enter your email address to request a password reset.',
        'reset_link_sent' => 'A password reset link has been sent to your email address. Please follow the instructions in the email to reset your password.',
        'set_new_password_message' => 'Please set your new password.',
        'password_reset_success' => 'Your password has been reset!',
        'password_reset_link_if_matched' => 'If the provided information matches our records, a password reset link has been sent.',
    ],
    'emails' => [
        'appointment_booking' => [
            'user' => [
                /* 'appointment_confirmed' => 'Hello :full_name, your appointment has been confirmed.',
                
                // 'appointment_datetime_display' => ':relative_day, :weekday, :date at :time', // Tomorrow, Tuesday, December 16 at 09:00
                'appointment_datetime_display' => ':weekday, :date at :time', // Tuesday, December 16 at 09:00

                'appointment_details' => 'Appointment details',

                'appointment_number' => 'Appointment No. :appointment_number',

                'store' => 'Store',

                'cancellation_policy' => 'Cancellation policy', */

                'appointment_confirmed' => 'Γεια σας :full_name, το ραντεβού σας επιβεβαιώθηκε',

                // 'appointment_datetime_display' => ':relative_day, :weekday, :date at :time', // Αύριο, Τρίτη 16 Δεκεμβρίου στις 09:00
                'appointment_datetime_display' => ':weekday, :date at :time', // Τρίτη 16 Δεκεμβρίου στις 09:00

                'appointment_details' => 'Λεπτομέρειες ραντεβού',

                'appointment_number' => 'Αρ. κράτησης :appointment_number',

                'store' => 'Κατάστημα',

                'cancellation_policy' => 'Πολιτική ακύρωσης',
            ]
        ]
    ],

    'breadcrumbs' => [
        'common' => [
            'list' => 'List',
            'add' => 'Add',
            'edit' => 'Edit',
            'view' => 'View',
        ],
        'home' => 'Home',
        'dashboard' => 'Dashboard',
        'system_users' => [
            'super_admins' => 'Super Admins',
            'admins' => 'Admins',
            'users' => 'Users',
        ],
        'categories' => 'Categories',
        'bookings' => 'Bookings',
        'services' => 'Services',
        'businesses' => 'Businesses',
        'cities' => 'Cities',
        'newsletters' => 'Newsletters',
        'blogs' => [
            'blog_categories' => 'Blog Categories',
            'blogs' => 'Blogs',
        ],
        'email_templates' => 'Email Templates',
        'business_menu_settings' => 'Business Menu Settings',
        'home_page_buttons' => 'Home Page Buttons',
    ],
    'booking_view_modal' => [
        'appointment_details' => 'Appointment Details',
        'title' => 'Appointment No#',

        'status' => 'Status',
        'created_date' => 'Created Date',

        'business' => 'Business',
        'customer' => 'Customer',

        'phone' => 'Phone',
        'mobile' => 'Mobile',
        'email' => 'Email',
        'website' => 'Website',
        'whatsapp' => 'WhatsApp',

        'services' => 'Services',

        'service' => 'Service',
        'date_time' => 'Date & Time',
        'team' => 'Team',
        'price' => 'Price',

        'duration' => 'Duration',

        'payment_summary' => 'Payment Summary',
        'total' => 'Total',
        'paid' => 'Paid',
        'pending' => 'Pending',
        'no_sale' => 'No sale found',

        'payments' => 'Payments',
        'no_payments' => 'No payments found',

    ]
];
