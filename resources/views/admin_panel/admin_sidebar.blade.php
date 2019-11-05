<div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
    <ul class="list-group">
        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
            <small>MENU</small>
        </li>
        <a href="{{ route('home') }}" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="menu-collapsed">Product's category</span>
            </div>
        </a>
        <a href="{{ route('category_data') }}" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="menu-collapsed">Category data</span>
            </div>
        </a>
        <a href="{{ route('admin_products') }}" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="menu-collapsed">Products</span>
            </div>
        </a>
        <a href="{{ route('admin_stockists') }}" class="bg-dark list-group-item list-group-item-action ">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="menu-collapsed">Stockists</span>
            </div>
        </a>
        <a href="{{ route('admin_the_flow') }}" class="bg-dark list-group-item list-group-item-action ">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="menu-collapsed">The Flow</span>
            </div>
        </a>
        <a href="{{ route('flow_categories') }}" class="bg-dark list-group-item list-group-item-action ">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="menu-collapsed">Flow categories</span>
            </div>
        </a>
        <a href="{{ route('sub_categories') }}" class="bg-dark list-group-item list-group-item-action ">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="menu-collapsed">Sub categories</span>
            </div>
        </a>
        <a href="{{ route('logout') }}" class="bg-dark list-group-item list-group-item-action"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="menu-collapsed">Log Out</span>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </a>
    </ul>
</div>