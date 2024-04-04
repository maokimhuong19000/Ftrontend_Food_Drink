<link href="{{ asset('backend/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="{{asset('/bokor/borko.css')}}">
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
            <form action="{{ route('food.search') }}"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" name="q_search" value="" class="form-control bg-light border-0 small"
                        placeholder="Search for...">
                    <div class="input-group-append">
                        <button class="btn btn-primary">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            @if($food->isEmpty())
            <div class="alert alert-danger">
                No results found
            </div>
            @else
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
                            <td><img src="{{ asset($item->food_img) }}" alt="Food Image" width="100" height="100"></td>
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
                                <a href="{{ route('food.edit', ['id' => $item->food_id]) }}" class="btn btn-primary"><i
                                        class="fas fa-edit"></i></a>
                                <button type="button" class="btn btn-success"><i class="fas fa-eye"></i></button>
                                <form action="{{ route('food.destroy', ['id' => $item->food_id]) }}" method="POST"
                                    id="deleteForm{{ $item->food_id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-btn"
                                        data-food-id="{{ $item->food_id }}"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                {{ $food->links('vendor/pagination/bootstrap-5') }}
            </div>
            @endif
        </div>
    </div>
</div>
<!-- alert delete_success -->
<script>
// Function to handle form submission
function handleFormSubmit(foodId) {
    // Submit the form
    document.getElementById('deleteForm' + foodId).submit();

    // Show SweetAlert2 success message
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Your work has been saved",
        showConfirmButton: true,
        timer: 4000
    });
}

// Add event listener to delete buttons
var deleteButtons = document.querySelectorAll('.delete-btn');
deleteButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        var foodId = this.getAttribute('data-food-id');
        handleFormSubmit(foodId);
    });
});
</script>
<!-- end alert sucess -->


<script>
document.addEventListener("DOMContentLoaded", function() {
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const foodId = this.getAttribute('data-food-id');
            const confirmation = confirm(
                "Are you sure you want to delete this item?");
            if (confirmation) {
                // If user confirms, submit the corresponding form
                const form = document.getElementById('deleteForm' + foodId);
                if (form) {
                    form.submit();
                } else {
                    console.error('Delete form not found for food ID:', foodId);
                }
            }
        });
    });
});
</script>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ url('http://127.0.0.1:8000/admin/login') }}">Logout</a>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('backend/assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('backend/assets/js/demo/chart-pie-demo.js') }}"></script>