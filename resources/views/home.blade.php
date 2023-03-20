@extends('layouts.app')

@section('content')
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-4">
            <turbine-component :farm={{$farm}}></example-component>
        </div>
        <div class="col-md-8">
            <div id="viewDiv">
            </div>
        </div>
    </div>
</div>
@include('scripts.map')
@endsection

