@component('mail::message')

<h1><b>{{$mailData['title']}}</b></h1>
<h2 style="font-weight: 400 !important;">{{$mailData['desc']}}</h2>
<small> <i> Roshan Jha |
        @php
        echo date('M d, Y', strtotime($mailData['date']));
        @endphp
    </i>
</small>
<hr>

<h3 style="margin-top: 30px;">{{$mailData['body']}}</h3>
<hr style="margin-bottom: 30px;">

<i>If you liked this post why not share it?</i>
@component('mail::button', ['url' => $mailData['url']])
Visit Blog
@endcomponent

Thanks,<br>
Roshan Jha
@endcomponent