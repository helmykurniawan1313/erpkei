 <!-- ========== Left Sidebar Start ========== -->
 <div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li>
                    <a class="nav-link {{ Request::is('dashboard/main*') ? 'active' : '' }}" href="/dashboard/main">
                        <i class="fi-paper"></i> <span> Dashboard </span>
                    </a>
                </li>
              @switch($division)
                  @case(1)
                  <li>
                    <a class="nav-link {{ Request::is('dashboard/employeedebt*') ? 'active' : '' }}" href="/dashboard/employeedebt">
                        <i class="fi-record"></i> <span> Hutang Karyawan </span>
                    </a>
                </li>
                  @case(2)
                      
                      
                

                <li>
                    <a href="javascript: void(0);"><i class="fi-paper-stack"></i>  <span> Pemasukan </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                     
                        <li>
                            <a class="nav-link {{ Request::is('dashboard/incomes*') ? 'active' : '' }}" href="/dashboard/incomes">
                                <span> Pemasukan </span>
                            </a>
                          
                        </li>
                        <li>
                            <a class="nav-link {{ Request::is('dashboard/incomecategory*') ? 'active' : '' }}" href="/dashboard/incomecategory">
                                 <span> Kategori Pemasukan </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);"><i class="fi-paper-stack"></i>  <span> Pengeluaran </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a class="nav-link {{ Request::is('dashboard/expanses*') ? 'active' : '' }}" href="/dashboard/expanses">
                                <span> Pengeluaran </span>
                            </a>
                          
                        </li>
                        <li>
                            <a class="nav-link {{ Request::is('dashboard/incomecategory*') ? 'active' : '' }}" href="/dashboard/expansescategory">
                                 <span> Kategori Pengeluran </span>
                            </a>
                        </li>
                    </ul>
                </li>
               <li>
                    <a class="nav-link {{ Request::is('dashboard/employeedebt*') ? 'active' : '' }}" href="/dashboard/employeedebt">
                        <i class="fi-record"></i> <span> Hutang Karyawan </span>
                    </a>
                </li>
            
                @break
              
                @default
                    
            @endswitch
                {{--  <li>
                    <a class="nav-link {{ Request::is('dashboard/about*') ? 'active' : '' }}" href="/dashboard/about">
                        <i class="fi-paper"></i> <span> About </span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Request::is('dashboard/clients*') ? 'active' : '' }}" href="/dashboard/clients">
                        <i class="fi-record"></i> <span> Clients </span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Request::is('dashboard/uploadmainimage*') ? 'active' : '' }}" href="/dashboard/uploadmainimage">
                        <i class="fi-image"></i> <span> Images </span>
                    </a>
                  
                </li>
                <li>
                    <a href="javascript: void(0);"><i class="fi-paper-stack"></i>  <span> Blog </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                                <span> Blogs </span>
                            </a>
                          
                        </li>
                        <li>
                            <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
                                 <span> Blog Categories </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-link {{ Request::is('dashboard/products*') ? 'active' : '' }}" href="/dashboard/products">
                        <i class="fi-box"></i> <span> Products </span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Request::is('dashboard/profile*') ? 'active' : '' }}" href="/dashboard/profile">
                        <i class="fi-head"></i> <span> Profile </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);"><i class="fi-bag"></i>  <span> Project </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a class="nav-link {{ Request::is('dashboard/projects*') ? 'active' : '' }}" href="/dashboard/projects">
                                <span> Projects </span>
                            </a>
                          
                        </li>
                        <li>
                            <a class="nav-link {{ Request::is('dashboard/cats*') ? 'active' : '' }}" href="/dashboard/cats">
                                 <span> Project Categories </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-link {{ Request::is('dashboard/services*') ? 'active' : '' }}" href="/dashboard/services">
                        <i class="fi-stack"></i> <span> Services </span>
                    </a>
                </li> --}}
                
               



            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->


