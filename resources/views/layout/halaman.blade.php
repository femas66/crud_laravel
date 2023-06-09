<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-weight: bold;
        }
        .alert {
        padding: 20px;
        background-color: #ff1100; /* Red */
        color: white;
        margin-bottom: 15px;
        }
        
        /* The close button */
        .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
        }
        
        /* When moving the mouse over the close button */
        .closebtn:hover {
        color: black;
        }

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/cariajax.js"></script>
    <link rel="icon" type="image/x-icon" href="img/icon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Punyaku">
    <meta name="author" content="Femas">
    <title>CRUD</title>

    {{-- Sweet alert --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- End sweet alert --}}
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/83685fdc33.js" crossorigin="anonymous"></script>
</head>
<body id="page-top">
  @yield('body')
</body>
</html>