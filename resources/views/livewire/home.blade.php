<div>
  
    <x-slot name="title">Home</x-slot>
    @livewire('setting')
   @livewire('slider')
   @livewire('about')
   <!-- Categories start -->
   <div class="container my-5">
       <div class="text-center">
           <h1>Categories</h1>
       </div>
   </div>
   <div class="container my-5">
       <div class="row">
      @forelse ($categorys as $category)
          <div class="col-xl-4 col-md-6 col-sm-12 my-3">
               <div class="card">
                   <div class="card-header bg-white">
                       <div class="card-image">
                           <img src="{{asset("storage")}}/{{$category->image}}" alt="">
                       </div>
                   </div>
                   <div class="card-body title">
                       <h2>{{$category->category_name}}</h3>
                           <p>{{$category->posts}} Article</p>
                   </div>
                   <div class="card-footer bg-white">
                       <a href="{{ route('category-post', [$category->category_name]) }}">View</a>
                   </div>
               </div>
           </div>
      @empty
          <h3>Record Not Found</h3>
      @endforelse
       </div>
   </div>
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

   <!-- Categories End -->
   <div class="container-fluid my-5 p-5 new-bg-image">
       <div class="container">
           <div class="d-flex justify-content-center">
               <div class="newsLatter">
                   <h1>Subscribe For New Latter</h1>
                   <form wire:submit.prevent="submit">
                       <div class="form-gorup">
                           <input type="text" wire:model="email" name="email" class="form-control my-4 form-contorl-lg">
                           <span class="text-danger "> 
                               @error('email')
                               <h5>{{$message}}</h5>
                               @enderror </span>
                           <button type="submit" style="outline: none;" class="read-more">Subscribe</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
   <!-- articale start -->
   <div class="container my-5">
       <div class="text-center">
           <h1>Articales</h1>
       </div>
   </div>
   <div class="container my-5">
       <div class="row">
           @forelse ($posts as $post)
           <div class="col-xl-4 col-md-6 col-sm-12 my-3">
               <div class="blog-card">
                   <div class="blog-card-header">
                       <div class="blog-image">
                           <img src="{{asset("storage")}}/{{$post->image}}" alt="">
                       </div>
                   </div>
                   <div class="blog-card-body mt-2">
                       <a href="{{ route('post-detail', [$post->title]) }}" wire:click='update("{{$post->id}}")' class="my-3 title h5">{{$post->title}}</a>
                       <p class="my-3">
                           ${{substr($post->description,0,200)}} .....
                       </p>
                       <div class="row d-flex my-3">
                           <div class="col-3">
                            @if ($post->users->roll == 1)
                               <img src="{{asset('storage')}}/{{$post->users->image}}" class="responsve-image" alt="">
                               @else
                               <img src="{{asset('storage')}}/{{$post->users->image}}" class="responsve-image" alt="">

                               @endif
                           </div>
                           <div class="col-9">
                                       <h5 class="written">Written By</h5>
                                       <img src="{{asset('svg/user-md.svg')}}" style="width: 3%;" class="ml-1" alt=""> @if ($post->users->roll == 1)
                                       <span class="ml-1">Admin</span>
                                       @else
                                       <span class="ml-1">{{$post->users->name}}</span>
                                           
                                       @endif
                                       <img src="{{asset('svg/calendar.svg')}}" style="width: 3%;" class="ml-1" alt=""> <span class="ml-1">Octubar 12, 2000</span>
                                   </div>
                       </div>
                   </div>
                   <div class="blog-card-footer my-3">
                       <div class="gray">
                           <img src="{{asset('svg/heart.svg')}}" class="svg" alt=""> <span>{{count($total_likes)}}</span>
                           <img src="{{asset('svg/eye.svg')}}" class="svg" alt=""> <span>{{$post->views}}</span>
                           <img src="{{asset('svg/comment.svg')}}" class="svg" alt=""> <span>{{count($total_comments)}}</span>
                       </div>
                       <a href="{{ route('post-detail', [$post->title]) }}" class="read-more" wire:click='update("{{$post->id}}")'>Read More</a>
                   </div>
               </div>
           </div> 
           @empty
               <h3>Record Not Found</h3>
           @endforelse
       </div>

   </div>

   <div class="d-flex justify-content-center my-4">
       <a href="{{ route('blog') }}" class="read-more">More > </a>
   </div>
   <!-- articale end -->
   {{-- @endsection --}}
   
</div>

