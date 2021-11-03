@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{ route('appointments.store') }}" method="POST">
                    @csrf
                    <div class="card pb-2">
                        <div class="card-header">
                            Create appointment
                        </div>

                        <div class="list-group d-flex flex-row p-2 align-items-center">
                            <div class="flex-grow-1">
                                <label for="name">Name:</label>
                                <input name="name" type="text" class="col-12 form-control" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="list-group d-flex flex-row p-2 align-items-center">
                            <div class="flex-grow-1">
                                <label for="last_name">Surname:</label>
                                <input name="last_name" type="text" class="col-12 form-control" value="{{ old('last_name') }}">
                            </div>
                        </div>

                        <div class="list-group d-flex flex-row p-2 align-items-center">
                            <div class="flex-grow-1">
                                <label for="email">Email:</label>
                                <input name="email" type="text" class="col-12 form-control" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="list-group p-2">
                            <label for="phone">Phone:</label>
                            <div class="d-flex">
                            <span class="pt-2 text-secondary">(+370)</span>
                                <input name="phone" type="text" class="flex-grow-1 ml-1 form-control" value="{{ old('phone') }}">
                            </div>
                        </div>

                        <div class="list-group d-flex flex-row p-2 align-items-center">
                            <div class="flex-grow-1">
                                <label for="national_id">National ID:</label>
                                <input name="national_id" type="text" class="col-12 form-control" value="{{ old('national_id') }}">
                            </div>
                        </div>

                        <div class="list-group d-flex flex-row p-2 align-items-center flex-wrap">
                            <div class="flex-grow-1 mr-2">
                                <label for="date">Date:</label>
                                <input name="date" type="date" class="col-12 form-control" value="{{ old('date') }}">
                            </div>
                            <div class="flex-grow-1">
                                <label for="time">Time:</label>
                                <input name="time" type="time" class="col-12 form-control" value="{{ old('time') }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 float-right">Register</button>
                </form>
                    <a class="btn btn-secondary mt-2 mr-2 float-right" href="{{ route('appointments.index') }}">Cancel</a>
            </div>
        </div>
    </div>
@endsection
