@extends('Layout.Panel')

@section('content')
 <!-- modals -->
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

      <div
        class="modal fade bd-example-modal-lg-edit"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myLargeModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-lg">
          <div class="modal-content edit-modal-user"></div>
        </div>
      </div>

      <!-- end modals -->

      <div class="container-fluid">
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
              <h5 class="text-center">مدیریت کاربران</h5>
              <hr />
            </div>
            <div style="overflow-x: auto;">
              <table id="example1" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th></th>
                    <th>ردیف</th>
                    <th>
                     
                        نام
                     
              
                    </th>
                    <th>
                    
                        نام خانوادگی
                     
                    
                    </th>
                    <th>شماره موبایل</th>
                    <th>پروفایل عکس</th>
                  </tr>
                </thead>
                <tbody class="tbody">
                  @foreach ($users as $key=>$user)
                  <tr>
                    <td>
                      <div
                        class="custom-control custom-checkbox custom-control-inline"
                        style="margin-left: -1rem;"
                      >
                        <input
                          data-id="{{$user->id}}"
                          type="checkbox"
                          id="user_{{ $key}}"
                          name="customCheckboxInline1"
                          class="custom-control-input"
                          value="1"
                        />
                        <label
                          class="custom-control-label"
                          for="user_{{$key}}"
                        ></label>
                      </div>
                    </td>
                    <td>{{$key+1}}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                 
                    <td>{{$user->mobile}}</td>
                    <td>
                      @if ($user->avatar !== '' &&
                      $user->avatar !== null ) <img width="75px"
                      class="img-fluid " src="
                      {{asset("uploads/brokers/$user->avatar")}} " />
                      @else <img width="75px" class="img-fluid " src="
                      {{asset("assets/images/avatar.png")}} " /> @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
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
            url='{{route('Panel.DeleteUser')}}';
            request = $.post(url, data);
            request.done(function(res){
            location.reload()
        });
    })
</script>

@endsection