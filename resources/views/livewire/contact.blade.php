<div>

    <x-slot name="title">Contact</x-slot>
    @livewire('setting')
          <!-- bg image  start-->
      <div class="bg-image" style="background-image: url('images/cart-3.jpg');">
        <h1 class="text-center">About Page </h1>
    </div>
    <!-- bg image  end-->

    <!-- informaion start -->
    <div class="container p-5">
        <h1>Text Informaion</h1>
        <div class="row">
            <div class="col-md-3">
                Address : Pakistan
            </div>
            <div class="col-md-3">
                Phone : +9738367446
            </div>
            <div class="col-md-3">
                Email : ahilal203@gmail.com
            </div>
            <div class="col-md-3">
                Website : www.website.com
            </div>
        </div>
    </div>
    <!-- informaion end -->

    <!--Contact form Start  -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 my-3">
                <form wire:submit.prevent='contact' class="form-bg-color">
                    <div class="form-group">
                        <input type="text" wire:model="name" name="name" id="name" placeholder="Name" class="custom-form">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" wire:model="email" name="email" id="email" placeholder="Email" class="custom-form">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="message" wire:model="message" id="message" cols="30" rows="10" placeholder="Message" class="custom-form"></textarea>
                        @error('message')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" style="outline: none;" class="read-more">Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Contact form End  -->

</div>
