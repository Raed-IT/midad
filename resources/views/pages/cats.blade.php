@extends('layout.master')

@section('content')
    <section class="mt-1 mt-md-3 mt-lg-4 mb-5">
        <div class="container">
            <div class="row mb-1 mb-md-3 mb-lg-4">
                <div class="col">
                    <p class="mb-0 statics-head">{{__('words.All_Cats')}}</p>
                </div>
            </div>
            <div class="d-xl-flex justify-content-xl-center">
                <div class="main">
                    <ul class="cards">

                        @foreach($courses as $course)
                            <li class="cards_item">
                                <a href="{{route('course_details',$course->id)}}">
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
