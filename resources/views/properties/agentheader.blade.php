<div class="py-0">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/Images/Property/logo-2.png" rel="icon">
        {{-- <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet"> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous"> 
        <link href="/css/custom.css" rel="stylesheet">
        <title>Agent Dashboard</title>

        <style>
            body,
            html {
                height: 100%;
                margin: 0;
                overflow-x: hidden;
                background-color: #212529;
                color: white;
            }

            label {
                color: #000000;
            }

            #wrapper {
                display: flex;
                height: 100vh;
                transition: all 0.3s;
            }

            #sidebar-wrapper {
                width: 250px;
                height: 100%;
                background-color: #000000;
                transition: all 0.3s;
            }

            #sidebar-wrapper.toggled {
                width: 0;
                overflow-x: hidden;
            }

            #page-content-wrapper {
                flex: 1;
                transition: all 0.3s;
                background-color: #212529;
            }

            .sidebar-heading {
                padding: 15px;
                font-size: 1.25rem;
                color: #ffffff;
            }

            .list-group-item {
                border: none;
                color: rgb(0, 0, 0);
            }

            .list-group-item:hover {
                background-color: #000000;
                color: white;
            }

            .card {
                border: none;
                border-radius: 10px;
                background-color: #000000;
            }

            .card-header {
                background-color: #495057;
                color: white;
                font-weight: bold;
            }

            .widget {
                padding: 20px;
            }

            .chart-container {
                height: 300px;
                padding: 20px;
                background-color: #343a40;
                border-radius: 10px;
            }

            @media (max-width: 768px) {
                #sidebar-wrapper {
                    width: 0;
                    display: none;
                }

                #sidebar-wrapper.toggled {
                    display: block;
                    width: 250px;
                }
            }
        </style>
    </head>

    <body>