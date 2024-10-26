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
                                <h3 class="page-title">Property Type List</h3>
                            </div>
                            <div class="col text-end">
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="bi bi-plus"></i> Add Types
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <table class="table table-hover table-responsive table-striped">
                                <thead class="text-white">
                                    <tr>
                                        <th>Id</th>
                                        <th>Property Type</th>
                                        <th>Property Image</th>
                                        <th colspan="2" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-white">

                                    <tr>
                                        <td class="text-white"></td>
                                        <td class="text-white"></td>
                                        <td class="text-white"></td>
                                        <td class="text-end">
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editPropertyModal">
                                                <i class="bi bi-pencil-square text-white"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <form>
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="bi bi-trash text-white"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-dark" id="exampleModalLabel">Add Property Types</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="">
                                        <div class="container">
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="text-dark"><b>Property Type</b></label>
                                                        <input type="text" name="" id="" class="form-control" value="" placeholder="e.g., Gold">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for=""  class="text-dark"><b>Property Type Image</b></label>
                                                        <input type="file" name="" id=""
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
