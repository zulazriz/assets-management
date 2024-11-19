<li class="nav-item dropdown">
    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-chat-left-text"></i>
        <span class="badge bg-success badge-number">{{ count($messages) }}</span>
    </a><!-- End Messages Icon -->

    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages" style="min-width: 18rem; max-height: 70vh; overflow-y: auto;">
        <li class="dropdown-header">
            You have {{ count($messages) }} new messages
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>

        @foreach ($messages as $message)
            <li class="message-item">
                <a href="#">
                    <img src="{{ url('assets/img/default-user.jpg') }}" alt="User Image" class="rounded-circle">
                    <div>
                        <h4>{{ $message['initiate_user']['name'] }}</h4>
                        <p>{{ $message['subject'] }}</p>
                        <p>{{ TimeHelper::getTimeAgo(time(), strtotime($message['created_at'])) }}</p>
                    </div>
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
        @endforeach


    </ul>
    <!-- End Messages Dropdown Items -->
</li>
<!-- End Messages Nav -->