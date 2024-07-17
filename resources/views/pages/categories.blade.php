@extends('master.master')

@section("title","Testing Categories")

@section("content")
    <h1> Testing Categories</h1>
    <p>
        the category of id is {{$the_category_is}}
    </p>
@endsection

@section('sidebar')
    @parent
   <br>
    THis sideBar from cat page
@endsection
