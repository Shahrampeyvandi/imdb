<!-- begin::side menu -->
<div class="side-menu">
    <div class="side-menu-body">
        <ul>
            <li class="side-menu-divider">فهرست</li>
            <li><a href="{{route('BaseUrl')}}"><i class="icon ti-home"></i> <span>داشبورد</span> </a></li>
            <li><a href="{{route('Panel.UserList')}}"><i class="icon ti-user"></i> <span>کاربران</span> </a>
            </li>
            <li><a href="#"><i class="icon ti-list"></i> <span>فیلم ها</span> </a>
                <ul>
                    <li><a href="{{route('Panel.UploadFile')}}">افزودن</a></li>
                <li><a href="{{route('Panel.FileList')}}">لیست</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="icon ti-list"></i> <span>وبلاگ</span> </a>
                <ul>
                    <li><a href="{{route('Panel.AddBlog')}}">افزودن</a></li>
                <li><a href="{{route('Panel.BlogList')}}">لیست</a></li>
                </ul>
            </li>
             <li><a href="#"><i class="icon ti-star"></i> <span>اشتراک</span> </a>
                <ul>
                <li><a href="{{route('Panel.AddPlan')}}">افزودن</a></li>
                <li><a href="{{route('Panel.PlanList')}}">لیست</a></li>
                <li><a href="{{route('Panel.DiscountList')}}">کدهای تخفیف</a></li>
                </ul>
            </li>
             <li><a href="#"><i class="icon ti-envelope"></i> <span>ارتباط با کاربران</span> </a>
                <ul>
                <li><a href="{{route('Panel.SendMessage')}}">ارسال پیام</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- end::side menu -->
