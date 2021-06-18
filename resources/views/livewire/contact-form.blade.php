
            @if ($success)
                <div class="inline-flex w-full ml-3 overflow-hidden bg-white rounded-lg shadow-sm">
                    <div class="flex items-center justify-center w-12 bg-green-500">
                    </div>
                    <div class="px-3 py-2 text-left">
                        <span class="font-semibold text-green-500">Success</span>
                        <p class="mb-1 text-sm leading-none text-gray-500">{{ $success }}</p>
                    </div>
                </div>
            @endif
            
                    <form wire:submit.prevent="contactFormSubmit" action="{{url('/')}}" method="POST" class="contact_form_box">
                        @csrf
                        <div class="form-group text_box">
                            @error('email')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                            <input wire:model="email" class="" type="text" placeholder="Email Address" name="email" value="{{ old('email') }}" />
                        </div>
                        <div class="form-group text_box">
                            @error('name')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                            <input wire:model="name" class="" type="text" placeholder="Name" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="form-group text_box">
                            @error('comment')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                            <textarea wire:model="comment" cols="30" rows="10" class="" name="comment" placeholder="Your message here...">{{ old('comment') }}</textarea>
                        </div>
                        
                            <button class="p_btn" type="submit">
                                Submit
                            </button>
                        </div>
                    </form>
                