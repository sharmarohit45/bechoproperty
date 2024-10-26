@extends('Layout')
@section('main')
<div id="carouselExampleIndicators" class="carousel slide mt-5 mb-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('/Images/Property/property-search.jpg') }}" class="d-block w-100 carousel-image"
                alt="Featured Property 1" />
        </div>
        <div class="carousel-item">
            <img src="{{ asset('/Images/Property/property-search.jpg') }}" class="d-block w-100 carousel-image"
                alt="Featured Property 2" />
        </div>
        <div class="carousel-item">
            <img src="{{ asset('/Images/Property/property-search.jpg') }}" class="d-block w-100 carousel-image"
                alt="Featured Property 3" />
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="container mt-3 mb-3 bg-primary">
    <div class="row">
        <div class="col text-center pt-3 pb-2 text-white">
            <h1>Search Your Dream Property Here</h1>
        </div>
    </div>
    <form>
        @csrf
        <div class="row pt-2 pb-5">

            <div class="col-sm-3">
                <input type="text" name="city" id="city" value="{{ request('city') }}" required
                    class="form-control" placeholder="e.g., Lucknow">
            </div>
            <div class="col-sm-3">
                <input type="text" name="state" id="state" value="{{ request('state') }}" required
                    class="form-control" placeholder="e.g., Apartment">
            </div>
            <div class="col-sm-3">
                <select class="form-select">
                    <option value="" disabled selected>Select property type</option>
                    <option value="apartment">Apartment</option>
                    <option value="house">House</option>
                    <option value="condo">Condo</option>
                    <option value="land">Land</option>
                    <option value="commercial">Commercial</option>
                </select>
            </div>

            <div class="col-sm-3">
                <button type="submit" class="btn btn-light text-dark form-control">Search</button>
            </div>
        </div>
    </form>
