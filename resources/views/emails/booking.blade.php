@component('mail::message')
<strong>Property:</strong> {{ $data['property'] }}

<strong>Type:</strong> {{ $data['type'] }}

<strong>Price:</strong> {{ $data['price'] }}

<strong>Reserved At:</strong> {{ $data['reserverd_at'] }}

<strong>Client Name:</strong> {{ $data['full_name'] }}

<strong>Email:</strong> {{ $data['email'] }}

<strong>Phone:</strong> {{ $data['phone'] }}
@endcomponent
