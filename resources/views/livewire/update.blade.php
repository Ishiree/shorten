<div  wire:ignore.self class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" wire:model.debounce.2000s="link_id">
          <div class="form-group">
              <label for="exampleFormControlInput1">Title:</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title" wire:model.debounce.2000s="title">
              @error('title') <span class="text-danger">{{ $message }}</span>@enderror
          </div>
          <div class="form-group">
              <label for="exampleFormControlInput2">Original Url:</label>
              <input type="text" class="form-control" id="exampleFormControlInput2" wire:model.debounce.2000s="original_url" placeholder="Enter URL"></input>
              @error('original_url') <span class="text-danger">{{ $message }}</span>@enderror
          </div>
          <div class="form-group">
              <label for="exampleFormControlInput3">Shorten Url:</label>
              <input type="text" class="form-control" id="exampleFormControlInput3" wire:model.debounce.2000s="shorten_url" placeholder="Enter URL"></input>
              @error('shorten_url') <span class="text-danger">{{ $message }}</span>@enderror
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
              <button wire:click.prevent="update()" data-dismiss="modal" class="btn btn-dark">Update</button>
              <button wire:click.prevent="cancel()" data-dismiss="modal" class="btn btn-danger">Cancel</button>
            </div>
  </form>
      </div>
    </div>
  </div>
</div>
