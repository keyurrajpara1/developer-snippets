<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use stdClass;
use App\Models\Email\EmailTemplate;
class CustomResetPasswordNotification extends ResetPasswordNotification
{
    use Queueable;
    protected $emailKey;
    public function __construct($token)
    {
        $this->token = $token;
        $this->emailKey = 'USER_FORGOT_PASSWORD';
    }
    public function toMail($notifiable)
    {
        $resetLink = $this->resetUrl($notifiable);
        // Check if $notifiable object has the necessary properties
        if (!isset($notifiable->email) || empty($notifiable->email)) {
            throw new \Exception('The email is missing.');
        }
        
        // $subject = __('emails.forgot_password.subject_user', ['app_name' => config('app.name')]);
        
        $emailTemplateResponse = EmailTemplate::where('email_key', $this->emailKey)->first();
            $subject = $emailTemplateResponse->email_subject;
        
        try {
            $buildEmailRes = $this->buildEmail($resetLink, $notifiable);
                $bodyHtml = $buildEmailRes['bodyHtml'];

            // OLD Code
            // Attempt to send the email
            /* $mailMessage  = (new MailMessage)
                ->subject($subject)
                ->view('emails.user_forgot_password', [
                    'user' => $notifiable->email,
                    'resetLink' => $resetLink
                ]);
            if (config('constants.mail.isCC', false)) {
                $mailMessage->cc(config('constants.mail.developer'));
            }
            return $mailMessage; */

            $mailMessage = (new MailMessage)
            ->subject($subject)
            ->view('emails.raw', [
                'html' => $bodyHtml,
            ]);
            //->cc(config('constants.mail.developer'));

            return $mailMessage;
        }
        catch (\Exception $e) {
            #dd($e);
            // Log the exception message and error details
            \Log::channel('email')->info($subject, [
                'error' => $e->getMessage(),
                #'to' => $notifiable->email,
                'subject' => $subject,
                //'content' => $mailMessage->render(),
            ]);
            // Optionally, return a fallback or a default message
            return (new MailMessage)
                ->subject('Error sending email')
                ->line('We encountered an issue while sending email. Please try again later.');
        }
    }
    /**
     * Get the URL for the password reset.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function resetUrl($notifiable)
    {
        // Custom URL structure pointing to the frontend app
        // Replace `frontend_app_url` with the actual URL of your React app
        // $frontendAppUrl = env('FRONTEND_APP_URL', 'http://localhost:3000'); // Example fallback to local React app URL
        // Generate the reset URL pointing to the React app route for resetting password
        // return $frontendAppUrl . '/reset-password?token=' . $this->token . '&email=' . urlencode($notifiable->getEmailForPasswordReset());

        return config('constants.websiteUrls.current.frontend') . 'reset-password?token=' . $this->token . '&email=' . urlencode($notifiable->getEmailForPasswordReset());
    }
    private function buildEmail($resetLink, $notifiable){
        $emailContentData = new stdClass();
        $emailContentData->var_user_full_name = $notifiable->full_name;
        $emailContentData->var_reset_password_link = $resetLink;

        $emailData = emailTemplate($this->emailKey, $emailContentData);

        $bodyHtml = '';
        if (is_object($emailData)) {
            $bodyHtml = _headerFooterEmail($emailData->email_html);
        }
        return ['bodyHtml' => $bodyHtml];
    }
}
