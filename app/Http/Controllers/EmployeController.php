<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;

use App\Models\Employe;
use App\Models\Conges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $idEmploye = $request->id ;
        $statusUser = Employe::select('status', 'id')->where('id', $request->id )->first();
        if($statusUser->status == 'admin')
        {
            $employeConges = Conges::with('employes')->get();
            return View::make('conges.list-employes')->with(['conges'=> $employeConges, 'status_employe' => $statusUser ]);
        }else{
            $employeConges = Conges::with('employes')->where('employe_id', '=', $request->id)->get();
            return View::make('employes.index')->with(['conges'=> $employeConges, 'status_employe' => $statusUser ]);
        }

    }





}
