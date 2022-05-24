<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#000">
    {{-- stylesheet API bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    {{-- favicon cariin --}}
    <link rel="icon" href="{{ asset('img/jokiin_logo.png') }}">
    
    {{-- link stylesheet asset --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Jokiin Aja | Home</title>
</head>
<body>

    {{-- navbar top --}}
    <nav class="navbar navbar-expand-lg navbar-light" style="width: 100%; background: #fff; box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.1);">
        <div class="container-fluid">
            <a href="{{ url('/') }}" class="navbar-brand my-2">
                <img src="{{ asset('img/jokiin_logo.png') }}" height="50" alt="CoolBrand">
                Jokiin
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="{{ route('adminDash') }}" class="nav-item nav-link btn active">Home</a>
                    <a href="{{ route('adminDash') }}" class="nav-item nav-link btn">Users management</a>
                    <a href="{{ route('adminDash') }}" class="nav-item nav-link btn">Report</a>
                    <a href="{{ route('logout') }}" class="nav-item nav-link btn text-danger" style="border: 1px solid red">Log out</a>
                </div>
            </div>      
        </div>
    </nav>

        <div class="col-6 px-3 pt-4">
            <h6 class="mb-0">Halo, {{ auth()->user()->username }}</h6>
            <h3>Dashboard</h3>    
        </div>    

        <div class="row d-flex flex-row mb-0" style="margin: 0 15px 0 0">
            <div class="col-xl-3 col-md-3 mx-2 my-2">
              <div class="card border-left-primary bg-primary text-light shadow h-90 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                                  Total User</div>
                              <div class="h5 mb-0 font-weight-bold d-flex justify-content-between text-gray-800">
                                {{ $total_user }}
                                <i data-feather="users"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
            
          {{-- penjoki --}}
          <div class="col-xl-3 col-md-6 mx-2 my-2">
            <div class="card border-left-primary bg-warning text-dark shadow h-90 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Total Penjoki</div>
                            <div class="h5 mb-0 font-weight-bold d-flex justify-content-between text-gray-800">
                                {{ $total_penjoki }}
                                <i data-feather="briefcase"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          
          {{-- pelajar --}}
            <div class="col-xl-3 col-md-6 mx-2 my-2">
              <div class="card border-left-primary shadow bg-info text-dark h-90 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                  Total Pelajar</div>
                              <div class="h5 mb-0 font-weight-bold d-flex justify-content-between text-gray-800">
                                {{ $total_pelajar }}
                                <i data-feather="book"></i>
                              </div>
                          </div> 
                      </div>
                  </div>
              </div>
          </div>
    </div> 

    <div class="row d-flex flex-row mb-0 py-4" style="margin: 0 15px 0 0">
        <div class="col-xl-6 col-md-6 mx-2 my-2">
            <div class="card">
                <div class="card-header">
                    New users
                </div>
                <div class="card-body">                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($users as $item)                            
                                    <tr>
                                        <th>{{ $no++ }}</th>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->role }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-md-6 mx-2 my-2">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('img/bg1.jpg') }}" width="100%" alt="">
                </div>
            </div>
        </div>
    </div>

          
    {{-- script API bootstrap 5 --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace()
      </script>
</body>
</html>