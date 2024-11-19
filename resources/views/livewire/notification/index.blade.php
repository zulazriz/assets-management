<li class="nav-item dropdown">
    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
        <span class="badge bg-primary badge-number">{{ count($notifications) }}</span>
    </a>
    <!-- End Notification Icon -->
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications" style="min-width: 18rem; max-height: 70vh; overflow-y: auto;">
        <li class="dropdown-header">
            You have {{ count($notifications) }} new notifications
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>

        @foreach ($notifications as $notification)
            <li class="notification-item">
                <i class="bi bi-{{ $notification['type'] }}-circle text-primary"></i>
                <div>
                    <h4>{{ $notification['title'] }}</h4>
                    <p>{{ $notification['description'] }}</p>
                    <p>{{ TimeHelper::getTimeAgo(time(), strtotime($notification['created_at'])) }}</p>
                </div>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
        @endforeach

    </ul>
    <!-- End Notification Dropdown Items -->
</li>
<!-- End Notification Nav -->