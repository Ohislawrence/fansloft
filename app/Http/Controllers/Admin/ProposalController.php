<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Proposal;
use App\Models\Campaign;

class ProposalController extends Controller
{
    public function __construct() {
    $this->middleware('role:admin');
    }

    public function alltasks()
    {
    	$proposal = Proposal::where('status', 'approved')->get();
    	return view('admin.tasks.alltasks', compact('proposal'));
    }

    public function allproposal()
    {
    	$proposal = Proposal::all();
    	return view('admin.tasks.allproposal', compact('proposal'));
    }

    public function completedtasks()
    {
    	$proposal = Proposal::where('status', 'approved')->where('is_complete', 1)->get();
    	return view('admin.tasks.completedtasks', compact('proposal'));
    }
}
