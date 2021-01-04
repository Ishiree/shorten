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
          <option value="1">Kitabisa</option>
          <option value="3">Donasiberkah</option>
          <option value="2">Amalsholeh</option>
        </select>
      </div>
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>