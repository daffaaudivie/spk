<!-- app.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMBASE | @yield('title')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 56px; /* Adjust based on your top bar height */
        background-color: #e9ecef;
    }

    .navbar {
        background-color: #9ACE8B; /* Light green background color for the entire top bar */
    }

    #embase-header {
        padding: 3px; /* Adjust padding as needed */
        color: white; /* Text color */
        text-align: center;
    }

    .sidebar {
        height: 100vh;
        background-color: #ffffff; /* White background color for the sidebar */
        color: grey;
        width: 210px;
        position: fixed;
        right: 10;
        top: 56px;
        left: 0;
        bottom: 100;
        overflow-y: auto;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); /* Adding shadow on the right side */
    }

    .sidebar-header {
        background-color: #ffffff; /* Green background color for the top of the sidebar */
        padding: 15px;
        color: grey;
    }

    .sidebar a {
        color: grey;
    }

    .content {
        padding: 5.0rem;
        margin-left: 200px;
        margin-right: 10; /* Set the right margin to 0 */
    }
</style>

</head>

<body>
    <!-- Top Bar -->
    <nav class="navbar navbar-dark fixed-top">
        <div id="embase-header">
            <a class="navbar-brand" href="#">TUGAS SPK KELOMPOK 3</a>
        </div>
    </nav>

    <div class="d-flex">
        <nav class="sidebar">
            <div class="sidebar-header">
                Menu 
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/alternatif">
                        <i class="fas fa-users"></i> Data Alternatif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/kriteria">
                        <i class="fas fa-building"></i> Data Kriteria
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/nilai">
                        <i class="fas fa-address-card"></i> Data Penilaian
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/hasil">
                        <i class="fas fa-address-card"></i> Data Perankingan
                    </a>
                
                <!-- Add more links as needed -->
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JavaScript and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
