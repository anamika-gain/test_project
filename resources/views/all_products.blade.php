<!DOCTYPE html>
<html lang="en">

<head>
    <title>All Registerd User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    @php
        $user = DB::table('registrations')->get();
    @endphp
    <div class="container mt-5">
        <h3>All Registerd User</h3>
        <table class=" table table-light">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Gender</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>

        </table>



        <button type="button" class="btn btn-primary">Primary</button>
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @php
            $category = DB::table('categories')->get();
            $color = DB::table('colors')->get();
            $size = DB::table('sizes')->get();
        @endphp
        <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card pd-20 pd-sm-40">

                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">project Name <span
                                        class="tx-danger">*</span></label>
                                <br>
                                <input class="form-control" type="text" name="product_name"
                                    placeholder="project Name">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Category: <span
                                        class="tx-danger">*</span></label>
                                <br>
                                <select class="form-control select2" data-placeholder="Choose Category"
                                    name="category_id">
                                    <option label="Choose Category"></option>
                                    @foreach ($category as $row)
                                        <option value="{{ $row->id }}">{{ $row->cat_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Color: <span class="tx-danger">*</span></label>
                                <br>
                                <select class="form-control select2" data-placeholder="Choose color" name="color_id">
                                    <option label="Choose color"></option>
                                    @foreach ($color as $row)
                                        <option value="{{ $row->id }}">{{ $row->color_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">SIZE: <span class="tx-danger">*</span></label>
                                <br>
                                <select class="form-control select2" data-placeholder="Choose size" name="size_id">
                                    <option label="Choose size"></option>
                                    @foreach ($size as $row)
                                        <option value="{{ $row->id }}">{{ $row->size }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">project price <span
                                        class="tx-danger">*</span></label>
                                <br>
                                <input class="form-control" type="text" name="price" placeholder="project Price">
                            </div>
                        </div><!-- col-4 -->
                    </div><!-- row -->
                    <br>
                    <div class="col-lg-4">
                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5">Submit Form</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
        </form>

    </div>
</body>

</html>
