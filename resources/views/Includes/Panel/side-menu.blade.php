    <!-- begin::side menu -->
    <div class="side-menu">
        <div class="side-menu-body">
            <ul>
                <li class="side-menu-divider">فهرست</li>
                <li><a href="index.html"><i class="icon ti-home"></i> <span>داشبورد</span> </a></li>
                <li><a href="#"><i class="icon ti-rocket"></i> <span>کاربران</span> </a>
                    <ul>
                        <li><a href="{{route('Panel.UserList')}}">لیست کاربران </a></li>
                        <li><a href="#">نقش ها </a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="icon ti-rocket"></i> <span>محتوا</span> </a>
                    <ul>
                        <li><a href="{{route('Panel.UploadFile')}}">افزودن</a></li>
                        <li><a href="#">لیست</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- end::side menu -->
