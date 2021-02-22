@extends('layouts.app')

@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Manage Product</div>
                                   @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <span>{{$error}}</span>
                        <br>
                    @endforeach
                </div>
            @endif
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Product</h3>
                            </div>
                            <hr>
                            <form action="product" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="product_name" class="control-label mb-1">Product Name</label>
                                    <input  name="product_name" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>vendor</label>
                                    <select class="form-control" name="cat_id">
                                        @foreach($cat as $category)
                                        <option>{{$category->category_name}}</option>
                                     @endforeach
                                     
                                       
                                    </select>
                                </div>
            
                                <div class="form-group">
                                    <label for="product_desc" class="control-label mb-1">Product Price</label>
                                    <input  name="product_price" type="number" class="form-control">
                                </div>
                              
                                <div class="form-group">
                                    <label for="product_image" class="control-label mb-1">Product image</label>
                                    <input  name="product_image" type="file" class="form-control">
                                </div>


                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">Add
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              <!-- DATA TABLE -->
              <h3 class="title-5 m-b-35">Admins Table</h3>
              <div class="table-responsive table-responsive-data2">
                  <table class="table table-data2">
                      <thead>
                      <tr>
                          <th>Category name</th>
                          <th>Category Id</th>
                          <th>Product Id</th>
                          <th>product name</th>
                          <th>product Price</th>
                          <th>product Image</th>
                          <th></th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($products as $product)
                          <tr class="tr-shadow">

                           
                            <td>{{$category['category_name']}}</td>
                           
                         
                              <td>{{$product['cat_id']}}</td>
                              <td>{{$product['pro_id']}}</td>
                              <td>{{$product['product_name']}}</td>
                              <td>
                                 {{$product['product_price']}}
                              </td>
                              <td> <div class="image img-cir img-40">
                                      <img src="images/{{$product->product_image}}">
                                  </div>
                              </td>
                              <td>
                                  <div class="table-data-feature">
                                      <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                          <i class="zmdi zmdi-mail-send"></i>
                                      </button>
                                      <a href="{{ route('product.edit', $product->cat_id)}}">
                                          <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                              <i class="zmdi zmdi-edit"></i>   </button>
                                      </a>
                                  </div>
                              <td>
                                  <form action="{{ route('product.destroy', $product->cat_id)}}" method="post">
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
@endsection
