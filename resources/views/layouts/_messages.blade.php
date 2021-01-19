<div class="container-fluid">
          @if(session()->has('access_msg'))
          <div class="alert alert-danger alert-dismissible text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h3>{{ session('access_msg') }}</h3>
          </div>
          @elseif(session()->has('save_msg'))
          <div class="alert alert-success alert-dismissible text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h3>{{ session('save_msg') }}</h3>
          </div>
          @elseif(session()->has('trash_msg'))
          <div class="alert alert-warning alert-dismissible text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h3>{{ session('trash_msg') }}</h3>
          </div>
          @elseif(session()->has('force_delete_msg'))
          <div class="alert alert-danger alert-dismissible text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h3>{{ session('force_delete_msg') }}</h3>
          </div>
          @endif