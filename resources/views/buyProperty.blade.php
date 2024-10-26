@extends('Layout')
@section('main')
<style>
    a {
        text-decoration: none;
        color: black;
    }

    .properties-filter a {
        color: #007bff;
        font-weight: bold;
    }

    .properties-filter a.is_active {
        color: #0056b3;
    }

    .card {
        transition: transform 0.2s;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .category {
        display: block;
        font-size: 0.9em;
        color: #6c757d;
        margin-bottom: 10px;
    }

    .main-button .btn {
        width: 100%;
    }
</style>

<div class="container" style="margin-top: 100px">
    <div class="row g-0 gx-5 align-items-end">
        <div class="col-12">
            <div class="text-center mx-auto mb-5 mt-5">
                <h1 class="mb-3">Property For Buy</h1>
                <p>Explore our available properties below.</p>
            </div>
        </div>
    </div>

    <div class="row properties-box mt-5">
        <div class="col-sm-3">
            <div class="row bg-dark">
                <div class="col text-light text-center pt-3 pb-3">
                    <h5>Search Here</h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="{{ route('search') }}" method="POST">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="propertyType" class="form-label"><strong>Property Type</strong></label>
                            <input type="text" name="propertyType" id="propertyType" value="{{ request('propertyType') }}"
                                class="form-control" placeholder="e.g., Apartment">
                        </div>
                        <div class="form-group mt-2">
                            <label for="city" class="form-label"><strong>City</strong></label>
                            <input type="text" name="city" id="city" value="{{ request('city') }}" 
                                class="form-control" placeholder="e.g., Lucknow">
                        </div>
                        <div class="form-group">
                            <label for="state" class="form-label"><strong>State</strong></label>
                            <input type="text" name="state" id="state" value="{{ request('state') }}"
                                class="form-control" placeholder="e.g., Apartment">
                        </div>
                        <div class="row mt-2 mb-2">
                            <div class="col">
                                <button type="submit" class="btn btn-dark form-control">Search</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="row">
                @forelse ($properties as $property)
                <div class="col-lg-4 col-md-6 mb-4 properties-items adv">
                    <div class="card">
                        <span class="category badge bg-dark text-white">{{ $property->propertyFor }}</span>
                        <div id="carouselExample{{ $property->id }}" class="carousel slide" data-bs-ride="carousel"
                            data-bs-interval="3000" aria-label="Property images for {{ $property->propertyName }}">
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
                                        class="d-block w-100" alt="Default Image" />
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

                        <div class="card-body">
                            <span class="category badge bg-dark text-white">{{ $property->propertyType }}</span>
                            <h6 class="card-title text-dark">${{ number_format($property->propertyPrice, 2) }}</h6>
                            <h4 class="card-text">
                                <a href="{{ route('properties.show', $property->id) }}"
                                    class="text-decoration-none">{{ $property->propertyName }}</a><br>
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
                                <a class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-property-name="{{ $property->propertyName }}"
                                    data-property-location="{{ $property->location }}"
                                    data-address="{{ $property->address }}" data-city="{{ $property->city }}"
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
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-2">
                <div class="row pt-2">
                    <div class="col text-center">
                        <h1 class="text-dark">Send Message</h1>
                        <hr class="text-dark">
                    </div>
                </div>
                <form action="{{ route('adminenquiry.store') }}" method="POST" class="container">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="property_name"><b class="text-dark">Property Name</b></label>
                                <input type="text" name="property_name" id="property_name" class="form-control"
                                    readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="address"><b class="text-dark">Address</b></label>
                                <input type="text" name="address" id="address" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="city"><b class="text-dark">City</b></label>
                                <input type="text" name="city" id="city" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="state"><b class="text-dark">State</b></label>
                                <input type="text" name="state" id="state" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="name"><b class="text-dark">Name</b></label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email"><b class="text-dark">Email</b></label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="phone"><b class="text-dark">Phone</b></label>
                                <input type="tel" name="phone" id="phone" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 mb-3">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var exampleModal = document.getElementById('exampleModal');
    exampleModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;

        var propertyName = button.getAttribute('data-property-name');
        var address = button.getAttribute('data-address');
        var city = button.getAttribute('data-city');
        var state = button.getAttribute('data-state');

        exampleModal.querySelector('#property_name').value = propertyName;
        exampleModal.querySelector('#address').value = address;
        exampleModal.querySelector('#city').value = city;
        exampleModal.querySelector('#state').value = state;
    });
</script>

@endsection