<?php

namespace App\Http\Controllers;

use App\Models\TankPosition;
use Illuminate\Http\Request;
use DB;
use App\Models\Lc;
use App\Models\Tank;

class TankPositionController extends Controller
{
    /**position
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:position-list|position-create|position-edit|position-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:position-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:position-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:position-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $positions = TankPosition::latest()->paginate(50);
        $ontrangit = TankPosition::where('tank_status', '=', 'On Transit' )->get();
        $laden = TankPosition::where('tank_status', '=', 'Laden' )->get();
        
        return view('positions.positionindex', compact('ontrangit', 'laden'));
    }

    
    // public function index()
    // {
    //     $positions = TankPosition::latest()->paginate(50);
       
    //     return view('positions.index', compact('positions'));
    // }
    public function getpositionbyid(Request $req)
    {
        $id = $req->input('id');
        $lcs = Lc::where('id','=',$id)->first();
        if ($lcs==true) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $lcs = Lc::all();
         $tanks = Tank::all();
        return view('positions.create', compact('lcs', 'tanks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        request()->validate([
            // 'shipment_id' => 'required',
            'tank_number' => 'required',
            'lc_no' => 'required',
            'consignee_name' => 'required',
            'origin' => 'required',
            'destination' => 'required',
            'etd_to_final_dest' => 'nullable',
            'eta_to_final_dest' => 'nullable',
            'loading_date' => 'nullable',
            'connecting_port_name' => 'nullable',
            'arrived_at_connecting_port' => 'nullable',
            'sail_to_dest_port' => 'nullable',
            'arrived_at_dest_port' => 'nullable',
            'arrival_at_customer' => 'nullable',
            'arrive_to_agent_warehouse' => 'nullable',
            'loading_port' => 'nullable',
            'sail_to_conneting' => 'nullable',
            'arrive_at_conneting' => 'nullable',
            'sail_to_dest' => 'nullable',
            'arrived_at_dest' => 'nullable',
            'arrived_at_warehouse' => 'nullable',
            // 'tank_status' => 'required',
        ]);

            // $checkdata = TankPosition::where('tank_number', $request->tank_number)->first();

            if (TankPosition::where('tank_number', '=', $request->tank_number)->count() > 0) 
                {
                      return redirect()->route('positions.index')
                        ->with('wrning', 'Tank already created!!.');

                } else{
                     
                         $position = new TankPosition;
                    // $position->title = !empty($request->title) ? $request->title : '';
                    // $position->shipment_id = $request->shipment_id;
                    $position->tank_number = $request->tank_number;
                    $position->lc_no = $request->lc_no;
                    $position->consignee_name = $request->consignee_name;
                    $position->origin = $request->origin;
                    $position->destination = $request->destination;
                    $position->etd_to_final_dest = !empty($request->etd_to_final_dest) ? $request->etd_to_final_dest : '';
                    $position->eta_to_final_dest = !empty($request->eta_to_final_dest) ? $request->eta_to_final_dest : '';
                    $position->loading_date = !empty($request->loading_date) ? $request->loading_date : '';
                    $position->connecting_port_name = !empty($request->connecting_port_name) ? $request->connecting_port_name : '';
                    $position->arrived_at_connecting_port = !empty($request->arrived_at_connecting_port) ? $request->arrived_at_connecting_port : '';
                    $position->sail_to_dest_port = !empty($request->sail_to_dest_port) ? $request->sail_to_dest_port : '';
                    $position->arrived_at_dest_port = !empty($request->arrived_at_dest_port) ? $request->arrived_at_dest_port : '';
                    $position->arrival_at_customer = !empty($request->arrival_at_customer) ? $request->arrival_at_customer : '';
                    $position->arrive_to_agent_warehouse = !empty($request->arrive_to_agent_warehouse) ? $request->arrive_to_agent_warehouse : '';
                    $position->loading_port = !empty($request->loading_port) ? $request->loading_port : '';
                    $position->sail_to_conneting = !empty($request->sail_to_conneting) ? $request->sail_to_conneting : '';
                    $position->arrive_at_conneting = !empty($request->arrive_at_conneting) ? $request->arrive_at_conneting : '';
                    $position->sail_to_dest = !empty($request->sail_to_dest) ? $request->sail_to_dest : '';
                    $position->arrived_at_dest = !empty($request->arrived_at_dest) ? $request->arrived_at_dest : '';
                    $position->arrived_at_warehouse = !empty($request->arrived_at_warehouse) ? $request->arrived_at_warehouse : '';

                    $tankpositionstatus="";

                    if (empty($request->etd_to_final_dest)||empty($request->eta_to_final_dest)||empty($request->loading_date)||empty($request->connecting_port_name)||empty($request->arrived_at_connecting_port)||empty($request->sail_to_dest_port)||empty($request->arrived_at_dest_port)||empty($request->arrival_at_customer)||empty($request->arrive_to_agent_warehouse)||empty($request->loading_port)||empty($request->sail_to_conneting)||empty($request->arrive_at_conneting)||empty($request->sail_to_dest)||empty($request->arrived_at_dest)||empty($request->arrived_at_warehouse)) {
                        $tankpositionstatus = 'On Transit';
                    }else{
                        $tankpositionstatus = 'Laden';
                    }

                    $position->tank_status=$tankpositionstatus;
                    
                   $result= $position->save();
                   if ($result==true) {
                    return 1;
                    } else {
                    return 0;
                    }
                    // return redirect()->route('positions.index')
                    // ->with('success', 'position created successfully.');

                }
            

            
        // TankPosition::create($request->all());

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(TankPosition $position)
    {
        return view('positions.show', compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(TankPosition $position)
    {
        $lc = Lc::find($position->lc_no);
        // dd($lc);
        return view('positions.edit', compact('position','lc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TankPosition $position)
    {
        request()->validate([
            // 'shipment_id' => 'required',
            'tank_number' => 'required',
            'lc_no' => 'required',
            'consignee_name' => 'required',
            'origin' => 'required',
            'destination' => 'required',
            'etd_to_final_dest' => 'nullable',
            'eta_to_final_dest' => 'nullable',
            'loading_date' => 'nullable',
            'connecting_port_name' => 'nullable',
            'arrived_at_connecting_port' => 'nullable',
            'sail_to_dest_port' => 'nullable',
            'arrived_at_dest_port' => 'nullable',
            'arrival_at_customer' => 'nullable',
            'arrive_to_agent_warehouse' => 'nullable',
            'loading_port' => 'nullable',
            'sail_to_conneting' => 'nullable',
            'arrive_at_conneting' => 'nullable',
            'sail_to_dest' => 'nullable',
            'arrived_at_dest' => 'nullable',
            'arrived_at_warehouse' => 'nullable',
            // 'tank_status' => 'required',
        ]);


            // $position->title = !empty($request->title) ? $request->title : '';
            // $position->shipment_id = $request->shipment_id;
            $position->tank_number = $request->tank_number;
            $position->lc_no = $request->lc_no;
            $position->consignee_name = $request->consignee_name;
            $position->origin = $request->origin;
            $position->destination = $request->destination;
            $position->etd_to_final_dest = !empty($request->etd_to_final_dest) ? $request->etd_to_final_dest : '';
            $position->eta_to_final_dest = !empty($request->eta_to_final_dest) ? $request->eta_to_final_dest : '';
            $position->loading_date = !empty($request->loading_date) ? $request->loading_date : '';
            $position->connecting_port_name = !empty($request->connecting_port_name) ? $request->connecting_port_name : '';
            $position->arrived_at_connecting_port = !empty($request->arrived_at_connecting_port) ? $request->arrived_at_connecting_port : '';
            $position->sail_to_dest_port = !empty($request->sail_to_dest_port) ? $request->sail_to_dest_port : '';
            $position->arrived_at_dest_port = !empty($request->arrived_at_dest_port) ? $request->arrived_at_dest_port : '';
            $position->arrival_at_customer = !empty($request->arrival_at_customer) ? $request->arrival_at_customer : '';
            $position->arrive_to_agent_warehouse = !empty($request->arrive_to_agent_warehouse) ? $request->arrive_to_agent_warehouse : '';
            $position->loading_port = !empty($request->loading_port) ? $request->loading_port : '';
            $position->sail_to_conneting = !empty($request->sail_to_conneting) ? $request->sail_to_conneting : '';
            $position->arrive_at_conneting = !empty($request->arrive_at_conneting) ? $request->arrive_at_conneting : '';
            $position->sail_to_dest = !empty($request->sail_to_dest) ? $request->sail_to_dest : '';
            $position->arrived_at_dest = !empty($request->arrived_at_dest) ? $request->arrived_at_dest : '';
            $position->arrived_at_warehouse = !empty($request->arrived_at_warehouse) ? $request->arrived_at_warehouse : '';

            $tankpositionstatus="";

            if (empty($request->etd_to_final_dest)||empty($request->eta_to_final_dest)||empty($request->loading_date)||empty($request->connecting_port_name)||empty($request->arrived_at_connecting_port)||empty($request->sail_to_dest_port)||empty($request->arrived_at_dest_port)||empty($request->arrival_at_customer)||empty($request->arrive_to_agent_warehouse)||empty($request->loading_port)||empty($request->sail_to_conneting)||empty($request->arrive_at_conneting)||empty($request->sail_to_dest)||empty($request->arrived_at_dest)||empty($request->arrived_at_warehouse)) {
                $tankpositionstatus = 'On Transit';
            }else{
                $tankpositionstatus = 'Laden';
            }

            $position->tank_status=$tankpositionstatus;
            
            $position->save();

            

        return redirect()->route('positions.index')
            ->with('success', 'position updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
     
        $id = $req->input('id');
        $result = TankPosition::where('id','=',$id)->delete();
        if ($result==true) {
            return 1;
        } else {
            return 0;
        }
    }
    public function positionDelete(Request $req)
    {
        $id = $req->input('id');
        $result = TankPosition::where('id','=',$id)->delete();
        if ($result==true) {
            return 1;
        } else {
            return 0;
        }
    }


    public function showPosition(Request $req)
    {
        $id = $req->input('id');
        $result = TankPosition::where('id','=',$id)->first();
        return [$result];
        // if ($result==true) {
        //     return 1;
        // } else {
        //     return 0;
        // }
    }



    public function auto_lc(Request $request)
    {
        $data = [];
            if($request->has('q')){
            $search = $request->q;
            $data = DB::table("lcs")
            ->select("id","lc_no", "consignee_name", "origin", "destination")
            ->where('lc_no','LIKE',"%$search%")
            ->get();
            }
            // dd($data);
        return response()->json($data);
    }


    public function auto_tank(Request $request)
    {
        $data = [];
            if($request->has('q')){
            $search = $request->q;
            
            // $data = DB::table("tanks") ->select("id", "tank_number")
            // ->where('tank_number','LIKE',"%$search%")->get();

            // $data = DB::table('tanks')->where('tank_number','LIKE',"%$search%")
            //     ->whereNotIn('tank_number', function($query) {
            //     $query->select('tank_number')->from('tank_positions')->get();
            // })
            // ->pluck('tank_number');
            


            $data= DB::table('tanks')                 
             ->select("tank_number")->where('tank_number', 'LIKE', '%'.$search.'%')
            ->whereNotIn('tank_number', DB::table('tank_positions')->pluck('tank_number'))
            ->get();
            
            }
            // dd($data);
        return response()->json($data);
    }


//  $tankNumbers = DB::table('tank')
//         ->whereNotIn('tank_number', function($query) {
//         $query->select('tank_number')->from('tank_position');
//     })
//     ->pluck('tank_number');

    

    public function getlc(Request $request){

            $id = $request->input('id');
            $result= LC::where('id','=',$id)->get();

            return $result;
        
    }
    public function upgetlc(Request $request){

            $id = $request->input('id');
            $result= LC::where('id','=',$id)->get();

            return $result;
        
    }


    public function alltankposition()
  {
    // $result = TankPosition::all();
     $result = TankPosition::with('lc')->get();
     $ontrangit = TankPosition::where('tank_status', '=', 'On Transit' )->get();
    return $result;
  }





  public function TankPositionDetails(Request $req)
  {
        
        $id = $req->input('id');
        $data = TankPosition::where('id','=',$id)->first();
        $lc = Lc::find($data->lc_no);
        return [$data, $lc];
  }


  public function PositionUpdate(Request $request, $id)
    {

        request()->validate([
            // 'shipment_id' => 'required',
            'update_tank_number' => 'required',
            'Update_lc_no' => 'required',
            'update_position_input_consignee' => 'required',
            'update_position_input_origin' => 'required',
            'update_position_input_destination' => 'required',
            'update_position_input_etd_des' => 'nullable',
            'update_position_input_eta_des' => 'nullable',
            'update_position_input_loading_date' => 'nullable',
            'update_position_input_connect_port' => 'nullable',
            'update_arrived_at_connecting_port' => 'nullable',
            'update_position_input_sail' => 'nullable',
            'update_position_input_arrive_des_port' => 'nullable',
            'update_position_input_arrive_cus' => 'nullable',
            'update_position_input_arrive_warh' => 'nullable',
            'update_position_input_loading_port' => 'nullable',
            'update_position_input_sail_connect' => 'nullable',
            'update_position_input_arrive_connect' => 'nullable',
            'update_position_input_sail_des' => 'nullable',
            'update_position_input_arrive_des' => 'nullable',
            'update_position_input_warehouse' => 'nullable',
            // 'tank_status' => 'required',
        ]);



        // $id = $request->data_id_for_update;

            $position = TankPosition::find($id);


            $position->tank_number = $request->update_tank_number;
            $position->lc_no = $request->Update_lc_no;
            $position->consignee_name = $request->update_position_input_consignee;
            $position->origin = $request->update_position_input_origin;
            $position->destination = $request->update_position_input_destination;
            $position->etd_to_final_dest = !empty($request->update_position_input_etd_des) ? $request->update_position_input_etd_des : '';
            $position->eta_to_final_dest = !empty($request->update_position_input_eta_des) ? $request->update_position_input_eta_des : '';
            $position->loading_date = !empty($request->update_position_input_loading_date) ? $request->update_position_input_loading_date : '';
            $position->connecting_port_name = !empty($request->update_position_input_connect_port) ? $request->update_position_input_connect_port : '';
            $position->arrived_at_connecting_port = !empty($request->update_arrived_at_connecting_port) ? $request->update_arrived_at_connecting_port : '';
            $position->sail_to_dest_port = !empty($request->update_position_input_sail) ? $request->update_position_input_sail : '';
            $position->arrived_at_dest_port = !empty($request->update_position_input_arrive_des_port) ? $request->update_position_input_arrive_des_port : '';
            $position->arrival_at_customer = !empty($request->update_position_input_arrive_cus) ? $request->update_position_input_arrive_cus : '';
            $position->arrive_to_agent_warehouse = !empty($request->update_position_input_arrive_warh) ? $request->update_position_input_arrive_warh : '';
            $position->loading_port = !empty($request->update_position_input_loading_port) ? $request->update_position_input_loading_port : '';
            $position->sail_to_conneting = !empty($request->update_position_input_sail_connect) ? $request->update_position_input_sail_connect : '';
            $position->arrive_at_conneting = !empty($request->update_position_input_arrive_connect) ? $request->update_position_input_arrive_connect : '';
            $position->sail_to_dest = !empty($request->update_position_input_sail_des) ? $request->update_position_input_sail_des : '';
            $position->arrived_at_dest = !empty($request->update_position_input_arrive_des) ? $request->update_position_input_arrive_des : '';
            $position->arrived_at_warehouse = !empty($request->update_position_input_warehouse) ? $request->update_position_input_warehouse : '';

            $tankpositionstatus="";

            if (empty($request->update_position_input_etd_des)||empty($request->update_position_input_eta_des)||empty($request->update_position_input_loading_date)||empty($request->update_position_input_connect_port)||empty($request->update_arrived_at_connecting_port)||empty($request->update_position_input_sail)||empty($request->update_position_input_arrive_des_port)||empty($request->update_position_input_arrive_cus)||empty($request->update_position_input_arrive_warh)||empty($request->update_position_input_loading_port)||empty($request->update_position_input_sail_connect)||empty($request->update_position_input_arrive_connect)||empty($request->update_position_input_sail_des)||empty($request->update_position_input_arrive_des)||empty($request->update_position_input_warehouse)) {
                $tankpositionstatus = 'On Transit';
            }else{
                $tankpositionstatus = 'Laden';
            }

            $position->tank_status=$tankpositionstatus;
            
            $result= $position->update();
                   if ($result==true) {
                    return 1;
                    } else {
                    return 0;
                    }

            

        // return redirect()->route('positions.index')
        //     ->with('success', 'position updated successfully');
    }

}