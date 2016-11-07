@extends('layouts.main')
@section('slideshow')


        <div class="deco deco--title"></div>
        <div id="slideshow" class="slideshow" style="margin-top: 10%;">

            @foreach($product as $pro)
                @if($pro->destacado == 'on')
                <div class="slide">
                    <h2 class="slide__title slide__title--preview">{{$pro->nombre_producto}}<span class="slide__price">s/.{{$pro->precio}}</span></h2>
                    <div class="slide__item">
                        <div class="slide__inner">
                            <img class="slide__img slide__img--small" src="{{$pro->imagen1}}" alt="Some image" />
                            <button class="action action--open" aria-label="View details"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="slide__content">
                        <div class="slide__content-scroller">
                            <img class="slide__img slide__img--large" src="{{$pro->imagen1}}" alt="Some image" />
                            <div class="slide__details">
                                <h2 class="slide__title slide__title--main">{{$pro->nombre_producto}}</h2>
                                <p class="slide__description">{{$pro->descripcion}}</p>
                                <div>
                                    <span class="slide__price slide__price--large">s/.{{$pro->precio}}</span>
                                    <button class="button button--buy">Add to cart</button>
                                </div>
                            </div><!-- /slide__details -->
                        </div><!-- slide__content-scroller -->
                    </div><!-- slide__content -->
                </div>
                @endif

            @endforeach

            <button class="action action--close" aria-label="Close"><i class="fa fa-close"></i></button>
        </div>

@endsection
@section('content')
@endsection
@section('footer')
    <script>
        (function() {
            document.documentElement.className = 'js';
            var slideshow = new CircleSlideshow(document.getElementById('slideshow'));


            $("#uploadfile").on("change", function () {
                alert();
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagen_load2').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

            });

        })();
    </script>
@endsection
