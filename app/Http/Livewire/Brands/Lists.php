<?php

namespace App\Http\Livewire\Brands;

use Livewire\Component;
use App\Models\User;
use App\Models\ListName;
use Auth;

class Lists extends Component
{
	public $listname;
	public $user_id;

	public $updateMode = false;

    public function render()
    {
    	
        return view('livewire.brands.lists', compact('listnames'));
    }

        