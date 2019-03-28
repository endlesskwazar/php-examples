@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add wish</div>
<form method="post" action="/wishes">
@csrf
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control" placeholder="Name">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
@endsection