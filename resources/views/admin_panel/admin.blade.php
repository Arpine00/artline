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
                                                <p><b>Parent category</b></p>
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
                                            @foreach ($categories as $category)
                                                <div class="row product_line">
                                                    <div class="col-1">
                                                        <p class="category_id">{{ $category->id }}</p>
                                                    </div>
                                                    <div class="col">
                                                        <p class="category_name">{{ $category->category }}</p>
                                                    </div>
                                                    <div class="col">
                                                        <p class="category_name">{{ $category->sub_category }}</p>
                                                    </div>
                                                    <div class="col-5">
                                                        <p class="category_name">{{ $category->description }}</p>
                                                    </div>
                                                    <div class="col-1 product_tools">
                                                        <button class="edit" data-toggle="modal" data-target="#myModal_update{{ $category->id }}"><i class="fas fa-edit"></i></button>

                                                        <!-- The Modal -->
                                                        <div class="modal update_modal" id="myModal_update{{ $category->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <form action="{{ route('update_categories') }}" method="post" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                                                                            <div class="form-group">
                                                                                <label>Select category or create new</label>
                                                                                <select class="form-control" name="category">
                                                                                    <option></option>
                                                                                    @php
                                                                                        $category_current = $category->category;
                                                                                    @endphp
                                                                                    @foreach ($categories as $category1)
                                                                                        @if(empty($category1->sub_category))
                                                                                            <option @if($category_current == $category1->category) selected @endif>{{ $category1->category }}</option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </select>
                                                                                <input type="text" class="form-control" placeholder="New category" name="category_new">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Edit subcategory</label>
                                                                                <input type="text" class="form-control" placeholder="New subcategory" name="sub_category" value="{{ $category->sub_category }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Category description</label>
                                                                                <textarea name="description" placeholder="Description">{{ $category->description }}</textarea>
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

                                                        <button class="delete" data-toggle="modal" data-target="#myModaldelete{{ $category->id }}"><i class="fas fa-trash"></i></button>

                                                        <!-- The Modal -->
                                                        <div class="modal" id="myModaldelete{{ $category->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Are you sure to delete
                                                                            @if(!empty($category->sub_category))
                                                                                <br>
                                                                                <span>{{ $category->category }}/{{ $category->sub_category }}</span>
                                                                            @else
                                                                                <span>{{ $category->category }}</span>
                                                                            @endif
                                                                            ?
                                                                        </p>
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <a href="{{ route('delete_category') }}?category_id={{ $category->id }}">Yes</a>
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
                                            <form action="{{ route('add_category') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Select category or create new</label>
                                                    <select class="form-control" name="category">
                                                        <option></option>
                                                        @foreach ($categories as $category)
                                                            @if(empty($category->sub_category))
                                                                <option>{{ $category->category }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <input type="text" class="form-control" placeholder="New category" name="category_new">
                                                </div>
                                                <div class="form-group">
                                                    <label>Create subcategory</label>
                                                    <input type="text" class="form-control" placeholder="New subcategory" name="sub_category">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Category description</label>
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
