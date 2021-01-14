<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card border-success mt-3">
                <div class="card-body">
                    <h3>List <strong>User</strong></h3>
                    <hr>
                    <table class="table table-bordered table-hovered table-striped mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1    
                            @endphp
                            @foreach ($akuns as $akun)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <th>{{ Str::ucfirst($akun->name) }}</th>
                                <th>{{ ($akun->email) }}</th>
                                <th>{{ $akun->role_name }}</th>
                                <th>{{ $akun->status }}</th>
                                <th><a role="button" wire:click.prevent="edit({{ $akun->id }})" class="text-primary"><i class="fas fa-edit"></i></a>
                                    <a role="button" wire:click.prevent="resetPassword({{ $akun->id }})" class="text-success"><i class="fas fa-unlock"></i></a>
                                    <a role="button" wire:click.prevent="delete({{ $akun->id }})" class="text-danger"><i class="fas fa-trash"></i></a></th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            <div class="col justify-content-denter">
                <div class="border-success card mt-3">
                    <div class="card">
                            <div class="card-body">
                                @if($updateMode)
                                    @include('livewire.update-user')
                                @else
                                    @include('livewire.add-user')
                                @endif
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        {{ $akuns->links() }}
    </div>
</div>
