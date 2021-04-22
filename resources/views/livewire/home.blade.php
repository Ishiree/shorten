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
                @hasanyrole('maker|administrator')
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1">
                    Create Shorten URL
                </button>
                @include('livewire.create')
                @endhasanyrole
                
            </div>
            
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Platforms</label>
                    </div>
                    <select wire:model.prevent="filtering" class="custom-select" id="inputGroupSelect01">
                        <option value="{{ $allPlatform }}" selected>All Platform</option>
                        @foreach ($platforms as $platform)
                      <option value="{{ $platform->id }}">{{ $platform->nama }}</option>
                      @endforeach
                    </select>
                </div>
                {{-- <button type="submit" wire:click.prevent="filterPlatform">Filter</button> --}}
                {{-- <div x-data="{ open: false }">
                    <button class="btn btn-success" type="button"  wire:click="resetFilter" @click="open = true">All Platform . . .</button>                            
                    
                    <livewire:list-url />
                </div> --}}
            </div>
            
            <div class="col justify-content-end">
                <div class="input-group mb-3">
                    <input wire:model="search" type="text" class="form-control" placeholder="Search . . ." aria-label="Username" aria-describedby="basic-addon1">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-success">
            <div class="card-body">
                <h3 class="mb-3">List <strong class="text-success">Url</strong></h3>
        <hr>
                <div class="table-responsive-md">
                    <table class="table table-bordered table-hovered table-striped mt-3">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th><a style=":hover {none;}" wire:click.prevent="sortBy('title')" role="button" href="#">
                                    Title
                                    @include('includes._sort-icon', ['field' => 'title'])
                                </a></th>
                                <th>Original Url</th>
                                <th>Platform
                                  </th>
                                <th>Shorten Url</th>
                                <th>Visit</th>
                                @hasanyrole ('maker|administrator')
                                <th width="150px">Action</th>
                                @endhasanyrole
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
                                @hasanyrole ('maker|administrator')
                                <td>{{ $link->visits }}</td>
                                <td>
                                <a href="#exampleModal3" data-toggle="modal" wire:click.prevent="edit({{ $link->id }})" role="button" class="text-primary"><i class="fas fa-edit"></i></a>
                                @include('livewire.update')
                                <a role="button" wire:click.prevent="delete({{ $link->id }})" class="text-danger"><i class="fas fa-trash"></i></a>
                                </td>
                                @endhasanyrole
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
        </div>
        {{ $links->links() }}
      </div>
  </div>
</div>