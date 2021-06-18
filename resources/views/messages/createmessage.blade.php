@extends('layouts.app5')

@section('title')
Create Message
@parent
@stop

@section('bread1', 'Create Message')
@section('bread2', 'New Message')

@section('head')

@livewireStyles

@endsection


@section('content')

<div class="container">
<h1>Create a new message</h1>
    <form action="{{ route('messagestore') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-6">
            <!-- Subject Form Input -->
            <div class="form-group">
                <label class="control-label">Subject</label>
                <input type="text" class="form-control" name="subject" placeholder="Subject"
                       value="{{ old('subject') }}">
            </div>

            <!-- Message Form Input -->
            <div class="form-group">
                <label class="control-label">Message</label>
                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
            </div>

            @if($users->count() > 0)
                <div class="checkbox">
                    @foreach($users as $user)
                        <label title="{{ $user->brandname }}"><input type="checkbox" name="recipients[]"
                                                                value="{{ $user->id }}">{!!$user->brandname!!}</label>
                    @endforeach
                </div>
            @endif
    
            <!-- Submit Form Input -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>
        </div>
    </form>



</div>
</div>
@endsection


@section('footer')

@livewireScripts

@endsection