<div class="row">
    <div class="col-md-12">

      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="{{$parent->image}}" alt="{{$parent->name}}">
          </div>

          <h3 class="profile-username text-center">{{$parent->name}}</h3>


          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Phone</b> <a class="float-right">{{$parent->phone}}</a>
            </li>
            <li class="list-group-item">
              <b>Email</b> <a class="float-right">{{$parent->email}}</a>
            </li>
          </ul>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>