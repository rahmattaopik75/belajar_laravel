<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class=active><a class="nav-link" href="{{ url('/home')}}"><i class="far fa-chart-bar"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Starter</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i> <span>Post</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ url('/posts')}}">List Post</a></li>
                <li><a class="nav-link" href="{{ route('posts.tampil_hapus')}}">List Post dihapus</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-clipboard"></i> <span>Kategori</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ url('/category')}}">List Kategori</a></li>
              </ul>
            </li>
            <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-bookmark"></i> <span>Tag</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ url('/tags')}}">List Tag</a></li>
              </ul>
            </li>
            <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>User</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ url('/users')}}">List User</a></li>
              </ul>
            </li>
       </aside>
      </div>
