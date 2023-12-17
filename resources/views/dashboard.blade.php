@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
<!-- Main wrapper - style you can find in pages.scss -->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- Topbar header -->
    <header class="topbar" data-navbarbg="skin6">
        <!-- ... (konten topbar) ... -->
    </header>

    <!-- Left Sidebar -->
    <aside class="left-sidebar" data-sidebarbg="skin6">
        <!-- ... (konten sidebar) ... -->
    </aside>

    <!-- Main Content -->
    <div class="content">
        <div class="container mt-5">
            <h1 class="text-center">Halaman Utama</h1>
            <!-- ... (konten utama halaman) ... -->
        </div>
    </div>
</div>
<!-- End Main wrapper -->
@endsection
