<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Create your shorten link</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
              <label class="nput-group-text" for="title">Title</label>
              <input type="text" class="form-control" id="title" placeholder="Enter Title" wire:model.debounce.2000s="title">
              @error('title') <span class="text-danger">{{ $message }}</span>@enderror
          </div>
          <div class="form-group">
              <label class="nput-group-text" for="url">Url:</label>
              <input type="text" class="form-control" id="url" wire:model.debounce.2000s="original_url" placeholder="Enter URl">
              @error('original_url') <span class="text-danger">{{ $message }}</span>@enderror
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Platform</label>
              </div>
              <select wire:model.debounce.2000s="platform_id" class="custom-select" id="inputGroupSelect01">
                <option selected>Choose...</option>
                @foreach ($platforms as $platform)
                <option value="{{ $platform->id }}">{{ Str::ucfirst($platform->nama) }}</option>
                @endforeach
              </select>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button data-dismiss="modal" wire:click.prevent="store()" class="btn btn-success">Save</button>
          </div>
      </form>    
      </div>
  </div>
  </div>
</div>
