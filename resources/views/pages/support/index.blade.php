@extends('layouts.dashboard')

@section('title', 'Support')

@section('content')
    <!-- Start Main -->
    <main id="main" class="main">
        <!-- Start Page Title -->
        <div class="pagetitle d-flex justify-content-between align-items-center">
            <div>
                <h1>Support</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Support</li>
                    </ol>
                </nav>
            </div>
            @if (Auth::user()->role == 'user')
                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-new">New Support</button>
                </div>
            @endif
        </div>
        <!-- End Page Title -->

        @include('pages.support.main')

        <!-- Start New Modal-->
        <div class="modal fade" id="modal-new">
            @livewire('support.create')
        </div>
        <!-- End New Modal-->
    </main>
    <!-- End Main -->
@endsection
