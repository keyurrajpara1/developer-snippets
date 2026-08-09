<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'login_title' => 'Login to Account',
    'login_sub_title' => 'Enter your email address and password to access business panel.',
    
    'signup_title' => 'Create Account',
    'reset_title' => 'Reset Password',
    'form' => [
        'lbl_first_name' => 'First name',
        'lbl_last_name' => 'Last name',

        'lbl_email' => 'Email address',
        'lbl_password' => 'Password',

        'lbl_agree_terms_conditions' => 'Agree to terms and conditions',

        'ph_email' => 'Enter Email Address',
        'ph_password' => 'Enter Password',

        'lbl_current_password' => 'Current Password',
        'lbl_new_password' => 'New Password',
        'lbl_password_confirmation' => 'Confirm Password',

        "lbl_first_name" => "First Name",
        "lbl_last_name" => "Last Name",
        "lbl_phone_number" => "Phone Number"
    ],
    'validation' => [
      // 'email_not_found' => 'The email address does not exist for a user with the specified role.',
      'email_not_found' => 'The email address does not exist.',
    ],
    'lbl_remember_me' =>'Remember me',
    'lbl_forgot_password' =>'Forgot Password',
    'forgot_password_question' => 'Forgot Password?',
    'no_account' => "Don't have an account?",
    'create_account' => 'Create Account',
    'already_have_account' => 'Already have an account?',
    'login' => 'Login',

    'reset' => 'Your password has been reset!',
    'sent' => 'We have emailed your password reset link!',
    'throttled' => 'Please wait before retrying.',
    'token' => 'This password reset token is invalid.',
    'user' => "We can't find a user with that email address.",
    'msg' => [
        'login_success' => 'Login Successfully',
        'register_success' => 'Thank you for registering! To get started, please take a moment to complete your profile', //You can now log in to your account.
        'too_many_attempts' => 'Too many login attempts. Please try again in :seconds seconds.',
        'invalid_credentials' => 'Invalid credentials',
        'account_not_active' => 'Your account is not active. Please contact us.',
        'fp_send_reset_link_error' => 'Failed to send reset link',
        'fp_send_reset_link_success' => 'A password reset link has been successfully sent to your registered email address.<br> Please check your inbox and follow the instructions to reset your password.<br>  If you do not receive the email within a few minutes, kindly check your spam or junk folder.<br> If you encounter any issues, feel free to contact our support team for further assistance.',
        'password_reset_success' => 'Your password has been reset successfully.',
        'password_reset_error' => 'The reset token is invalid or expired.',
        'token_refreshed_successfully' => 'The token has been refreshed successfully.',
        'token_refresh_error' => 'Unable to refresh the token. Please try again',
        'profile_update_success' => 'Your profile has been updated.',
        'password_update_success' => 'Your password has been updated successfully.',
        'current_password_invalid' => 'Your current password is incorrect',
        'insufficient_permissions' => 'You do not have permission to access this resource.',
    ]
];
