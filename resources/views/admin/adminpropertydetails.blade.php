@extends('admin.adminHeader')
@section('admin-main')
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
            <button class="btn btn-dark" id="menu-toggle"><i class="bi bi-list"></i></button>
        </nav>
        <div class="row">
            <div class="col">
                <div class="row p-1">
                    <div class="col text-white text-center bg-primary pt-2 pb-2">
                        <h1>{{ $property->propertyName }}</h1> 
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="row">
                        <div class="col p-5">
                            <table class="table table-bordered text-white">
                                <tr>
                                    <th><strong>Property Id </strong></th>
                                    <td>{{ $property->id }}</td>
                                </tr>
                                <tr>
                                    <th><strong>Property Type </strong></th>
                                    <td>{{ $property->propertyType }}</td>
                                </tr>
                                <tr>
                                    <th><strong>Property Address </strong></th>
                                    <td>{{ $property->address }}</td>
                                </tr>
                                <tr>
                                    <th><strong>Property City </strong></th>
                                    <td>{{ $property->city }}</td>
                                </tr>
                                <tr>
                                    <th><strong>Property State </strong></th>
                                    <td>{{ $property->state }}</td>
                                </tr>
                                <tr>
                                    <th><strong>Area </strong></th>
                                    <td>{{ $property->squareFit }} sq ft</td> 
                                </tr>
                                <tr>
                                    <th><strong>Bedrooms </strong></th>
                                    <td>{{ $property->bedNumber }}</td>
                                </tr>
                                <tr>
                                    <th><strong>Bathrooms </strong></th>
                                    <td>{{ $property->bathNumber }}</td>
                                </tr>
                            </table>
                            <table class="table table-bordered text-white">
                                <tr class="text-white text-center">
                                    <th colspan="5">Agent Details</th>
                                </tr>
                                <tr>
                                    <th>Agent Name</th>
                                    <td colspan="3">{{ $agent->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td colspan="3">{{ $agent->email ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Contact Number</th>
                                    <td colspan="3">{{ $agent->phone_number ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Contact Direct</th>
                                    <td colspan="3" class="text-center">
                                        @if ($agent && $agent->phone_number)
                                            <a href="https://wa.me/{{ $agent->phone_number }}"><i class="text-white bi bi-whatsapp f-10"></i></a> &nbsp; &nbsp; &nbsp;
                                            <a href="tel:{{ $agent->phone_number }}"><i class="text-white bi bi-telephone-fill"></i></a>
                                        @else
                                            <span class="text-muted">Contact information not available</span>
                                        @endif
                                    </td>
                                    
                                </tr>
                            </table>
                        </div>
                        <div class="col p-5">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @if ($images && count($images) > 0)
                                        @foreach ($images as $index => $image)
                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                <img src="{{ asset($image) }}" class="d-block w-100" alt="Property Image">
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="carousel-item active">
                                            <img src="placeholder-image.jpg" class="d-block w-100" alt="No Image Available">
                                        </div>
                                    @endif
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
