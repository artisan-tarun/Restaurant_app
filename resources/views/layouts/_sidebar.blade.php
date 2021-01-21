<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user" aria-expanded="true" aria-controls="user">
        <i class="fas fa-users"></i>
          <span>Users</span>
        </a>
        <div id="user" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage:</h6>
            <a class="collapse-item" href="{{route('user.index')}}?status=all">View All</a>
            <a class="collapse-item" href="{{route('user.index')}}?status=trash">Trash</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#role" aria-expanded="true" aria-controls="role">
        <i class="fas fa-user-tag"></i>
          <span>Roles</span>
        </a>
        <div id="role" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage:</h6>
            <a class="collapse-item" href="{{route('role.index')}}?status=all">View All</a>
            <a class="collapse-item" href="{{route('role.index')}}?status=trash">Trash</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#category" aria-expanded="true" aria-controls="category">
        <i class="fas fa-tags"></i>
          <span>Category</span>
        </a>
        <div id="category" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage:</h6>
            <a class="collapse-item" href="{{route('category.index')}}?status=all">View All</a>
            <a class="collapse-item" href="{{route('category.index')}}?status=trash">Trash</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#item" aria-expanded="true" aria-controls="item">
        <i class="fas fa-tasks"></i>
          <span>Items</span>
        </a>
        <div id="item" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage:</h6>
            <a class="collapse-item" href="{{route('item.index')}}?status=all">View All</a>
            <a class="collapse-item" href="{{route('item.index')}}?status=trash">Trash</a>
          </div>
        </div>
      </li>

    
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>