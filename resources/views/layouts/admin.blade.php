<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
        <script>var baseUrl = "{{ url('/') }}";</script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row header-bar">
                <div class="col-xs-12 col-sm-12 col-lg-12"><h1>Admin Portal</h1></div>
            </div>
        
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-3 side-bar">
                    <ul>
                        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ url('/customers') }}">Customer</a></li>
                        <li><a href="{{ url('/invoice') }}">Invoice</a></li>
                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-9">            
                    
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
    
</html>
