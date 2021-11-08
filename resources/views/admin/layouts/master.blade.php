<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{  config('app.name') }} Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset("dist/css/styles.css") }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ url("admin/") }}">{{  config('app.name') }} Admin Panel</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">{{ auth()->user()->name }}<i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" onclick="document.getElementById('logout').submit()">Logout</a></li>
                </ul>
                <form method="post" action="{{ route("logout") }}" class="form-hidden" id="logout" >
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ url("admin/") }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Blog</div>
                        <a class="nav-link collapsed" href="{{ route("admin.category") }}" data-bs-toggle="collapse"
                            data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Categories
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseCategory" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route("admin.category") }}">Manage Categories</a>
                        </nav>
                    </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePosts" aria-expanded="false" aria-controls="collapsePosts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Posts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePosts" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route("admin.posts") }}">View Posts</a>
                            <a class="nav-link" href="{{ route("admin.create_post") }}">Add Post</a>
                        </nav>
                    </div>
                        <a class="nav-link collapsed" href="{{ route("admin.comments") }}"
                             aria-expanded="false" aria-controls="">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Comments
                        </a>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseDemos" aria-expanded="false" aria-controls="collapseDemos">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Front Pages
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDemos" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route("admin.whayJoin") }}">Why Join</a>
                        {{-- <a class="nav-link" href="{{ route("admin.ab") }}">About Us</a> --}}
                        <a class="nav-link" href="{{ route("admin.mobile.work") }}">Mobile Work Demo</a>
                        <a class="nav-link" href="{{ route("admin.field.work.demo") }}">Flield Work demo</a>
                        <a class="nav-link" href="{{ route("admin.AdPostingDemo") }}">Ad's posting Demo</a>
                        <a class="nav-link" href="{{ route("admin.our.service") }}">Our Service</a>
                        <a class="nav-link" href="{{ route("admin.systemWork") }}">System Work</a>
                        <a class="nav-link" href="{{ route("admin.feedback.video") }}">Feedback Video</a>
                        <a class="nav-link" href="{{ route("admin.Business-Plan") }}">Business Plan</a>
                        <a class="nav-link" href="{{ route("admin.downloads") }}">Download</a>
                    </a>
                        <a class="nav-link" href="{{ route("admin.create_post") }}">Add Post</a>
                    </nav>
                </div>
                <a class="nav-link" >

                </a>


                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#classifiedSite"
                            aria-expanded="false" aria-controls="classifiedSite">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Classified Sites
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="classifiedSite" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="{{ route("admin.classifiedSite") }}" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Manage ClassifiedSite
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="{{ route("admin.disableLoginRegister") }}" data-bs-toggle="collapse"
                            data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            On/Off Registeration
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>



                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                   {{ auth()->user()->name }}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            @yield("content")
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset("dist/js/scripts.js") }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset("dist/js/datatables-simple-demo.js") }}"></script>
</body>

</html>
