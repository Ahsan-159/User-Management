@extends('layouts.masterlayouts')
@section('title')
    Users
@endsection
@section('main-content')
<div class="row mt-2">
    <div class="col-md-8 offset-md-2">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name:</th>
                <th>Email:</th>
                <th>Status:</th>
                <th>Actions:</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
                @foreach ($users as  $value)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>
                            @if ($value->status == '1')
                            <a href=""><span class="badge badge-success">Active</span></a>
                            @elseif ($value->status == '0')
                            <a href=""><span class="badge badge-danger">Inactive</span></a>
                            @endif
                        </td>
                        <td>
                            <a href="{{url('/single-user')}}/{{$value->user_id}}" data-toggle="modal" data-target="#id{{$value->user_id}}" class="btn btn-success btn-sm">View</a>
                            <a href="" class="btn btn-info btn-sm">Edit</a>
                            {{-- <a href="{{ url('/users/delete/') }}/{{$value->user_id}} " class="btn btn-danger btn-sm">Delete</a> --}}
        <a href="{{route('delete',['user_id'=>$value->user_id])}}" class="btn btn-danger btn-sm">Delete</a>
                            
                        </td>
                    </tr> 
          <!-- Modal -->
<div class="modal fade" id="id{{$value->user_id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{$value->user_id}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
         @endforeach
                   
        </tbody>
    </table>
    
    </div>
</div>


@endsection