@extends('page.main')
@section('title', 'Tasks')
@section('content')
    <section>
        <div class="container">
            <h1>Your tasks</h1>
            @if ($tasks->isEmpty())
                <p class="alert alert-info text-center">Wow, such empty!</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Text</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Due to</th>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->text }}</td>
                                <td>{{ $task->priority }}</td>
                                <td>{{ $task->status }}</td>
                                <td>{{ $task->due }}</td>
                                <td>
                                    <a href="" class="link-success">Update</a> | <a href="" class="link-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            <div>
                <a class="btn btn-success" href="/tasks/create">New Task</a>
            </div>
        </div>
    </section>
@endsection