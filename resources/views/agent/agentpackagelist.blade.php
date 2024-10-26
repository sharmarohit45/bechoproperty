<x-app-layout>
    @include('agent.agentheader')
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
            <button class="btn btn-dark" id="menu-toggle"><i class="bi bi-list"></i></button>
        </nav>
        
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="package-heading text-white">Our Package</h1>
                    <p></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 p-4">
                    <div class="card">
                        <div class="card-img-container">
                            <img src="/Images/packagesimage/premium-property.jpg" class="card-img-top" alt="Package Image">
                            <div class="card-img-overlay">
                                <h3 class="card-title">Gold</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">This package includes a range of features designed to help you achieve your
                                goals quickly and effectively. Perfect for both individuals and businesses.</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Price:</strong> $99.99</li>
                                <li class="list-group-item"><strong>Duration:</strong> 6 months</li>
                                <li class="list-group-item"><strong>Includes:</strong> Feature A, Feature B, Feature C</li>
                            </ul>
                            <div class="row">
                                <div class="col mt-3">
                                    <button class="btn btn-dark form-control" data-bs-toggle="modal" data-bs-target="#exampleModal">Get Package</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 p-4">
                    <div class="card">
                        <div class="card-img-container">
                            <img src="/Images/packagesimage/premium-property.jpg" class="card-img-top" alt="Package Image">
                            <div class="card-img-overlay">
                                <h3 class="card-title">Silver</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">This package includes a range of features designed to help you achieve your
                                goals quickly and effectively. Perfect for both individuals and businesses.</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Price:</strong> $99.99</li>
                                <li class="list-group-item"><strong>Duration:</strong> 6 months</li>
                                <li class="list-group-item"><strong>Includes:</strong> Feature A, Feature B, Feature C</li>
                            </ul>
                            <div class="row">
                                <div class="col mt-3">
                                    <button class="btn btn-dark form-control" data-bs-toggle="modal" data-bs-target="#exampleModal">Get Package</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 p-4">
                    <div class="card">
                        <div class="card-img-container">
                            <img src="/Images/packagesimage/premium-property.jpg" class="card-img-top" alt="Package Image">
                            <div class="card-img-overlay">
                                <h3 class="card-title">Bronze</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">This package includes a range of features designed to help you achieve your
                                goals quickly and effectively. Perfect for both individuals and businesses.</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Price:</strong> $99.99</li>
                                <li class="list-group-item"><strong>Duration:</strong> 6 months</li>
                                <li class="list-group-item"><strong>Includes:</strong> Feature A, Feature B, Feature C</li>
                            </ul>
                            <div class="row">
                                <div class="col mt-3">
                                    <button class="btn btn-dark form-control" data-bs-toggle="modal" data-bs-target="#exampleModal">Get Package</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Package Name</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
    @include('agent.agentfooter')
</x-app-layout>