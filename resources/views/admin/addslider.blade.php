@extends('admin_layout.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Slider</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Slider</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Add slider</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            @if (Session::has('status'))
                                <ul>
                                    <div class="alert alert-success">
                                        {{ Session::get('status') }}
                                    </div>
                                    <ul />
                            @endif

                            @if (count($errors) > 0)
                                <ul>
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li> {{ $error }} </li>
                                        @endforeach
                                    </div>
                                    <ul />
                            @endif

                            {!! Form::open(['action' => 'App\Http\Controllers\SliderController@saveslider', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">

                                    {!! Form::label('exampleInputEmail1', 'Description one') !!}

                                    {{-- <label for="exampleInputEmail1">Product name</label> --}}

                                    {!! Form::text('description1', '', ['class' => 'form-control', 'id' => 'exampleInputEmail1', 'placeholder' => 'Enter Description One']) !!}

                                    {{-- <input type="text" name="product_name" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter product name"> --}}
                                </div>
                                <div class="form-group">

                                    {!! Form::label('exampleInputEmail1', 'Description two') !!}

                                    {!! Form::text('description2', '', ['class' => 'form-control', 'id' => 'exampleInputEmail1', 'placeholder' => 'Enter Description two']) !!}


                                    {{-- <label for="exampleInputEmail1">Product price</label> --}}
                                    {{-- <input type="number" name="product_price" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter product price" min="1"> --}}
                                </div>


                                {{-- <label for="exampleInputFile">Product image</label> --}}

                                {!! Form::label('exampleInputFile', 'Slider image') !!}

                                <div class="input-group">
                                    <div class="custom-file">
                                        {{-- <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label> --}}
                                        {!! Form::file('slider_image', ['class' => 'custom-file-input', 'id' => 'exampleInputFile']) !!}

                                        {!! Form::label('exampleInputFile', 'Choose file', ['class' => 'custom-file-label']) !!}

                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                {{-- <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                                <input type="submit" class="btn btn-success" value="Save"> --}}
                                {!! Form::submit('Save', ['class' => 'btn btn-warning ']) !!}
                            </div>
                            {{-- </form> --}}

                            {!! Form::close() !!}

                        </div>
                        <!-- /.card -->

                    @endsection

                    @section('scripts')
                        <!-- jquery-validation -->
                        <script src="backend/plugins/jquery-validation/jquery.validate.min.js"></script>
                        <script src="backend/plugins/jquery-validation/additional-methods.min.js"></script>
                        <!-- AdminLTE App -->
                        <script src="backend/dist/js/adminlte.min.js"></script>
                        <!-- AdminLTE for demo purposes -->

                        <script>
                            $(function() {
                                $.validator.setDefaults({
                                    submitHandler: function() {
                                        alert("Form successful submitted!");
                                    }
                                });
                                $('#quickForm').validate({
                                    rules: {
                                        email: {
                                            required: true,
                                            email: true,
                                        },
                                        password: {
                                            required: true,
                                            minlength: 5
                                        },
                                        terms: {
                                            required: true
                                        },
                                    },
                                    messages: {
                                        email: {
                                            required: "Please enter a email address",
                                            email: "Please enter a vaild email address"
                                        },
                                        password: {
                                            required: "Please provide a password",
                                            minlength: "Your password must be at least 5 characters long"
                                        },
                                        terms: "Please accept our terms"
                                    },
                                    errorElement: 'span',
                                    errorPlacement: function(error, element) {
                                        error.addClass('invalid-feedback');
                                        element.closest('.form-group').append(error);
                                    },
                                    highlight: function(element, errorClass, validClass) {
                                        $(element).addClass('is-invalid');
                                    },
                                    unhighlight: function(element, errorClass, validClass) {
                                        $(element).removeClass('is-invalid');
                                    }
                                });
                            });
                        </script>
                    @endsection
