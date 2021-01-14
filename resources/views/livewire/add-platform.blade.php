            <form action="">
                <div class="form-group">
                    <h3>Add <strong>Platform</strong></h3>
                    <hr>
                    <input type="text" class="form-control" id="nama" placeholder="Enter nama" wire:model.debounce.2000s="nama">
                    @error('nama') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="url_platform" placeholder="Enter url_platform" wire:model.debounce.2000s="url_platform">
                    @error('url_platform') <span class="text-danger">{{ $message }}</span>@enderror
                </div> 
            </form>
            <button wire:click.prevent="store()" class="btn btn-success">Save</button>