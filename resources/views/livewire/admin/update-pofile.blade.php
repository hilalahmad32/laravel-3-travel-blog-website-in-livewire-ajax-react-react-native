<div>
    <x-slot name="title">Profile</x-slot>
    <div class="d-flex justify-content-center">
        <button class="btn btn-primary my-4 " wire:click='edit({{$profile_id}})'>Update Profile</button>

    </div>
    <div class="container my-3">
        <div class="card">
            <div class="card-header">
                <h4>Profile</h4>
            </div>
            <div class="card-body">
                <form action="" wire:submit.prevent='update({{$profile_id}})'>
                    <div class="form-group">
                        <label for="">Name</label>
                        @if ($name != null)
                        <input type="text" wire:model='name' name="name" id="name" class="form-control form-control-lg">
                        @else
                        <input type="text" wire:model='name' disabled name="name" id="name"
                            class="form-control form-control-lg">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        @if ($email != null)
                        <input type="text" wire:model='email' name="email" id="email"
                            class="form-control form-control-lg">
                        @else
                        <input type="text" wire:model='email' disabled name="email" id="email"
                            class="form-control form-control-lg">
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        @if ($old_image != null)
                        <input type="file" wire:model='new_image' name="new_image" id="new_image"
                            class="form-control form-control-lg">
                        @if ($new_image)
                        <img src="{{ $new_image->temporaryUrl() }}" style="width:70px;height:70px" alt="">
                      
                        @else
                        <img src="{{asset("storage")}}/{{$old_image}}" style="width:70px;height:70px" alt="">
                        <input type="hidden" wire:model='old_image' name="old_image" id="old_image"
                        class="form-control form-control-lg">
                        @endif
                        @else
                        <input type="file" disabled wire:model='image' name="image" id="image"
                            class="form-control form-control-lg">
                        @endif

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>