<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-info">
                <span class="text-light fs-18">املاک</span>
            </div>
        </div>
    </div>
    <div class="app-sidebar3 mt-0">
        <ul class="side-menu">  
            <li class="slide">  
                <a class="side-menu__item" data-toggle="slide" href="{{ route('admin.dashboard') }}">  
                    <i class="fa fa-dashboard sidemenu_icon"></i>  
                    <span class="side-menu__label">داشبورد</span>  
                </a>  
            </li>  
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="feather sidemenu_icon feather-clipboard"></i>
                    <span class="side-menu__label">اطلاعات پایه</span><i class="angle fa fa-angle-left"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{route('admin.locations.index')}}" class="slide-item">محله ها</a></li>
                    <li><a href="{{route('admin.types.index')}}" class="slide-item">نوع املاک</a></li>
                    <li><a href="{{route('admin.facilities.index')}}" class="slide-item">امکانات</a></li>
                </ul>
            </li>
            <li class="slide">  
                <a class="side-menu__item" data-toggle="slide" href="{{ route('admin.sellings.index') }}">  
                    <i class="sidemenu_icon"></i>  
                    <span class="side-menu__label">فروش ملک</span>  
                </a>  
            </li>  
            <li class="slide">  
                <a class="side-menu__item" data-toggle="slide" href="{{ route('admin.mortgage-rents.index') }}">  
                    <i class="sidemenu_icon"></i>  
                    <span class="side-menu__label">رهن و اجاره‌ی ملک</span>  
                </a>  
            </li>  
        </ul>  
    </div>  
</aside>  