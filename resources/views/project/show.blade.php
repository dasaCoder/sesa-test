@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="men-thumb-item" >
                    <h3 class="auth-title blog-title">{{$project->title}}</h3>
                    <p class="auth-img">
                        <img src="{{url($project->filepath)}}"  class="" alt="">
                    </p>

                    <div class="auth-msg"> {!! $project->body !!}</div>
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div></div>

    @stop