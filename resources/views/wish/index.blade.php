@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Wishes</div>

<a href="/wishes/create" class="btn btn-primary">Add wish</a>
<hr>
<table class="table table-striped">
<thead>
<th>Id</th>
<th>Title</th>
<th>Actions</th>
</thead>

<tbody>

@foreach ($list as $wish)
    <tr>
    <td>{{$wish->id}}</td>
    <td>{{$wish->title}}</td>
    <td>
        <form action="/wishes/{{$wish->id}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
            <input type="submit" class="btn btn-warning" value="Delete">
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
@endsection