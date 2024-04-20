{{-- @dd(auth()->guard("admin")->user()->name) --}}
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>DASHBOARD - ONLY ADMINS</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset("admin/css/styles.css")}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ url('/admins') }}">Espace Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/admins/profile">Mon Profile</a></li>

                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <form action="/Deconnect" method="post">
                                @csrf
                                <button class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="/admins">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Lazy Features</div>
                            <a class="nav-link collapsed" href="/admins/listes" >
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                 Filtrer Rapidement
                            </a>

                            <div class="sb-sidenav-menu-heading">Additionals</div>
                            <a class="nav-link" href="/admins/absences">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Gérer Les Absences
                            </a>
                            <a class="nav-link" href="/admins/graphs">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Statistiques
                            </a>



                        </div>
                    </div>

                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                     <h3>les Filières</h3>  <br>
                                     <h4><strong>{{$filieres->count()}}</strong></h4>

                                </div>


                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="/admins/filieres">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">
                                        <h3>les Formateurs</h3>  <br>
                                     <h4><strong>{{$formateurs->count()}}</strong></h4>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="/admins/formateurs">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">
                                        <h3>les Modules</h3>  <br>
                                     <h4><strong>{{$modules->count()}}</strong></h4>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="/admins/modules">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">
                                        <h3>les Admins</h3>  <br>
                                        <h4><strong>{{$admins->count()}}</strong></h4>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="/admins/administrateurs">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>

                        </div> --}}
                        <center> <u><h1>Les Demandes De Pré Inscription</h1></u>  </center> <br>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Les Demandes De Pré Inscription
                            </div>

                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>age</th>
                                            <th>Filiere</th>
                                            <th>Bac</th>
                                            <th>Note de Bac</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>

                                            <th>age</th>
                                            <th>Filiere</th>
                                            <th>Bac</th>
                                            <th>Note de Bac</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($demandes as $d)
                                          <tr>
                                            <td>{{$d->name}}</td>
                                            <td>{{$d->age}}</td>
                                            <td>{{$d->filiere->name}}</td>
                                            <td>{{$d->bac->type_bac}}</td>
                                            <td>{{$d->note_bac}}</td>
                                            <td @style("display : flex")>
                                              <form action="/admins/valider/{{$d->id}}" method="post">
                                                @csrf
                                                @method("PUT")
                                                <button class="btn btn-success">Valider</button>

                                              </form>
                                               <form action="/destroy/{{$d->id}}" method="post">
                                                @method("delete")
                                                @csrf
                                                <button class="btn btn-danger">Delete</button>
                                                </form>
                                                {{-- <a href="/valider/{{$d->id}}"><i class="fa-solid fa-square-check fa-2xl" style="color: #63E6BE;"></i></a> Valider
                                             <form action="/destroy/{{$d->id}}" method="post">
                                                @method("delete")
                                                @csrf
                                                <button><i class="fa-solid fa-trash fa-2xl" style="color: #fb0404;"></i></button> Supprimmer
                                            </form> --}}
                                           </td>
                                          </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; ISTA MAAMORA KENITRA 2024</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset("admin/js/scripts.js") }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset("admin/assets/demo/chart-area-demo.js" )}}"></script>
        <script src="{{ asset("admin/assets/demo/chart-bar-demo.js") }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src={{ asset("admin/js/datatables-simple-demo.js") }}></script>
    </body>
</html>
