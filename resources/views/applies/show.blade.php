@extends('applies.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Apply</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('applies.index') }}">Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>opportunity:</strong>
                {{ $apply->opportunity }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>employee:</strong>
                {{ $apply->employee }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>created at:</strong>
                {{ $apply->created_at }}
            </div>
        </div>
    </div>
@endsection
