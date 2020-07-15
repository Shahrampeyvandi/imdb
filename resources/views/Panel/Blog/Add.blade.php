@extends('Layout.Panel')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5 class="text-center">افزودن </h5>
                <hr />
            </div>
            <form id="add-blog" method="post" action="{{route('Panel.AddBlog')}}" enctype="multipart/form-data"> 
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input required type="text" class="form-control" name="name" id="name" value=""
                                    placeholder="عنوان وبلاگ">
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">

                            <h6 class="">دسته بندی : </h6>
                            <input type="text" class="form-control mb-2" name="" id="" placeholder="جدید">
                            <a href="#" class="btn btn-sm btn-primary mb-3" onclick="addBCategory(event)">افزودن</a>
                            <div class="cat-wrapper">
                                @foreach (\App\BlogCategory::all() as $key => $cat)
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="{{$key+1}}" name="category" value="{{$cat->name}}"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="{{$key+1}}">{{$cat->name}}</label>
                                </div>
                                @endforeach
                            </div>
                            </div>

                        </div>

                        <div class="form-row">
                                    <div class="col-md-3">
                                        <label for=""> تصویر هدر: </label>
                                    </div>
                                    <div class="col-md-6">
                                        <input required type="file" name="poster" 
                                            class="dropify" data-default-file="" data-max-file-size="600K"
                                            data-allowed-file-extensions="jpg jpeg png" />
                                    </div>
                                </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="desc">توضیحات : </label>
                                <textarea  class="form-control" name="desc" id="desc" cols="30" rows="8"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">لینک </label>
                                <input type="text" name="link" id="link" class="form-control" placeholder="http://example.com">
                            </div>
                        </div>




                    </div>


                </div>
                <div class="row mt-3">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">ثبت اطلاعات </button>
                    </div>
                </div>
            </form>
            <hr>
            <div>

            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script src="{{asset('assets/vendors/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('desc',{
            contentsLangDirection: 'rtl',
            filebrowserUploadUrl: '{{route('UploadImage')}}?type=file',
            imageUploadUrl: '{{route('UploadImage')}}?type=image',
        });


</script>
@endsection