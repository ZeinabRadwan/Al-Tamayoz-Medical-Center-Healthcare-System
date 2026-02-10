@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Permissions</h1>
    <a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">Add New Permission</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Permission Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
            <tr>
                <td>{{ $permission->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection