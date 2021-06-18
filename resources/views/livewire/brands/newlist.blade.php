<!-- Modal platform-->
<div>
<div class="modal fade" id="newlist" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                                    
                                    
                <h5 class="modal-title" id="exampleModalLabel">Create a new list</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">

<form method="post">
    @csrf
<input type="hidden" name="user_id" wire:model="user_id" id="user_id" value="{{ Auth::user()->id }}">
<div class="form-group">
<label>List Name</label>
<div class="input-group">
<div class="input-group-prepend">
</div>
<input type="text" name="listname" wire:model="listname" value=""  class="form-control" aria-label=""/>
 @error('listname') <span class="text-danger error">{{ $message }}</span>@enderror
</div>
</div>


</div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary font-weight-bold" close-modal>Add Now</button>
    </div>
        </div>
            </div>
                </div>

</form>
</div>