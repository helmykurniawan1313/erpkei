<div class="topbar">
         <!-- LOGO -->
    <div class="topbar-left">
        <a href="/dashboard/about" class="logo">
                    <span>
                        <img src="/storage/{{ $profile[0]->company_logo }}" alt="" height="100">
                    </span>
            <i>
                <img src="/storage/{{ $profile[0]->company_logo }}" alt="" height="49">
            </i>
        </a>
    </div>

    <nav class="navbar-custom">
        <ul class="list-inline float-left mb-0">
            <li class="list-inline-item">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="dripicons-menu"></i>
                </button>
            </li>
        </ul>
    
        <div class="nav-center text-white">
            {{ $user }}
        </div>
    
        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list">
                
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user lg" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="text-white" style="font-size: 15px"></i> <i class="dripicons-user text-white" style="font-size: 20px"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown" aria-labelledby="Preview">
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow">{{ $user }} </h5>
                    </div>
                    <a href="/dashboard/setting" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle"></i> <span>Profile Setting</span>
                    </a>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    
        <style>
            .navbar-custom {
                display: flex;
                align-items: center;
                justify-content: space-between;
                position: relative;
            }
            .nav-center {
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
                font-size: 20px;
                color: white; /* Added color property to change text color to white */
            }
            .list-inline {
                display: flex;
                align-items: center;
            }
            .text-white {
                color: white;
            }
        </style>
    </nav>
    
    
    

    
</div>
   


<!-- Top Bar End -->