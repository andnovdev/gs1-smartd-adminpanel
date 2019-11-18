<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
                <img src="{{ asset(config('village.img', 'lib/images/img_1.jpg')) }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-5 ml-auto pl-md-5">
                <span class="text-cursive h5 text-red">About Us</span>
                <h3 class="text-black">{{config('general.tagline', 'Bring Fun Life To Your Kids')}}</h3>
                <p><span>{{config('village.desc', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati inventore deserunt mollitia labore, nisi eius fugit, vero minus id ipsam architecto aliquid, minima odio earum nemo nostrum. Magnam, voluptatum iusto.')}}</span></p>

                <p class="mt-5"><a href="{{route('about')}}" class="btn btn-warning py-4 btn-custom-1">More About Us</a></p>
            </div>
        </div>
    </div>
</div>
