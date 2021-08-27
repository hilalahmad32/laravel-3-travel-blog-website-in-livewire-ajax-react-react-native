<div>
    <x-slot name="title">About</x-slot>

    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4>About ( {{count($total_about)}} ) </h4>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addabout">
                        Add About
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-3 d-flex justify-content-end">
        <input type="text" wire:model='searchTerm' name="searchterm" id="searchTerm" class="form-control form-control-lg w-25 ">
    </div>
    <div class="container">
    <h3>{{$searchTerm}}</h3>
    </div>
    <div class="container">
        <div class="responsive-table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>About</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($abouts as $about)
                        <tr>
                            <td>{{$about->id}}</td>
                            <td><img src="{{asset('storage')}}/{{$about->about_image}}" alt="" style="width: 70px;height:70px;"></td>
                            <td>{{$about->about_des}}</td>
                            <td><button type="button" wire:click="edit({{$about->id}})" class="btn btn-primary" data-toggle="modal"  data-target="#editabout">
                                Edit
                            </button></td>
                            <td><button type="button" wire:click='delete({{$about->id}})' class="btn btn-danger">Delete</button></td>
                        </tr>
                    @empty
                        <h3>Record Not Found</h3>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{$abouts->links()}}

    {{-- add category model start --}}


    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="addabout" tabindex="-1" role="dialog" aria-labelledby="addaboutLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addaboutLabel">Modal title</h5>
                    <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" wire:submit.prevent='store' enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Enter About</label>
                            <textarea name="about" wire:model='about'  id="about" cols="30" rows="10" class="form-control-lg form-control"></textarea>
                            @error('about')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Enter About Image</label>
                            <input type="file" wire:model='image'  name="image" id="image" class="form-control form-control-lg">
                            @if ($image)
                                <img src="{{$image->temporaryUrl()}}" style="width: 100px;height:100px;" alt="">
                            @endif
                            @error('about_image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- add category model end --}}
    {{-- Update category model start --}}
    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="editabout" tabindex="-1" role="dialog" aria-labelledby="editaboutLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editaboutLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" wire:submit.prevent='update' enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Enter About</label>
                            <textarea cols="30" rows="10"  wire:model='edit_about_des' name="edit_about_des" id="edit_about_des" class="form-control form-control-lg"></textarea>
                            <input type="hidden"  wire:model='edit_about_id' name="edit_about_id" id="edit_about_id" class="form-control form-control-lg">
                            @error('edit_about_des')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Enter About Image</label>
                            <input type="file"  wire:model='new_image' name="new_image" id="new_image" class="form-control form-control-lg">
                            {{-- {{$new_image}} --}}
                            @if ($new_image)
                            <img src="{{ $new_image->temporaryUrl()}}" style="width: 100px;height:100xp;" alt="">
                            @else
                            <img src="{{ asset('storage') }}/{{$old_image}}" style="width: 100px;height:100xp;" alt="">
                            @endif
                            <input type="hidden" wire:model='old_image' name="" id="" class="form-control">
                            @error('new_image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Update category model end --}}
</div>