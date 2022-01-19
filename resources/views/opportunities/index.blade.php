@extends('opportunities.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Opportunities</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('opportunities.create') }}"> Create New Opportunity</a>
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
            <th>title</th>
            <th>state</th>
            <th>description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->title }}</td>
             <td>{{ $value->state }}</td>
            <td>{{ \Str::limit($value->description, 100) }}</td>
            <td>
                <form action="{{ route('opportunities.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('opportunities.show',$value->id) }}">Show</a>    
                    <a class="btn btn-secondary" href="{{ route('opportunities.edit',$value->id) }}">Edit</a>  
                    <a class="btn btn-success" onclick="alert('Vous avez bien postuler')">postuler</a> 
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