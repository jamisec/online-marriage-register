<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="index3.html" class="brand-link">
    <img src="" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Portfolio</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                ড্যাশবোর্ড
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                জাতীয় পরিচয় পত্র  
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/govt/nids" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> জাতীয় পরিচয় পত্রের তালিকা </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/govt/nids/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>জাতীয় পরিচয় পত্র নিবন্ধন করুন</p>
                </a>
              </li>

            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                বিবাহের নিবন্ধনের তালিকা 
                {{-- <i class="fas fa-angle-left right"></i> --}}
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                কাজী 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/govt/kazis" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> কাজীর তালিকা</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/govt/kazis/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> কাজী যোগ করুন</p>
                </a>
              </li>
            </ul>
          </li>   
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
