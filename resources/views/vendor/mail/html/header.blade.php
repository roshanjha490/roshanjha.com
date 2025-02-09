<tr>
    <td class="header">
        <a style="text-decoration: none;" href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
            <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
            @else
            <a href="{{ $url }}" class="logo">
                <img src="{{asset('img/favicon-32x32.png')}}" width="35px" height="30px">
                Roshan Jha
            </a>
            @endif
        </a>
    </td>
</tr>