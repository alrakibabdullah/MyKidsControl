
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card-header" style="text-align: right">
                                <h3 class="card-title">Update Category</h3>
                                <a href="{{route('category.index')}}" class="btn btn-success"> + Add New </a>
                              </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                                <form action="{{route('category.update',$data->id)}}" method="post">
                                    @method('patch')
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category Type<span style="color: red">*</span></label>
                                            <select name="category_type" id="" class="form-control" required>
                                                <option value="0" @php if ($data['type'] == 0) { echo "selected"; } @endphp>Apps</option>
                                                <option value="1" @php if ($data['type'] == 1) { echo "selected"; } @endphp>Website</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title<span style="color: red">*</span></label>
                                            <input type="text" name="title" value="{{$data->title}}" class="form-control" id="exampleInputEmail1" placeholder="Category Title">
                                        </div>
                                    </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
