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
                            <a href="" class="btn btn-info btn-sm">Edit</a>
                            {{-- <a href="{{ url('/users/delete/') }}/{{$value->user_id}} " class="btn btn-danger btn-sm">Delete</a> --}}
        <a href="{{route('delete',['user_id'=>$value->user_id])}}" class="btn btn-danger btn-sm">Delete</a>
                            
                        </td>
                    </tr> 
                
                @endforeach
        </tbody>
    </table>
    
    </div>
</div>
@endsection