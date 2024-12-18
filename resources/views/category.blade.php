@extends('layout.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <h4 class="page-title">Category</h4>
        
        <div class="row row-card-no-pd">
            <div class=" col-md-12">
                <div class="card-header">
                    <div class="card-title">Add Category</div>
                </div>
                <div class="card-body">
                    <form method="POST" action="/admin/category">
                        {{ csrf_field() }}
                     <div class="form-group">
                         <label for="category">Category Name</label>
                         <input type="text" class="form-control" value="{{ old('category_name') }}" name="category_name" placeholder="Enter Category">
                         @if ($errors->has('category_name'))
                             <span class="error">{{ $errors->first('category_name') }}</span>
                         @endif
                     </div>
                    
                     <div class="card-action">
                         <button class="btn btn-success">Submit</button>
                     </div>
                         @if(session('success'))
                         <br>
                            <div class="alert alert-success">
                            {{session('success') }}
                        </div>
                    @endif
                 </form>
                </div>
            </div>
        </div>

        <div class="row row-card-no-pd">
            <div class=" col-md-12">
                <div class="card-header">
                    <div class="card-title">Category List</div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-head-bg-primary mt-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Updated_at</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;?>
                            @foreach ($category_list as $item)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$item->category_name}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
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
    Category
@endsection