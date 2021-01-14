<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="{{ asset('aset/img-default-user.jpg') }}" class="card-img">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                          <h3 class="card-title">{{Str::ucfirst($user->name)}}</h3>
                          <div class="div">
                            <a href="#exampleModal3" data-toggle="modal"><i class="fas fa-edit"></i></a>
                            <a href="#exampleModal7" data-toggle="modal"><i class="fas fa-key"></i></a>
                          </div>
                          @include('livewire.edit-profile')
                          @include('livewire.edit-password')
                      </div>
                      <h5 class="card-text">{{Str::ucfirst($user->email)}}</h5>
                      
                      <hr>
                      <a href="" class="card-text"><small class="text-muted"></small></a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>