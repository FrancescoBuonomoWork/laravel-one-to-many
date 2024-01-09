@extends('layouts.app')

@section('content')


    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul>
                        <li>{{$project->name}}</li>
                        <li>{{$project->language}}</li>
                    </ul>
                    
                    
                </div>
            </div>
        </div>
    </section>
@endsection