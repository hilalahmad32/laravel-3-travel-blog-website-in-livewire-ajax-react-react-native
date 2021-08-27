<div>
    <x-slot name="title">Setting</x-slot>
    <div class="d-flex justify-content-center">
        <button class="btn btn-primary my-4 " wire:click='edit({{$setting_id}})'>Update Setting</button>

    </div>
    <div class="container my-3">
        <div class="card">
            <div class="card-header">
                <h4>Setting</h4>
            </div>
            <div class="card-body">
                <form action="" wire:submit.prevent='update({{$setting_id}})'>
                    <div class="form-group">
                        <label for="">Logo</label>
                        @if ($logo != null)
                        <input type="text" wire:model='logo' name="logo" id="logo" class="form-control form-control-lg">
                        @else
                        <input type="text" wire:model='logo' disabled name="logo" id="logo" class="form-control form-control-lg">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Footer Title</label>
                        @if ($footer_title != null)
                        <input type="text" wire:model='footer_title'  name="footer_title" id="footer_title" class="form-control form-control-lg">
                        @else
                        <input type="text" wire:model='footer_title' disabled name="footer_title" id="footer_title" class="form-control form-control-lg">
                        @endif
                        
                    </div>
                    <div class="form-group">
                        <label for="">Footer Desc</label>
                        @if ($footer_desc != null)
                        <textarea name="footer_desc" dis wire:model='footer_desc' id="footer_desc" cols="30" rows="10" class="form-control form-control-lg"></textarea>
                        @else
                        <textarea  name="footer_desc" disabled wire:model='footer_desc' id="footer_desc" cols="30" rows="10" class="form-control form-control-lg"></textarea>
                        @endif
                       
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        @if ($footer_phone != null)
                        <input type="text" wire:model='footer_phone' name="phone" id="phone" class="form-control form-control-lg">
                        @else
                        <input type="text" disabled wire:model='footer_phone' name="phone" id="phone" class="form-control form-control-lg">
                        
                        @endif
                        
                    </div>
                    <div class="form-group">
                        <label for="">Location</label>
                        @if ($footer_location != null)
                        <input type="text" wire:model='footer_location' name="location" id="location" class="form-control form-control-lg">
                        @else
                        <input type="text" disabled wire:model='footer_location' name="location" id="location" class="form-control form-control-lg">
                        
                        @endif
                        
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        @if ($footer_email != null)
                        <input type="text" wire:model='footer_email' name="email" id="email" class="form-control form-control-lg">
                        @else
                        <input type="text" disabled wire:model='footer_email' name="email" id="email" class="form-control form-control-lg">
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
