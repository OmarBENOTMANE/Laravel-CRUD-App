@extends('applies.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Job Offers</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('applies.create') }}"> Create New Apply</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>opportunity</th>
            <th>employee</th>
            <th>created at</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->opportunity }}</td>
            <td>{{ $value->employee }}</td>
            <td>{{ $value->created_at }}</td>
            <td>
                <form action="{{ route('applies.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('applies.show',$value->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ route('applies.edit',$value->id) }}">Edit/apply</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection