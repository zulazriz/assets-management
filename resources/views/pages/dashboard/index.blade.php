@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

    </main>
    <!-- End #main -->
@endsection

@section('script')
    <script>
        fetch('https://almazing.nebulamaker.online/api/get-data', {
                method: 'GET',
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                }
                throw new Error('Network response was not ok');
            })
            .then(data => {
                console.log("DATA FROM ALMAZING: ", JSON.stringify(data, null, 2));
            })
            .catch(error => {
                console.error('Error:', error);
            });
    </script>
@endsection
