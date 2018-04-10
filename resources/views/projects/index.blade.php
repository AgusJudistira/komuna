@extends('layouts.app')


@section('content')

<div class="container">
    <form style="z-index: 3; position: fixed; bottom: 50px; right: 50px;" action="/projects/create" method="post" role="form">
        {{ csrf_field() }}
        <button id="start_project" name="start_project" value="start_project" type="submit"><b>Nieuwe<br>project<br>starten</b></button>
    </form>

    <div class="row">
        <div class="form-group col-md-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-inline col-md-12" action="projects.index" method="post" role="form">
                        {{ csrf_field() }}
                        
                        <label class="control-label control-label-right col-md-4" for="searchstring">Opzoeken in projecttitel en -beschrijving: </label>
                        
                        <input id="searchstring" name="searchstring" class="form-control col-md-7" data-role="text" type="text">
                        
                        <div class="col-md-1">
                            <button id="zoek" name="zoek" value="zoek" type="submit" class="btn btn-info btn-lg">Zoek</button>
                        </div>              
                        
                    </form>
                </div>
                
            </div>
        </div>
        <br /><br />

        <div class="col-md-12">        
            @foreach ($listed_projects as $project)                
                <div class="form-group">
                    <div class="card">
                        <div class="card-header">  
                            <a href="/projects/{{$project[1]->id}}">
                                <span style="font-size: 22px;">{{ $project[1]->name }}</span>
                                {{-- <div class="card-text col-md-12"><h4>{{ $project[1]->name }}</h4></div> --}}
                            </a>                        
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12 row">
                                    
                                    <b><div class="card-text col-md-12 mb-3">{{ $project[1]->description }}</b></div>
                                    <div class="card-text col-md-3 text-right">Straatnaam & nummer: </div><div class="card-text col-md-7">{{ $project[1]->streetname_number }}</div>
                                    <div class="card-text col-md-3 text-right">Postcode & plaats: </div><div class="card-text col-md-7">{{ $project[1]->postal_code }}  {{ $project[1]->city }}</div>
                                    
                                    <div class="card-text col-md-3 text-right">Startdatum: </div><div class="card-text col-md-7">{{ $project[1]->start_date }}</div>
                                    <div class="card-text col-md-3 text-right">Deadline: </div><div class="card-text col-md-7">{{ $project[1]->due_date }}</div>

                                </div>
                                <div class="col-md-12">
                                    Overeengekomen vaardigheden en competenties:
                                </div>
                                <div class="col-md-12">                                    
                                    @foreach ($project[2] as $skill)
                                        <span class="badge badge-pill badge-warning">
                                            {{$skill['skill']}}
                                        </span>
                                    @endforeach
                                </div>
                                <div class="col-md-12">
                                    @foreach ($project[3] as $competence)
                                        <span data-toggle="tooltip" title='{{$competence->description}}' class="badge badge-pill badge-success">
                                            {{$competence['competence']}}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            @if ($project[1]->enough_members)
                                <p class="text-danger">Er zijn al genoeg vrijwilligers. Ledenwerving gestopt</p>
                            @endif
                        </div>
                    </div>
                </div>                
            @endforeach
        </div>   
    </div>         
</div>
@endsection



