<div>
    <x-slot name="title">Admin</x-slot>

    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4>Admins ( {{count($total_admins)}} )</h4>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadmins">
                        Add Admin
                    </button>

                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end container">
        <input wire:model='searchTerm' type="text" name="searchTerm" id="searchTerm"
            class="form-control form-control-lg w-25">
    </div>
    <div class="container my-3">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Roll</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $admin)
                    <tr>
                        <td>{{$admin->id}}</td>
                        <td>{{$admin->name}}</td>
                        <td>{{$admin->email}}</td>
                        <td><img src="{{asset("storage")}}/{{$admin->image}}" style="width:70px;height:70px;" alt=""></td>
                        <td>
                            @if ($admin->roll == 1)
                            Admin
                            @else
                            Normal
                            @endif
                        </td>
                        <td> <button type="button" wire:click='edit({{$admin->id}})' class="btn btn-primary"
                                data-toggle="modal" data-target="#editadmins">
                                Edit
                            </button></td>
                        <td><button class="btn btn-danger" wire:click='delete({{$admin->id}})'>Delete</button></td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{$admins->links()}}

    <div class="modal fade" wire:ignore.self id="addadmins" tabindex="-1" role="dialog" aria-labelledby="addadminsLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addadminsLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire('admin.register')
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" wire:ignore.self id="editadmins" tabindex="-1" role="dialog"
        aria-labelledby="editadminsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editadminsLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="w-100">
                        <form wire:submit.prevent='update'>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control  @error('name') is-invalid @enderror" wire:model="name"
                                        name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                    <input id="id" type="hidden" class="form-control  @error('id') is-invalid @enderror"
                                        wire:model="ids" name="ids" value="{{ old('ids') }}" autocomplete="ids"
                                        autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" wire:model="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="roll" class="col-md-4 col-form-label text-md-right">{{ __('Roll') }}</label>

                                <div class="col-md-6">
                                    <select wire:model='roll' name="roll" id="roll"
                                        class="form-control form-control-lg @error('roll') is-invalid @enderror">
                                        <option value="" selected> ---- Select Roll ---- </option>
                                        <option value="1">Admin</option>
                                        <option value="0">Normal</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for=""
                                    class="col-md-4 col-form-label text-md-right">{{ __('Enter Image') }}</label>

                                <div class="col-md-6">
                                    <input id="new_image" wire:model='new_image' type="file" class="form-control"
                                        name="new_image" autocomplete="new_image">                                    
                                    @if ($new_image)
                                    <img src="{{$new_image->temporaryUrl()}}" style="width:70px;height:70px; " alt="">
                                    @else
                                    <img src="{{asset("storage")}}/{{$old_image}}" style="width:70px;height:70px; "
                                        alt="">
                                    @endif
                                    <input id="old_image" wire:model='old_image' type="hidden" class="form-control"
                                        name="old_image" autocomplete="old_image">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>