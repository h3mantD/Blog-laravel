<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <h2>This is registration page</h2>
    {{-- create user registration form --}}
    <form wire:submit.prevent = "submit">
        {{-- create user registration form fields --}}
        <div class="form-group">
            <label for="name">Name</label>
            <input wire:model="name" type="text" class="form-control" id="name" name="name" placeholder="Name">
            <span> @error('name')
                {{ $message }}
                
            @enderror </span>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input wire:model="email" type="email" class="form-control" id="email" name="email" placeholder="Email">
            <span> @error('email')
                {{ $message }}
            @enderror </span>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input wire:model="password" type="password" class="form-control" id="password" name="password" placeholder="Password">
            <span> @error('password')
                {{ $message }}
            @enderror </span>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Password Confirmation</label>
            <input wire:model="password_confirm" type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation">
            <span> @error('password_confirm')
                {{ $message }}
            @enderror </span>
        </div>
        <button type="submit">Submit</button>
    </form>

</div>
