<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trang quản lý - Admin</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('public/backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('public/backend/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ URL::to('/admin') }}">
                <img src="{{ asset('public/frontend/assets/logo.png') }}" alt="" width="100">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item " id="q1">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Khoá học</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{ URL::to('/add-course') }}">Thêm khoá học</a>
                        <a class="collapse-item" href="{{ URL::to('/all-course') }}">Các khoá học</a>
                    </div>
                </div>
            </li>
            <li class="nav-item" id="q2">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Đào tạo</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{ URL::to('/them-daotao') }}">Thêm đào tạo</a>
                        <a class="collapse-item" href="{{ URL::to('/all-daotao') }}">Các đào tạo</a>
                    </div>
                </div>
            </li>
            <li class="nav-item" id="q3">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                    aria-expanded="true" aria-controls="collapseFive">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Khóa học trực tuyến</span>
                </a>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{ URL::to('/add-khonl') }}">Thêm khóa học trực tuyến</a>
                        <a class="collapse-item" href="{{ URL::to('/all-khonl') }}">Các khóa học trực tuyến</a>
                    </div>
                </div>
            </li>
            <li class="nav-item" id="q4">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix"
                    aria-expanded="true" aria-controls="collapseSix">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Bài học trực tuyến</span>
                </a>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{ URL::to('/add-baihoc') }}">Thêm bài học trực tuyến</a>
                        <a class="collapse-item" href="{{ URL::to('/allbaihoc') }}">Các bài học trực tuyến</a>
                    </div>
                </div>
            </li>
            <li class="nav-item" id="q5">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEight"
                    aria-expanded="true" aria-controls="collapseEight">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Bài kiểm tra</span>
                </a>
                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{ URL::to('/add-exam') }}">Thêm bài kiểm tra</a>
                        <a class="collapse-item" href="{{ URL::to('/all-exam') }}">Các bài kiểm tra</a>
                    </div>
                </div>
            </li>
            <li class="nav-item" id="q6">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseFour">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>User</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{ URL::to('/them-user') }}">Thêm user</a>
                        <a class="collapse-item" href="{{ URL::to('/all-user') }}">Các user</a>
                        <a class="collapse-item" href="{{ URL::to('/capquyen') }}">Cấp quyền cho user</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item" id="q7">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Học viên</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{ URL::to('/all-hocvien') }}">Học viên tại trung tâm</a>
                        <a class="collapse-item" href="{{ URL::to('/hocvien-onl') }}">Học viên mua khóa học</a>
                    </div>
                </div>
            </li>
            <!-- Heading -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-black"></i>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php
                                    $tentk = Session::get('tentk');
                                    $matk = Session::get('matk');
                                    echo $tentk;
                                    ?></span>

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="{{ URL::to('/change-password') }}">
                                    <i class="fas fa-unlock fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đổi mật khẩu
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                    echo '<span style="color:#ff8585;">' . $message . '</span>';
                    Session::put('message', null);
                    }
                    ?>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Cấp quyền cho tài khoản</strong>
                            </div>
                            <div class="card-body card-block">
                                <h4>Tài khoản</h4>
                                <form action="{{ URL::to('/luuquyen') }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="hid" id="hid">
                                    <div class="row form-group">
                                        <div class="col-3 col-md-3">
                                            <select id="select" name="sltk" class="form-control">
                                                @foreach ($taikhoan as $key => $value)
                                                    @if ($value->matk != 1)
                                                        <option value="{{ $value->matk }}">{{ $value->tentk }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <h4>Danh sách quyền</h4>
                                    @foreach ($quyen as $key => $values)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $values->id }}"
                                                id="{{ $values->id }}" name="ck[]">
                                            <label class="form-check-label" for="myCheck" style="font-size: 18px">
                                                {{ $values->ten_quyen }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i>Cấp quyền
                                    </button>
                                </form>
                                {{-- <button type="button" onclick="myFunction()">Try it</button>
                            <p id="demo"></p> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đăng xuất</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Bạn muốn đăng xuất</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ URL::to('/dangxuatadmin') }}">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('public/backend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('public/backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('public/backend/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('public/backend/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('public/backend/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('public/backend/js/demo/chart-pie-demo.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('public/backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('public/backend/js/demo/datatables-demo.js') }}"></script>
    {{-- ckeditor --}}
    <script src="{{ asset('public/backend/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1');
        CKEDITOR.replace('ckeditor2');
        CKEDITOR.replace('ckeditor3');
        CKEDITOR.replace('ckeditor4');
        CKEDITOR.replace('ckeditor5');
    </script>
    <script>
        var array = [
            @foreach ($ct_quyen as $key => $values)
                {{ $values->idquyen }},
            @endforeach
        ];
        if (!array.includes(1)) {
            document.getElementById('q1').style.display = "none";
        }
        if (!array.includes(2)) {
            document.getElementById('q2').style.display = "none";
        }
        if (!array.includes(3)) {
            document.getElementById('q3').style.display = "none";
        }
        if (!array.includes(4)) {
            document.getElementById('q4').style.display = "none";
        }
        if (!array.includes(5)) {
            document.getElementById('q5').style.display = "none";
        }
        if (!array.includes(6)) {
            document.getElementById('q6').style.display = "none";
        }
        if (!array.includes(7)) {
            document.getElementById('q7').style.display = "none";
        }
    </script>
    <script>
        // xuất hiện lần đầu
        var select = document.getElementById("select");
        tk = select.value;
        document.getElementById("hid").value = tk
        var array = [
            @foreach ($chitiet_quyen as $key => $values)
                {{ $values->matk }},{{ $values->idquyen }},
            @endforeach
        ];
        var arrayPer = [];
        for (var i = 0; i < array.length / 2; i++) {
            if (array[i * 2] == tk) {
                arrayPer.push(array[i * 2 + 1]);
            }
        }
        // bắt sự kiện thay đổi
        select.addEventListener("change", function() {
            var select = document.getElementById("select");
            var tk = select.value;
            document.getElementById("hid").value = tk
            var array = [
                @foreach ($chitiet_quyen as $key => $values)
                    {{ $values->matk }},{{ $values->idquyen }},
                @endforeach
            ];
            var arrayPer = [];
            for (var i = 0; i < array.length / 2; i++) {
                if (array[i * 2] == tk) {
                    arrayPer.push(array[i * 2 + 1]);
                }
            }
            var checkbox = document.getElementsByName('ck[]');
            for (var i = 0; i < checkbox.length; i++) {
                checkbox[i].checked = false;
            }
            for (var i = 0; i <= arrayPer.length; i++) {
                for (var j = 0; j < checkbox.length; j++) {
                    if (checkbox[j].value == arrayPer[i]) {
                        document.getElementById(arrayPer[i]).checked = true;
                    }
                }
            }
        });

        var checkbox = document.getElementsByName('ck[]');
        for (var i = 0; i < checkbox.length; i++) {
            checkbox[i].checked = false;
        }
        for (var i = 0; i <= arrayPer.length; i++) {
            for (var j = 0; j < checkbox.length; j++) {
                if (checkbox[j].value == arrayPer[i]) {
                    document.getElementById(arrayPer[i]).checked = true;
                }
            }
        }
    </script>
</body>

</html>
