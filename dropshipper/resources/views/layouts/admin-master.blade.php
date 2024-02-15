<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Fixed top navbar example · Bootstrap v5.1</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! url('assets/css/fontawesome.min.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden; /* prevent scrollbar flash */
        }

        #wrapper {
            display: flex;
        }

        #sidebar {
            width: 250px;
            background-color: #015eb6;
            color: white;
            height: 100vh;
        }

        #content {
            flex: 1;
            padding: 16px;
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            background-color: #015eb6;
            margin-bottom: 60px
        }

        .sidebar-header h3 {
            color: white;
            font-size: 24px;
            margin-bottom: 0;
        }

        .nav-link {
            text-decoration: none;
            color: white;
            padding: 10px;
            display: block;
            margin-bottom: 5px;
            padding-left: 20px;
        }

        .active{
            background-color: #15528e;
        }

        .navbar-nav .active:hover{
            background-color: #125497;
        }

        .nav-item .active:hover{
            background-color: #0c4176;
        }

        .nav-item:hover{
            background-color: #15528e;
        }

        .navbar-nav .nav-item{
            margin-bottom: 5px;
            padding-left: 20px;
        }

        /* .nav-link:hover {
            background-color: #3b84c9;
        } */

        .content-header {
            padding: 20px;
            background-color: #015eb6;
            color: white;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #111;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="{!! url('assets/css/app.css') !!}" rel="stylesheet">
</head>
<body>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar">
            <div class="sidebar-header">
                <h3>Dashboard Admin</h3>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item <?php echo ($activePage == 'stok') ? 'active' : ''; ?>">
                    <a href="{{route('admin.show')}}" class="nav-link"><i class="fas fa-home"></i> Stok Barang</a>
                </li>
                <li class="nav-item <?php echo ($activePage == 'pesanan') ? 'active' : ''; ?>">
                    <a href="{{route('admin.pesanan')}}" class="nav-link"><i class="fas fa-chart-bar"></i> Permintaan Pesanan</a>
                </li>
                <li class="nav-item <?php echo ($activePage == 'selesai') ? 'active' : ''; ?>">
                    <a href="{{route('admin.selesai')}}" class="nav-link"><i class="fas fa-chart-bar"></i> Pesanan Selesai</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login.show') }}" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>

    {{-- <main class="container"> --}}
        @yield('content')
    {{-- </main> --}}

    
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    function toggleSidebar() {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
    }
</script>
    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! url('assets/js/fontawesome.min.js') !!}"></script>
    <script src="https://kit.fontawesome.com/cb5dca3a01.js" crossorigin="anonymous"></script>
  </body>
</html>