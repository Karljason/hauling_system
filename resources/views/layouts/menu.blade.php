











<li class="nav-item">
    <a href="{{ route('companies.index') }}"
       class="nav-link {{ Request::is('companies*') ? 'active' : '' }}">
        <p>Companies</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('truckTypes.index') }}"
       class="nav-link {{ Request::is('truckTypes*') ? 'active' : '' }}">
        <p>Truck Types</p>
    </a>
</li>


