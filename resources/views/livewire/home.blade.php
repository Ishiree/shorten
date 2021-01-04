<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-16">
        <div class="row">
            <div class="col-md-6">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @role ('maker')
                <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Create Shorten URL
                  </a>
                <div class="collapse" id="collapseExample">
                    <div class="card">
                        <div class="card-body">
                            @if($updateMode)
                                @include('livewire.update')
                            @else
                                @include('livewire.create')
                            @endif
                        </div>
                    </div>
                </div>
                @endrole
            </div>
            
        </div>
            {{-- <div class="row justify-content-end mt-3">
                <div class="col-md-6 ">
                    
                </div>
            </div> --}}
        
        <div class="row mt-3">
            <div class="col">
                {{-- <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Dropdown button
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a wire:click.prevent="filterKitabisa()" class="dropdown-item" href="#">Kitabisa</a>
                      <a class="dropdown-item" href="#" wire:click.prevent="filterDonasiberkah()">Donasiberkah</a>
                      <a class="dropdown-item" href="#" wire:click.prevent="filterAmalsholeh()">Amalsholeh</a>
                    </div>
                </div> --}}
                <div x-data="{ open: false }">
                    <button class="btn btn-success" type="button"  wire:click="resetFilter" @click="open = true">All Platform...</button>                            
                        <ul class="mt-2" x-show="open" @click.away="open = false">
                                <button class="mb-2 btn btn-success" wire:click="filterKitabisa">Kitabisa</button>
                                <button class="mb-2 btn btn-success" wire:click="filterDonasiberkah">Donasiberkah</button>
                                <button class="mb-2 btn btn-success" wire:click="filterAmalsholeh">Amalsholeh</button>
                                <button class="mb-2 btn btn-success" wire:click="filterAmalsholeh">Amalsholeh</button>
                                <button class="mb-2 btn btn-success" wire:click="filterAmalsholeh">Amalsholeh</button>
                                <button class="mb-2 btn btn-success" wire:click="filterAmalsholeh">Amalsholeh</button>
                                <button class="mb-2 btn btn-success" wire:click="filterAmalsholeh">Amalsholeh</button>
                        </ul>
                </div>
            </div>
            <div class="col justify-content-end">
                <div class="input-group mb-3">
                    <input wire:model="search" type="text" class="form-control" placeholder="Search . . ." aria-label="Username" aria-describedby="basic-addon1">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </div>
            
            {{-- <a class="btn btn-success " href="{{ route('createUrl') }}">Create Shorten URL</a> --}}
        </div>
        <div class="table-responsive-md">
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th><a wire:click.prevent="sortBy('title')" role="button" href="#">
                            Title
                            @include('includes._sort-icon', ['field' => 'title'])
                        </a></th>
                        <th>Original Url</th>
                        <th>Platform
                          </th>
                        <th>Shorten Url</th>
                        @role ('maker')
                        <th width="150px">Action</th>
                        @endrole
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1    
                    @endphp
                    @foreach($links as $link)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $link->title }}</td>
                        <td>{{ $link->original_url }}</td>
                        <td>{{ $link->platform->nama }}</td>
                        <td><a href="{{ route('redirect', $link->shorten_url) }}" target="_blank">{{ $link->shorten_url }}</a> </td>
                        @role ('maker')
                        <td>
                        <button wire:click.prevent="edit({{ $link->id }})" class="btn btn-primary btn-sm">Edit</button>
                            <button wire:click.prevent="delete({{ $link->id }})" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                        @endrole
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $links->links() }}
      </div>
  </div>
</div>