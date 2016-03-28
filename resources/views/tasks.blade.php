@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col s12">
    <div class="card">
      <!-- display validation errors -->
      <div class="card-content">
        <span class="card-title">New Task</span>
        @include('common.errors')
        <div class="row">
          <form class="col s12" action="/task" method="POST">
              {!! csrf_field() !!}
              <div class="input-field col s12">
                <input placeholder="Enter task" name="task_name" id="task_name" type="text" class="validate">
                <label for="task_name">Task</label>
              </div>
              <button class="waves-effect waves-light btn" type="submit" name="action">
                <i class="material-icons left">add</i> Add Task
              </button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- show tasks -->
@if (count($tasks) > 0)
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Current Tasks</span>
        <div class="row">
          <table class="striped">
            <thead>
              <th>Task</th>
              <th>Action</th>
            </thead>
            <tbody>
              @foreach ($tasks as $task)
              <tr>
                <td>{{ $task->name }}</td>
                <td>
                  <form action="{{ url('task/'.$task->id) }}" method="POST">
                      {!! csrf_field() !!}
                      {!! method_field('DELETE') !!}


                      <button class="waves-effect waves-light btn red darken-3 btn-flat white-text" type="submit" name="action">
                        <i class="material-icons left">delete</i>Remove
                      </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@endsection
