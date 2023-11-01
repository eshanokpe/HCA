@component('mail::message')

<span style="font-weight: bold;"> Hello!</span>

You are receiving this email because we received a paaswprd rest request for your account.

@component('mail::button', ['url' => url('/reset-password/'.$email_token) ])
Reset Password
@endcomponent

This password reset link will expire in 60 minutes.

If you did not request a paasword reset, no further action is required.

Thank you for choosing Rabmot Licensing Agency. We look forward to serving you.

Best regards,
Management<br>
Rabmot Licensing Agency 
@endcomponent 