@extends('layouts.app')

@section('content')
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-6">
            
            <div class="card">
                <div class="card-header">Farms</div>

                <div class="card-body">
                    <div class="list-group">
                        @foreach ($farms as $farm)
                            <a href="/farms/{{$farm->id}}" class="list-group-item list-group-item-action">{{$farm->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>   
        </div>
        
    </div>
</div>
@include('scripts.map')
@endsection

