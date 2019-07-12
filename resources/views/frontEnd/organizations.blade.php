@extends('layouts.app')
@section('title')
Organizations
@stop
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


<style type="text/css">
.table a{
    text-decoration:none !important;
    color: rgba(40,53,147,.9);
    white-space: normal;
}
.footable.breakpoint > tbody > tr > td > span.footable-toggle{
    position: absolute;
    right: 25px;
    font-size: 25px;
    color: #000000;
}
.ui-menu .ui-menu-item .ui-state-active {
    padding-left: 0 !important;
}
ul#ui-id-1 {
    width: 260px !important;
}
#map{
    position: fixed !important;
}
</style>

@section('content')
@include('layouts.filter')
<div class="wrapper">
    @include('layouts.sidebar')
    <!-- Page Content Holder -->
    <div id="content" class="container">
        <!-- <div id="map" style="height: 30vh;"></div> -->
        <!-- Example Striped Rows -->
        <div class="col-sm-12 p-20">
            @foreach($organizations as $organization)
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">
                        <a href="/organization/{{$organization->organization_recordid}}" class="notranslate">{{$organization->organization_name}}</a>
                    </h4>
                    <h4>Number of Services: @if(isset($organization->services))
                        {{$organization->services->count()}}
                        @else 0 @endif
                    </h4>
                    <h4 style="line-height:inherit">{!! str_limit($organization->organization_description, 200) !!}</h4>
                </div>
            </div>
            @endforeach
            <div class="example">
                <nav>
                    {{ $organizations->appends(\Request::except('page'))->render() }}
                </nav>
            </div>
            <!--             
            <div class="col-md-4 p-0">
                <div id="map" style="position: fixed !important;width: 28%;"></div>
            </div> -->
        </div>
    </div>
</div>

@endsection


