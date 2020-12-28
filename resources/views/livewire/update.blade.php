<form>
    <input type="hidden" wire:model="link_id">
    <div class="form-group">
        <label for="exampleFormControlInput1">Title:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title" wire:model="title">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Original Url:</label>
        <textarea type="text" class="form-control" id="exampleFormControlInput2" wire:model="original_url" placeholder="Enter URL"></textarea>
        @error('url') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput3">Shorten Url:</label>
        <textarea type="text" class="form-control" id="exampleFormControlInput3" wire:model="shorten_url" placeholder="Enter URL"></textarea>
        @error('url') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Platform</label>
        </div>
        <select wire:model.prevent="platform_id" class="custom-select" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="1">Kitabisa</option>
          <option value="3">Donasiberkah</option>
          <option value="2">Amalsholeh</option>
        </select>
      </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>