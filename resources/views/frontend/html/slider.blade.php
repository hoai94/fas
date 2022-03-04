<section class="p-0 my-home-slider">
    <div class="slide-1 home-slider">        
        @foreach ($sliders as $slider)
        <div>
            <a href="{{$slider->url}}" class="home text-center">
                <img src="{{$slider->image}}" alt="{{$slider->name}}" class="bg-img blur-up lazyload">
            </a>
        </div>
        @endforeach
    </div>
</section>