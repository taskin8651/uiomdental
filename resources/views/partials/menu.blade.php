<aside id="sidebar">

    {{-- BRAND --}}
    <div class="sidebar-brand">
        <div class="brand-area">
            <div class="brand-icon">
                <i class="fas fa-bolt"></i>
            </div>

            <span class="brand-text">
                {{ trans('panel.site_title') }}
            </span>
        </div>
    </div>

    {{-- USER MINI CARD --}}
    <div class="user-info">
        <div class="user-avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>

        <div class="user-meta">
            <p class="user-name">{{ auth()->user()->name }}</p>
            <p class="user-role">Administrator</p>
        </div>
    </div>

    {{-- NAV --}}
    <nav class="sidebar-nav">

        <p class="sidebar-section-title nav-label">Main</p>

        {{-- Dashboard --}}
        <a href="{{ route('admin.home') }}"
           data-tooltip="Dashboard"
           class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}">
            <i class="fas fa-chart-pie nav-icon"></i>
            <span class="nav-label">{{ trans('global.dashboard') }}</span>
        </a>

        {{-- USER MANAGEMENT GROUP --}}
        @can('user_management_access')
            @php
                $umActive = request()->is('admin/permissions*')
                    || request()->is('admin/roles*')
                    || request()->is('admin/users*')
                    || request()->is('admin/audit-logs*');
            @endphp

            <div x-data="{ open: {{ $umActive ? 'true' : 'false' }} }">

                <button type="button"
                        @click="open = !open"
                        data-tooltip="Users"
                        class="nav-link nav-group-btn {{ $umActive ? 'active' : '' }}">

                    <div class="nav-group-left">
                        <i class="fas fa-users nav-icon"></i>
                        <span class="nav-label">{{ trans('cruds.userManagement.title') }}</span>
                    </div>

                    <i class="fas fa-chevron-right chevron"
                       :style="open ? 'transform:rotate(90deg)' : ''"></i>
                </button>

                <div class="submenu"
                     x-show="open"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 -translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-1">

                    @can('permission_access')
                        <a href="{{ route('admin.permissions.index') }}"
                           class="sub-link {{ request()->is('admin/permissions*') ? 'active' : '' }}">
                            <i class="fas fa-key"></i>
                            {{ trans('cruds.permission.title') }}
                        </a>
                    @endcan

                    @can('role_access')
                        <a href="{{ route('admin.roles.index') }}"
                           class="sub-link {{ request()->is('admin/roles*') ? 'active' : '' }}">
                            <i class="fas fa-shield-alt"></i>
                            {{ trans('cruds.role.title') }}
                        </a>
                    @endcan

                    @can('user_access')
                        <a href="{{ route('admin.users.index') }}"
                           class="sub-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                            <i class="fas fa-user-circle"></i>
                            {{ trans('cruds.user.title') }}
                        </a>
                    @endcan

                    @can('audit_log_access')
                        <a href="{{ route('admin.audit-logs.index') }}"
                           class="sub-link {{ request()->is('admin/audit-logs*') ? 'active' : '' }}">
                            <i class="fas fa-history"></i>
                            {{ trans('cruds.auditLog.title') }}
                        </a>
                    @endcan

                </div>
            </div>
        @endcan

        {{-- SERVICE MANAGEMENT GROUP --}}
@can('service_section_access')
    @php
        $serviceActive = request()->is('admin/service-sections*');
    @endphp

    <div x-data="{ open: {{ $serviceActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Services"
                class="nav-link nav-group-btn {{ $serviceActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-tooth nav-icon"></i>
                <span class="nav-label">Service Management</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('service_section_access')
                <a href="{{ route('admin.service-sections.index') }}"
                   class="sub-link {{ request()->is('admin/service-sections*') ? 'active' : '' }}">
                    <i class="fas fa-notes-medical"></i>
                    Service Sections
                </a>
            @endcan

        </div>
    </div>
