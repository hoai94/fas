<section class="">
    <div class="section-padding container-fluid bg-image text-center overlay-light90" data-background-img="img/bg/bg_5.jpg" data-bg-position-x="center center">
        <div class="container">
            <h2 class="page-title">Shop by Categories</h2>
        </div>
    </div>
    <div class="container container-margin-minus-t">
        <div class="row">
            @foreach ($banner as $item)
            <div class="col-md-4">
                <div class="categories-box">
                    <div class="categories-image-wrap">
                        <img src="{{$item->image}}" alt="{{$item->image}}" />
                    </div>
                    <div class="categories-content">
                        <a href="#">
                            <div class="categories-caption">
                                <h6 class="normal">{{$item->name}}</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
           
        
        </div>
    </div>
</section>