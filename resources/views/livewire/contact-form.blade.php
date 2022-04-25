<div class="container">
    <form wire:submit.prevent="submitForm" action="/contact" method="POST" id="contact-form" role="form">
        @csrf
        @if(session('success_message'))
            <div class="alert alert-warning">{{session('success_message')}}</div>
        @endif
        <div class="controls">
                <div class="row">
                    <div class="col-md-12">
                        {{$name}}
                        <div class="form-group">
                            <label for="form_name">Name *</label>
                            <input wire:model.defer="name" value="{{old('name')}}" id="form_name" type="text" name="name" class="@error ('name')bg-danger @enderror form-control" placeholder="Please enter your name *">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email">Email *</label>
                            <input id="form_email" type="email" wire:model.defer="email"  name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_tel">Tel *</label>
                            <input id="phone_tel" type="text" wire:model.defer="phone"  name="phone" class="form-control"
                                   placeholder="Please enter your phone *" required="required"
                                   data-error="phone is required.">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"> <label for="form_message">Message *</label>
                            <textarea id="form_message" wire:model="message" name="message" class="form-control" placeholder="Write your message here." rows="4" required="required" data-error="Please, leave us a message."></textarea>
                        </div>
                    </div>
                    <div class="col-md-12"> <input type="submit" class="btn bg-yello btn-send pt-2 btn-block " value="Send Message"> </div>
                </div>
            </div>
    </form>
</div>
