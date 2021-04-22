<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card border-success mt-3">
                <div class="card-body">
                    <h3>List <strong>Platform</strong></h3>
                    <hr>
                    <table class="table table-bordered table-hovered table-striped mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Platform</th>
                                <th>URL</th>
                                <th>Total Url</th>
                                <th>Total Visit</th>
                                @hasanyrole ('maker|administrator')
                                <th>Aksi</th>
                                @endhasanyrole
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1    
                            @endphp
                            @foreach ($platforms as $platform)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <th>{{ Str::ucfirst($platform->nama) }}</th>
                                <th><a href="{{ $platform->url_platform }}" target="_blank" rel="noopener noreferrer">{{ $platform->url_platform }}</a></th>
                                <th>{{ $countUrl = App\Url::where('platform_id', $platform->id)->count('id') }}</th>
                                <th>{{ $countUrl = App\Url::where('platform_id', $platform->id)->sum('visits') }}</th>
                                @hasanyrole ('maker|administrator')
                                <th><a role="button" wire:click.prevent="edit({{ $platform->id }})" class="text-primary"><i class="fas fa-edit"></i></a>
                                    {{-- <a role="button" wire:click.prevent="delete({{ $platform->id }})" class="text-danger"><i class="fas fa-trash"></i></a> --}}
                                </th>
                                @endhasanyrole
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @hasanyrole('maker|administrator')
        <div class="col justify-content-denter">
            <div class="card mt-3">
                <div class="card border-success">
                        <div class="card-body">
                            @if($updateMode)
                                @include('livewire.update-platform')
                            @else
                                @include('livewire.add-platform')
                            @endif
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        @endhasanyrole
        {{ $platforms->links() }}
    </div>
</div>
