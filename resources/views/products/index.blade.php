@extends('products.layout')
@section('content')
<div class="container py-10">
    <h1 class="text-center mb-3">Products Details</h1>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4>Product List
                <a href="{{ route('product.create') }}" class="btn btn-primary float-end">Create Product</a>
                </h4>
            </div>
            <div class="card-body">
                @if (session('danger'))
                <div class="alert alert-danger">
                   <p>{{ session('danger') }}</p>
               </div>
           @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Image 1</th>
                        <th>Image 2</th>
                        <th>Image 3</th>
                        <th>File </th>
                    </tr>
                </thead>
                <tbody>
                    @if($products->isNotEmpty())
                        @foreach ( $products as $key =>$product )
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $product->f_name }}</td>
                                <td>{{ $product->l_name }}</td>
                                <td> {{date('d/m/Y',strtotime($product->dob))}}</td>
                                <td>
                                    <img src="{{ asset('uploads/products_1/'.$product->image_1) }}" width="70px" height="70px" alt="image">
                                </td>
                                <td>
                                    <img src="{{ asset('uploads/products_2/'.$product->image_2) }}" width="70px" height="70px" alt="image">
                                </td>
                                <td>
                                    <a href="{{ asset('uploads/products_3/'.$product->image_3) }}">Image</a>
                                </td>
                                <td>
                                    <div >
                                        <span>
                                           <a href="{{ asset('uploads/file/'.$product->file)  }}" class="text-success" download="">Download</a>                                         </span>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
