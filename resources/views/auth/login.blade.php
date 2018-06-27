@extends('Layouts.Master')
@section('content')
  <div class="row box-login">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal row-border" action="{{ Route('login') }}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
              <label class="col-md-2 control-label">Username</label>
              <div class="col-md-10">
                <input type="text" name="username" class="form-control" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Password</label>
              <div class="col-md-10">
                <input type="password" name="password" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="text-center">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-info btn-fill">Login</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
