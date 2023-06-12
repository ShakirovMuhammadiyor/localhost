@extends('layouts.app')
 
@section('content')
    <style>
        body{color: #000;overflow-x: hidden;height: 100%;background: #00b09b; background: -webkit-linear-gradient(to right, #00b09b, #96c93d); background: linear-gradient(to right, #00b09b, #96c93d); min-height: 100vh; background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}
    </style>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card">
                    <h5 class="text-center mb-4">Add a product</h5>
                    <form class="form-card" action="{{ url('/create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Product name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="name"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Product price<span class="text-danger"> *</span></label> <input type="number" id="lname" name="price"> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Product description<span class="text-danger"> *</span></label> <input type="text" id="email" name="description"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Product rating<span class="text-danger"> *</span></label> <input type="number" id="mob" name="rating"> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Product image<span class="text-danger"> *</span></label> <input type="file" id="job" name="image"> </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="form-group col-sm-6"> <a href="{{ url('/') }}"><button class="btn-block btn-primary">Back</button></a></div>
                            <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary">Add a product</button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection