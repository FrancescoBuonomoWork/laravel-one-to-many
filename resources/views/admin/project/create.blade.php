@extends('layouts.app')

@section('content')
    
<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{route('admin.project.store')}}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome progetto</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>

                    <div class="mb-3">
                        <label for="types_id" class="form-label">Categories</label>
                        <select name="types_id" class="form-control" id="types_id">
                          <option>Seleziona una tipo</option>
                          @foreach($types as $type)
                            <option @selected( old('types_id') == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
                          @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Aggiungi</button>
                </form>
                {{-- questo if mi permette di vedere il messaggio di errore quando creo un elemento  --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            </div>
        </div>
    </div>
</section>
@endsection