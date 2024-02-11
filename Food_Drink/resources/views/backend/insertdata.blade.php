<title>Admin</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".file-upload").on('change', function() {
            readURL(this);
        });
    });
</script>
<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
            <h1>Food info</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3"><!--left col-->
            <div class="text-center">
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail"
                    alt="avatar">
                <h6>Upload a photo...</h6>
                <input type="file" class="text-center center-block file-upload">
            </div>
            </hr><br>
        </div>

        <!--/col-3-->

        <div class="col-sm-9">
            @if (Session::has('sucess'))
                <div class="alert alert-success" role="alert">
                    Insert Success
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-ligh" role="alert">
                    Insert Was Something Wrong
                </div>
            @endif
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Food</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr>
                    <form class="form" action="{{ url('/admin/save') }}" method="POST" id="registrationForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="fId">
                                    <h4> ID:</h4>
                                </label>
                                <input type="text" class="form-control" name="food_id" id="food_id"
                                    placeholder="ID" title="enter your ID">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="food_name">
                                    <h4>Name:</h4>
                                </label>
                                <input type="text" class="form-control" name="food_name" id="food_name"
                                    placeholder="food name" title="enter your food name">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="price">
                                    <h4>Price</h4>
                                </label>
                                <input type="text" class="form-control" name="price" id="price"
                                    placeholder="enter price" title="enter price">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="category">
                                    <h4>Category</h4>
                                </label>
                                <select class="form-control" id="food_category_id" name="food_category_id">
                                    <option selected>---Category---</option>
                                    @foreach ($cfood as $item)
                                        <option value="{{ $item->food_category_id }}">{{ $item->food_category_name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="status">
                                    <h4>Status</h4>
                                </label>
                                <select class="form-control" id="food_status" name="food_status">
                                    <option selected>......</option>
                                    <option value="1">Aailable</option>
                                    <option value="0">Unavilable</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="desc">
                                    <h4>Description</h4>
                                </label>
                                <textarea class="form-control" name="food_desc" id="food_desc" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i
                                        class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i>
                                    Reset</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                </div><!--/tab-pane-->
            </div><!--/tab-pane-->
        </div><!--/tab-content-->
    </div><!--/col-9-->
</div><!--/row-->
