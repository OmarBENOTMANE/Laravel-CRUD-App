@extends('applies.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Apply</h2>
            </div>
            
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('applies.update',$apply->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>opportunity:</strong>
                    <input type="text" name="opportunity" value="{{ $a[apply->opportunity }}" class="form-control" placeholder="opportunity">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>employee:</strong>
                    <input type="text" name="employee" value="{{ $apply->employee }}" class="form-control" placeholder="employee">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>created at:</strong>
                    <input type="date" name="created_at" value="{{ $apply->created_at }}" class="form-control" placeholder="employee">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('applies.index') }}">Back</a>
            </div>
        </div>
   
    </form>
@endsection