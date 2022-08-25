











<li class="nav-item">
    <a href="{{ route('companies.index') }}"
       class="nav-link {{ Request::is('companies*') ? 'active' : '' }}">
        <p>Company Table Maintenace</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('truckTypes.index') }}"
       class="nav-link {{ Request::is('truckTypes*') ? 'active' : '' }}">
        <p>Truck Types Maintenance</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('requisitions.index') }}"
       class="nav-link {{ Request::is('requisitions*') ? 'active' : '' }}">
        <p>Haul Requisition</p>
    </a>
</li>


