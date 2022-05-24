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
                    <a href="{{ route('adminDash') }}" class="nav-item nav-link btn">Home</a>
                    <a href="{{ route('adminUser') }}" class="nav-item nav-link btn active">Users management</a>
                    <a href="{{ route('logout') }}" class="nav-item nav-link btn text-danger" style="border: 1px solid red">Log out</a>
                </div>
            </div>      
        </div>
    </nav>

        <div class="col-6 px-3 pt-4">
            <h3>Users management</h3>    
        </div>    

        <div class="row d-flex flex-row mb-0" style="margin: 0 15px 0 0">
            <div class="col-xl-12 col-md-3 mx-2 my-2">
            @if(session()->has('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 100%">
                    {{ session('warning') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

             <div class="card">
                 <div class="card-header d-flex align-items-center justify-content-between">
                     <h5>List data user</h5>
                     <button class="btn btn-success" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Tambah Penjoki</button>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-striped">
                             <thead>
                                 <tr style="white-space: nowrap">
                                     <th>No.</th>
                                     <th>Nama</th>
                                     <th class="text-center">Username</th>
                                     <th class="text-center">Role</th>
                                     <th>Dibuat</th>
                                     <th>Handle</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @php
                                     $no = 1;
                                 @endphp
                                 @foreach ($data as $item)
                                     
                                    <tr style="white-space: nowrap">
                                        <th>{{ $no++ }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td class="text-center">{{ $item->username }}</td>
                                        <td class="text-center">
                                            @if ($item->role == "penjoki")
                                                {{ Str::ucfirst($item->role) . " " . "(" . $item->bidang . ")" }}
                                            @else
                                                {{ Str::ucfirst($item->role) }}
                                            @endif
                                        </td>
                                        <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                        <td>
                                            <a href="{{ url('/deleteUser/'.$item->id) }}" style="text-decoration: none">
                                                <span class="text-danger">Delete</span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
          </div>
        </div>

        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalToggleLabel">Tambah Penjoki </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="/tambahPenjoki" method="POST">
                      @csrf
                      <label for="name">Nama</label>
                      <input type="text" name="name" id="name" class="form-control" placeholder="Nama lengkap penjoki">
                        <br>
                      <label for="username">Username</label>
                      <input type="text" name="username" id="username" class="form-control" placeholder="Username penjoki">
                        <br>

                      <label for="bidang">Bidang</label>
                      <input type="text" name="bidang" id="bidang" class="form-control" placeholder="Bidang pelajaran penjoki">
                        <br>

                      <label for="password">Password</label>
                      <input type="password" name="password" id="password" class="form-control" placeholder="Password penjoki">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Tambahkan penjoki</button>
                    </div>
                </form>
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#users').DataTable();
        });
    </script>
</body>
</html>