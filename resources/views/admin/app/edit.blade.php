
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
                                <h3 class="card-title">Update Apps</h3>
                                <a href="{{route('apps.index')}}" class="btn btn-success"> + Add New </a>
                              </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                                <form action="{{route('apps.update',$data->id)}}" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category Name<span style="color: red">*</span></label>
                                        <select name="category_id" id="" class="form-control">
                                            @foreach ($categories as $item)
                                                <option value="{{$item->id}}" @php if ($data['category_id'] == $item->id) { echo "selected"; } @endphp>{{$item->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Apps Name</label>
                                        <input type="text" name="name" value="{{$data->name}}" class="form-control" id="exampleInputEmail1" placeholder="Website Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Apps Link</label>
                                        <input type="text" name="link" value="{{$data->link}}" class="form-control" id="exampleInputEmail1" placeholder="Website Link">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Apps Logo</label>
                                        @if($data->logo)
                                            <div class="form-group">
                                                <img src="{{ asset($data->logo) }}" alt="Image" style="width: 30%; margin-top: 8px">
                                                <input type="hidden" name="old_image" value="{{ $data->logo }}">
                                            </div>
				            	        @endif
                                        <input type="file" name="logo" class="form-control" id="exampleInputEmail1" >
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
