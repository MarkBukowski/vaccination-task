<?php

namespace App\Http\Controllers;

use App\Exports\AppointmentsExport;
use App\Imports\AppointmentsImport;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filtered_date = $request->filterDate ? $request->filterDate : date('Y-m-d');
        $appointments = Appointment::whereDate('date', Carbon::parse($filtered_date))->orderBy('time')->get();

        return view('appointments.index')->with(['appointments' => $appointments, 'filtered_date' => $filtered_date]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
        [
           'name' => ['required', 'alpha', 'min:3', 'max:32'],
           'last_name' => ['required', 'alpha', 'min:3', 'max:32'],
           'email' => ['required', 'email', 'unique:appointments'],
           'phone' => ['required', 'digits:8', 'starts_with:6', 'unique:appointments'],
           'national_id' => ['required', 'digits:11', 'starts_with:3,4,5,6', 'unique:appointments'],
           'date' => ['required', 'date', 'after_or_equal:today'],
           'time' => ['required'],
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $appointment = new Appointment;
        $appointment->name = $request->name;
        $appointment->last_name = $request->last_name;
        $appointment->email = $request->email;
        $appointment->phone = $request->phone;
        $appointment->national_id = $request->national_id;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->save();

        return redirect('/')->with('success_message', 'Appointment added successfully.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        return view('appointments.edit', ['appointment' => $appointment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Appointment $appointment)
    {
        $appointment->name = $request->name;
        $appointment->last_name = $request->last_name;
        $appointment->email = $request->email;
        $appointment->phone = $request->phone;
        $appointment->national_id = $request->national_id;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->save();

        return redirect()->route('appointments.index')->with('success_message', 'Appointment details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success_message', 'Appointment removed successfully');
    }

    public function export($date)
    {
        return Excel::download(new AppointmentsExport($date), 'appointments.csv');
    }

    public function import()
    {
        Excel::import(new AppointmentsImport(), request()->file('file'));

        return redirect()->back()->with('success_message','Data Imported Successfully');
    }

}
