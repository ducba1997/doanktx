<li class="header">Quản lý phân quyền tài khoản</li>
<li>
    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
        <i class="material-icons">security</i>
        <span>Phân quyền</span>
    </a>
    <ul class="ml-menu">
        <li>
            <a href="{{ route('admin.quyens.index') }}" class=" waves-effect waves-block">

                <span>Danh sách quyền</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.quyens.index') }}" class=" waves-effect waves-block">

                <span>Quản lý quyền</span>
            </a>
        </li>
        <li>
            <a href="/Users/Index">
                <span>Danh sách tài khoản</span>
            </a>
        </li>
    </ul>
</li>

<li class="header">Danh mục quản lý</li>
<li class="{{ Request::is('admin')||Request::is('admin/thuephong/*') ? 'active' : '' }}">
        <a href="{{route('admin.dashboard.index')}}">
            <i class="material-icons">home</i>
            <span>Trang chủ</span>
    </a>
</li>

<li class="{{ Request::is('admin/sinhViens*') ? 'active' : '' }}">
    <a href="{{ route('admin.sinhViens.index') }}" class=" waves-effect waves-block">
    <i class="material-icons">perm_contact_calendar</i>
        <span>Quản lý Sinh Viên</span>
    </a>
</li>

<li class="{{ Request::is('admin/phongs*') ? 'active' : '' }}">
    <a href="{{ route('admin.phongs.index') }}" class=" waves-effect waves-block">
        <i class="material-icons">business</i>
        <span>Quản lý Phòng</span>
    </a>
</li>

<li class="{{ Request::is('admin/khoas*') ? 'active' : '' }}">
    <a href="{{ route('admin.khoas.index') }}" class=" waves-effect waves-block">
        <i class="material-icons">account_balance</i>
        <span>Quản lý Khoa</span>
    </a>
</li>

<li class="{{ Request::is('admin/nguoiQuanLies*') ? 'active' : '' }}">
    <a href="{{ route('admin.nguoiQuanLies.index') }}" class=" waves-effect waves-block">
    <i class="material-icons">account_circle</i>
        <span>Nguoi Quản Lý</span>
    </a>
</li>

<li class="{{ Request::is('admin/khus*') ? 'active' : '' }}">
    <a href="{{ route('admin.khus.index') }}" class=" waves-effect waves-block">
    <i class="material-icons">view_compact</i>
        <span>Khu</span>
    </a>
</li>

<li class="{{ Request::is('admin/tangs*') ? 'active' : '' }}">
    <a href="{{ route('admin.tangs.index') }}" class=" waves-effect waves-block">
    <i class="material-icons">business</i>
        <span>Tầng</span>
    </a>
</li>

<li class="{{ Request::is('admin/loaiPhongs*') ? 'active' : '' }}">
    <a href="{{ route('admin.loaiPhongs.index') }}" class=" waves-effect waves-block">
        <i class="material-icons">text_fields</i>
        <span>Loại Phòng</span>
    </a>
</li>
