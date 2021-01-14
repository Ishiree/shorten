<form>
    <input type="hidden" wire:model.debounce.500ms="user_id">
    <input type="hidden" wire:model.debounce.500ms="role_id">
    <div class="form-group">
        <h3 class="mb-3">Edit <strong>User</strong></h3>
        <hr>
        <input type="text" class="form-control" id="name" placeholder="Enter username" wire:model.debounce.2000s="name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="email" placeholder="Enter email" wire:model.debounce.2000s="email">
        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
    </div> 
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Role</label>
        </div>
        <select wire:model.debounce.2000s="roles" class="custom-select" id="inputGroupSelect01">
          <option selected>Choose...</option>
          @foreach ($listroles as $role)
          <option value="{{ $role->name }}">{{ Str::ucfirst($role->name) }}</option>
          @endforeach
        </select>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect02">Status</label>
        </div>
        <select wire:model.debounce.2000s="status" class="custom-select" id="inputGroupSelect02">
          <option selected>Choose...</option>
          <option value="aktif">Aktif</option>  
          <option value="tidak_aktif">Tidak Aktif</option>  
        </select>
    </div>
    <div class="modal-footer">
      <button wire:click.prevent="update()" data-dismiss="modal" class="btn btn-dark">Update</button>
      <button wire:click.prevent="cancel()" data-dismiss="modal" class="btn btn-danger">Cancel</button>
    </div>
</form>