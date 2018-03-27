<h1>Test Email</h1>

<table>
    <tr>
        <td>Name</td>
        <td>Email</td>
    </tr>
    @foreach($users as $user)
        <tr>
            {{$user->name}}
            {{$user->email}}
        </tr>
    @endforeach
</table>