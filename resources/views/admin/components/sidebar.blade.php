<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">Syntetic Admin</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}"><i class="fab fa-github text-primary" style="font-size: 24px"></i></a>
        </div>
        @php $routeName = \Request::route()->getName(); @endphp
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown {{ ($routeName == 'home') ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
            </li>
            
            <li class="dropdown {{ ($routeName == 'portfolio.index') || ($routeName == 'portfolio.create') || ($routeName == 'portfolio.edit') || ($routeName == 'portfolio.category.index') || ($routeName == 'portfolio.category.create') || ($routeName == 'portfolio.category.edit') ? 'active' : '' }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-atom"></i> <span>Portfolio</span></a>
              <ul class="dropdown-menu">
                @if (count(App\Models\ProjectCategory::get()) > 0)
                <li class="{{ ($routeName == 'portfolio.index') || ($routeName == 'portfolio.create') || ($routeName == 'portfolio.edit') ? 'active' : ''}}"><a class="nav-link" href="{{ route('portfolio.index') }}">Portfolio</a></li>
                @endif
                <li class="{{ ($routeName == 'portfolio.category.index') || ($routeName == 'portfolio.category.create') || ($routeName == 'portfolio.category.edit') ? 'active' : '' }}"><a class="nav-link" href="{{ route('portfolio.category.index') }}">Category</a></li>
              </ul>
            </li>
            <li class="dropdown {{ ($routeName == 'testimonies.index') || ($routeName == 'testimonies.edit') ? 'active' : '' }}">
                <a href="{{ route('testimonies.index') }}" class="nav-link"><i class="fas fa-users"></i><span>Testimoni</span></a>
            </li>
            <li class="dropdown {{ ($routeName == 'galleries.index') || ($routeName == 'galleries.edit') ? 'active' : '' }}">
                <a href="{{ route('galleries.index') }}" class="nav-link"><i class="fas fa-images"></i><span>Gallery</span></a>
            </li>
            <li class="dropdown {{ ($routeName == 'setting.index') || ($routeName == 'setting.edit') ? 'active' : '' }}">
                <a href="{{ route('setting.index') }}" class="nav-link"><i class="fas fa-cog"></i><span>Setting</span></a>
            </li>
        </ul>
    </aside>
</div>
