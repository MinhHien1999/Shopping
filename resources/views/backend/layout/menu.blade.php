<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    {{-- <li class="nav-item nav-category">
      <span class="nav-link">Dashboard</span>
    </li> --}}
    <li class="nav-item">
      <a class="nav-link" href="{{URL('/admin/dashboard')}}">
        <span class="menu-title">Dashboard</span>
        <i class="icon-screen-desktop menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{URL('/admin/nsx')}}">
        <span class="menu-title">Nhà sản xuất</span>
        <i class="icon-layers menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{URL('/admin/product')}}">
        <span class="menu-title">Sản phẩm</span>
        <i class="icon-globe menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{URL('/admin/order/manage-order')}}">
        <span class="menu-title">Hóa đơn</span>
        <i class="icon-book-open menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{URL('/admin/statistic')}}">
        <span class="menu-title">Thống kê</span>
        <i class="icon-chart menu-icon"></i>
      </a>
    </li>
    <li class="nav-item nav-category"><span class="nav-link">Khác</span></li>
    <li class="nav-item">
      <a class="nav-link" href="{{URL('/admin/member')}}">
        <span class="menu-title">Thành Viên</span>
        <i class="icon-doc menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{URL('/admin/slide')}}">
        <span class="menu-title">Slide</span>
        <i class="icon-doc menu-icon"></i>
      </a>
    </li>
  </ul>
</nav>