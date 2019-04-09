@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @foreach ($billets as $billet)
            <div class="col-md-12">
            <div class="card m-3">
                <div class="card-header">
                   <p> Title :  {{$billet->title}} </p>
                   <p> Auteur: </p>
                 </div>

                <div class="card-body">
                    <p>Created : {{$billet->created_at}}</p>

                    <div class="border border-secondary rounded p-3">
                        <h4>Content :</h4> 
                        <p> {{$billet->content}} </p>
                    </div> 

                    <div class="m-3">
                        <b>Tags :</b>
                        <p>{{$billet->tags}}</p>
                    </div>
                </div>

            </div>

            </div>
            @endforeach

            <a href="{{ url('/billet/new')}}" type="button" class="btn btn-primary btn-lg btn-block">Add billet</a>
        </div>
    </div>

@endsection