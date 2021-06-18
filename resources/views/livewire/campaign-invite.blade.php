

    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
          {{ session('message') }}
        </div>
    @endif

    <a data-toggle="modal" data-target="#campaignInvite" wire:click="invite({{ $user->id }})" class="btn btn-sm font-weight-bolder text-uppercase  btn-primary"><strong>Send Campaign Invite</strong></a>

    


