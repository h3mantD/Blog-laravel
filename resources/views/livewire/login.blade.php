<div>
    {{-- In work, do what you enjoy. --}}
    <h2>This is login page</h2>
    {{-- create a login form --}}
    <form action="{{ route('login') }}" method="post">
        {{-- create a field for username --}}
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Username">
        </div>
        {{-- create a field for password --}}
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        {{-- create a submit button --}}
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
