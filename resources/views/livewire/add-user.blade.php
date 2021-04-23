<form action="">
    <div class="form-group">
        <h3 class="mb-3">Add <strong>User</strong></h3>
        <hr>
        <input type="text" class="form-control" id="name" placeholder="Enter name" wire:model.debounce.2000s="name">
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
  
    <div class="form-group">
        <input type="password" class="form-control" id="password" placeholder="Enter password" wire:model.debounce.2000s="password">
        @error('password') <span class="text-danger">{{ $message }}</span>@enderror
    </div> 
    <div class="form-group">
        <input type="password" class="form-control" id="password_confirmation" placeholder="Enter password_confirmation" wire:model.debounce.2000s="password_confirmation">
        @error('password_confirmation') <span class="text-danger">{{ $message }}</span>@enderror
    </div> 
</form>
<button wire:click.prevent="store()" class="btn btn-success">Save</button>
