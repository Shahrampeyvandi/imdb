@extends('Layout.Panel')

@section('content')
 <!-- modals -->
      <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">اخطار</h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              موارد علامت زده شده حذف شوند؟
            </div>
            <div class="modal-footer">
              <a type="button" class="delete btn btn-danger text-white"
                >حذف!
              </a>
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
            <div class="delete-edit" style="display: none;">
              {{-- @if (auth()->user()->can('user_delete'))
              <a
                href="#"
                title="حذف "
                data-toggle="modal"
                data-target="#exampleModal"
                class="order-delete m-2"
              >
                <span class="__icon bg-danger">
                  <i class="fa fa-trash"></i>
                </span>
              </a> --}}
              {{-- @endif @if (auth()->user()->can('user_edit'))

              <a
                href="#"
                title="ویرایش"
                data-toggle="modal"
                data-target=".bd-example-modal-lg-edit"
                class="mx-2"
              >
                <span class="edit-personal __icon bg-info">
                  <i class="fa fa-edit"></i>
                </span>
              </a>
              @endif --}}
            </div>

            <div>
              <a href="#" class="mx-2 btn--filter" title="فیلتر اطلاعات">
                <span class="__icon bg-info">
                  <i class="fa fa-search"></i>
                </span>
              </a>
              {{-- @if (auth()->user()->can('insert_user'))
              <a
                href="#"
                data-toggle="modal"
                data-target=".bd-example-modal-lg"
                title="افزودن کاربر"
              >
                <span class="__icon bg-success">
                  <i class="fa fa-plus"></i>
                </span>
              </a>
              @endif --}}
              <a
                href=" {{route('Panel.UserList')}} "
                title="تازه سازی"
                class="mx-2"
              >
                <span class="__icon bg-primary">
                  <i class="fa fa-refresh"></i>
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
                      <a href="#" data-id="name" class="name_field text-white">
                        نام
                        <i class="fa fa-angle-down"></i>
                      </a>
                    </th>
                    <th>
                      <a
                        href="#"
                        data-id="lastname"
                        class="name_field text-white"
                      >
                        نام خانوادگی
                        <i class="fa fa-angle-down"></i>
                      </a>
                    </th>
                    <th>
                      <a
                        href="#"
                        data-id="username"
                        class="name_field text-white"
                      >
                        نام کاربری
                        <i class="fa fa-angle-down"></i>
                      </a>
                    </th>
                    <th>نقش</th>
                    <th>کد ملی</th>
                    <th>شماره موبایل</th>
                    <th>پروفایل عکس</th>
                  </tr>
                </thead>
                {{-- <tbody class="tbody">
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
                    <td>{{$user->user_firstname}}</td>
                    <td>{{$user->user_lastname}}</td>
                    <td>{{$user->user_username}}</td>
                    <td>{{$user->user_responsibility}}</td>
                    <td>{{$user->user_national_code}}</td>
                    <td>{{$user->user_mobile}}</td>
                    <td>
                      @if ($user->user_prfile_pic !== '' &&
                      $user->user_prfile_pic !== null ) <img width="75px"
                      class="img-fluid " src="
                      {{asset("uploads/brokers/$user->user_prfile_pic")}} " />
                      @else <img width="75px" class="img-fluid " src="
                      {{asset("Pannel/img/avatar.jpg")}} " /> @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody> --}}
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection