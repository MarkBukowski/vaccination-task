@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card pb-2">
                    <div class="card-header d-flex justify-content-between">
                        <h3>Appointments for {{ $filtered_date }}</h3>
                            <form action="{{ route('appointments.index') }}" class="d-flex flex-column">
                                <input name="filterDate" required type="date" class="float-right form-control">
                                <button class="btn btn-sm btn-primary " type="submit">Select day</button>
                            </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            @if(count($appointments) > 0)
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">National ID</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($appointments as $appointment)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $appointment->name }} {{ $appointment->last_name }}</td>
                                        <td>{{ date('H:i', strtotime($appointment->time)) }}</td>
                                        <td>{{ $appointment->phone }}</td>
                                        <td>{{ $appointment->national_id }}</td>
                                        <td>
                                            <a class="btn-sm btn-outline-secondary" href="{{ route('appointments.edit', $appointment) }}">Edit</a>
                                            <form action="{{ route('appointments.destroy', $appointment) }}" method="POST">
                                                @csrf
                                                <button class="btn-sm btn-outline-secondary border-0" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <h5 class="text-center pt-3">No records for this date</h5>
                            @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <a href="{{ route('appointments.create') }}" class="btn btn-primary mt-2 float-right">New appointment</a>
        <a href="{{ route('appointments.export', $filtered_date) }}" class="btn btn-sm btn-outline-info mt-2">Export .csv</a>
        <button type="button" class="btn btn-sm btn-outline-info mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Import .csv</button>
    </div>

{{--  Modal  --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import CSV</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('appointments.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file" id="inputGroupFile04">
                                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


@endsection
