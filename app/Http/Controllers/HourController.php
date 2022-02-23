<?php

namespace App\Http\Controllers;

use App\Hour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Monolog\Logger;

class HourController extends Controller
{
    public function __construct(){
        
        $this->middleware('isaccept');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasRole('super admin') || auth()->user()->hasAccessToProject($request->get('projectID'))) {
            if ($request->get('manual') == true) {

                try {
                    $request->validate([
                        'startTime' => 'date_format:Y-m-d H:i:s|required',
                        'endTime' => 'date_format:Y-m-d H:i:s|required',
                    ]);

                    $start = Carbon::createFromFormat('Y-m-d H:i:s', $request->get('startTime'), 'Europe/Amsterdam')->timestamp;
                    $end = Carbon::createFromFormat('Y-m-d H:i:s', $request->get('endTime'), 'Europe/Amsterdam')->timestamp;

                    $data = [
                        'activity' => $request->get('activity'),
                        'user_id' => auth()->id(),
                        'project_id' => $request->get('projectID'),
                        'start' => $start,
                        'end' => $end
                    ];
                    Hour::create($data);
                    return redirect()->back();
                } catch (Exception $e) {
                    Log::emergency($e->getCode());
                    Log::emergency($e->getMessage());

                    return redirect()->back()->withErrors("something went wrong, please contact support");
                }
            } else {
                try {
                    $data = [
                        'activity' => $request->get('activity'),
                        'user_id' => auth()->id(),
                        'project_id' => $request->get('projectID'),
                        'start' => $request->get('startTime'),
                        'end' => $request->get('startTime') + $request->get('timer'),
                    ];

                    Hour::create($data);
                    return response()->make(['success' => true], 200);
                } catch (Exception $e) {
                    return response()->make(['error' => $e->getMessage()], 401);

                }
            }
        } else {
            Log::emergency('People are messing around with project id\'s ');
            Log::emergency('User id of user messing around: ' . auth()->id());
            return redirect()->back()->withErrors("That was not supposed to happen. Please contact the administrator if you feel like this was an accident");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hour $hour
     * @return \Illuminate\Http\Response
     */
    public function show(Hour $hour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hour $hour
     * @return \Illuminate\Http\Response
     */
    public function edit(Hour $hour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Hour $hour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hour $hour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hour $hour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hour $hour)
    {
        $hour->delete();
        return back();
    }
}
