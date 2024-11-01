@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Checklists</h2>

    @include('layouts.alert')

    <!-- Create Button -->
    <div class="mb-3">
        <a href="{{ route('checklists.create') }}" class="btn btn-success">Create New Checklist</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Inspector</th>
                <th>Date</th>
                <th>Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($checklists as $checklist)
                <tr>
                    <td>{{ $checklist->id }}</td>
                    <td>{{ $checklist->user->name ?? 'Unknown' }}</td>
                    <td>{{ $checklist->date }}</td>
                    <td>{{ $checklist->time }}</td>
                    <td>
                        <a href="{{ route('checklists.show', $checklist->id) }}" class="btn btn-primary">View Details</a>
                        <a href="{{ route('checklists.edit', $checklist->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('checklists.destroy', $checklist->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this checklist?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
