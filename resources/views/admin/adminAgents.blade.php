@extends('admin.adminHeader')
@section('admin-main')
<div id="page-content-wrapper">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
                        <button class="btn btn-dark" id="menu-toggle"><i class="bi bi-list"></i></button>
                    </nav>

                    <div class="container-fluid">
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <div class="page-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="page-title">Property List</h3>
                                        </div>
                                        <div class="col text-end">
                                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="bi bi-plus"></i> Add Property
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Search Filter -->
                                <div class="row mt-2 mb-3">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group form-focus">
                                            <input type="text" class="form-control floating" placeholder="Agent ID">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group form-focus">
                                            <input type="text" class="form-control floating" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <select class="form-select text-dark">
                                            <option>Select location</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-success w-100">Search</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Search Filter -->

                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-hover table-responsive table-striped">
                                            <thead class="text-white">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Property Name</th>
                                                    <th>Property Location</th>
                                                    <th>Area (sq ft)</th>
                                                    <th>Bath</th>
                                                    <th>Bed</th>
                                                    <th>Images</th>
                                                    <th colspan="2" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-white">
                                                @if (isset($properties) && $properties->count())
                                                @foreach ($properties as $property)
                                                <tr>
                                                    <td class="text-white">{{ $property->id }}</td>
                                                    <td class="text-white">{{ $property->propertyName }}</td>
                                                    <td class="text-white">{{ $property->location }}</td>
                                                    <td class="text-white">{{ $property->squareFit }}</td>
                                                    <td class="text-white">{{ $property->bathNumber }}</td>
                                                    <td class="text-white">{{ $property->bedNumber }}</td>
                                                    <td style="white-space: nowrap;">
                                                        @php
                                                        $imagePaths = json_decode($property->image_paths, true);
                                                        @endphp
                                                        @if ($imagePaths && is_array($imagePaths) && count($imagePaths) > 0)
                                                        @foreach ($imagePaths as $imagePath)
                                                        <img src="{{ asset($imagePath) }}" alt="Property Image"
                                                            style="width: 30px; height: 30px; margin-right: 5px; display: inline-block;" class="img-circle">
                                                        @endforeach
                                                        @else
                                                        <p>No image available</p>
                                                        @endif
                                                    </td>
                                                    {{-- <td class="text-end">
                                                        <button
                                                            class="btn btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editPropertyModal"
                                                            data-id="{{ $property->id }}"
                                                            data-name="{{ $property->propertyName }}"
                                                            data-type="{{ $property->propertyType }}"
                                                            data-location="{{ $property->location }}"
                                                            data-price="{{ $property->propertyPrice }}"
                                                            data-square="{{ $property->squareFit }}"
                                                            data-bed="{{ $property->bedNumber }}"
                                                            data-bath="{{ $property->bathNumber }}"
                                                            onclick="editProperty(this)">
                                                            <i class="bi bi-pencil-square text-white"></i>
                                                        </button>



                                                    </td> --}}
                                                    <td>
                                                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="bi bi-trash text-white"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="8" class="text-center text-white">No properties found.</td>
                                                </tr>
                                                @endif
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection