@extends('Layout.Panel')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5 class="text-center">افزودن فایل</h5>
                <hr />
            </div>
            <form id="upload-file" method="post" action="{{route('Panel.UploadFile')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="title" id="title" placeholder="عنوان">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <select name="type" class="custom-select  mb-3">
                                    <option value="movies" selected>سینمایی</option>
                                    <option value="series">سریال</option>
                                </select>
                            </div>
                           <div class="form-group form-inline col-md-8">    
                                <label for="" >محدوده سنی</label>
                                <input type="number" class="form-control col-md-3 mx-2" name="age_rate" id="age_rate" placeholder="">
                           <span >+</span>
                            </div>

                        </div>
                        <div class="row">

                            <div class="form-group col-md-12">
                                <label for="desc">توضیحات : </label>
                                <textarea class="form-control" name="desc" id="desc" cols="30" rows="8"></textarea>
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-12">
                                <label for="short_desc">توضیحات کوتاه: </label>
                                <textarea class="form-control" name="short_desc" id="short_desc" cols="30"
                                    rows="8"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <label for=""> تریلر: </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" name="trailer" class="dropify" data-default-file="" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <label for=""> پوستر فیلم: </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" name="poster" class="dropify" data-default-file="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label for="desc">تصاویر: </label>
                        <span style="cursor: pointer;" href="" onclick="getClone(this)"><i class="fa fa-plus"></i>
                            افزودن </span>

                        <div class="row">
                            <div class=" col-md-3 image-box">
                                <div class="form-group">

                                    <input type="file" name="images[]" class="dropify" data-default-file="" />

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 right-side">
                        <div class="cat">
                            <h6 class="">دسته بندی ها: </h6>
                            <input type="text" class="form-control mb-2" name="" id="" placeholder="جدید">
                            <a href="#" class="btn btn-sm btn-primary mb-3" onclick="addCategory(event)">افزودن</a>
                            <div class="cat-wrapper">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" id="cat" name="category[]" value="ماجراجویی"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="cat">ماجراجویی</label>
                                </div>

                            </div>
                        </div>
                        {{-- <div class="tag mt-3">
                            <h6 class="">تگ ها: </h6>
                            <input type="text" class="form-control mb-2" name="tags" id="tags" placeholder="جدید">
                            <a href="#" class="btn btn-sm btn-primary mb-3" onclick="addTag(event)">افزودن</a>
                            <div class="cat-wrapper">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" id="tag" name="tag[]" value="ماجراجویی"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="tag">سیاسی</label>
                                </div>

                            </div>
                        </div> --}}
                        <div class="casts mt-3">
                            <h6 class="">بازیگران: </h6>
                            <div class="form-group">
							<select class="js-example-basic-single" multiple dir="rtl">
                                @foreach ($actors as $actor)
                                    
                                  <option value="{{$actor->id}}">{{$actor->name}}</option>
                                @endforeach
                               
                            </select>
                        </div>
                        </div>
                        <div class="casts mt-3">
                            <h6 class="">نویسنده (ها)</h6>
                          <div class="form-group">
							<select class="js-example-basic-single" multiple dir="rtl">
                                @foreach ($actors as $actor)
                                    
                                  <option value="{{$actor->id}}">{{$actor->name}}</option>
                                @endforeach
                               
                            </select>
                        </div>
                        </div>
                        <div class="casts mt-3">
                            <h6 class="">کارگردان</h6>
                            <div class="form-group">
							<select class="js-example-basic-single" multiple dir="rtl">
                                @foreach ($actors as $actor)
                                    
                                  <option value="{{$actor->id}}">{{$actor->name}}</option>
                                @endforeach
                               
                            </select>
                        </div>
                        </div>
                        <div class="casts mt-3">
                            <h6 class="">زبان</h6>
                            <input type="text" class="form-control mb-2" name="" id="" placeholder="جدید">
                            <a href="#" class="btn btn-sm btn-primary mb-3" onclick="addLanguage(event)">افزودن</a>
                            <div class="cat-wrapper">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="language" name="language[]" value="ماجراجویی"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="language">
                                        فارسی</label>
                                </div>

                            </div>
                        </div>
                        <div class="casts mt-3">
                            <h6 class="">فصل</h6>
                            <input type="text" class="form-control mb-2" name="" id="" placeholder="جدید">
                            <a href="#" class="btn btn-sm btn-primary mb-3" onclick="addSeason(event)">افزودن</a>
                            <div class="cat-wrapper">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="season" name="season[]" value="ماجراجویی"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="season">
                                        فصل اول</label>
                                </div>

                            </div>
                        </div>
                        <div class="casts mt-3">
                            <h6 class="">قسمت</h6>
                            <input type="text" class="form-control mb-2" name="" id="" placeholder="جدید">
                            <a href="#" class="btn btn-sm btn-primary mb-3" onclick="addSection(event)">افزودن</a>
                            <div class="cat-wrapper">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="section" name="section[]" value="ماجراجویی"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="section">
                                        اول</label>
                                </div>

                            </div>
                        </div>
                        <div class="casts mt-3">
                            <h6 class="">جوایز فیلم</h6>
                            <input type="text" class="form-control mb-2" name="" id="" placeholder="جدید">
                            <a href="#" class="btn btn-sm btn-primary mb-3" onclick="addAward(event)">افزودن</a>
                            <div class="cat-wrapper">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" id="awards" name="awards[]" value="ماجراجویی"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="awards">
                                        اول</label>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">ثبت اطلاعات </button>
                    </div>
                </div>
            </form>
            <hr>
            <form action="#" method="post" enctype="multipart/form-data">
                @csrf
                <div class="files-wrapper">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for=""> فایل: </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" name="file" id="file" class="dropify" data-default-file="" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="custom-control custom-radio custom-control">
                                <input type="radio" id="hd" name="quality[]" value="hd" class="custom-control-input">
                                <label class="custom-control-label" for="hd">کیفیت بالا</label>
                            </div>
                            <div class="custom-control custom-radio custom-control">
                                <input type="radio" id="md" name="quality[]" value="md" class="custom-control-input">
                                <label class="custom-control-label" for="md">کیفیت متوسط</label>
                            </div>
                            <div class="custom-control custom-radio custom-control">
                                <input type="radio" id="sd" name="quality[]" value="sd" class="custom-control-input">
                                <label class="custom-control-label" for="sd">کیفیت پایین</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <a class="btn btn-sm btn-primary text-white" type="" onclick="uploadFile()">آپلود</a>
                            <div class="progress mt-3">
                                <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 0%">
                                    0%
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <a href="#" class="btn btn-sm btn-info text-white mb-5" onclick="addFile(event,this)">اضافه
                    کردن فایل دیگر</a>
            </form>
        </div>
    </div>
</div>
</div>
@endsection