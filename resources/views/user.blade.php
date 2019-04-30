<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="container">
    <table>
        <tr>
            <th>@sortablelink('detail.phone_number', trans('column-sortable.phone'))</th>
            <th>@sortablelink('id', trans('column-sortable.id'), ['joe' => 'doe', 'jane' => 'doe'], ['class' => 'abc', 'rel' => 'nofollow', 'disabled' => 'disabled'])</th>
            <th>@sortablelink('name', 'Name')</th>
            <th>@sortablelink('nick_name', 'nick')</th>
            <th>@sortablelink('email')</th>
            <th>@sortablelink('address')</th>
            <th>@sortablelink('projects_count')</th>
            <th>@sortablelink('top_rating_projects_count')</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->detail->phone_number }}</td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->detail->address }}</td>
                <td>{{ $user->projects_count }}</td>
                <td>{{ $user->top_rating_projects_count }}</td>
            </tr>
        @endforeach
    </table>
</div>
{{ $users->appends(\Request::except('page'))->render() }}
