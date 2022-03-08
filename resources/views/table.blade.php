<!DOCTYPE html>
<html lang="en">

<head>
    <title>All Registerd User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    @php
        $user = DB::table('registrations')->get();
    @endphp
    <div class="container mt-5">
        <h3>All Registerd User</h3>
        <table class=" table table-light">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Date Of Birth</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($user as $row)
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->date_of_birth }}</td>
                        <td>{{ $row->city }}</td>
                        <td>{{ $row->country }}</td>
                        <td>
                            @if ($row->status == 'active')
                                <span class="btn btn-secondary">Active</span>
                            @else
                                <span class="btn btn-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ URL::to('edit/user/' . $row->id) }}" class="btn btn-sm btn-info">edit</a>
                            <a href="{{ URL::to('delete/user/' . $row->id) }}" class="btn btn-sm btn-danger"
                                id="delete">delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
