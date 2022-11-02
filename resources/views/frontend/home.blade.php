@extends('layouts.frontend.app')

@section('title', 'Home')

@push('css')
    
@endpush

@section('content')
    <div class="gdlr-core-page-builder-body">
        <div class="gdlr-core-pbf-wrapper " style="padding: 0px 0px 0px 0px;">
            @include('frontend.home-page.welcome')
        </div>
        <div class="gdlr-core-pbf-wrapper " style="margin: -180px 0px 0px 0px;padding: 20px 0px 0px 0px;" data-skin="Hp3 Score" id="gdlr-core-wrapper-1">
            @include('frontend.home-page.schedule-one')
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 90px 0px 50px 0px;">
            @include('frontend.home-page.latest-news')
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 100px 0px 80px 0px;">
            @include('frontend.home-page.fixtures-results')
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 100px 0px 100px 0px;">
            @include('frontend.home-page.gallery')
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 100px 0px 60px 0px;">
            @include('frontend.home-page.schedule')
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 80px 0px 60px 0px;">
            @include('frontend.home-page.subscribe')
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 100px 0px 80px 0px;" id="gdlr-core-wrapper-2">
            @include('frontend.home-page.players')
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 100px 0px 80px 0px;">
            @include('frontend.home-page.sponsors')
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 100px 0px 40px 0px;" id="gdlr-core-wrapper-3">
            @include('frontend.home-page.top-scorers')
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 80px 0px 50px 0px;">
            @include('frontend.home-page.shop')
        </div>
    </div>
@endsection

@push('js')
    
@endpush