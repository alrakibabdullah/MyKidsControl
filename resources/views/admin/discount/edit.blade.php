
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
                                <h3 class="card-title">Update Discount</h3>
                                <a href="{{route('discount.index')}}" class="btn btn-success"> + Add New </a>
                              </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{route('discount.update',$data->id)}}" method="post">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Parent Name<span style="color: red">*</span></label>
                                        <select name="parent_id" id="" class="form-control" required>
                                            <option value="" selected disabled>--select--</option>
                                            @foreach ($parents as $item)
                                                <option value="{{$item->id}}" @php if ($data['parent_id'] == $item->id) { echo "selected"; } @endphp>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Discount Title<span style="color: red">*</span></label>
                                        <input type="text" name="title" value="{{$data->title}}" class="form-control" id="exampleInputEmail1" placeholder="Discount Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Discount Amount<span style="color: red">*</span></label>
                                        <input type="number" name="amount" value="{{$data->amount}}" class="form-control" id="exampleInputEmail1" placeholder="Discount Amount">
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
