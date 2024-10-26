@extends('admin/adminHeader')
@section('admin-main')
    <!-- Page Content -->
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
                                <input type="text" class="form-control floating" id="propertyIdSearch"
                                    placeholder="Property ID">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating" id="nameSearch" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <input type="text" class="form-control floating" id="citySearch" placeholder="City">
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <input type="text" class="form-control floating" id="stateSearch" placeholder="State">
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
                                        <th>State</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Area (sq ft)</th>
                                        <th>Bath</th>
                                        <th>Bed</th>
                                        <th>Images</th>
                                        <th>Property For</th>
                                        <th colspan="2" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-white">
                                    @if (isset($properties) && $properties->count())
                                        @foreach ($properties as $property)
                                            <tr>
                                                <td class="text-white">{{ $property->id }}</td>
                                                {{-- <td class="text-white">{{ $property->propertyName }}</td> --}}
                                                <td> <a href="{{ route('admin.property.show', $property->id) }}"class="text-white"
                                                        style="text-decoration: none">
                                                        {{ $property->propertyName }}
                                                    </a></td>
                                                <td class="text-white">{{ $property->state }}</td>
                                                <td class="text-white">{{ $property->address }}</td>
                                                <td class="text-white">{{ $property->city }}</td>
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
                                                                style="width: 30px; height: 30px; margin-right: 5px; display: inline-block;"
                                                                class="img-circle">
                                                        @endforeach
                                                    @else
                                                        <p>No image available</p>
                                                    @endif
                                                </td>
                                                <td class="text-white">{{ $property->propertyFor }}</td>

                                                <td class="text-end">
                                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#editPropertyModal" data-id="{{ $property->id }}"
                                                        data-name="{{ $property->propertyName }}"
                                                        data-type="{{ $property->propertyType }}"
                                                        data-state="{{ $property->state }}"
                                                        data-address="{{ $property->address }}"
                                                        data-city="{{ $property->city }}"
                                                        data-price="{{ $property->propertyPrice }}"
                                                        data-square="{{ $property->squareFit }}"
                                                        data-bed="{{ $property->bedNumber }}"
                                                        data-bath="{{ $property->bathNumber }}"
                                                        data-For="{{ $property->propertyFor }}"
                                                        onclick="editProperty(this)">
                                                        <i class="bi bi-pencil-square text-white"></i>
                                                    </button>



                                                </td>
                                                <td>
                                                    <form action="{{ route('properties.destroy', $property->id) }}"
                                                        method="POST" style="display:inline;">
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


    <!-- Modal for Adding Property -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-2">
                <div class="row pt-2">
                    <div class="col text-center">
                        <h1 class="text-dark">Add Property Details</h1>
                        <hr class="text-dark">
                    </div>
                </div>
                <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data" class="container">
                    @csrf
                    <input type="hidden" name="posted_from" id="posted_from" value="{{ Auth::user()->id }}">
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="propertyName"><b class="text-dark">Property Name</b></label>
                                <input type="text" name="propertyName" id="propertyName" class="form-control" required placeholder="e.g., Cozy Cottage">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="images"><b class="text-dark">Property Images</b></label>
                                <input type="file" name="images[]" id="images" class="form-control" multiple accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="propertyType"><b class="text-dark">Property Type</b></label>
                                <input type="text" name="propertyType" id="propertyType" class="form-control" required placeholder="e.g., Apartment">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="state"><b class="text-dark">State</b></label>
                                <input type="text" name="state" id="state" class="form-control" required placeholder="e.g., New York, NY">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="address"><b class="text-dark">Address</b></label>
                                <input type="text" name="address" id="address" class="form-control" required placeholder="e.g., 123 Main St">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="city"><b class="text-dark">City</b></label>
                                <input type="text" name="city" id="city" class="form-control" required placeholder="e.g., New York, NY">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="propertyPrice"><b class="text-dark">Property Price</b></label>
                                <input type="text" name="propertyPrice" id="propertyPrice" class="form-control" required min="0" placeholder="Enter price">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="squareFit"><b class="text-dark">Area (sq ft)</b></label>
                                <input type="number" name="squareFit" id="squareFit" class="form-control" required min="0" placeholder="Enter square footage">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="propertyFor"><b class="text-dark">Property For</b></label>
                                <select name="propertyFor" id="propertyFor" class="form-select" required>
                                    <option value="">Property For</option>
                                    <option value="Rent">Rent</option>
                                    <option value="Sell">Sell</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="bedNumber"><b class="text-dark">Bedrooms</b></label>
                                <input type="number" name="bedNumber" id="bedNumber" class="form-control" required min="0" placeholder="e.g., 3">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="bathNumber"><b class="text-dark">Baths</b></label>
                                <input type="number" name="bathNumber" id="bathNumber" class="form-control" required min="0" placeholder="e.g., 2">
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
    <div class="modal fade" id="editPropertyModal" tabindex="-1" aria-labelledby="editPropertyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-2">
                <div class="row pt-2">
                    <div class="col text-center">
                        <h1 class="text-dark">Edit Property Details</h1>
                        <hr class="text-dark">
                    </div>
                </div>
                <div class="modal-body">
                    <form id="editPropertyForm" action="{{ route('properties.update', ':id') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editPropertyId" name="propertyId">
    
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-group">
                                    <label for="editPropertyName" class="form-label text-dark">Property Name</label>
                                    <input type="text" class="form-control" id="editPropertyName" name="propertyName" required>
                                </div>
                            </div>
                            <div class="col">
                                <label for="images" class="form-label">Property Images:</label>
                                <input type="file" name="images[]" id="images" class="form-control" multiple
                                    accept="image/*">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-group">
                                    <label for="editPropertyType" class="form-label text-dark">Property Type</label>
                                    <input type="text" class="form-control" id="editPropertyType" name="propertyType" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="editState" class="form-label text-dark">State</label>
                                    <input type="text" class="form-control" id="editState" name="state" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-group">
                                    <label for="editAddress" class="form-label text-dark">Address</label>
                                    <input type="text" class="form-control" id="editAddress" name="address" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="editCity" class="form-label text-dark">City</label>
                                    <input type="text" class="form-control" id="editCity" name="city" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-group">
                                    <label for="editPropertyPrice" class="form-label text-dark">Property Price</label>
                                    <input type="text" class="form-control" id="editPropertyPrice" name="propertyPrice" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="editPropertyFor" class="form-label text-dark">Property For</label>
                                    <select class="form-select" id="editPropertyFor" name="propertyFor" required>
                                        <option value="">Select Property For</option>
                                        <option value="Rent">Rent</option>
                                        <option value="Sell">Sell</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-group">
                                    <label for="editSquareFit" class="form-label text-dark">Area (sq ft)</label>
                                    <input type="number" class="form-control" id="editSquareFit" name="squareFit" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="editBedNumber" class="form-label text-dark">Bedrooms</label>
                                    <input type="number" class="form-control" id="editBedNumber" name="bedNumber" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="editBathNumber" class="form-label text-dark">Bathrooms</label>
                                    <input type="number" class="form-control" id="editBathNumber" name="bathNumber" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update Property</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    



    <script>
        // Toggle the sidebar
        document.getElementById('menu-toggle').onclick = function() {
            var wrapper = document.getElementById('wrapper');
            wrapper.classList.toggle('toggled');
            var sidebar = document.getElementById('sidebar-wrapper');
            sidebar.classList.toggle('toggled');
        };

        function editProperty(button) {
            const property = {
                id: button.getAttribute('data-id'),
                propertyName: button.getAttribute('data-name'),
                propertyType: button.getAttribute('data-type'),
                state: button.getAttribute('data-state'),
                address: button.getAttribute('data-address'),
                city: button.getAttribute('data-city'),
                propertyPrice: button.getAttribute('data-price'),
                squareFit: button.getAttribute('data-square'),
                bedNumber: button.getAttribute('data-bed'),
                bathNumber: button.getAttribute('data-bath'),
                propertyFor: button.getAttribute('data-For')
            };

            // Populate the modal fields
            document.getElementById('editPropertyId').value = property.id;
            document.getElementById('editPropertyName').value = property.propertyName;
            document.getElementById('editPropertyType').value = property.propertyType;
            document.getElementById('editState').value = property.state;
            document.getElementById('editAddress').value = property.address;
            document.getElementById('editCity').value = property.city;
            document.getElementById('editPropertyPrice').value = property.propertyPrice;
            document.getElementById('editSquareFit').value = property.squareFit;
            document.getElementById('editBedNumber').value = property.bedNumber;
            document.getElementById('editBathNumber').value = property.bathNumber;
            document.getElementById('editPropertyFor').value = property.propertyFor;

            // Set the form action for updating
            document.getElementById('editPropertyForm').action = `/properties/${property.id}`;
        }
    </script>
    <script>
        function filterTable() {
            const propertyIdInput = document.getElementById('propertyIdSearch').value.toLowerCase();
            const nameInput = document.getElementById('nameSearch').value.toLowerCase();
            const cityInput = document.getElementById('citySearch').value.toLowerCase();
            const stateInput = document.getElementById('stateSearch').value.toLowerCase();

            const table = document.querySelector('.table tbody');
            const rows = table.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const idCell = rows[i].getElementsByTagName('td')[0];
                const nameCell = rows[i].getElementsByTagName('td')[1];
                const cityCell = rows[i].getElementsByTagName('td')[4];
                const stateCell = rows[i].getElementsByTagName('td')[2];

                const idText = idCell ? idCell.textContent || idCell.innerText : '';
                const nameText = nameCell ? nameCell.textContent || nameCell.innerText : '';
                const cityText = cityCell ? cityCell.textContent || cityCell.innerText : '';
                const stateText = stateCell ? stateCell.textContent || stateCell.innerText : '';

                if (
                    idText.toLowerCase().indexOf(propertyIdInput) > -1 &&
                    nameText.toLowerCase().indexOf(nameInput) > -1 &&
                    cityText.toLowerCase().indexOf(cityInput) > -1 &&
                    stateText.toLowerCase().indexOf(stateInput) > -1
                ) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
        document.getElementById('propertyIdSearch').addEventListener('input', filterTable);
        document.getElementById('nameSearch').addEventListener('input', filterTable);
        document.getElementById('citySearch').addEventListener('input', filterTable);
        document.getElementById('stateSearch').addEventListener('input', filterTable);
    </script>
@endsection
