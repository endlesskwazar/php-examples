@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tasks</div>

                <div class="card-body">
                        @foreach ($notifications as $notification)
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            @if ($notification->type === 'App\\Notifications\\TaskCreated')
                                <strong>Нова подія!</strong> Вам назначено новий таск - {{$notification->data['title']}}
                              </div>
                            @endif
                            @if ($notification->type === 'App\\Notifications\\TaskExpired')
                                <strong>Нова подія!</strong> Закінчився сро к дії - {{$notification->data['title']}}
                              </div>
                            @endif
                        @endforeach
                        <a href="/tasks/create" class="btn btn-primary"> Create Task </a>
                    
                        <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>Title</th>
                                    <th>Due Date</th>
                                    <th>Managment type</th>
                                    <th>Finished?</th>
                                    <th>Expired?</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                        @foreach ($tasks as $task)
                                            <tr>
                                            <td>{{ $task->title }}</td>
                                            <td>{{ $task->due_date }}</td>
                                            <td>
                                                @if ($task->owner_id == Auth::user()->id)
                                                Owner
                                                @endif
                                                @if ($task->executor_id == Auth::user()->id)
                                                Executor
                                                @endif
                                            </td>
                                            <td>{{$task->is_done}}</td>
                                            <td>{{$task->is_expired}}</td>
                                            <td>
                                                @if ($task->is_done == 0)
                                                    <a href="/tasks/create" class="btn btn-primary"> Finish task </a>
                                                @endif
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
    </div>
</div>
@endsection