<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <!-- Start Dashbord Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('dashboard.index.show') }}">
                <i class="bi bi-house-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @can('crm')
            <!-- CRM Section -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#crm" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-clipboard2-data-fill"></i>
                    <span>CRM</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="crm" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    {{-- CRM System Setup --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'crm.pipeline.show' ? 'active' : 'collapsed' }}"
                            href="{{ route('crm.pipeline.show') }}">
                            <i class="bi bi-circle"></i><span>CRM System Setup</span>
                        </a>
                    </li>

                    {{-- Leads --}}
                    <li class="nav-item">
                        <a class="nav-link collapsed" id="leads-nav" data-bs-target="#leads" data-bs-toggle="collapse"
                            href="#">
                            <i class="bi bi-circle"></i>
                            <span>Leads</span>
                            <i class="bi bi-chevron-down ms-auto fs-6"></i>
                        </a>
                        <ul id="leads" class="nav-content collapse ps-4" data-bs-parent="#leads-nav">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'crm.leadIndex' ? 'active' : 'collapsed' }}"
                                    href="{{ route('crm.leads') }}">
                                    <i class="bi bi-circle"></i><span>Lead List</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'crm.leadTypes' ? 'active' : 'collapsed' }}"
                                    href="{{ route('crm.leadTypes') }}">
                                    <i class="bi bi-circle"></i><span>Lead Type</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'crm.leadSources' ? 'active' : 'collapsed' }}"
                                    href="{{ route('crm.leadSources') }}">
                                    <i class="bi bi-circle"></i><span>Lead Sources</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'crm.leadStatus' ? 'active' : 'collapsed' }}"
                                    href="{{ route('crm.leadStatus') }}">
                                    <i class="bi bi-circle"></i><span>Lead Status</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Customer Loyalty --}}
                    <li class="nav-item">
                        <a class="nav-link collapsed" id="custLoyal-nav" data-bs-target="#custLoyal"
                            data-bs-toggle="collapse" href="#">
                            <i class="bi bi-circle"></i>
                            <span>Customer Loyalty</span>
                            <i class="bi bi-chevron-down ms-auto fs-6"></i>
                        </a>
                        <ul id="custLoyal" class="nav-content collapse ps-4" data-bs-parent="#custLoyal-nav">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'crm.customer-loyalty.users.index' ? 'active' : 'collapsed' }}"
                                    href="{{ route('crm.customer-loyalty.users.index') }}">
                                    <i class="bi bi-circle"></i><span>Users</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'crm.customer-loyalty.transactions.index' ? 'active' : 'collapsed' }}"
                                    href="{{ route('crm.customer-loyalty.transactions.index') }}">
                                    <i class="bi bi-circle"></i><span>Transactions</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'crm.customer-loyalty.memberships.index' ? 'active' : 'collapsed' }}"
                                    href="{{ route('crm.customer-loyalty.memberships.index') }}">
                                    <i class="bi bi-circle"></i><span>Memberships</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'crm.customer-loyalty.loyalty-programs.index' ? 'active' : 'collapsed' }}"
                                    href="{{ route('crm.customer-loyalty.loyalty-programs.index') }}">
                                    <i class="bi bi-circle"></i><span>Loyalty Programs</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'crm.customer-loyalty.configuration.index' ? 'active' : 'collapsed' }}"
                                    href="{{ route('crm.customer-loyalty.configuration.index') }}">
                                    <i class="bi bi-circle"></i><span>Configuration</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        @endcan
        @can('assets')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('assets.index') }}">
                    <i class="bi bi-laptop-fill"></i>
                    <span>Assets</span>
                </a>
            </li>
        @endcan
    </ul>
</aside>

<script>
    const currentLocationUrl = window.location.href.replace('#', '');

    const navLinksWithSub = document.querySelectorAll('.nav-link');
    for (const navLink of Array.from(navLinksWithSub)) {
        if (currentLocationUrl.includes(navLink.href)) {
            navLink.classList.add('active');
            navLink.classList.remove('collapsed');

            let navContent = navLink.closest('.nav-content');
            while (navContent) {
                navContent.classList.add('show');
                navContent.previousElementSibling.classList.remove('collapsed');
                navContent = navContent.parentNode.closest('.nav-content');
            }
        }
    }
</script>
