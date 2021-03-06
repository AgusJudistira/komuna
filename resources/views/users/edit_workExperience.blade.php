@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="form-group">
                <div class="card">
                    <div class="card-header">  
                        <h4>Voeg werkervaring toe</h4>                      
                    </div>
                    <!-- Organization -->
                    <form class="form-group mt-4" method="POST" action="{{route('users.update_workExperience', $user)}}">
                        {{csrf_field()}}
                        <input id="user_id" type="text" class="form-control d-none" name="user_id" value="{{ Auth::guard('web')->user()->id}}" required>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Organisatie') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- Start date -->
                        <div class="form-group row">
                            <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('start datum') }}</label>
                            <div class="col-md-6">
                                <input id="start_date" type="date" class="form-control" name="start_date" value="" required>
                                @if ($errors->has('start_date'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- end date -->
                        <div class="form-group row">
                            <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('eind datum') }}</label>
                            <div class="col-md-6">
                                <input id="end_date" type="date" class="form-control" name="end_date" value="">
                                @if ($errors->has('end_date'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('end_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- department -->
                        <div class="form-group row">
                            <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Afdeling') }}</label>
                            <div class="col-md-6">
                                <input id="department" type="text" class="form-control" name="department" value="" >
                                @if ($errors->has('department'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                          <!-- position -->
                        <div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Functie') }}</label>
                            <div class="col-md-6">
                                <input id="position" type="text" class="form-control" name="position" value="" >
                                @if ($errors->has('position'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- job description -->
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('job description') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="description" rows="5"></textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div style="margin-top:12px;" class="col-md-10 text-right">
                                <button type="submit" class="btn btn-success" role="button">
                                    {{ __('Sla op') }}
                                </button> 
                            </div> 
                        </div>
                    </form>
                    <!-- back to skills -->
                    <div class="col-md-12">
                    <form class="col-md-2 float-left" method="GET" action="/users/{{Auth::user()->id}}/edit_skills"> 
                        <button type="submit" class="btn btn-primary ml-auto" role="button">
                            {{ __('Vorige') }}
                        </button> 
                    </form>
                    <!-- forward to studyexperience-->
                    <form class="col-md-2 float-right" method="GET" action="/users/{{Auth::user()->id}}/edit_studyExperience"> 
                         <button type="submit" class="btn btn-primary ml-auto" role="button">
                             {{ __('Volgende') }}
                         </button> 
                    </form>  
                    </div>
                    <!-- workexperience -->
                    <div class="card-header">  
                        <h5>Werkervaring</h5>                      
                    </div>
                        <div class="row">
                            <div class="col-md-12">
                            <table class="table table-striped col-md-12">
                                <tr>
                                    <th>Organisatie</th>
                                    <th>Functie</th>                
                                    <th>Begonnen op</th>                                
                                    <th>Beindigd op</th>                
                                </tr>
                                @foreach ($workExperiences as $workExperience)
                                    <tr>
                                        <td> {{$workExperience->name}}</td>
                                        <td> {{$workExperience->position}}</td>
                                        <td> {{$workExperience->start_date}}</a></td>
                                        @if($workExperience->end_date == null)
                                        <td> Nog bezig </td>
                                        @else
                                        <td> {{$workExperience->end_date}}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                            </div>
                        </div>                    
                 <!-- Not in function right now -->
                <div class="d-none">
                    <!-- reference  -->
                    <form class="form-group" method="POST" action="/">
                        <div class="card-header">  
                            <h5>Voeg referentie toe</h5>                      
                        </div>
                        <div class="form-group row mt-4">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Naam') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required>
                                @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- number -->
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telefoonnummer') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="" required>
                                @if ($errors->has('phone'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>                    
                        <!-- email -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="" required>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection