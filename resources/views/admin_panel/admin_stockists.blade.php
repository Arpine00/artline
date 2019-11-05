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
                            <h2>Stockists</h2>

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="row product_head_line">
                                            <div class="col-1">
                                                <p class="category_id"><b>Id</b></p>
                                            </div>
                                            <div class="col-2">
                                                <p class="img"><b>Logo</b></p>
                                            </div>
                                            <div class="col">
                                                <p class="name"><b>Name</b></p>
                                            </div>
                                            <div class="col-3">
                                                <p class="link"><b>Link</b></p>
                                            </div>
                                            <div class="col">
                                                <p class="country"><b>Country</b></p>
                                            </div>
                                            <div class="col-1 product_tools">
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @foreach ($stockists as $stockist)
                                                <div class="row product_line">
                                                    <div class="col-1">
                                                        <p class="category_id">{{ $stockist->id }}</p>
                                                    </div>
                                                    <div class="col-2">
                                                        <img src="{{ asset('images/stockists/') }}@if($stockist->country == "Australia")/australia/@elseif($stockist->country == "New Zealand")/new_zealand/@endif{{ $stockist->img_name }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p class="name">{{ $stockist->name }}</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="link">{{ $stockist->link }}</p>
                                                    </div>
                                                    <div class="col">
                                                        <p class="country">{{ $stockist->country }}</p>
                                                    </div>
                                                    <div class="col-1 product_tools">
                                                        <button class="edit" data-toggle="modal" data-target="#myModal_uptate{{ $stockist->id }}"><i class="fas fa-edit"></i></button>

                                                        <!-- The Modal -->
                                                        <div class="modal update_modal" id="myModal_uptate{{ $stockist->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <form action="{{ route('update_stockists') }}" method="post" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <input type="hidden" name="stockists_id" value="{{ $stockist->id }}">
                                                                            <div class="form-group">
                                                                                <label>Stockist's name</label>
                                                                                <input type="text" class="form-control" placeholder="Stockist's name" name="name" value="{{ $stockist->name }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Stockist's url</label>
                                                                                <input type="text" class="form-control" placeholder="Link" name="link" value="{{ $stockist->link }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Stockist's logo</label>
                                                                                <img src="{{ asset('images/stockists/') }}@if($stockist->country == "Australia")/australia/@elseif($stockist->country == "New Zealand")/new_zealand/@endif{{ $stockist->img_name }}" class="img-fluid" alt="">
                                                                                <input type="file" class="form-control" name="logo">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Country</label>
                                                                                <select class="form-control" name="country">
                                                                                    <option @if($stockist->country == "Australia") selected @endif>Australia</option>
                                                                                    <option @if($stockist->country == "New Zealand") selected @endif>New Zealand</option>
                                                                                </select>
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

                                                        <button class="delete" data-toggle="modal" data-target="#myModal{{ $stockist->id }}"><i class="fas fa-trash"></i></button>

                                                        <!-- The Modal -->
                                                        <div class="modal" id="myModal{{ $stockist->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Are you sure to delete
                                                                            <span>{{ $stockist->name }}</span>
                                                                            ?
                                                                        </p>
                                                                    </div>
                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <a href="{{ route('delete_stockists') }}?stockists_id={{ $stockist->id }}">Yes</a>
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
                                        <h4 class="card-header">Add Stockists</h4>
                                        <div class="card-body">
                                            <form action="{{ route('add_stockists') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Stockist's name</label>
                                                    <input type="text" class="form-control" placeholder="Stockist's name" name="name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Stockist's url</label>
                                                    <input type="text" class="form-control" placeholder="Link" name="link">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Stockist's logo</label>
                                                    <input type="file" class="form-control" name="logo">
                                                </div>
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="form-control" name="country">
                                                        <option>Australia</option>
                                                        <option>New Zealand</option>
                                                    </select>
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
