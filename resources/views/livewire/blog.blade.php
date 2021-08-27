<div>
    <x-slot name="title">Blog</x-slot>
    @livewire('setting')
        <!-- bg image  start-->
    <div class="bg-image" style="background-image: url('{{asset('images/cart-6.jpg')}}');">
        <h1 class="text-center">Blog Page</h1>
    </div>
    <!-- bg image  end-->
    <!-- blog Aritcales Start -->
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
                            {{substr($post->description,0,200)}} ....
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
                                        <img src="{{asset('svg/user-md.svg')}}" style="width: 3%;" class="ml-1" alt=""> 
                                        @if ($post->users->roll == 1)
                                        <span class="ml-1">Admin</span>
                                        @else
                                        <span class="ml-1">Hilal Ahmad</span>
                                        @endif
                                        <img src="{{asset('svg/calendar.svg')}}" style="width: 3%;" class="ml-1" alt=""> <span class="ml-1">Octubar 12, 2000</span>
                                    </div>
                        </div>
                    </div>
                    <div class="blog-card-footer my-3">
                        <div class="gray">
                            <img src="{{asset('svg/heart.svg')}}" class="svg" alt=""> <span>3</span>
                            <img src="{{asset('svg/eye.svg')}}" class="svg" alt=""> <span>{{$post->views}}</span>
                            <img src="{{asset('svg/comment.svg')}}" class="svg" alt=""> <span>5</span>
                        </div>
                        <a href="{{ route('post-detail', [$post->title]) }}" wire:click='update("{{$post->id}}")' class="read-more">Read More</a>
                    </div>
                </div>
            </div>
            @empty
                <h1>Record Not Found</h1>
            @endforelse
           
        </div>
    </div>
    <!-- blog Aritcales End -->

    <!-- pagination start -->
    {{$posts->links()}}
    <!-- pagination End -->


</div>
