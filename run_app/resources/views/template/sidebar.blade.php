<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link " href="{{ url( '/')}}">
          <i class="bi bi-grid"></i>
          <span>Home</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse" ></i><span>Todo List</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="api/film">
            <i class="bi bi-circle"></i><span>Kategori</span>
          </a>
        </li>
        <li>
          <a href="api/genre">
            <i class="bi bi-circle"></i><span>Tanggal</span>
          </a>
          <a href="api/film">
            <i class="bi bi-circle"></i><span>Todo List</span>
          </a>
        </li>

      </ul>
    </li><!-- End Tables Nav -->
  </ul>
</aside><!-- End Sidebar-->


bi bi-layout-text-window-reverse