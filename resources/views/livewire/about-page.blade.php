<div>
    <x-slot name="title">About</x-slot>
    @livewire('setting')
        <!-- bg image  start-->
    <div class="bg-image" style="background-image: url('images/cart-3.jpg');">
        <h1 class="text-center">About Page</h1>
    </div>
    <!-- bg image  end-->

        <!-- about start -->
        <div class="container my-5">
            <h1 class="text-center my-3">About US</h1>
            <div class="row">
                <div class="col-md-6 col-sm-12 my-3">
                    <div class="about-img">
                        <img src="{{asset("storage")}}/{{$about->about_image}}" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                   <p>
                      @php
                         echo $about->about_des
                      @endphp
                   </p>
                </div>
            </div>
        </div>
        <!-- about end -->
         {{-- success alert start --}}
    @if (session()->has("success"))
    <div class="alert alert-primary alert-fixed" role="alert">
      {{session("success")}}
      <span aria-hidden="true" id="close" class="ml-4 h4" style="cursor: pointer">&times;</span>
    </div>
    @endif
  
    {{-- success alert end --}}

    {{-- danger alert start --}}
    @if (session()->has("error"))
    <div class="alert alert-danger alert-fixed" role="alert">
      {{session("error")}}
      <span aria-hidden="true" id="close" class="ml-4 h4" style="cursor: pointer">&times;</span>

    </div>
    @endif

    {{-- danger alert end --}}

        <div class="container-fluid my-5 p-5 new-bg-image">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="newsLatter">
                        <h1>Subscribe For New Latter</h1>
                        <form wire:submit.prevent='submit'>
                            <div class="form-gorup">
                                <input type="text" wire:model="email" name="email" id="email" class="form-control my-4 form-contorl-lg">
                                <span class="text-danger "> 
                                    @error('email')
                                    <h5>{{$message}}</h5>
                                    @enderror </span>
                                <button type="submit" style='outline:none;' class="read-more">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
