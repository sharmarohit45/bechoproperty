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
    <div class="row g-0 gx-5 align-items-end bg-primary">
        <div class="col-12">
            <div class="text-center mx-auto mb-3 mt-3 text-white">
                <h1 class="mb-2">Projects</h1>
                <p>Explore our available Projects below.</p>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <div class="card p-5 text-center" style="border:4px solid black;">
                <h3>Upcoming Projects</h3>
            </div>
        </div>
        <div class="col">
            <div class="card p-5 text-center" style="border:4px solid black;">
                <h3>Completed Projects</h3>
            </div>
        </div>
        <div class="col">
            <div class="card p-5 text-center" style="border:4px solid black;">
                <h3>Ongoing Projects</h3>
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
                        @csrf <!-- This is important for security in Laravel -->
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
       <div class="col-sm-9 pb-5">
        <div class="row">
            <div class="container">
                <div class="row g-0 gx-5 align-items-center">
                    <div class="col-lg-12 text-start text-lg-center">
                        <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-dark active" data-bs-toggle="pill" href="#tab-1">Featured</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-dark" data-bs-toggle="pill" href="#tab-2">Upcoming Projects</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-dark" data-bs-toggle="pill" href="#tab-3">Completed Projects</a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="btn btn-outline-dark" data-bs-toggle="pill" href="#tab-4">Ongoing Projects</a>
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
                                            <a class="d-block h5 mb-2 card-heading" href="#">Tab 1</a>
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
                                            <a class="d-block h5 mb-2 card-heading" href="#">Tab 2</a>
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
                                            <a class="d-block h5 mb-2 card-heading" href="#">Tab 3</a>
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
                    <div id="tab-4" class="tab-pane fade show p-0">
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
                                            <a class="d-block h5 mb-2 card-heading" href="#">Tab 4</a>
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
       </div>
    </div>
</div>
@endsection