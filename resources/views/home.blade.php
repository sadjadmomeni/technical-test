@extends('layouts.app')

@section('content')
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Turbines</div>

                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="list-group" id="list-tab" role="tablist">
                                @foreach ($turbines as $turbine)
                                    <a class="list-group-item list-group-item-action" id="turbine-{{$turbine->id}}" data-toggle="list">{{$turbine->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div id="viewDiv">
            </div>
        </div>
    </div>
</div>
@include('scripts.map')
@endsection

