<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CampaignInvite extends Component
{
	public $campaign;

	public function invite($id)
	{
		//Notification::send($toUser, new campaignInvite(Auth::user()->id));
		session()->flash('message', 'Users Created Successfully.');
		$this->resetInputFields();
        $this->emit('campaignInvite');
	}


    public function render()
    {
    	//$this->campaign = Campaign::where('user_id', Auth::user()->id);
        return view('livewire.campaign-invite');
    }
}
