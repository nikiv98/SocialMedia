<div class="sidebar">
    <div class="sidebar-brand">
        <h1>Admin Panel</h1>
    </div>

    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="/admin" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><span>Dashboard</span></a>
            </li>
            <li>
                <a href="{{ route('admin.users') }}" class="{{ request()->routeIs('admin.users', 'view.user', 'edit.user') ? 'active' : '' }}"><span>Users</span></a>
            </li>
            <li>
                <a href="{{ route('posts.index') }}"><span>Exit Admin</span></a>
            </li>
        </ul>
    </div>
</div>