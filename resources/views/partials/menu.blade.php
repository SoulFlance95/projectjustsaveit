<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                       Paramétres
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    Autorisations
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    Privilèges
                                </a>
                            </li>
                            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key nav-icon">
                            </i>
                            Mots de passe
                        </a>
                    </li>
                @endcan
                @can('profile_password_edit')
                <li class="nav-item">
                    <a class="nav-link" href="/admin/user-activity">
                        <i class="fa-fw fas fa-key nav-icon">
                        </i>
                        Moniteur d'activités
                    </a>
                </li>
            @endcan
            @endif
           
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    Utilisateurs
                                </a>
                            </li>
                            </ul>
                        @endcan
                       
            @endcan
           
          
            @can('transaction_access')
            <li class="nav-item">
                <a href="{{ route("admin.commandes.index") }}" class="nav-link {{ request()->is('admin/commandes') || request()->is('admin/commandes*') ? 'active' : '' }}">
                    <i class="fa-fw fa fa-cart-plus nav-icon">

                    </i>
                    Commandes
                </a>
            </li>
        @endcan
        @can('transaction_access')
        <li class="nav-item">
            <a href="{{ route("admin.clients.index") }}" class="nav-link {{ request()->is('admin/clients') || request()->is('admin/clients/*') ? 'active' : '' }}">
                <i class="fa-fw fa fa-users nav-icon">

                </i>
                Clients
            </a>
        </li>
    @endcan
   
@can('transaction_access')
<li class="nav-item">
    <a href="{{ route("admin.commandes.stats") }}" class="nav-link {{ request()->is('admin/stats') || request()->is('admin/stats/*') ? 'active' : '' }}">
        <i class="fa-fw fa fa-shopping-basket nav-icon">

        </i>
        Statistiques
    </a>
</li>
@endcan
@can('transaction_access')
<li class="nav-item">
    <a href="{{ route("admin.commandes.imprimer") }}" class="nav-link {{ request()->is('admin/imprimer') || request()->is('admin/stats/*') ? 'active' : '' }}">
        <i class="fa-fw fa fa-print nav-icon">

        </i>
        Impression
    </a>
</li>
@endcan
<li class="nav-item">
    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
        <i class="nav-icon fas fa-fw fa-sign-out-alt">

        </i>
        Se déconnecter
    </a>
</li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
