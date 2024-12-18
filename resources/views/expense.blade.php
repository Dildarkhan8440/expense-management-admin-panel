@extends('layout.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <h4 class="page-title">Expences</h4>
        
        <div class="row row-card-no-pd">
            <div class=" col-md-12">
                <div class="card-header">
                    <div class="card-title">Users Expenses</div>
                </div>
                <div class="card-body">
                    <form method="post" action="/admin/expences">
                        {{ csrf_field() }}
                    <div class="row col-md-12">
                        <div class="col-md-4">
                            <p>Filters:</p>
                        </div>
                       
                        <div class="col-md-4 row">
                            <p>By Category: </p>
                            <select name="category" onchange="this.form.submit()">
                                <option>Select</option>
                                @foreach ($categoey_list as $item)
                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-md-4 row">
                            <p>By Date: </p>
                            <input type="date" name="date" onchange="this.form.submit()">
                        </div>
                       
                    </div>
                    <form/>
                    <table class="table table-hover table-head-bg-primary mt-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Expense Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Ammount</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;?>
                            @foreach ($expenses_list as $item)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$item->user->name}}</td>
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