<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="row">
            <div class="col-md-5">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @role ('maker')
                    @if($updateMode)
                        @include('livewire.update')
                    @else
                        @include('livewire.create')
                    @endif
                @endrole
            </div>
        </div>
        
          <table class="table table-bordered mt-5">
              <thead>
                  <tr>
                      <th>No.</th>
                      <th>Title</th>
                      <th>Original Url</th>
                      <th>Shorten Url</th>
                      <th width="150px">Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($links as $link)
                  <tr>
                      <td>{{ $link->id }}</td>
                      <td>{{ $link->title }}</td>
                      <td>{{ $link->original_url }}</td>
                      <td><a href="{{ route('redirect', $link->shorten_url) }}" target="_blank">{{ $link->shorten_url }}</a> </td>
                      <td>
                      <button wire:click="edit({{ $link->id }})" class="btn btn-primary btn-sm">Edit</button>
                          <button wire:click="delete({{ $link->id }})" class="btn btn-danger btn-sm">Delete</button>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>