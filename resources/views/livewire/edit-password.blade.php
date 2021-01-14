<div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <input type="hidden" wire:model.debounce.2000s="user_id">
                <div class="form-group">
                    <label for="exampleFormControlInput3">Password :</label>
                    <input type="password" class="form-control" id="exampleFormControlInput3" wire:model.debounce.2000s="password" placeholder="Enter Password"></input>
                    @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput4">Password Confirmation :</label>
                    <input type="password" class="form-control" id="exampleFormControlInput4" wire:model.debounce.2000s="password_confirmation" placeholder="Enter Password confirmation"></input>
                    @error('password_confirmation') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="modal-footer">
                    <button wire:click.prevent="updatePassword()" data-dismiss="modal" class="btn btn-dark">Update</button>
                    <button wire:click.prevent="cancel()" data-dismiss="modal" class="btn btn-danger">Cancel</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>