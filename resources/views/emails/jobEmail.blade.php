@component('mail::message')
Hi {{$data['friend_name']}}, <br>Your friend {{$data['your_name']}} with the email address {{$data['your_email']}}
has suggested this job for you. Please have a look.

@component('mail::button', ['url' => $data['job_url']])
See Job
@endcomponent

Thanks,<br>
KaamDaar
@endcomponent
