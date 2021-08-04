@extends('layouts.dashboard')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create New Car Listing</h1>
    <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
</div>
<div>
    <div class='alert alert-success' role='alert' style="padding:0;">
        {{$status}}
    </div>

</div>

<form method="post" action="/create" enctype="multipart/form-data">
    <!-- Content Row -->
    @csrf
    <input type="hidden" value="{{ Auth::user()->id }}" name="userid" />
    <div class="row ml-1 fluid">
        <!--car details-->
        <div class="card">
            <div class="card-header" style="background:#ffffff;">
                Enter your Car Details
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 p-2">
                        <label for="make" class="form-label">make/model</label>
                        <select class="form-select" id="make" name="make" aria-label="make/model">
                            @foreach($make as $make)
                            <option value="{{$make['id']}}">
                                {{$make['make']}}
                            </option>

                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="mileage" class="form-label">mileage(in km)</label>
                        <input type="number" class="form-control" name="mileage" id="mileage"
                            aria-label="mileage in km" />

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 p-2">
                        <label for="make_year" class="form-label">Year of manufacture</label>
                        <select class="form-select" name="make_year" id="make_year" aria-label="year of manufacture">
                            @for($i=2021;$i>=1995;$i--) <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="body_type" class="form-label">body type</label>
                        <select class="form-select" name="body_type" id="body_type" aria-label="body type">
                            @foreach($body as $body)
                            <option value="{{$body['id']}}">
                                {{$body['body']}}
                            </option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 p-2">
                        <label for="condition" class="form-label">condition</label>
                        <select class="form-select" name="condition" id="condition" aria-label="condition">
                            @foreach($condition as $condition)
                            <option value="{{$condition['id']}}">
                                {{$condition['contition']}}
                            </option>

                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="transmission" class="form-label">transmission</label>
                        <select class="form-select" name="transmission" id="transmission" aria-label="transmission">
                            @foreach($transmission as $transmission)
                            <option value="{{$transmission['id']}}">
                                {{$transmission['transmission']}}
                            </option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 p-2">
                        <label for="duty" class="form-label">duty</label>
                        <select class="form-select" name="duty" id="duty" aria-label="condition">
                            @foreach($duty as $duty)
                            <option value="{{$duty['id']}}">
                                {{$duty['duty']}}
                            </option>

                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="price" class="form-label">price</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">KSH</span>
                            </div>
                            <input type="text" id="price" name="price" class="form-control" placeholder="0.00"
                                aria-label="price" />
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">
                                    <div class="form-check">
                                        <input class="form-check-input mt-1" type="checkbox" name="negotiable"
                                            value="negotiable" id="negotiable">
                                        <label class="form-check-label" for="negotiable">
                                            Negotiable
                                        </label>
                                    </div>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!--end car details-->
        <!--pictures-->
        <div class="card mt-2">
            <div class="card-header" style="background:#ffffff;">
                Upload Car Pictures
            </div>
            <div class="card-body">
                <div class="row">
                    <label for="file" class="form-label">Upload Car Images</label>
                    <div class="col-md-12 p-2">


                        <input class="form-control form-control-lg" name="file[]" data-show-upload="false"
                            data-show-caption="true" data-min-file-count="2" data-overwrite-initial="false" id="file"
                            type="file" multiple>
                        <!--<div id="dropContainer" class="bg-secondary text-white text-center border-pill"
                            style="border:1px solid black;height:100px; border-radius:20px;padding-top:10%;padding-bottom:10%;">
                            <i class="fas fa-upload">&nbsp;&nbsp;</i>Drop Here
                        </div>-->
                        </input>
                    </div>

                </div>


            </div>

        </div>
        <!--end pictures-->
        <!--your location-->
        <div class="card mt-2">
            <div class="card-header" style="background:#ffffff;">
                Your Location
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 p-2">
                        <label for="location" class="form-label">select your location</label>
                        <select class="form-select" id="location" name="location" aria-label="location">
                            @foreach($location as $location)
                            <option value="{{$location['id']}}">
                                {{$location['location']}}
                            </option>

                            @endforeach
                        </select>
                    </div>

                </div>


            </div>

        </div>
        <!--end your location-->
        <!--more features-->
        <div class="card mt-2">
            <div class="card-header" style="background:#ffffff;">
                more features
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 p-2">
                        <label for="fuel" class="form-label">fuel type</label>
                        <select class="form-select" id="fuel" name="fuel" aria-label="fuel">
                            @foreach($fuel as $fuel)
                            <option value="{{$fuel['id']}}">
                                {{$fuel['fuel']}}
                            </option>

                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="interior" class="form-label">interior</label>
                        <select class="form-select" id="interior" name="interior" aria-label="interior">
                            @foreach($interior as $interior)
                            <option value="{{$interior['id']}}">
                                {{$interior['interior']}}
                            </option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 p-2">
                        <label for="mcolor" class="form-label">color</label>
                        <select class="form-select" id="color" name="color" aria-label="color">
                            @foreach($color as $color)
                            <option value="{{$color['id']}}">
                                {{$color['color']}}
                            </option>

                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="engine_type" class="form-label">engine size (in cc)</label>
                        <input type="number" class="form-control" id="engine_size" name="engine_size"
                            aria-label="engine size" />

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 p-2">
                        <label for="descr" class="form-label">description</label>
                        <div class="form-input">
                            <textarea type="text" id="descr" name="descr" class="form-control"
                                aria-label="description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 p-2">
                        <label class="form-label">Select all that Apply</label>

                        <div class="row ml-4">
                            @foreach($vehfeatures as $features)
                            <div class="form-check col-md-3">
                                <input class="form-check-input" type="checkbox" value="{{$features['id']}}"
                                    name="otherfeatures[]" id="{{$features['feature']}}">
                                <label class="form-check-label" for="{{$features['feature']}}">
                                    {{$features['feature']}}
                                </label>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!--end more features-->
        <!--submit-->
        <div class="card mt-2">
            <div class="row justify-content-md-center">
                <div class="col-md-6 col-offset-4">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check">&nbsp;&nbsp;</i>CREATE
                        LISTING</button>
                </div>
            </div>
        </div>
        <!--end submit-->
    </div>
</form>

<!-- Content Row -->

<script>
// dragover and dragenter events need to have 'preventDefault' called
// in order for the 'drop' event to register.
// See: https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/Drag_operations#droptargets
/*dropContainer.ondragover = dropContainer.ondragenter = function(evt) {
    evt.preventDefault();
};

dropContainer.ondrop = function(evt) {
    // pretty simple -- but not for IE :(
    fileInput.files = evt.dataTransfer.files;

    // If you want to use some of the dropped files
    const dT = new DataTransfer();
    dT.items.add(evt.dataTransfer.files[0]);
    dT.items.add(evt.dataTransfer.files[3]);
    fileInput.files = dT.files;

    evt.preventDefault();
};*/
</script>

@endsection