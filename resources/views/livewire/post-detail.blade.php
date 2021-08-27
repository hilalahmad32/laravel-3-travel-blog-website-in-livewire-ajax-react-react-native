<div>
    <x-slot name="title">Post-detail</x-slot>
    @livewire('setting')
    <!-- bg image  start-->
    <div class="bg-image" style="background-image: url('{{asset('images/cart-6.jpg')}}');">
        <h1 class="text-center">{{$postsDetail->title}}</h1>
    </div>
    <!-- bg image  end-->

    {{-- Post detail Start --}}
    <div class="container my-5">
        <div class="row">
            <div class="col-xl-8 col-md-8 col-sm-12 my-3">
                <div class="blog-image">
                    <img src="{{$postsDetail->image}}" alt="">
                </div>
                <div class="my-3">
                    <h4 class="title">{{$postsDetail->title}}</h4>
                </div>
                <div class="my-3">
                    <p>
                        {{$postsDetail->description}}
                    </p>
                </div>
                <div class="row d-flex justify-content-between">
                    <div class="col-sm-6 my-3">
                        Share
                    </div>
                    <div class="col-sm-6 my-3">
                        <div class="gray">
                            <img src="{{asset('svg/heart.svg')}}" class="svg" alt=""> <span>{{count($total_likes)}}</span>
                            <img src="{{asset('svg/eye.svg')}}" class="svg" alt=""> <span>{{$postsDetail->views}}</span>
                            <img src="{{asset('svg/comment.svg')}}" class="svg" alt=""> <span>{{count($comments)}}</span>
                        </div>
                    </div>
                </div>
               <div class="row">
                   <div class="col-3 blue">
                       <div id="icons" wire:click.prevent="likes({{$postsDetail->id}})">
                        @if ($likes)
                        <i class="fas fa-thumbs-up"></i>
                        <span class="ml-1">Like ( {{$likes}} )</span>  
                        @else
                        <i class="far fa-thumbs-up"></i>
                        <span>Like ( {{$likes}} )</span>  
                        @endif
                        
                       </div>
                   </div>
                   <div class="col-3 light-red">
                    <div id="icons" wire:click.prevent="love({{$postsDetail->id}})">
                       
                        @if ($love)
                        <i class="fas fa-heart"></i>
                        <span class="ml-1">Love ( {{$love}} )</span>  
                        @else
                        <i class="far fa-heart"></i>
                        <span>Love ( {{$love}} )</span> 
                        @endif
                    
                    </div>
                </div>
                   <div class="col-3 yellow">
                       <div id="icons" wire:click.prevent="sad({{$postsDetail->id}})">
                        @if ($sad)
                        <i class="fas fa-sad-tear"></i>
                        <span class="ml-1">Love ( {{$sad}} )</span>  
                        @else
                        <i class="far fa-sad-tear"></i>
                        <span>Sad ( {{$sad}} )</span>
                        @endif
                      
                       </div>
                   </div>
                   <div class="col-3 red" >
                       <div id="icons" wire:click.prevent="angry({{$postsDetail->id}})">
                        @if ($angry)
                        <i class="fas fa-angry"></i>
                        <span class="ml-1">Angry ( {{$angry}} )</span>
                        @else
                        <i class="far fa-angry"></i>
                        <span>Angry ( {{$angry}} )</span>
                        @endif
                        
                       </div>
                   </div>
               </div>
               <div class="comments my-5">
                <form  wire:submit.prevent='comment({{$postsDetail->id}})' class="form-bg-color">
                    <h4 class="my-2">Comment</h4>
                    <div class="form-group">
                        <input type="text" wire:model="name" name="name" id="name" placeholder="Name" class="custom-form">
                       @error('name')
                       <span class="text-danger my-2">{{$message}}</span>
                       @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="comment" wire:model="comment" id="comment" cols="30" rows="10" placeholder="Comment" class="custom-form"></textarea>
                        @error('comment')
                        <span class="text-danger my-2">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" style="outline: none;" class="read-more">Message</button>
                    </div>
                </form>
               </div>
               @forelse ($comments as $comment)
               <div class="card my-3">
                <div class="card-header">
                    <h3>{{$comment->name}}</h3>
                </div>
                <div class="card-body">
                    <p>
                        {{$comment->comment}}
                    </p>
                </div>
            </div>
               @empty
                   <h4>Comment Not Found</h4>
               @endforelse
             
            </div>
            <div class="col-xl-4 col-md-4 col-sm-12">
                <div class="category">
                    <h4 class="my-3">Category</h4>
                @forelse ($categorys as $category)
                    <div class="d-flex justify-content-between align-items-baseline">
                       <a href="{{ route('category-post', [$category->category_name]) }}">
                        <span class="h5">{{$category->category_name}}</span>
                       </a>
                       <span class="h5">{{$category->posts}}</span>
                    </div>
                    <hr>
                @empty
                    <h5>Record Not Found</h5>
                @endforelse
            </div>
                <div class="popular-article my-4">
                    <h5 class="my-4">Popular Article</h5>

                    <div class="row">
                        @forelse ($posts as $post)
                        <div class="col-lg-4 col-md-2 col-sm-2 my-3">
                            <div class="pop-img">
                                <img src="{{asset('storage')}}/{{$post->image}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-10 col-sm-10">
                            <a href="{{ route('post-detail', [$post->title]) }}" wire:click='update("{{$post->id}}")' class="title h6">{{$post->title}}</a>
                            <div class="icons">
                                <img src="{{asset('svg/calendar.svg')}}" style="width: 5%;" class="ml-1" alt=""> <span class="ml-1">Octubar 12, 2000</span>
                                <img src="{{asset('svg/user-md.svg')}}" style="width: 5%;" class="ml-1" alt=""> 
                                @if ($post->users->roll == 1)
                                <span class="ml-1"> Admin </span>
                                @else
                                <span class="ml-1"> {{substr($post->users->name,0,10)}} </span>
                                @endif
                                <img src="{{asset('svg/comment.svg')}}" style="width: 5%;" class="ml-1" alt=""> <span class="ml-1">{{count($comments)}}</span>
                             </div>
                        </div>
                        @empty
                            <h4>Record Not Found</h4>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Post detail End --}}



</div>
