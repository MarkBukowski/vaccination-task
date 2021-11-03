@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{ route('appointments.update', [$appointment]) }}" method="POST">
                    @csrf
                    <div class="card pb-2">
                        <div class="card-header">
                            Edit appointment details
                        </div>

                        <div class="list-group d-flex flex-row p-2 align-items-center">
                            <div class="flex-grow-1">
                                <label for="name">Name:</label>
                                <input name="name" type="text" class="col-12 form-control" value="{{ $appointment->name }}">
                            </div>
                        </div>

                        <div class="list-group d-flex flex-row p-2 align-items-center">
                            <div class="flex-grow-1">
                                <label for="last_name">Surname:</label>
                                <input name="last_name" type="text" class="col-12 form-control" value="{{ $appointment->last_name }}">
                            </div>
                        </div>

                        <div class="list-group d-flex flex-row p-2 align-items-center">
                            <div class="flex-grow-1">
                                <label for="email">Email:</label>
                                <input name="email" type="text" class="col-12 form-control" value="{{ $appointment->email }}">
                            </div>
                        </div>

                        <div class="list-group d-flex flex-row p-2 align-items-center">
                            <label for="phone">Phone:</label>
                            <div>+370</div>
                            <div class="flex-grow-1">
                                <input name="phone" type="text" class="col-12 form-control" value="{{ $appointment->phone }}">
                            </div>
                        </div>

                        <div class="list-group d-flex flex-row p-2 align-items-center">
                            <div class="flex-grow-1">
                                <label for="national_id">National ID:</label>
                                <input name="national_id" type="text" class="col-12 form-control" value="{{ $appointment->national_id }}">
                            </div>
                        </div>

                        <div class="list-group d-flex flex-row p-2 align-items-center flex-wrap">
                            <div class="flex-grow-1 mr-2">
                                <label for="date">Date:</label>
                                <input name="date" type="date" class="col-12 form-control" value="{{ $appointment->date }}">
                            </div>
                            <div class="flex-grow-1">
                                <label for="time">Time:</label>
                                <input name="time" type="time" class="col-12 form-control" value="{{ $appointment->time }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 float-right">Update</button>
                    <a class="btn btn-secondary mt-2 mr-2 float-right" href="{{ route('appointments.index') }}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
