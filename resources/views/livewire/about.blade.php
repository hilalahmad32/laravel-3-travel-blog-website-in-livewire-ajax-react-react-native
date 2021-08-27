<div>
    <!-- about start -->
    <div class="container my-5">
        <h1 class="text-center my-3">About US</h1>
        <div class="row">
            <div class="col-md-6 col-sm-12 my-3">
                <div class="about-img">
                    <img src="{{asset("storage")}}/{{$about->about_image}}" alt="">
                </div>
            </div>
            <div class="col-md-6 col-sm-12 my-3">
                @php
                    echo $about->about_des;
                @endphp
            </div>
        </div>
    </div>
    <!-- about end -->
</div>
