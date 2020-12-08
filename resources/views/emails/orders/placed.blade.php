<@component('mail::message')
# Yor Order has been Received

Thank you for your order.

**Order ID:** {{ $order->id }}

**Order Email:** {{ $order->email }}

**Order Name:** {{ $order->name }}

**Order Total:** Rs. {{ $order->sub_total }}

**Prescription Doctor Name(if Any):** {{ $order->doctor }}

**Your Address** {{ $order->address }}


You can get further details about your order by logging into our website.

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Go to Website
@endcomponent

Thank you again for choosing us.

Regards,<br>
MedEasy Team
@endcomponent