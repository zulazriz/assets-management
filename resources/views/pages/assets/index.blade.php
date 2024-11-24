@extends('layouts.dashboard')

@section('title', 'Assets')

@section('content')
    <link rel="stylesheet" href="{{ url('/assets/css/assets/assets.css') }}">

    <main id="main" class="main">
        {{-- Header --}}
        <div class="card">
            <div class="card-body">
                <div class="pagetitle">
                    <div>
                        <h1>Assets Management</h1>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.index.show') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Assets Management</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- Body --}}
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-end align-items-center mb-3">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAssetsModal">
                                <i class="bi bi-plus"></i> Add Asset
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table" id="assetsTable">
                                <thead>
                                    <tr>
                                        <th data-label="computer_name">Computer Name</th>
                                        <th data-label="type">Type</th>
                                        <th data-label="serial_number">Serial Number</th>
                                        <th data-label="manufacturer">Manufacturer</th>
                                        <th data-label="model">Model</th>
                                        <th data-label="os">OS</th>
                                        <th data-label="description">Description</th>
                                        <th data-label="actions"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assetsList as $asset)
                                        <tr>
                                            <td data-label="computer_name">{{ $asset->computer_name }}</td>
                                            <td data-label="type">{{ $asset->type }}</td>
                                            <td data-label="serial_number">{{ $asset->serial_number }}</td>
                                            <td data-label="manufacturer">{{ $asset->manufacturer }}</td>
                                            <td data-label="model">{{ $asset->model }}</td>
                                            <td data-label="os">{{ $asset->os }}</td>
                                            <td data-label="description">{{ $asset->description }}</td>
                                            <td data-label="actions">
                                                <!-- View Button -->
                                                <button class="btnbtn-sm rounded-circle small-circle-btn view-assets"
                                                    id="view-assets" data-bs-toggle="modal"
                                                    data-bs-target="#viewAssetsModal" data-id="{{ $asset->id }}">
                                                    <i class="bi bi-eye"></i>
                                                </button>

                                                <!-- Edit Button -->
                                                <button class="btn btn-sm rounded-circle small-circle-btn edit-assets"
                                                    id="edit-assets" data-bs-toggle="modal"
                                                    data-bs-target="#editAssetsModal" data-id="{{ $asset->id }}">
                                                    <i class="bi bi-pencil"></i>
                                                </button>

                                                <!-- Delete Button -->
                                                <button class="btn btn-sm rounded-circle small-circle-btn delete-assets"
                                                    id="delete-assets" data-bs-toggle="modal"
                                                    data-bs-target="#deleteAssetsModal" data-id="{{ $asset->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Modal -->
        <div class="modal fade" id="addAssetsModal" tabindex="-1" aria-labelledby="addAssetsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAssetsModalLabel">Add Asset</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body mt-1">
                        <form id="assetsForm" enctype="multipart/form-data">
                            @csrf

                            {{-- Computer Name --}}
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="computer_name" class="form-label">
                                        Computer Name:
                                    </label>
                                    <input class="form-control" id="computer_name" name="computer_name" type="text">
                                </div>

                                <div class="col-md-4">
                                    <label for="type" class="form-label">
                                        Type
                                    </label>
                                    <select class="form-control selectpicker" id="type" name="type"
                                        data-live-search="true">
                                        <option value="1">Laptop</option>
                                        <option value="2">Desktop</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Serial Number --}}
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="serial_number" class="form-label">
                                        Serial Number:
                                    </label>
                                    <input class="form-control" id="serial_number" name="serial_number" type="text">
                                </div>
                            </div>


                            {{-- Manufacturer & Model --}}
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="manufacturer" class="form-label">
                                        Manufacturer
                                    </label>
                                    <select class="form-control selectpicker" id="manufacturer" name="manufacturer"
                                        data-live-search="true">
                                        <option value="1">Lenovo</option>
                                        <option value="2">Dell</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="model" class="form-label">
                                        Model:
                                    </label>
                                    <input class="form-control" id="model" name="model" type="text">
                                </div>
                            </div>

                            {{-- OS --}}
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="os" class="form-label">
                                        OS
                                    </label>
                                    <select class="form-control selectpicker" id="os" name="os"
                                        data-live-search="true">
                                        <option value="1">Windows 10</option>
                                        <option value="2">Windows 11</option>
                                    </select>
                                </div>
                            </div>


                            {{-- Description --}}
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="description" class="form-label">
                                        Description:
                                    </label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id="createAssetsBtn" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- View Modal -->
        <div class="modal fade" id="viewAssetsModal" tabindex="-1" aria-labelledby="viewAssetsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewAssetsModalLabel">Assets Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body mt-1">
                        {{-- Computer Name --}}
                        <div class="row">
                            <div class="col-md-8">
                                <label for="view_computer_name" class="form-label">
                                    Computer Name:
                                </label>
                                <input class="form-control" id="view_computer_name" name="view_computer_name" type="text"
                                    disabled>
                            </div>

                            <div class="col-md-4">
                                <label for="view_type" class="form-label">
                                    Type
                                </label>
                                <select class="form-control selectpicker" id="view_type" name="view_type"
                                    data-live-search="true" disabled>
                                    <option value="1">Laptop</option>
                                    <option value="2">Desktop</option>
                                </select>
                            </div>
                        </div>

                        {{-- Serial Number --}}
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="view_serial_number" class="form-label">
                                    Serial Number:
                                </label>
                                <input class="form-control" id="view_serial_number" name="view_serial_number" type="text"
                                    disabled>
                            </div>
                        </div>

                        {{-- Manufacturer & Model --}}
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="view_manufacturer" class="form-label">
                                    Manufacturer
                                </label>
                                <select class="form-control selectpicker" id="view_manufacturer" name="view_manufacturer"
                                    data-live-search="true" disabled>
                                    <option value="1">Lenovo</option>
                                    <option value="2">Dell</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="view_model" class="form-label">
                                    Model:
                                </label>
                                <input class="form-control" id="view_model" name="view_model" type="text" disabled>
                            </div>
                        </div>

                        {{-- OS --}}
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="view_os" class="form-label">
                                    OS
                                </label>
                                <select class="form-control selectpicker" id="view_os" name="view_os"
                                    data-live-search="true" disabled>
                                    <option value="1">Windows 10</option>
                                    <option value="2">Windows 11</option>
                                </select>
                            </div>
                        </div>


                        {{-- Description --}}
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="view_description" class="form-label">
                                    Description:
                                </label>
                                <textarea class="form-control" name="view_description" id="view_description" cols="30" rows="3" disabled></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editAssetsModal" tabindex="-1" aria-labelledby="editAssetsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAssetsModalLabel">Edit Assets Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body mt-1">
                        <form id="editAssetsForm" enctype="multipart/form-data">
                            @csrf

                            {{-- Computer Name --}}
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="edit_computer_name" class="form-label">
                                        Computer Name:
                                    </label>
                                    <input class="form-control" id="edit_computer_name" name="edit_computer_name"
                                        type="text">
                                </div>

                                <div class="col-md-4">
                                    <label for="edit_type" class="form-label">
                                        Type
                                    </label>
                                    <select class="form-control selectpicker" id="edit_type" name="edit_type"
                                        data-live-search="true">
                                        <option value="1">Laptop</option>
                                        <option value="2">Desktop</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Serial Number --}}
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="edit_serial_number" class="form-label">
                                        Serial Number:
                                    </label>
                                    <input class="form-control" id="edit_serial_number" name="edit_serial_number"
                                        type="text">
                                </div>
                            </div>


                            {{-- Manufacturer & Model --}}
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="edit_manufacturer" class="form-label">
                                        Manufacturer
                                    </label>
                                    <select class="form-control selectpicker" id="edit_manufacturer"
                                        name="edit_manufacturer" data-live-search="true">
                                        <option value="1">Lenovo</option>
                                        <option value="2">Dell</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="edit_model" class="form-label">
                                        Model:
                                    </label>
                                    <input class="form-control" id="edit_model" name="edit_model" type="text">
                                </div>
                            </div>

                            {{-- OS --}}
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="edit_os" class="form-label">
                                        OS
                                    </label>
                                    <select class="form-control selectpicker" id="edit_os" name="edit_os"
                                        data-live-search="true">
                                        <option value="1">Windows 10</option>
                                        <option value="2">Windows 11</option>
                                    </select>
                                </div>
                            </div>


                            {{-- Description --}}
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="edit_description" class="form-label">
                                        Description:
                                    </label>
                                    <textarea class="form-control" name="edit_description" id="edit_description" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id="editAssetsBtn" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteAssetsModal" tabindex="-1" aria-labelledby="deleteAssetsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteEventModalLabel">Delete Asset</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <h1 class="text-danger" style="font-size: 7rem;">!</h1>
                        <p>Are you sure you want to delete this asset?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmDeleteAssets">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        <div class="card">
            <div class="card-body">
                <footer>
                    <div class="footer-copyright">
                        <h6>
                            &#169 2024 Aspiro Sdn Bhd. All rights reserved
                        </h6>
                    </div>
                </footer>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="{{ url('/assets/js/assets/assets.js') }}"></script>

    <script>
        const csrf = '{{ csrf_token() }}';
    </script>
@endsection
