<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <input type="hidden" wire:model.debounce.2000s="user_id">
            <div class="form-group">
                <label for="exampleFormControlInput1">Username :</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Your Username" wire:model.debounce.2000s="name">
                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Email :</label>
                <input type="email" class="form-control" id="exampleFormControlInput2" wire:model.debounce.2000s="email" placeholder="Email"></input>
                @error('email') <span class="text-danger">{{ $message }}</span>@enderror
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