<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Emails Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during email send for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */
    'error' => 'We encountered an issue while sending email. Please try again later.',

    'register' => [
        'subject_user' => 'Welcome to :app_name',
        'subject_admin' => 'New User Account Created',
        'subject_verification' => 'Verify Your Email Address - :app_name',
    ],
    'forgot_password' => [
        'subject_user' => 'Password Reset Request - :app_name',
    ],
    'email_verification' => [
        'subject' => 'Verify Your New Email Address - :app_name',
    ],
    'user' =>[
        'appointment_booking' => 'Your Appointment has been Booked Successfully - :app_name'
    ],
    'business'=>[
        'appointment_booking' => 'New Appointment Booked - :app_name'
    ]

    


];