</div>
<div class="container">
    <div class="row g-0 gx-5 align-items-end">
        <div class="col-12">
            <div class="text-center mx-auto mb-5 mt-5">
                <h1 class="mb-3">Property Details</h1>
                <p>Explore our available properties below.</p>
            </div>
        </div>
    </div>

    <div class="row properties-box mt-5">
        @forelse ($properties as $property)
        <div class="col-lg-4 col-md-6 mb-4 properties-items adv">
            <div class="card">
                <div id="carouselExample{{ $property->id }}" class="carousel slide" data-bs-ride="carousel"
                    data-bs-interval="3000">
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
                            <img src="{{ asset('/Images/Property/default-image.jpg') }}"
                                class="d-block w-100" alt="Default Image" />
                        </div>
                        @endif
                    </div>
                    <button class="carousel-control-prev" type="button"
                        data-bs-target="#carouselExample{{ $property->id }}" data-bs-slide="prev"
                        aria-label="Previous">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button"
                        data-bs-target="#carouselExample{{ $property->id }}" data-bs-slide="next"
                        aria-label="Next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>


                <div class="card-body">
                    <span class="category badge bg-dark text-white">{{ $property->propertyType }}</span>
                    <h6 class="card-title text-dark">${{ number_format($property->propertyPrice, 2) }}</h6>
                    <h4 class="card-text">
                        <a href="{{ route('properties.show', $property->id) }}"
                            class="text-decoration-none">{{ $property->propertyName }}</a><br>
                        <small class="text-muted">{{ $property->location }}</small>
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
                                <td>{{ $property->squareFit }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="main-button">
                        <a href="{{ route('properties.show', $property->id) }}" class="btn btn-dark">Schedule a
                            Visit</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center">No properties available at the moment.</p>
        </div>
        @endforelse
    </div>
</div>
<div class="container-fluid p-5 bg-primary text-white">
    <div class="row p-5 pb-0 text-center">
        <div class="col">
            <h6>Who We Are</h6>
            <h1 class="display-5 fw-bold">About Our Company</h1>
            <p class="col-12 fs-4">
                Utilizing our exceptional experience and knowledge of the luxury waterfront markets, we serve an
                extensive and elite worldwide client base.
            </p>
        </div>
    </div>

    <div class="row mb-5 mt-2">
        <div class="col-lg-6 col-md-12 p-5">
            <h2 class="featurette-heading">Premium Properties in Top Locations. <span class="text-bold">Experience
                    Luxury Living.</span></h2>
            <p class="lead">Explore our selection of high-end properties situated in the most desirable locations.
                Find your dream home today.</p>
        </div>
        <div class="col-lg-6 col-md-12">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="100">
                        <img src="{{ asset('/Images/Property/premium-property.jpg') }}" class="d-block w-100"
                            alt="Luxury Property 1" />
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-white">Stunning Waterfront Villa</h5>
                            <p class="text-white">Experience unparalleled views and luxury living in this stunning
                                waterfront property.</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="200">
                        <img src="{{ asset('/Images/Property/premium-property.jpg') }}" class="d-block w-100"
                            alt="Luxury Property 2" />
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-white">Elegant City Apartment</h5>
                            <p class="text-white">A modern apartment in the heart of the city, offering convenience and
                                style.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('/Images/Property/premium-property.jpg') }}" class="d-block w-100"
                            alt="Luxury Property 3" />
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-white">Exclusive Mountain Retreat</h5>
                            <p class="text-white">Your perfect getaway surrounded by nature and tranquility.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5">
                    <h1 class="mb-3">Property Listing</h1>
                    <p>But the pain itself was great because of the labor of the rebum. The time for the pain to
                        come is truly the same, so that the diam is just, but the rebum.</p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Featured</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">For Sell</a>
                    </li>
                    <li class="nav-item me-0">
                        <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-3">For Rent</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <a href="#"><img class="img-fluid"
                                            src="{{ asset('/Images/Property/property-search.jpg') }}"
                                            alt="" /></a>
                                    <div
                                        class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                        For Sell</div>
                                    <div
                                        class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                        Apartment</div>
                                </div>
                                <div class="p-4 pb-0">
                                    <h5 class="text-primary mb-3">$12,345</h5>
                                    <a class="d-block h5 mb-2 card-heading" href="#">Golden Urban House For
                                        Sell</a>
                                    <p><i class="bi bi-map-marker-alt text-primary me-2"></i>123 Street, New York,
                                        USA</p>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="flex-fill text-center border-end py-2">
                                        <i class="bi bi-ruler"></i> 1000 Sqft
                                    </small>
                                    <small class="flex-fill text-center border-end py-2">
                                        <i class="bi bi-bed"></i> 3 Bed
                                    </small>
                                    <small class="flex-fill text-center py-2">
                                        <i class="bi bi-bath"></i> 2 Bath
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab-2" class="tab-pane fade show p-0">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <a href="#"><img class="img-fluid"
                                            src="{{ asset('/Images/Property/property-search.jpg') }}"
                                            alt="" /></a>
                                    <div
                                        class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                        For Sell</div>
                                    <div
                                        class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                        Apartment</div>
                                </div>
                                <div class="p-4 pb-0">
                                    <h5 class="text-primary mb-3">$12,345</h5>
                                    <a class="d-block h5 mb-2 card-heading" href="#">Golden Urban House For
                                        Sell</a>
                                    <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York,
                                        USA</p>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                    <small class="flex-fill text-center py-2"><i
                                            class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab-3" class="tab-pane fade show p-0">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <a href="#"><img class="img-fluid"
                                            src="{{ asset('/Images/Property/property-search.jpg') }}"
                                            alt="" /></a>
                                    <div
                                        class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                        For Sell</div>
                                    <div
                                        class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                        Apartment</div>
                                </div>
                                <div class="p-4 pb-0">
                                    <h5 class="text-primary mb-3">$12,345</h5>
                                    <a class="d-block h5 mb-2 card-heading" href="#">Golden Urban House For
                                        Sell</a>
                                    <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York,
                                        USA</p>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                    <small class="flex-fill text-center py-2"><i
                                            class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container bg-primary p-2">
        <div class="bg-light rounded p-3">
            <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <img class="img-fluid rounded w-100"
                            src="{{ asset('/Images/Property/property-search.jpg') }}" alt="" />
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <h1 class="mb-3">Contact With Our Certified Agent</h1>
                            <p>Eirmod sed ipsum dolor sit rebum magna erat. Tempor lorem kasd vero ipsum sit sit
                                diam justo sed vero dolor duo.</p>
                        </div>
                        <a href="#" class="btn btn-primary py-3 px-4 me-2"><i
                                class="fa fa-phone-alt me-2"></i>Make A Call</a>
                        <a href="#" class="btn btn-dark py-3 px-4"><i class="fa fa-calendar-alt me-2"></i>Get
                            Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-5 bg-primary mb-5">
    <div class="container-fluid">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;color:white">
            <h1 class="mb-3">Property Types</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod
                sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6">
                <a class="cat-item d-block bg-primary text-center rounded p-3" href=""
                    style="text-decoration:none; border:4px solid white; color:white;">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid img-rounded" src="/Images/Property/property-search.jpg"
                                alt="Icon" />
                        </div>
                        <h6>Apartment</h6>
                        {{-- <span>123 Properties</span> --}}
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a class="cat-item d-block bg-primary text-center rounded p-3" href=""
                    style="text-decoration:none; border:4px solid white;color:white">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="/Images/Property/property-search.jpg" alt="Icon" />
                        </div>
                        <h6>Villa</h6>
                        {{-- <span>123 Properties</span> --}}
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a class="cat-item d-block bg-primary text-center rounded p-3" href=""
                    style="text-decoration:none; border:4px solid white;color:white">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="/Images/Property/property-search.jpg" alt="Icon" />
                        </div>
                        <h6>Home</h6>
                        {{-- <span>123 Properties</span> --}}
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a class="cat-item d-block bg-primary text-center rounded p-3" href=""
                    style="text-decoration:none; border:4px solid white;color:white">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="/Images/Property/property-search.jpg" alt="Icon" />
                        </div>
                        <h6>Office</h6>
                        {{-- <span>123 Properties</span> --}}
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a class="cat-item d-block bg-primary text-center rounded p-3" href=""
                    style="text-decoration:none; border:4px solid white;color:white">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="/Images/Property/property-search.jpg" alt="Icon" />
                        </div>
                        <h6>Building</h6>
                        {{-- <span>123 Properties</span> --}}
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a class="cat-item d-block bg-primary text-center rounded p-3" href=""
                    style="text-decoration:none; border:4px solid white;color:white">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="/Images/Property/property-search.jpg" alt="Icon" />
                        </div>
                        <h6>Townhouse</h6>
                        {{-- <span>123 Properties</span> --}}
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a class="cat-item d-block bg-primary text-center rounded p-3" href=""
                    style="text-decoration:none; border:4px solid white;color:white">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="/Images/Property/property-search.jpg" alt="Icon" />
                        </div>
                        <h6>Shop</h6>
                        {{-- <span>123 Properties</span> --}}
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a class="cat-item d-block bg-primary text-center rounded p-3" href=""
                    style="text-decoration:none; border:4px solid white;color:white">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="/Images/Property/property-search.jpg" alt="Icon" />
                        </div>
                        <h6>Garage</h6>
                        {{-- <span>123 Properties</span> --}}
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container mb-5">
    <div class="row justify-content-center slide-in-box">
        <div class="col-md-12 heading-section text-center mb-5">
            <span class="subheading">Our Services</span>
            <h2 class="mb-2">Exclusive Real Estate Services</h2>
        </div>
    </div>
    <div class="row slide-out-box">
        <div class="col-lg-4">
            <div class="card">
                <img src="/Images/Property/services.jpg" class="card-img-top" alt="Service 1" />
                <div class="card-body">
                    <h5 class="card-title">Property Buying</h5>
                    <p class="card-text">Expert guidance on purchasing properties, from finding the perfect match to
                        closing the deal.</p>
                </div>
                <div class="card-body">
                    <button class='btn btn-primary form-control'>Read More</button>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <img src="/Images/Property/services.jpg" class="card-img-top" alt="Service 2" />
                <div class="card-body">
                    <h5 class="card-title">Property Selling</h5>
                    <p class="card-text">Professional services to help you sell your property quickly and at the best
                        price.</p>
                </div>
                <div class="card-body">
                    <button class='btn btn-primary form-control'>Read More</button>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <img src="/Images/Property/services.jpg" class="card-img-top" alt="Service 3" />
                <div class="card-body">
                    <h5 class="card-title">Property Management</h5>
                    <p class="card-text">Comprehensive property management services to keep your investments in top
                        shape.</p>
                </div>
                <div class="card-body">
                    <button class='btn btn-primary form-control'>Read More</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="container-fluid bg-primary">
    <div class="container">
        <div class="row pt-5 pb-3">
            <div class="col text-center text-white">
                <h1 class="text-white">Our Package</h1>
                <p></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 p-4">
                <div class="card">
                    <div class="card-img-container">
                        <img src="/Images/packagesimage/premium-property.jpg" class="card-img-top"
                            alt="Package Image">
                        <div class="card-img-overlay">
                            <h1 class="card-title text-white">Gold</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">This package includes a range of features designed to help you achieve
                            your
                            goals quickly and effectively. Perfect for both individuals and businesses.</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Price:</strong> $99.99</li>
                            <li class="list-group-item"><strong>Duration:</strong> 6 months</li>
                            <li class="list-group-item"><strong>Includes:</strong> Feature A, Feature B, Feature C</li>
                        </ul>
                        <div class="row">
                            <div class="col mt-3">
                                <button class="btn btn-dark form-control" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Get Package</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 p-4">
                <div class="card">
                    <div class="card-img-container">
                        <img src="/Images/packagesimage/premium-property.jpg" class="card-img-top"
                            alt="Package Image">
                        <div class="card-img-overlay">
                            <h1 class="card-title text-white">Silver</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">This package includes a range of features designed to help you achieve
                            your
                            goals quickly and effectively. Perfect for both individuals and businesses.</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Price:</strong> $99.99</li>
                            <li class="list-group-item"><strong>Duration:</strong> 6 months</li>
                            <li class="list-group-item"><strong>Includes:</strong> Feature A, Feature B, Feature C</li>
                        </ul>
                        <div class="row">
                            <div class="col mt-3">
                                <button class="btn btn-dark form-control" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Get Package</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 p-4">
                <div class="card">
                    <div class="card-img-container">
                        <img src="/Images/packagesimage/premium-property.jpg" class="card-img-top"
                            alt="Package Image">
                        <div class="card-img-overlay">
                            <h1 class="card-title text-white">Bronze</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">This package includes a range of features designed to help you achieve
                            your
                            goals quickly and effectively. Perfect for both individuals and businesses.</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Price:</strong> $99.99</li>
                            <li class="list-group-item"><strong>Duration:</strong> 6 months</li>
                            <li class="list-group-item"><strong>Includes:</strong> Feature A, Feature B, Feature C</li>
                        </ul>
                        <div class="row">
                            <div class="col mt-3">
                                <button class="btn btn-dark form-control" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Get Package</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Package Name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="agentName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="agentName" required>
                            </div>
                            <div class="mb-3">
                                <label for="agentEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="agentEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="agentPhone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="agentPhone" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-dark">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> --}}
