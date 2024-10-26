@extends('Layout')
@section('main')
    <div class="container" style="margin-top: 100px">
        <div class="row g-0 gx-5 align-items-end bg-primary text-white mb-5">
            <div class="col-12">
                <div class="text-center mx-auto mb-5 mt-5">
                    <h1 class="mb-3">Search Property List</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if ($properties->isEmpty())
                    <p>No properties found.</p>
                @else
                    <div class="col-sm-12">
                        <div class="row">
                            @forelse ($properties as $property)
                                <div class="col-lg-4 col-md-6 mb-4 properties-items adv">
                                    <div class="card">
                                        <span class="category badge bg-dark text-white">{{ $property->propertyFor }}</span>
                                        <div id="carouselExample{{ $property->id }}" class="carousel slide"
                                            data-bs-ride="carousel" data-bs-interval="3000"
                                            aria-label="Property images for {{ $property->propertyName }}">
                                            <div class="carousel-inner">
                                                @php
                                                    $images = json_decode($property->image_paths, true) ?: [];
                                                @endphp
                                                @if (!empty($images))
                                                    @foreach ($images as $index => $imagePath)
                                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                            <img src="{{ asset($imagePath) }}" class="d-block w-100"
                                                                alt="Image of {{ $property->propertyName }} - Slide {{ $index + 1 }}" />
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="carousel-item active">
                                                        <img src="{{ asset('Images/Property/default-image.jpg') }}"
                                                            class="d-block w-100"
                                                            alt="Default Image for {{ $property->propertyName }}" />
                                                    </div>
                                                @endif
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExample{{ $property->id }}" data-bs-slide="prev"
                                                aria-label="Previous image">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExample{{ $property->id }}" data-bs-slide="next"
                                                aria-label="Next image">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            </button>
                                        </div>

                                        <!-- Property Details -->
                                        <div class="card-body">
                                            <span
                                                class="category badge bg-dark text-white">{{ $property->propertyType }}</span>
                                            <h6 class="card-title text-dark">
                                                ${{ number_format($property->propertyPrice, 2) }}
                                            </h6>
                                            <h4 class="card-text">
                                                <a href="{{ route('properties.show', $property->id) }}"
                                                    class="text-decoration-none">
                                                    {{ $property->propertyName }}
                                                </a><br>
                                                <small class="text-muted">{{ $property->address }}, {{ $property->city }},
                                                    {{ $property->state }}</small>
                                            </h4>
                                            <table class="table table-responsive table-bordered mt-3">
                                                <tbody>
                                                    <tr>
                                                        <th>Bedrooms</th>
                                                        <td>{{ $property->bedNumber }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Bathrooms</th>
                                                        <td>{{ $property->bathNumber }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Area</th>
                                                        <td>{{ $property->squareFit }} sq ft</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="main-button">
                                                <a class="btn btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal"
                                                    data-property-name="{{ $property->propertyName }}"
                                                    data-property-location="{{ $property->location }}"
                                                    data-address="{{ $property->address }}"
                                                    data-city="{{ $property->city }}"
                                                    data-state="{{ $property->state }}">Schedule a Visit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-center text-danger">No properties available at the moment.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endif
            </div>


        </div>


    </div>
@endsection
