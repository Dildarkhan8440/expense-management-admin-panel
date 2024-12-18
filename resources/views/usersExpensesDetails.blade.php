@extends('layout.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <h4 class="page-title">Users Expense </h4>
        
        <div class="row row-card-no-pd">
            <div class=" col-md-12">
                <div class="card-header">
                    <div class="card-title">Users Expenses Details</div>
                    <div class="row card-title">
                        <div class="col-md-4"><p>User Name : {{$user_data->name}}</p></div>
                        <div class="col-md-4"><p>Email : {{$user_data->email}}</p></div>       
                        <div class="col-md-4"><p>Role : {{$user_data->role}}</p></div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <table class="table table-hover table-head-bg-primary mt-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Expense Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Ammount</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;
                            ?>
                            @foreach ($users_expenses_list as $item)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$item->expense_name}}</td>
                                <td>{{$item->category->category_name}}</td>
                                <td>{{$item->amount}}</td>
                                <td>{{$item->expense_date}}</td>
                                <?php $i++;?>
                            </tr>
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
    Expense
@endsection