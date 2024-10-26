<x-app-layout>
    @include('agent.agentheader')
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
            <button class="btn btn-dark" id="menu-toggle"><i class="bi bi-list"></i></button>
        </nav>
        <div class="row">
            <div class="col text-center pt-2 pb-2 bg-dark">
                <h1>Welcome {{Auth::user()->name}}</h1>
            </div>
        </div>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard Overview</h1>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">Total Users</div>
                        <div class="widget">
                            <h2 class="text-center">150</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">Total Properties</div>
                        <div class="widget">
                            <h2 class="text-center">75</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">Total Enquiries</div>
                        <div class="widget">
                            <h2 class="text-center">30</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('agent.agentfooter')
</x-app-layout>