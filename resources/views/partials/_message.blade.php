@auth()
    @if(!Auth::user()->approved_at && Auth::user()->role == 2)
        <div>
            <h3 class="text-center text-success font-weight-bold">Your Profile Is Under Review</h3>
            <p class="text-center mb-30">
                Your profile has been submitted and will be reviewed by our team.
                This usually takes less than 48 hours. To increase higher chance of approval. 
                Update Your Profile.
            </p>
        </div>
    @endif
@endauth

@if(Session::has('success'))
<div class="mb-30">
    <h3 class="text-center text-success font-weight-bold">{{ Session::get('success') }}</h3>
</div>
@endif

@if(Session::has('error'))
    <div class="mb-30">
        <h3 class="text-center text-danger font-weight-bold">{{ Session::get('success') }}</h3>
    </div>
@elseif($errors->any())
    <div class="mb-30">
        <h3 class="text-danger font-weight-bold text-center">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        </h3>
    </div>
@endif