@endcan

{{-- ABOUT PAGE GROUP --}}
@can('about_page_section_access')
    @php
        $aboutActive = request()->is('admin/about-page-section*');
    @endphp

    <div x-data="{ open: {{ $aboutActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="About Page"
                class="nav-link nav-group-btn {{ $aboutActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-info-circle nav-icon"></i>
                <span class="nav-label">About Page</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('about_page_section_access')
                <a href="{{ route('admin.about-page-section.index') }}"
                   class="sub-link {{ request()->is('admin/about-page-section*') ? 'active' : '' }}">
                    <i class="fas fa-building"></i>
                    About Content
                </a>
            @endcan

        </div>
    </div>
@endcan

{{-- DENTIST PROFILE GROUP --}}
@can('dentist_profile_section_access')
    @php
        $dentistProfileActive = request()->is('admin/dentist-profile-section*');
    @endphp

    <div x-data="{ open: {{ $dentistProfileActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Dentist Profile"
                class="nav-link nav-group-btn {{ $dentistProfileActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-user-doctor nav-icon"></i>
                <span class="nav-label">Dentist Profile</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('dentist_profile_section_access')
                <a href="{{ route('admin.dentist-profile-section.index') }}"
                   class="sub-link {{ request()->is('admin/dentist-profile-section*') ? 'active' : '' }}">
                    <i class="fas fa-tooth"></i>
                    Profile Content
                </a>
            @endcan

        </div>
    </div>
@endcan

{{-- GALLERY MANAGEMENT GROUP --}}
@can('gallery_category_access')
    @php
        $galleryActive = request()->is('admin/gallery-categories*')
            || request()->is('admin/gallery-items*')
            || request()->is('admin/before-after-galleries*');
    @endphp

    <div x-data="{ open: {{ $galleryActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Gallery"
                class="nav-link nav-group-btn {{ $galleryActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-images nav-icon"></i>
                <span class="nav-label">Gallery Management</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('gallery_category_access')
                <a href="{{ route('admin.gallery-categories.index') }}"
                   class="sub-link {{ request()->is('admin/gallery-categories*') ? 'active' : '' }}">
                    <i class="fas fa-layer-group"></i>
                    Gallery Categories
                </a>
            @endcan

            @can('gallery_item_access')
                <a href="{{ route('admin.gallery-items.index') }}"
                   class="sub-link {{ request()->is('admin/gallery-items*') ? 'active' : '' }}">
                    <i class="fas fa-image"></i>
                    Gallery Items
                </a>
            @endcan

            @can('before_after_gallery_access')
                <a href="{{ route('admin.before-after-galleries.index') }}"
                   class="sub-link {{ request()->is('admin/before-after-galleries*') ? 'active' : '' }}">
                    <i class="fas fa-images"></i>
                    Before After Gallery
                </a>
            @endcan

        </div>
    </div>
@endcan

        <div class="nav-divider"></div>

        <p class="sidebar-section-title compact nav-label">Account</p>

        {{-- Change Password --}}
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <a href="{{ route('profile.password.edit') }}"
                   data-tooltip="Password"
                   class="nav-link {{ request()->is('profile/password*') ? 'active' : '' }}">
                    <i class="fas fa-key nav-icon"></i>
                    <span class="nav-label">{{ trans('global.change_password') }}</span>
                </a>
            @endcan
        @endif

        {{-- Settings --}}
        <a href="#"
           data-tooltip="Settings"
           class="nav-link">
            <i class="fas fa-cog nav-icon"></i>
            <span class="nav-label">Settings</span>
        </a>

    </nav>

    {{-- LOGOUT --}}
    <div class="sidebar-footer">
        <a href="#"
           onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
           data-tooltip="Logout"
           class="nav-link logout-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <span class="nav-label">{{ trans('global.logout') }}</span>
        </a>
    </div>

</aside>