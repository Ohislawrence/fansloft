<?php


namespace App\Http\Livewire\Brands;

use Livewire\Component;
use App\Models\User;

class Favourite extends Component
{


	public $pro;

	public function store($id)

    {

        $pro = User::findorfail($id);
        $this->avatar = 'user.jpg';
        $this->save();


  

        session()->flash('message', 'Update Successfully.');
    }


    public function render($id)
    {
        return view('livewire.brands.favourite',compact('id'));
    }
}
