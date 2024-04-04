<link href="{{ asset('backend/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="{{asset('/bokor/borko.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        @include('backend.navigation_bar')

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            @include('backend.top_navigation_bar')
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Food Information</h1>
            <p class="mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <!-- //form -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                            </thead>
                            <tbody>
                                @foreach ($food as $item)
                                @if ($item->food_active == 1)
                                <tr>
                                    <td>{{ $item->food_id }}</td>
                                    <td><img src="{{ asset($item->food_img) }}" alt="Food Image" width="100"
                                            height="100"></td>
                                    <td>{{ $item->food_name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        @if ($item->food_status == 1)
                                        Active
                                        @elseif($item->food_status == 0)
                                        Offactive
                                        @else
                                        @endif
                                    </td>
                                    <td>{{ \App\Models\InsertData::getCategoryNameById($item->food_category_id) }}
                                    </td>
                                    <td>{{ $item->food_desc }}</td>
                                    <td>
                                        <!-- Delete Form -->
                                        <a href="{{ route('food.edit', ['id' => $item->food_id]) }}"
                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <button type="button" class="btn btn-success"><i
                                                class="fas fa-eye"></i></button>
                                        <form action="{{ route('food.destroy', ['id' => $item->food_id]) }}"
                                            method="POST" id="deleteForm{{ $item->food_id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger delete-btn"
                                                data-food-id="{{ $item->food_id }}"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- end alert sucess -->



    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
    </script>
    <!-- <script src="{{ asset('backend/assets/vendor/jquery/jquery.min.js') }}"></script> -->
    <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('backend/assets/js/demo/chart-pie-demo.js') }}"></script>