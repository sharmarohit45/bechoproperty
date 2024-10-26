<x-app-layout>
    @include('agent.agentheader')
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
            <button class="btn btn-dark" id="menu-toggle"><i class="bi bi-list"></i></button>
        </nav>
        <div class="row">
            <div class="col">
                <div class="row p-1 mb-3">
                    <div class="col text-white text-center bg-primary pt-2 pb-2">
                        <h1>{{ $property->propertyName }}</h1> <!-- Display property name -->
                    </div>
                </div>
                <div class="card">
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
                                    <th><strong>City</strong></th>
                                    <td>{{ $property->city }}</td>
                                </tr>
                                <tr>
                                    <th><strong>State</strong></th>
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
                        </div>
                        <div class="col p-5">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @if($images && count($images) > 0)
                                        @foreach($images as $index => $image)
                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                <img src="{{ asset($image) }}" class="d-block w-100" alt="Property Image">
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="carousel-item active">
                                            <img src="placeholder-image.jpg" class="d-block w-100" alt="No Image Available"> <!-- Placeholder for no image -->
                                        </div>
                                    @endif
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
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
    @include('agent.agentfooter')
</x-app-layout>
