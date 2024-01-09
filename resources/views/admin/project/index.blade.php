@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 py-5">
                    <h1 class="title">I tuoi progetti</h1>
                    <a href="{{route('admin.project.create')}}" class="btn btn-success">Aggiungi progetto</a>
                </div>
                @forelse ($projects as $project)
                    <div class="col-3">
                        <a href="{{route('admin.project.show',$project->id)}}">

                            <div class="card">
                                <h5 class="card-title">{{$project->name}}</h5>
                                <ul>
                                    {{-- <li>{{$project->name}}</li> --}}
                                    <li>{{isset($project->type) ? $project->type->name : '-'}}</li>
                                 
                               
                                    <li><a class="btn btn-sm btn-primary" href="{{route('admin.project.edit',$project)}}">Edit</a></li>

                                    <li>
                                        <form action="{{route('admin.project.destroy',$project)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>   
                @empty
                    
                @endforelse
               
            </div>
        </div>
    </section>
@endsection