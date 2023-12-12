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
    <style>
      .navbar-market{
        background-color: #015eb6;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .search::-webkit-input-placeholder{
            color: #666;
        }
        
      .image-container {
        position: relative;
        text-align: center;
        margin-top: 20px;
        border: 1px solid #ddd;
        border-radius: 10px; 
      }

      .centered-button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
      .banner {
        border-radius: 10px
      }

      @keyframes blink {
      0% { opacity: 1; }
      50% { opacity: 0; }
      100% { opacity: 1; }
      }

      .blinking-button {
        margin-top: 50px;
        animation: blink 1s infinite; /* 1s adalah durasi animasi, infinite membuatnya terus menerus */
      }
      .rounded-input {
      border: 1px solid #ddd;
      border-radius: 20px; /* Nilai border-radius menentukan seberapa dibulatkan sudut input */
      padding: 10px; /* Padding untuk ruang di dalam input */
       /* Lebar input */
      }
    .search {
    width: 120%;
    margin-bottom: auto;
    /* margin-top: 20px; */
    height: 40px;
    background-color: #fff;

    border: 1px solid #ddd;
      border-radius: 25px; /* Nilai border-radius menentukan seberapa dibulatkan sudut input */
      padding: 5px;
    }

    .search-input {
        color: white;
        border: 0;
        outline: 0;
        background: none;
        width: 0;
        margin-top: 0px;
        caret-color: transparent;
        line-height: 20px;
        transition: width 0.4s linear
    }

    .search .search-input {
        padding: 0 15px;
        width: 100%;
        caret-color: #536bf6;
        font-size: 15px;
        font-family: "Roboto", "Helvetica", "Arial", sans-serif;
        color: #015eb6;
        transition: width 0.4s linear;
        text-decoration: none;
        text-overflow: ellipsis;

    }
    .search-icon {
        height: 40px;
        width: 34px;
        padding: 0 10px 0 0;
        float: right;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #536bf6;
        /* background-color: #536bf6; */
        font-size: 15px;
            bottom: 30px;
            position: relative;
    }

    /* .search-icon:hover{

      color: #fff !important;
      background-color: #536bf6; 
      border-radius: 50px;
    } */

    a:link {
        text-decoration: none
    }
    .menus{
      color: #fff;
      margin-right: 10px;
    }
    .auth-btn-up{
      background-color: rgb(253, 217, 34);
      color: rgb(1, 94, 182);
      border: 3px solid rgb(253, 217, 34);
      border-radius: 10px;
      font-weight: bold; 
      font-size: 15px;
      font-family: "Roboto", "Helvetica", "Arial", sans-serif;
      text-decoration: none;
    }

    .auth-btn-up:hover{
      background-color: rgb(253, 217, 34);
      color: rgb(1, 94, 182);
      border-radius: 10px; 
      border: 3px solid rgb(253, 217, 34);
    }

    .auth-btn-in{
      background-color: transparent;
      color: rgb(253, 217, 34);
      border: 3px solid rgb(253, 217, 34);
      font-weight: bold; 
      border-radius: 10px; 

      font-size: 15px;
      font-family: "Roboto", "Helvetica", "Arial", sans-serif;
      text-decoration: none;
    }

    .auth-btn-in:hover{
      background-color: transparent;
      color: rgb(253, 217, 34);
      border: 3px solid rgb(253, 217, 34);
    }

    .nav-men{
      margin-right: 20px;
    }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{!! url('assets/css/app.css') !!}" rel="stylesheet">
</head>
<body>
    
    @include('layouts.partials.navbar')

    <main class="container">
        @yield('content')
    </main>

    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! url('assets/js/fontawesome.min.js') !!}"></script>
    <script src="https://kit.fontawesome.com/cb5dca3a01.js" crossorigin="anonymous"></script>
  </body>
</html>