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
                            <h2>The Flow</h2>

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="row product_head_line">
                                            <div class="col-1">
                                                <p class="category_id"><b>Id</b></p>
                                            </div>
                                            <div class="col">
                                                <p class="img"><b>Name</b></p>
                                            </div>
                                            <div class="col-1">
                                                <p class="img"><b>Image</b></p>
                                            </div>
                                            <div class="col-3">
                                                <p class="name"><b>Video Url</b></p>
                                            </div>
                                            <div class="col-3">
                                                <p class="country"><b>Description</b></p>
                                            </div>
                                            <div class="col">
                                                <p class="country"><b>Category</b></p>
                                            </div>
                                            <div class="col-1 product_tools">
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @foreach ($the_flow as $flow)
                                                <div class="row product_line">
                                                    <div class="col-1">
                                                        <p class="category_id"><b>{{ $flow->id }}</b></p>
                                                    </div>
                                                    <div class="col">
                                                        <p>{{ $flow->name }}</p>
                                                    </div>
                                                    <div class="col-1">
                                                        <img src="{{ asset('images/the_flow/') }}/{{ $flow->image_path }}/{{ $flow->image }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="url">{{ $flow->url }}</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="flow_description">{{ $flow->description }}</p>
                                                    </div>
                                                    <div class="col">
                                                        <p>{{ $flow->category }}</p>
                                                    </div>
                                                    <div class="col-1 product_tools">
                                                        <button class="edit" data-toggle="modal" data-target="#myModal_uptate{{ $flow->id }}"><i class="fas fa-edit"></i></button>

                                                        <!-- The Modal -->
                                                        <div class="modal update_modal" id="myModal_uptate{{ $flow->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <form action="{{ route('update_flow') }}" method="post" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <input type="hidden" name="flow_id" value="{{ $flow->id }}">
                                                                            <div class="form-group">
                                                                                <label for="">Flow name</label>
                                                                                <input type="text" class="form-control" placeholder="Flow Name" name="name" value="{{ $flow->name }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Select category</label>
                                                                                <select class="form-control" name="category">
                                                                                    <option @if($flow->category == "Galleries") selected @endif>Galleries</option>
                                                                                    <option @if($flow->category == "My Pen & I") selected @endif>My Pen & I</option>
                                                                                    <option @if($flow->category == "Lessons") selected @endif>Lessons</option>
                                                                                    <option @if($flow->category == "Videos") selected @endif>Videos</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Main image</label>
                                                                                <img src="{{ asset('images/the_flow/') }}/{{ $flow->image_path }}/{{ $flow->image }}" class="img-fluid" alt="">
                                                                                <input type="file" class="form-control" name="image">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">If you add video</label>
                                                                                <input type="text" class="form-control" placeholder="Youtube Video Link" name="url" value="{{ $flow->url }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Artist uses</label>
                                                                                <div class="form_control">
                                                                                    <select class="form-control select_artist_uses2">
                                                                                        @foreach($category_data as $value)
                                                                                            <option>{{$value->category}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <button class="add_artist_uses2">Add</button>
                                                                                </div>
                                                                                <p class="text_artist_uses2"></p>
                                                                                <input type="hidden" name="artist_uses" class="artist_uses2">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Flow Description</label>
                                                                                <textarea name="description" placeholder="Description">{{ $flow->description }}</textarea>
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
                                                        <button class="delete" data-toggle="modal" data-target="#myModal{{ $flow->id }}"><i class="fas fa-trash"></i></button>

                                                        <!-- The Modal -->
                                                        <div class="modal" id="myModal{{ $flow->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Are you sure to delete
                                                                            <span>{{ $flow->name }}</span>
                                                                            ?
                                                                        </p>
                                                                    </div>
                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <a href="{{ route('delete_flow') }}?flow_id={{ $flow->id }}">Yes</a>
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
                                        <h4 class="card-header">Add Flow</h4>
                                        <div class="card-body">
                                            <form action="{{ route('add_flow') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="">Flow name</label>
                                                    <input type="text" class="form-control" placeholder="Flow Name" name="name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Select category</label>
                                                    <select class="form-control" name="category">
                                                        <option>Galleries</option>
                                                        <option>My Pen & I</option>
                                                        <option>Lessons</option>
                                                        <option>Videos</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Main image</label>
                                                    <input type="file" class="form-control" name="image">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">If you add video</label>
                                                    <input type="text" class="form-control" placeholder="Youtube Video Link" name="url">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Artist uses</label>
                                                    <div class="form_control">
                                                        <select class="form-control select_artist_uses1">
                                                            @foreach($category_data as $value)
                                                                <option>{{$value->category}}</option>
                                                            @endforeach
                                                        </select>
                                                        <button class="add_artist_uses1">Add</button>
                                                    </div>
                                                    <p class="text_artist_uses1"></p>
                                                    <input type="hidden" name="artist_uses" class="artist_uses1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Flow Description</label>
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

