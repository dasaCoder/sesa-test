@extends('layouts.master')

@section('content')

    <div class="row" style="padding-top: 10px">
        <div class="col-md-8 col-md-offset-2">
            <form action="{{url('forum/question/add')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <lable>Add Title</lable>
                    <input  type="text" name="title" class="form-control">

                </div>



                <textarea name="body" id="" cols="20" rows="30"></textarea>
                <br>


                <input type="submit" class="btn btn-success" >

            </form>
        </div>


    </div>
    @endsection