</div>
<div class="container px-4 py-5" id="custom-cards">
    <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center mb-5">
            <span class="subheading">Featured Listings</span>
            <h2 class="mb-2">Find Properties in Your Area</h2>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        <div class="col">
            <div class="card card-cover h-100 overflow-hidden rounded-5 shadow-lg bg-card_img">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Modern Downtown Apartment</h2>
                    <ul class="d-flex list-unstyled mt-auto">
                        <li class="me-auto">
                            <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32"
                                class="rounded-circle border border-white" />
                        </li>
                        <li class="d-flex align-items-center me-3">
                            <small>3 Beds</small>
                        </li>
                        <li class="d-flex align-items-center">
                            <small>$1,200/month</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-white bg-primary rounded-5 shadow-lg bg-card_img">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Charming Family Home</h2>
                    <ul class="d-flex list-unstyled mt-auto">
                        <li class="me-auto">
                            <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32"
                                class="rounded-circle border border-white" />
                        </li>
                        <li class="d-flex align-items-center me-3">
                            <small>4 Beds</small>
                        </li>
                        <li class="d-flex align-items-center">
                            <small>$2,500/month</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-white bg-primary rounded-5 shadow-lg bg-card_img">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Spacious Suburban House</h2>
                    <ul class="d-flex list-unstyled mt-auto">
                        <li class="me-auto">
                            <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32"
                                class="rounded-circle border border-white" />
                        </li>
                        <li class="d-flex align-items-center me-3">
                            <small>5 Beds</small>
                        </li>
                        <li class="d-flex align-items-center">
                            <small>$3,000/month</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection