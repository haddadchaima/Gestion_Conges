<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;

use App\Models\Conges ;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\EmpolyeController;
use Illuminate\Support\Facades\Route;

class CongesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $conges = Conges::with('employes')->where('status', '=', 'demande en attente')->get();
        $statusUser = Employe::select('status','id')->where('id', $request->userid )->first();
        if($statusUser->status == 'admin'){
            return View::make('conges.index')->with(['conges'=> $conges , 'status_user' => $statusUser]);
        }
    }

    public function ajouterConge(Request $request)
    {
        $request->validate([
            'startdate' => 'required',
            'enddate' => 'required',
            'status' => 'required',
        ]);

        Conges::create($request->all());
        return redirect()->route('conges.index')->with('success','Votre demande de congé est en attente.');
    }

    public function actionConges(Request $request)
    {

        // $setConges = Conges::with('employes')->where('employe_id', $request->id)->where('status', 'demande en attente')->first();

        // $setConges->status = $request->action  ;
        // $setConges->save();

        echo $request;
      //  return redirect()->back();
    }

    public function congesEmploye(Request $request)
    {
        $idEmploye = $request->id ;
        $employeConges = Conges::where('employe_id','=', $idEmploye )->get();
        $employes = Employe::where('id', '=', $idEmploye)->get();
        $statusUser = Employe::select('status', 'id')->where('id', $request->userid )->first();
        return View::make('conges.list-employes')->with(['conges'=> $employeConges , 'status_employe'=> $statusUser]);

    }

    // public function ajouterConge(Request $request)
    // {
    //     echo $request->startdate ;
    //     redirect()->back() ;
    // }

}
