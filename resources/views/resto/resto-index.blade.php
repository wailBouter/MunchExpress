@extends('layouts.app')

@section('content')
<div class="container">

    <resto-group :restos="{{ json_encode($restos) }}" ></resto-group>

</div>
@endsection