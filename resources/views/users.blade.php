@extends('layout.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <h4 class="page-title">Users</h4>
        
        <div class="row row-card-no-pd">
            <div class=" col-md-12">
                <div class="card-header">
                    <div class="card-title">Users List</div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-head-bg-primary mt-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           $i=1;
                            ?>
                            @foreach ($users_list as $item)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->role}}</td>
                                <td> <button class="btn btn-@if($item->status=='active'){{'primary'}}@else{{'danger'}}@endif">{{$item->status}} </button>
                                </td>
                                <td>
                                    <a href="{{route('admin.users',['status'=>$item->status,'id'=>$item->id])}}"><button class="btn btn-@if($item->status=='active'){{'danger'}}@else{{'success'}}@endif">@if($item->status=='active')
                                        {{'Deactivate'}}
                                        @else{{'Activate'}}@endif</button>
                                    </a>
                                   <a href="{{url('admin/users/'.$item->id)}}"> <button class="btn btn-warning">View</button></a>
                                </td>
                            </tr>
                            <?php
                            $i++;
                             ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title')
    Users
@endsection