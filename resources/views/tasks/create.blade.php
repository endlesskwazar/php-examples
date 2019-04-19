@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Task</div>

                <div class="card-body">
                   <form method="post" action="/tasks">
                   @csrf

                   <div class="form-group">
                   <label for="title">Title</label>
                   <input type="text" name="title" class="form-control">
                   </div>

                   <div class="form-group">
                        <label for="title">Due Date</label>
                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="due_date"/>
                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                            <label for="title">Executor</label>
                        <select class="form-control" name="executor">
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{ $user->email }}</option>
                        @endforeach 
                        </select>
                    </div>

                    <input type="submit" class="btn btn-primary">
                   </form>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection