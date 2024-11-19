@extends('layouts.dashboard')

@section('title', 'My Schedule')

@section('content')
    <link rel="stylesheet" href="{{ url('/assets/css/my-schedule/schedule.css') }}">

    <main id="main" class="main">
        {{-- Header --}}
        <div class="card shadow">
            <div class="card-body">
                <div class="pagetitle">
                    <div>
                        <h1>My Schedule</h1>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index.show') }}">Dashboard</a></li>
                                <li class="breadcrumb-item">My schedule</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- Body --}}
        <div class="card shadow">
            <div class="card-body">
                {{-- <form method="POST" action="">
                    @csrf --}}
                <div class="container mt-5">
                    <div class="d-flex justify-content-center mb-4">
                        <button class="btn btn-custom me-2" onclick="showSection('availability')"><i
                                class="fas fa-check"></i> Set Availability</button>
                        <button class="btn btn-primary me-2" onclick="showSection('schedule')"><i
                                class="fas fa-calendar-alt"></i> My Schedule</button>
                        <button class="btn btn-primary" onclick="showSection('appointment')"><i
                                class="fas fa-calendar-plus"></i> New Appointment</button>
                    </div>

                    <div class="d-flex justify-content-center mb-4">
                        <button class="btn btn-custom me-2" onclick="showSection('approved')"><i class="fas fa-check"></i>
                            Approved </button>
                        <button class="btn btn-primary me-2" onclick="showSection('pending')"><i
                                class="fas fa-calendar-alt"></i> Pending</button>
                        <button class="btn btn-primary" onclick="showSection('rejected')"><i
                                class="fas fa-calendar-plus"></i> Rejected</button>
                    </div>

                    {{-- Set Availability --}}
                    <div id="availability" class="card card-custom p-4">
                        <h4>Set Availability</h4>
                        <p>Cancel out the timings that you are <strong>unavailable</strong> for meetings below and click
                            <strong>'CONFIRM'</strong>.
                        </p>
                        <p><strong>DATE:</strong> 1970-01-01</p>
                        <div class="row mb-3">
                            <div class="col-md-5">
                                <select class="form-select">
                                    <option>Select</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center">
                                <button class="btn btn-confirm">Confirm</button>
                            </div>
                        </div>
                    </div>

                    {{-- My Schedule --}}
                    <div id="schedule" class="card card-custom p-4 hidden">
                        <p>No approved appointments available.</p>
                    </div>

                    {{-- New Appointment --}}
                    <div id="appointment" class="card card-custom p-4 hidden">
                        <h4 class="text-center">Book new appointment now.</h4>
                        <div class="d-flex justify-content-center mb-2 mt-5">
                            <button class="btn btn-primary me-2"><i class="bi bi-person-square"></i> Exhibitor</button>
                            <button class="btn btn-primary me-2"><i class="bi bi-people-fill"></i> Attendee</button>
                        </div>
                    </div>
                </div>
                {{-- </form> --}}
            </div>
        </div>

        {{-- Footer --}}
        <div class="card shadow">
            <div class="card-body">
                <footer>
                    <div class="footer-copyright">
                        <h6>&#169 2024 Event Tech. All right reserved</h6>
                    </div>
                </footer>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="{{ url('/assets/js/my-schedule/schedule.js') }}"></script>

    <script>
        function showSection(sectionId) {
            document.getElementById('availability').classList.add('hidden');
            document.getElementById('schedule').classList.add('hidden');
            document.getElementById('appointment').classList.add('hidden');
            document.getElementById(sectionId).classList.remove('hidden');
        }
    </script>
@endsection
