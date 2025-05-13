<div>
    <h2>Login Page</h2>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <label for="email">Email : </label>
        <input type="email" name="email" id="email">
        <br><br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password">
        <br><br>
        <button type="submit">Submit</button>
    </form>
</div>
