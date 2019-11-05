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
                            <h2>Products</h2>

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="row product_head_line">
                                            <div class="col-1">
                                                <p class="category_id"><b>Id</b></p>
                                            </div>
                                            <div class="col-2">
                                                <p class="img"><b>Name</b></p>
                                            </div>
                                            <div class="col-1">
                                                <p class="img"><b>Image</b></p>
                                            </div>
                                            <div class="col-1">
                                                <p class="name"><b>Style</b></p>
                                            </div>
                                            <div class="col-2">
                                                <p class="link"><b>Nib type</b></p>
                                            </div>
                                            <div class="col-2">
                                                <p class="country"><b>Line width</b></p>
                                            </div>
                                            <div class="col-2">
                                                <p class="country"><b>Category</b></p>
                                            </div>
                                            <div class="col-1 product_tools">
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @foreach ($products as $product)
                                                <div class="row product_line">
                                                    <div class="col-1">
                                                        <p class="category_id"><b>{{ $product->id }}</b></p>
                                                    </div>
                                                    <div class="col-2">
                                                        <p class="img"><b>{{ $product->name }}</b></p>
                                                    </div>
                                                    <div class="col-1">
                                                        <img src="{{ asset('images/products/images_products/') }}/{{ $product->product_img }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="col-1">
                                                        <img src="{{ asset('images/products/products_style/') }}/{{ $product->style_img }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="col-2">
                                                        <p class="link"><b>{{ $product->nib_type }}</b></p>
                                                    </div>
                                                    <div class="col-2">
                                                        <p class="country"><b>{{ $product->line_width }}</b></p>
                                                    </div>
                                                    <div class="col-2">
                                                        <p class="country"><b>{{ $product->category }}</b></p>
                                                    </div>
                                                    <div class="col-1 product_tools">
                                                        <button class="edit" data-toggle="modal" data-target="#myModal_uptate{{ $product->id }}"><i class="fas fa-edit"></i></button>

                                                        <!-- The Modal -->
                                                        <div class="modal update_modal" id="myModal_uptate{{ $product->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <form action="{{ route('update_products') }}" method="post" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <input type="hidden" name="products_id" value="{{ $product->id }}">
                                                                            <div class="form-group">
                                                                                <label for="">Product name</label>
                                                                                <input type="text" class="form-control" placeholder="Product Name" name="name" value="{{ $product->name }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Select category</label>
                                                                                <select class="form-control" name="category">
                                                                                    @foreach ($categories as $category)
                                                                                        @if(!empty($category->sub_category))
                                                                                            <option @if($category->category."/".$category->sub_category == $product->category) selected @endif>{{ $category->category }}/{{ $category->sub_category }}</option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Nib type</label>
                                                                                <input type="text" class="form-control" placeholder="Nib Type" name="nib_type" value="{{ $product->nib_type }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Line width</label>
                                                                                <input type="text" class="form-control" placeholder="Ex. 0.4MM" name="line_width" value="{{ $product->line_width }}">
                                                                            </div>
                                                                            <div class="form-group colors_block">
                                                                                <label for="">Colors</label>
                                                                                <input type="text" class="form-control" placeholder="Example: red,#000,green,#d3d3d3" name="colors" value="{{ $product->colors }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Product image</label>
                                                                                <img src="{{ asset('images/products/images_products/') }}/{{ $product->product_img }}" class="img-fluid" alt="">
                                                                                <input type="file" class="form-control" name="product_img">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Product style image</label>
                                                                                <img src="{{ asset('images/products/products_style/') }}/{{ $product->style_img }}" class="img-fluid" alt="">
                                                                                <input type="file" class="form-control" name="style_img">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Where to buy</label>
                                                                                <div class="form_control">
                                                                                    <select class="form-control select_where_to_buy">
                                                                                        <option></option>
                                                                                        @foreach ($stockists as $stockist)
                                                                                            <option>{{ $stockist->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <button class="add_where_to_buy">Add</button>
                                                                                </div>
                                                                                <p class="where_to_buy_show">{{ $product->where_to_buy }}</p>
                                                                                <input type="hidden" class="where_to_buy" name="where_to_buy" value="{{ $product->where_to_buy }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Product description</label>
                                                                                <textarea name="description" placeholder="Description">{{ $product->description }}</textarea>
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
                                                        <button class="delete" data-toggle="modal" data-target="#myModal{{ $product->id }}"><i class="fas fa-trash"></i></button>

                                                        <!-- The Modal -->
                                                        <div class="modal" id="myModal{{ $product->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Are you sure to delete
                                                                            <span>{{ $product->name }}</span>
                                                                            ?
                                                                        </p>
                                                                    </div>
                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <a href="{{ route('delete_products') }}?products_id={{ $product->id }}">Yes</a>
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
                                <div class="col-3">
                                    <div class="card">
                                        <h4 class="card-header">Add Product</h4>
                                        <div class="card-body">
                                            <form action="{{ route('add_products') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="">Product name</label>
                                                    <input type="text" class="form-control" placeholder="Product Name" name="name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Select category</label>
                                                    <select class="form-control" name="category">
                                                        @foreach ($categories as $category)
                                                            @if(!empty($category->sub_category))
                                                                <option>{{ $category->category }}/{{ $category->sub_category }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nib type</label>
                                                    <input type="text" class="form-control" placeholder="Nib Type" name="nib_type">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Line width</label>
                                                    <input type="text" class="form-control" placeholder="Ex. 0.4MM" name="line_width">
                                                </div>
                                                <div class="form-group colors_block">
                                                    <label for="">Colors</label>
                                                    <input type="text" class="form-control" placeholder="Example: red,#000,green,#d3d3d3" name="colors">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Product image</label>
                                                    <input type="file" class="form-control" name="product_img">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Product style image</label>
                                                    <input type="file" class="form-control" name="style_img">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Where to buy</label>
                                                    <div class="form_control">
                                                        <select class="form-control select_where_to_buy1">
                                                            <option></option>
                                                            @foreach ($stockists as $stockist)
                                                                <option>{{ $stockist->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <button class="add_where_to_buy1">Add</button>
                                                    </div>
                                                    <p class="where_to_buy_show1"></p>
                                                    <input type="hidden" class="where_to_buy1" name="where_to_buy">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Product description</label>
                                                    <textarea name="description" placeholder="Description"></textarea>
                                                </div>
                                                <button type="submit" class="submit">Add</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Main Col END -->
                    </div><!-- body-row END -->
                </div>
            </div>
        </div>
    </section>
@endsection

