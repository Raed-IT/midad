@extends('layout.master')

@section('content')

    <section class="hero-slider mt-1 mt-md-2 mt-lg-4 mb-1 mb-md-3 mb-lg-4 px-2">
        <div class="container">
            <div id="owl-carousel" class="owl-carousel owl-theme">

                @foreach($courses as $course)
                <div class="item">
                    <div class="row p-0 p-md-4">
                        <div class="col text-start col-12 col-md-6 p-2 px-md-5">
                            <p class="text-heder-slider">{{$course->getTranslation('description',app()->getLocale())}}</p>
                            <button class="btn-slider py-2 mt-2" type="button">{{__('words.more')}}</button>
                        </div>
                        <div class="col align-self-center col-12 col-md-6 order-first order-md-last"><img class="slider-img" src="{{$course->image}}"></div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="mt-1 mt-md-3 py-3 mb-1 mb-md-3 mb-lg-4">
        <div class="container">
            <div class="row">
                <div class="col p-0 p-md-3 col-12 col-md-6 col-lg-3">
                    <div class="statics-div h-100">
                        <p class="statics-head text-center">2M+</p>
                        <p class="statics-info text-center">{{__('words.People_WorldWide')}}</p>
                    </div>
                </div>

                <div class="col p-0 p-md-3 col-12 col-md-6 col-lg-3">
                    <div class="statics-div h-100">
                        <p class="statics-head text-center">200+</p>
                        <p class="statics-info text-center">{{__('words.course')}}</p>
                    </div>
                </div>

                <div class="col p-0 p-md-3 col-12 col-md-6 col-lg-3">
                    <div class="statics-div h-100">
                        <p class="statics-head text-center">1200+</p>
                        <p class="statics-info text-center">{{__('words.subject')}}</p>
                    </div>
                </div>

                <div class="col p-0 p-md-3 col-12 col-md-6 col-lg-3">
                    <div class="statics-div h-100">
                        <p class="statics-head text-center">4000+</p>
                        <p class="statics-info text-center">{{__('words.train_houre')}}</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="mb-1 mb-md-3 mb-lg-4">
        <div class="container container-fluid">
            <div class="row mb-1">
                <div class="col">
                    <p class="mb-0 statics-head">{{__('words.categories')}}</p>
                </div>
                <div class="col text-end"><a class="btn btn-primary btn-slider" role="button" href="{{route('show_cats')}}">{{__('words.Browse_All')}}&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-right">
                            <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"></path>
                        </svg></a></div>
            </div>
            <div class="row">
                <div class="col p-0 p-md-4 text-center col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="cat-div"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-palette-fill course-icon col-12">
                            <path d="M12.433 10.07C14.133 10.585 16 11.15 16 8a8 8 0 1 0-8 8c1.996 0 1.826-1.504 1.649-3.08-.124-1.101-.252-2.237.351-2.92.465-.527 1.42-.237 2.433.07zM8 5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm4.5 3a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM5 6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path>
                        </svg>
                        <p class="mb-1 course-cat col-12">Business</p>
                        <p class="cat-number col-12">400+ course</p>
                    </div>
                </div>

                @foreach($categories as $category)
                <div class="col p-0 p-md-4 text-center col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="cat-div"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person-fill-gear course-icon col-12">
                            <path d=
                                  "M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"></path>
                        </svg>
                        <p class="mb-1 course-cat col-12">{{$category->name,App()->getLocale()}}</p>
                        <p class="cat-number col-12">10+ {{__('words.course')}}</p>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
    </section>

    <section class="mt-1 mt-md-3 mt-lg-4 mb-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="mb-0 statics-head">{{__('words.Our_Traducians_Courses')}}</p>
                </div>
                <div class="col text-end">
                    <a class="btn btn-info btn-slider" href="{{route('show_courses')}}" type="link">{{__('words.Browse_All')}}&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-right">
                            <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"></path>
                        </svg></a>
                </div>
            </div>
            <div class="d-xl-flex justify-content-xl-center">
                <div class="main">
                    <ul class="cards">
                        @foreach($courses as $course)
                        <li class="cards_item">
                            <a href="{{route('course_details',$course)}}">


                            <div class="card">
                                <div class="card_image mt-5"><img src="{{$course->image}}" alt="mixed vegetable salad in a mason jar" width="376" height="auto" max-width="376" style="margin-top: -25px;margin-left: 24px;"></div>
                                <div class="card_content">
                                    <h1 class="card_title">{{$course->title,App()->getLocale()}}</h1>
                                    <div class="card_text">
                                        <p class="text_boxes text_1">{{$course->description,App()->getLocale()}}</p>
                                        <p class="text_boxes text_2">it’s not always feasible. The dog motel offers safe, fun, and trustworthy overnight dog boarding services.&nbsp; Your dog will enjoy a full day of play in our facility on 10 acres.&nbsp;You can rest assured you dog will be well cared for &amp; have the time of their lives<br><br></p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </li>
                        @endforeach



                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection
