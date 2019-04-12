<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketUpdateRequest;
use App\tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = DB::table('tickets')->paginate(10);
        return view('tickets.index' , compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketUpdateRequest $request)
    {

        tickets::create([

            'summary' => request('summary'),
            'description' => request('description'),
            'status' => request('status')

        ]);
//dd($request);
        return redirect()->route('tickets.index');


    }


    /**
     * Display the specified resource.
     *
     * @param  \App\tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function show( $tickets)
    {

        $tickets = tickets::find($tickets);
        return view('tickets.show' , compact('tickets'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tickets  $tickets
     * @return \Illuminate\Http\Response
     */

    public function edit(tickets $tickets)
    {
        //
    }

    /*------------------*/

    public function delete($tickets)

    {

        $tickets = tickets::find($tickets);
//        dd($tickets);
        return view('tickets.delete' , compact('tickets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function update(TicketUpdateRequest $request, $tickets)
    {


        $tickets1 = tickets::find($tickets);
//        dd($request);
        $tickets1->summary = request('summary');
        $tickets1->description = $request->input('description');
        $tickets1->status = request('status');
        $tickets1->save();


        return redirect()->route('tickets.index')->withSuccess('Ticket has updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function destroy( $tickets)
    {
        tickets::find($tickets)->delete();
        return redirect()->route('tickets.index')->withSuccess('Ticket has Deleted');

    }
}
