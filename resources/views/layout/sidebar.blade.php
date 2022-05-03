<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('dist/img/gso-logo.png')}}" alt="GSO Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light h6">General Services Office</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Reydonel Martinez</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="/admin/dashboard" class="nav-link">
                  <i class="nav-icon fas bi-grid-3x3-gap"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
    
          <li class="nav-item">
            <a href="/admin/department" class="nav-link">
              <i class="nav-icon fas bi-building"></i>
              <p>
                Department
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas bi-basket3-fill"></i>
              <p>
                Inventory
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far bi-arrow-right nav-icon"></i>
                  <p>General Fund</p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/admin/gen-dept-inventory" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>General fund - P.A.R</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>General fund - I.C.S</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>General fund - Code</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far bi-arrow-right nav-icon"></i>
                  <p>SEF Inventory</p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/admin/sef-inventory" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>SEF - P.A.R</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>SEF - I.C.S</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>SEF - Code</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="/admin/return-item" class="nav-link">
                  <i class="far bi-arrow-right nav-icon"></i>
                  <p>Return Item</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/archived" class="nav-link">
                  <i class="far bi-arrow-right nav-icon"></i>
                  <p>Archived</p>
                </a>
              </li>  
            </ul>
          </li>
          <li class="nav-item">
            <a href="/admin/user-management" class="nav-link">
              <i class="nav-icon fas bi-people-fill"></i>
              <p>
                User Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/activity-log" class="nav-link">
              <i class="nav-icon fas bi-clipboard2-check"></i>
              <p>
                Activity Log
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas bi-lock-fill"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>