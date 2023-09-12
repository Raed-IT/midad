@extends('layout.master')
@section('content')

    <div class="">

        <div class="container">
            <div class="row">
                <div class="col col-12 col-md-6">
                    <div class="product-content">
                        <h2 class="product-title text-center">{{$course[0]->getTranslation('title',app()->getLocale())}}</h2>
                        <div class="product-rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><span>4.7(21)</span></div>
                        <div class="product-price"></div>
                        <div class="product-detail">
                            <h2>about this item: </h2>
                            <p>{{$course[0]->getTranslation('description',app()->getLocale())}}</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, perferendis eius. Dignissimos, labore suscipit. Unde.</p>
                        </div>
                        <div>
                            <h1 class="text-center">تشغيل الفيديو</h1><iframe width="98%" height="315" src="https://www.youtube.com/embed/9d8HCxOoSWo?si=eDTuZccBRGRRFAoU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <div class="purchase-info d-flex align-items-center justify-content-center"><label class="form-label upload-btn text-center py-2 px-1" for="upload">ارفع الوظيفة</label><input class="invisible" type="file" id="upload" multiple=""></div>
                    </div>
                </div>
                <div class="col col-12 col-md-6 order-first order-md-last">
                    <div class="product-imgs">
                        <div class="img-display">
                            <div class="img-showcase"><img src="{{$course[0]->image}}" alt="shoe image">
                                <img src="{{$course[0]->image}}" alt="shoe image">
                                <img src="{{$course[0]->image}}" alt="shoe image">
                                <img src="{{$course[0]->image}}" alt="shoe image"></div>
                        </div>
                        <div class="img-select">
                            <div class="img-item"><a href="#" data-id="1"><img src="{{$course[0]->image}}" alt="shoe image"></a></div>
                            <div class="img-item"><a href="#" data-id="2"><img src="{{$course[0]->image}}" alt="shoe image"></a></div>
                            <div class="img-item"><a href="#" data-id="3"><img src="{{$course[0]->image}}" alt="shoe image"></a></div>
                            <div class="img-item"><a href="#" data-id="4"><img src="{{$course[0]->image}}" alt="shoe image"></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
