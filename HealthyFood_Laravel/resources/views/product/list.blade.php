@extends("layoutmain")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Simple Tables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Simple Tables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh Sach Category</h3>

                                <div class="card-tools">
                                    <div class="input-group-append">
                                        <a href="{{url("product/new")}}"> ADD PRODUCT </a>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Category</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $pr)
                                            <tr>
                                                <td>{{$pr->id}}</td>
                                                <td>{{$pr->image}}</td>
                                                <td>{{$pr->description}}</td>
                                                <td>{{$pr->price}}</td>
                                                <td>{{$pr->qty}}</td>
                                                <td>{{$pr->Category->__get("name")}}</td>
                                                <td>{{$pr->created_at}}</td>
                                                <td>{{$pr->updated_at}}</td>
                                                <td><a href="{{url("/product/edit",["id"=>$pr->id])}}"> Edit </a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
