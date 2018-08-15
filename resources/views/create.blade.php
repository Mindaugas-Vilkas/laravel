@extends('base')

@section('content')
    <section>
        <form action="/createDbEntry" method="POST">
            <label for="taskName">Task name<input name="newTask[taskName]" type="text"></label>
            <br />
            <label for="taskDescription">Task description<input name="newTask[taskDescription]" type="text"></label>
            <br />
            <label for="dueDate">Due date<input name="newTask[dueDate]" type="date"></label>
        </form>
    </section>
@stop