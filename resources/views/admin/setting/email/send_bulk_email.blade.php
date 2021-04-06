<html>
    @php $data = App\Models\EmailSetting::first(); @endphp
    <head>
        <title>{{$data->subject}}</title>
    </head>
    <body>
        <table>
            <tr>
            <td>Dear User</td>
            </tr>
            <tr>
                <td>{{$data->subject}}
                </td>
            </tr>
            <tr><td></td></tr>
        <tr><td>{{$data->description}}</td></tr>
        </table>
    </body>
</html>