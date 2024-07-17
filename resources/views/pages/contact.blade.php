{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--   <title>--}}
{{--       {{$page_name}}--}}
{{--   </title>--}}
{{--</head>--}}
{{--<body>--}}
{{--    <h1> {{$page_name}}</h1>--}}
{{--    <p>--}}
{{--        {{$Description}}--}}
{{--    </p>--}}
{{--</body>--}}
{{--</html>--}}

@extends('master.master')

@section("title" )
    {{$page_name}}

@endsection
@section("content")
        <h1> {{$page_name}}</h1>
        <p>
            {{$Description}}
        </p>
@endsection
@section('sidebar')
    @parent
    <br> THis sideBar from contact page
@endsection

