<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use App\Notifications\campaignInvite;
use Illuminate\Support\Facades\Notification;

class InboxController extends Controller
{

	public function __construct() 
	{
    $this->middleware('auth');
	}


    public function inbox()
    {
    	// All threads, ignore deleted/archived participants
        //$threads = Thread::getAllLatest()->get();

        // All threads that user is participating in
        $threads = Thread::forUser(Auth::id())->latest('updated_at')->get();
        //$threads = Thread::where('recipients',Auth::id())->latest('updated_at')->get();

        // All threads that user is participating in, with new messages
        //$threads = Thread::forUserWithNewMessages(Auth::id())->latest('updated_at')->get();
    	return view('inbox', compact('threads'));
    }

    public function show($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');

            return redirect()->route('messages.view');
        }
        // show current user in list if not a current participant
        //$users = User::whereNotIn('id', $thread->participantsUserIds())->get();

        // don't show the current user in list
        $userId = Auth::id();
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();

        $thread->markAsRead($userId);

        return view('messages.view', compact('thread', 'users'));
    }

    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create()
    {
        $users = User::where('id', '!=', Auth::id())->where('role','creator')->get();

        return view('messages.createmessage', compact('users'));
    }

    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store($brandname)
    {
        $input = Request::all();

        $thread = Thread::create([
            'subject' => $input['subject'],
            'recipients' => $input['recipients'],
        ]);

        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => $input['message'],
        ]);

        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'last_read' => new Carbon,
        ]);

        $user = User::where('brandname', $brandname)->first();
        $user->notify(new campaignInvite(Auth::user()));
        
        // Recipients
       // if (Request::has('recipients')) {
           // $thread->addParticipant($input['recipients']);
        //}

        return redirect()->route('viewcreator', $brandname)->with('message','Invite Sent!');
    }

    public function storeit()
    {
        $input = Request::all();

        $thread = Thread::create([
            'subject' => $input['subject'],
            'recipients' => $input['recipients'],
        ]);

        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => $input['message'],
        ]);

        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'last_read' => new Carbon,
        ]);

        $user = User::where('id', $input['thisuser'])->first();
        $user->notify(new campaignInvite(Auth::user()));
        
        // Recipients
       // if (Request::has('recipients')) {
           // $thread->addParticipant($input['recipients']);
        //}

        return redirect()->route('messagestoreit')->with('message','Invite Sent!');
    }


    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');

            return redirect()->route('messages');
        }

        $thread->activateAllParticipants();

        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => Request::input('message'),
        ]);

        // Add replier as a participant
        $participant = Participant::firstOrCreate([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
        ]);
        $participant->last_read = new Carbon;
        $participant->save();

        // Recipients
        if (Request::has('recipients')) {
            $thread->addParticipant(Request::input('recipients'));
        }

        return redirect()->route('messageupdate', $id);
    }
}
