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
    <div class="bg-white row justify-content-center">
      <div class="col">
        <h3 class="mt-5">Your <strong>Links</strong></h3>
        <hr>
        <table class="table table-bordered table-hovered table-striped mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Platform</th>
                    <th>Title</th>
                    <th>Shorten URL</th>
                    <th>Original URL</th>
                    <th>Total Visit</th>
                    @hasanyrole ('maker|administrator')
                    <th>Aksi</th>
                    @endhasanyrole
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1    
                @endphp
                @foreach ($links as $link)
                <tr>
                    <th>{{ $no++ }}</th>
                    <th>{{ Str::ucfirst($link->platform->nama) }}</th>
                    <th>{{ $link->title }}</th>
                    <th>{{ $link->shorten_url }}</th>
                    <th>{{ $link->original_url }}</th>
                    <th>{{ $link->visits }}</th>
                    {{-- <th><a href="{{ $platform->url_platform }}" target="_blank" rel="noopener noreferrer">{{ $platform->url_platform }}</a></th> --}}
                    {{-- <th>{{ $countUrl = App\Url::where('platform_id', $platform->id)->count('id') }}</th>
                    <th>{{ $countUrl = App\Url::where('platform_id', $platform->id)->sum('visits') }}</th> --}}
                    <th><a role="button" wire:click.prevent="edit({{ $link->id }})" class="text-primary"><i class="fas fa-edit"></i></a>
                        <a role="button" wire:click.prevent="delete({{ $link->id }})" class="text-danger"><i class="fas fa-trash"></i></a></th>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
</div>