@component('mail::message')

@component('mail::panel')
   Name : {{ $data['name'] }}
   <br>
   Phone : {{ $data['phone'] }}
   <br>
   Email : {{ $data['email'] }}
   <br>
   License Number : {{ $data['license_number'] }}
@endcomponent

@component('mail::button', ['url' => ''])
Send a link
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
