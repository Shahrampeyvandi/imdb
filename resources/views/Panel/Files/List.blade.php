@extends('Layout.Panel')

@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اخطار</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                موارد علامت زده شده حذف شوند؟
            </div>
            <div class="modal-footer">
                <form action="" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="video_id" id="video_id" value="">
                    <a href="#" class="deleteposts btn btn-danger text-white">حذف! </a>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="container_icon card-body d-flex justify-content-end">
        <div class="delete-edit" style="display:none;">
            <a href="#" title="حذف " data-toggle="modal" data-target="#exampleModal" class="order-delete   m-2">
                <span class="__icon bg-danger">
                    <i class="fa fa-trash"></i>
                </span>
            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h5 class="text-center">مدیریت فایل ها</h5>
            <hr>
        </div>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                    aria-controls="pills-home" aria-selected="true">سینمایی</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                    aria-controls="pills-profile" aria-selected="false">سریال</a>
            </li>

        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <table id="example1" class="table table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <th></th>
                            <th>ردیف</th>
                            <th> نام </th>
                            <th>بازدید ها</th>
                            <th>لایک ها</th>
                            <th>دسته بندی ها</th>
                            <th>زبان</th>
                            <th></th>


                        </tr>
                    </thead>

                    <tbody>
                        @foreach($movies as $key=>$post)
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox custom-control-inline"
                                    style="margin-left: -1rem;">
                                    <input data-id="{{$post->id}}" type="checkbox" id="post_{{ $key}}"
                                        name="customCheckboxInline1" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="post_{{$key}}"></label>
                                </div>
                            </td>
                            <td>{{$key+1}}</td>
                            <td>
                                <a href="#" class="text-primary">{{$post->name}}</a>
                            </td>
                            <td>{{$post->views}}</td>
                            <td class="text-success">{{$post->votes()->count()}}</td>
                            <td>
                                @foreach ($post->categories as $category)
                                {{$category->name}} ,
                                @endforeach
                            </td>
                            <td>
                                @foreach ($post->languages as $language)
                                {{$language->name}}
                                @endforeach
                            </td>
                            <td>
                                <a href="{{route('Panel.FileEdit',$post)}}" class="btn btn-sm btn-info">ویرایش</a>
                                <a href="{{route('Panel.UploadVideo')}}?id={{$post->id}}"
                                    class="btn btn-sm btn-outline-info">ویدیوها</a>

                            </td>
                            @endforeach


                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div style="overflow-x: auto;">
                    <table id="example1" class="table table-striped table-bordered w-100">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ردیف</th>
                                <th> نام </th>
                                <th>بازدید ها</th>
                                <th>لایک ها</th>
                                <th>دسته بندی ها</th>
                                <th>زبان</th>
                                <th></th>


                            </tr>
                        </thead>

                        <tbody>
                            @foreach($series as $key=>$post)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox custom-control-inline"
                                        style="margin-left: -1rem;">
                                        <input data-id="{{$post->id}}" type="checkbox" id="post_{{ $key}}"
                                            name="customCheckboxInline1" class="custom-control-input" value="1">
                                        <label class="custom-control-label" for="post_{{$key}}"></label>
                                    </div>
                                </td>
                                <td>{{$key+1}}</td>
                                <td>
                                    <a href="#" class="text-primary">{{$post->name}}</a>
                                </td>
                                <td>{{$post->views}}</td>
                                <td class="text-success">{{$post->votes()->count()}}</td>
                                <td>
                                    @foreach ($post->categories as $category)
                                    {{$category->name}} ,
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($post->languages as $language)
                                    {{$language->name}}
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('Panel.FileEdit',$post)}}" class="btn btn-sm btn-info">ویرایش</a>
                                    <a href="{{route('Panel.UploadEpisode')}}?id={{$post->id}}"
                                        class="btn btn-sm btn-outline-info">قسمت ها</a>
                                </td>
                                @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection
@section('css')

@endsection

@section('js')
<script>
    $('table input[type="checkbox"]').change(function(){
            if( $(this).is(':checked')){
            $(this).parents('tr').css('background-color','#41f5e07d');
            }else{
                $(this).parents('tr').css('background-color','');

            }
            array=[]
            $('table input[type="checkbox"]').each(function(){
                if($(this).is(':checked')){
                array.push($(this).attr('data-id'))

               }
               if(array.length !== 0){
                $('.delete-edit').show()
                if (array.length !== 1) {
                    $('.container_icon').removeClass('justify-content-end')
                    $('.container_icon').addClass('justify-content-between')
                    $('.edit-personal').hide()
                }else{

                    $('.container_icon').removeClass('justify-content-end')
                    $('.container_icon').addClass('justify-content-between')
                    $('.edit-personal').show()
                    
                   
                }
            }
            else{
                $('.container_icon').removeClass('justify-content-between')
                $('.container_icon').addClass('justify-content-end')
                $('.delete-edit').hide()
            }
        })
            
    })
    
       


     $('.deleteposts').click(function(e){
            e.preventDefault()
            data = { array:array, _method: 'delete',_token: "{{ csrf_token() }}" };
            url='{{route('Panel.DeletePost')}}';
            request = $.post(url, data);
            request.done(function(res){
            location.reload()
        });
    })
</script>

@endsection