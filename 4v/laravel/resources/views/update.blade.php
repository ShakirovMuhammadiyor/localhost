@extends('layouts.app')
 
@section('content')
    <style>
        body{color: #000;overflow-x: hidden;height: 100%; background: #cc2b5e;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #753a88, #cc2b5e);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #753a88, #cc2b5e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
 min-height: 100vh; background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}
    </style>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card">
                    <h5 class="text-left mb-4">Update an article</h5>
                    <form class="form-card" action="{{ url('/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Title<span class="text-danger"> *</span></label> <input type="text" value="{{ $data->title }}" id="fname" name="title"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Subject<span class="text-danger"> *</span></label> <input type="text" value="{{ $data->subject }}" id="lname" name="subject"> </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $data->id }}" />
                        <input type="hidden" name="lastimage" value="{{ $data->image }}" />
                        <div class="row justify-content-center text-center w-25">
                            <img src="{{ asset('images/'.$data->image) }}" class="img-fluid img-thumbnail" />
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Image<span class="text-danger"> *</span></label> <input type="file" id="job" name="image"> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Article text<span class="text-danger"> *</span></label> <textarea name="text" id="" rows="6">{{ $data->text }}</textarea> </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="form-group col-sm-6"> <a href="{{ url('/') }}"><button class="btn-block btn-secondary">Back</button></a></div>
                            <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-secondary">Add an article</button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection