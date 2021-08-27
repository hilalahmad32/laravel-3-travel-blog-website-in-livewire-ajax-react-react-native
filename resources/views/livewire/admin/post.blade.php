<div>
    <x-slot name="title">Posts</x-slot>

    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4>Post ( {{count($post_count)}} )</h4>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addpost">
                        Add Category
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
        <h4>{{$searchTerm}}</h4>
    </div>
    <div class="container my-4">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Username</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{substr($post->description,0,100)}}....</td>
                        <td>@if (Auth::user()->roll == 1)
                            {{$post->users->name}} | {{$post->users->roll==1 ? 'Admin':"Normal"}}          
                        @endif</td>
                        <td>{{$post->categorys->category_name}}</td>
                        <td><img src="{{ asset('storage') }}/{{$post->image}}" style="width: 70px;height:70px;" alt="">
                        </td>
                        <td> <button wire:click='edit({{$post->id}})' type="button" class="btn btn-primary" data-toggle="modal" data-target="#editpost">Edit</button></td>
                        <td><button wire:click='delete({{$post->id}})' class="btn btn-danger">Delete</button></td>
                    </tr>
                    @empty
                    <h1>Record Not Found</h1>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{$posts->links()}}
    {{-- add post model start --}}
    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="addpost" tabindex="-1" role="dialog" aria-labelledby="addpostLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addpostLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" wire:submit.prevent='store' enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Enter post Name</label>
                            <input type="text" wire:model='title' name="title" id="title"
                                class="form-control form-control-lg">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Enter Category</label>
                            <select wire:model='cat_id' name="categorys" id="categorys" class="form-control form-control-lg">
                                <option selected> ---Select Category--- </option>
                               
                                @foreach ($categorys as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                            @error('categorys')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Enter Description</label>
                            <textarea wire:model='description' name="description" id="" cols="30" rows="10"
                                class="form-control form-control-lg"></textarea>
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Enter post Name</label>
                            <input type="file" wire:model='image' name="image" id="image"
                                class="form-control form-control-lg">
                            @if ($image)
                            <img src="{{$image->temporaryUrl()}}" style="width: 100px;height:100px;" alt="">
                            @endif
                            @error('image')
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
    {{-- add post model end --}}



    {{-- edit post model start --}}
    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="editpost" tabindex="-1" role="dialog" aria-labelledby="editpostLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editpostLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" wire:submit.prevent='update' enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Enter Title</label>
                            <input type="text" wire:model='edit_title' name="edit_title" id="edit_title" class="form-control form-control-lg">
                            <input type="hidden" wire:model='edit_ids' name="edit_ids" id="edit_ids"
                                class="form-control form-control-lg">
                            @error('edit_title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Enter Category</label>
                            <select wire:model='edit_cat_id' name="edit_category" id="edit_category" class="form-control form-control-lg">
                                <option value="" disabled selected> ---Select Category---</option>
                                @foreach ($categorys as $category)
                                @if ($cat_id==$category->id)
                                <option selected value="{{$category->id}}">{{$category->category_name}}</option>
                                @else
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('edit_category')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input wire:model="old_cat_id" type="text" name="old_category" id="old_category" class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                            <label for="">Enter Description</label>
                            <textarea wire:model='edit_description' name="edit_description" id="" cols="30" rows="10"
                                class="form-control form-control-lg"></textarea>
                            @error('edit_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Enter post Name</label>
                            <input type="file" wire:model='new_image' name="new_image" id="new_image"
                                class="form-control form-control-lg">
                            @if ($new_image)
                            <img src="{{$new_image->temporaryUrl()}}" style="width: 100px;height:100px;" alt="">
                            @else
                            <img src="{{asset("storage")}}/{{$old_image}}" style="width: 100px;height:100px;" alt="">
                            @endif
                            <input type="hidden" wire:model='old_image' name="old_image" id="old_image"
                            class="form-control form-control-lg">

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
    {{-- edit post model end --}}
</div>