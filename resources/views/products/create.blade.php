@extends('products.layout')
@section('content')
<div class="container py-10">
   <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header">
                   <h4> Create Products
                       <a href="{{ route('product.index') }}" class="btn btn-primary float-end">Back</a>
                   </h4>
               </div>
               <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                   <p>{{ session('success') }}</p>
                </div>
                @endif
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="form-label">First Name</label>
                                <input type="text" name="f_name" id="f_name" class="form-control" placeholder="Enter First Name">
                            <span class="text-danger">@error('f_name'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="form-label">Last Name</label>
                                <input type="text" name="l_name" id="l_name" class="form-control" placeholder="Enter Last Name">
                            <span class="text-danger">@error('l_name'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="form-label">Date of Birth</label>
                                <input type="text" id="date" name="dob" class="form-control date-picker"  data-date-format="dd-mm-yyyy"  value="@if(old('dob') != null)  {{ date('d/m/Y',strtotime(old('dob'))) }} @endif" autocomplete="off">
                            <span class="text-danger">@error('dob'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Image 1</label>
                                <input type="file" name="image_1" class="form-control">
                            @error('image_1')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Image 2</label>
                                <input type="file" name="image_2" class="form-control">
                            @error('image_2')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Image 3</label>
                                <input type="file" name="image_3" class="form-control">
                            @error('image_3')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Document</label>
                                <input type="file" name="file" class="form-control">
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div><br>
                    <button class="btn btn-primary"  type="submit">Submit</button>
                </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
    $(document).ready(function () {
        // // alert("hi");
        $('#date').datepicker(
            {
                dateFormat: "dd-mm-yy"
            }
            ).val();
    });
 </script>
@endsection
