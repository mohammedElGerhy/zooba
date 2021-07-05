<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="{{route('admin.dashboard')}}">
                    <i class="icon_house_alt"></i>
                    <span>الرئيسية</span>
                </a>
            </li>
            @if(auth()->guard('admin')->user()->statues == 1)
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>المسئولين</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('admin.admins')}}">المسئولين</a></li>
                </ul>
            </li>
@endif
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>الخدمات</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('admin.services')}}">الحدمات</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_desktop"></i>
                    <span>الفنانين</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('artists.index')}}">الفنانين</a></li>
                    <li><a class="" href="{{route('artists.create')}}"> اضافة لفنانين</a></li>
                </ul>
            </li>
            <li>
                <a class="" href="{{route('ratings.index')}}">
                    <i class="icon_genius"></i>
                    <span>تقيم الفنانين</span>
                </a>
            </li>
            <li>
                <a class="" href="{{route('admin.artists.presence')}}">
                    <i class="icon_blocked"></i>
                    <span>حضور و غياب الفنانين</span>

                </a>

            </li>

            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_table"></i>
                    <span> الطلابات</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('admin.users.index')}}"> الطلابات</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_documents_alt"></i>
                    <span>بيانات العملاء</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('admin.users.get_user')}}">بيانات العملاء</a></li>

                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
