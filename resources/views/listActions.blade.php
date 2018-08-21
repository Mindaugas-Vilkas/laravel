@extends('base')

@section('content')
    <section>
        <h3>Create Task</h3>
        <p>Send a POST request to /rest/v1</p>
        <p>Body should contain json formated as {"taskName":"{$taskName}", "$taskDescription":"{$taskDescription}", "dueDate":"{$date(format(YYYY-MM-DD))}|"}</p>
        <br>
        <p>--------------------------------------------</p>
    </section>

    <section>
        <h3>Read</h3>
        <p>Send a GET request to /rest/v1</p>
        <p>No other parameters required.</p>
        <br>
        <p>--------------------------------------------</p>
    </section>

    <section>
        <h3>Update Task</h3>
        <p>Send a PUT request to /rest/v1/{$id}</p>
        <p>Body should contain json formated as {"taskName":"{$taskName}", "$taskDescription":"{$taskDescription}", "dueDate":"{$date(format(YYYY-MM-DD))}|"}</p>
        <br>
        <p>--------------------------------------------</p>
    </section>

    <section>
        <h3>Delete Task</h3>
        <p>Send a DELETE request to /rest/v1/{$id}</p>
        <br>
        <p>--------------------------------------------</p>
    </section>
@stop