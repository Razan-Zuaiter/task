@extends('layouts.app')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Create Admin</div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <span>{{$error}}</span>
                        <br>
                    @endforeach
                </div>
            @endif
            <div class="card-body card-block">
                <form action="/admin" method="post" class="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input type="text" id="username" name="admin_name" placeholder="Username" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <input type="email" id="email" name="admin_email" placeholder="Email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-asterisk"></i>
                            </div>
                            <input type="password" id="password" name="admin_password" placeholder="Password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <input  name="admin_image" type="file" class="form-control" placeholder="Add Image">
                        </div>
                    </div>
                    <div class="form-actions form-group">
                        <button type="submit" class="btn btn-success btn-sm" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <h3 class="title-5 m-b-35">Admins Table</h3>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>email</th>
                            <th>Image</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                            <tr class="tr-shadow">
                                <td>{{$admin['id']}}</td>
                                <td>{{$admin['admin_name']}}</td>
                                <td>
                                    <span class="block-email">{{$admin['admin_email']}}</span>
                                </td>
                                <td> <div class="image img-cir img-40">
                                        <img src="images/{{$admin->admin_image}}">
                                    </div>
                                </td>
                                <td>
                                    <div class="table-data-feature">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                            <i class="zmdi zmdi-mail-send"></i>
                                        </button>
                                        <a href="{{ route('admin.edit', $admin->id)}}">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>   </button>
                                        </a>
                                    </div>
                                <td>
                                    <form action="{{ route('admin.destroy', $admin->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="zmdi zmdi-delete"></i> </button>
                                    </form>
                                </td>



                                </td>
                            </tr>
                            <tr class="spacer"></tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
@stop
