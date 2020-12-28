<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @role ('maker')
                <div class="card">
                    <div class="card-body">
                        @if($updateMode)
                            @include('livewire.update')
                        @else
                            @include('livewire.create')
                        @endif
                    </div>
                </div>
                @endrole
            </div>
        </div>
            <div class="row justify-content-end mt-3">
                <div class="col-md-6 ">
                    <div class="input-group mb-3">
                        <input wire:model="search" type="text" class="form-control" placeholder="Search . . ." aria-label="Username" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fab fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        
        
          <table class="table table-bordered mt-3">
              <thead>
                  <tr>
                      <th>No.</th>
                      <th>Title</th>
                      <th>Original Url</th>
                      <th>Platform <select class="btn btn-success" wire:model="filter"><option selected>All Platform</option>
                        <option value="1">Kitabisa</option>
                        <option value="3">Donasiberkah</option>
                        <option value="2">Amalsholeh</option><i class="fas fa-arrow-alt-down"></i>
                        </select>
                        </th>
                      <th>Shorten Url</th>
                      @role ('maker')
                      <th width="150px">Action</th>
                      @endrole
                  </tr>
              </thead>
              <tbody>
                  @php
                  $no = 1    
                  @endphp
                  @foreach($links as $link)
                  <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $link->title }}</td>
                      <td>{{ $link->original_url }}</td>
                      <td>{{ $link->platform->nama }}</td>
                      <td><a href="{{ route('redirect', $link->shorten_url) }}" target="_blank">{{ $link->shorten_url }}</a> </td>
                      @role ('maker')
                      <td>
                      <button wire:click="edit({{ $link->id }})" class="btn btn-primary btn-sm">Edit</button>
                          <button wire:click="delete({{ $link->id }})" class="btn btn-danger btn-sm">Delete</button>
                      </td>
                      @endrole
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>