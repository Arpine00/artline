@extends('layouts.admin_layout')

@section('content')
    <section id="content">
        <div class="container-fluid fl">
            <div class="row no-gutters">
                <div class="col dashboard">
                    <!-- Bootstrap row -->
                    <div class="row" id="body-row">
                        <!-- Sidebar -->
                    @include('admin_panel.admin_sidebar')

                    <!-- MAIN -->
                        <div class="col">
                            <h2>Product's category</h2>

                            <div class="row category">
                                <div class="col">
                                    <div class="card">
                                        <h4 class="card-header">All Categories</h4>
                                        <div class="row product_head_line">
                                            <div class="col-1">
                                                <p><b>Id</b></p>
                                            </div>
                                            <div class="col">
                                                <p><b>Image</b></p>
                                            </div>
                                            <div class="col">
                                                <p><b>Category</b></p>
                                            </div>
                                            <div class="col-5">
                                                <p><b>Description</b></p>
                                            </div>
                                            <div class="col-1 product_tools">
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @foreach ($sub_categories as $category_item)
                                                <div class="row product_line">
                                                    <div class="col-1">
                                                        <p class="category_id">{{ $category_item->id }}</p>
                                                    </div>
                                                    <div class="col">
                                                        <p class="category_name">{{ $category_item->category }}</p>
                                                    </div>
                                                    <div class="col">
                                                        <img src="{{ asset('images/categories/sub/') }}/{{ $category_item->img_name }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="col-5">
                                                        <p class="category_name">{{ $category_item->description }}</p>
                                                    </div>
                                                    <div class="col-1 product_tools">
                                                        <button class="edit" data-toggle="modal" data-target="#myModal_update{{ $category_item->id }}"><i class="fas fa-edit"></i></button>

                                                        <!-- The Modal -->
                                                        <div class="modal update_modal" id="myModal_update{{ $category_item->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <form action="{{ route('update_sub_category_data') }}" method="post" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <input type="hidden" name="category_id" value="{{ $category_item->id }}">
                                                                            <div class="form-group">
                                                                                <label>Select category</label>
                                                                                <select class="form-control" name="category">
                                                                                    @foreach ($categories as $category)
                                                                                        @if(!empty($category->sub_category))
                                                                                            <option @if($category->category."/".$category->sub_category == $category_item->category) selected @endif>{{ $category->category }}/{{ $category->sub_category }}</option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Category image</label>
                                                                                <img src="{{ asset('images/categories/') }}/{{ $category_item->img_name }}" class="img-fluid" alt="">
                                                                                <input type="file" class="form-control" name="image">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Category short description</label>
                                                                                <textarea name="description" placeholder="Description">{{ $category_item->description }}</textarea>
                                                                            </div>
                                                                            <div class="form-group modal-buttons">
                                                                                <button>Update</button>
                                                                                <button type="button" onclick="event.preventDefault();" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button class="delete" data-toggle="modal" data-target="#myModaldelete{{ $category_item->id }}"><i class="fas fa-trash"></i></button>

                                                        <!-- The Modal -->
                                                        <div class="modal" id="myModaldelete{{ $category_item->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Are you sure to delete
                                                                            <span>{{ $category_item->category }}</span>
                                                                            ?
                                                                        </p>
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <a href="{{ route('delete_sub_category_data') }}?category_id={{ $category_item->id }}">Yes</a>
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 category">
                                    <div class="card">
                                        <h4 class="card-header">Add Category</h4>
                                        <div class="card-body">
                                            <form action="{{ route('category_sub_main') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Select category</label>
                                                    <select class="form-control" name="category">
                                                        @foreach ($categories as $category)
                                                            @if(!empty($category->sub_category))
                                                                <option>{{ $category->category }}/{{ $category->sub_category }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Category image</label>
                                                    <input type="file" class="form-control" name="image">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Category short description</label>
                                                    <textarea name="description" placeholder="Description"></textarea>
                                                </div>
                                                <button type="submit" class="submit">Add</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
