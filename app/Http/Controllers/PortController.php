<?php

namespace App\Http\Controllers;

use App\Models\Port;
use Illuminate\Http\Request;

class portController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:port-list|port-create|port-edit|port-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:port-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:port-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:port-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        $tanks = Port::latest()->paginate(50);
        
        return view('ports.manageport');
    }


    public function allPorts()
    {
        $result = Port::all();
        // $result = Tank::with('TankPosition')->get();
        return $result;
    }

    // public function index()
    // {
    //     $ports = Port::latest()->paginate(50);
    //     return view('ports.index', compact('ports'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([

            // 'port_no'=> 'required',
            'port_code'=> 'required',
            'port_name'=> 'required',
            'country'=> 'required',
            'city'=> 'required',
            'geolocation'=> 'required'
        ]);

       $result = Port::create($request->all());
        if ($result==true) {
                    return 1;
                    } else {
                    return 0;
                    }

        // return redirect()->route('ports.index')
        //     ->with('success', 'port created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\port  $port
     * @return \Illuminate\Http\Response
     */
    public function show(port $port)
    {
        return view('ports.show', compact('port'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\port  $port
     * @return \Illuminate\Http\Response
     */
    public function edit(port $port)
    {
        return view('ports.edit', compact('port'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\port  $port
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, port $port)
    {
        request()->validate([
            // 'port_no'=> 'required',
            'port_code'=> 'required',
            'port_name'=> 'required',
            'country'=> 'required',
            'city'=> 'required',
            'geolocation'=> 'required'
        ]);

        $port->update($request->all());

        return redirect()->route('ports.index')
            ->with('success', 'port updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\port  $port
     * @return \Illuminate\Http\Response
     */
    public function destroy(port $port)
    {
        $port->delete();

        return redirect()->route('ports.index')
            ->with('success', 'port deleted successfully');
    }


    public function PortsDelete(Request $req)
    {
        $id = $req->input('id');
        $result = Port::where('id','=',$id)->delete();
        if ($result==true) {
            return 1;
        } else {
            return 0;
        }
    }
     public function showsinglePort(Request $req)
    {
        $id = $req->input('id');
        $result = Port::where('id','=',$id)->first();
        return $result;
    }


      public function PortsDetails(Request $req)
  {
        $id = $req->input('id');
        $data = Port::where('id','=',$id)->first();
        return $data;
  }


  public function updatePort(Request $request, $id)
    {

        request()->validate([
            'update_port_code' => 'required',
            'update_port_name' => 'required',
            'update_port_country' => 'required',
            'update_port_city' => 'required',
            'update_port_geolocation' => 'required',
       
        
        ]);
     
            $port = Port::find($id);
            
            $port->port_code = $request->update_port_code;
            $port->port_name = $request->update_port_name;
            $port->country = $request->update_port_country;
            $port->city = $request->update_port_city;
            $port->geolocation = $request->update_port_geolocation;
         
            $result= $port->update();
                   if ($result==true) {
                    return 1;
                    } else {
                    return 0;
                    }
    }


}