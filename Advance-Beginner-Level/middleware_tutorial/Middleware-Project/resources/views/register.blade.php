<div>
    <h2>Register Page</h2>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <label for="name">Name : </label>
        <input type="text" name="name" id="name">
        <br><br>
        <label for="email">Email : </label>
        <input type="email" name="email" id="email">
        <br><br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password">
        <br><br>
        <label for="age">Age : </label>
        <input type="number" name="age" id="age">
        <br><br>
        <label for="role">Role : </label>
        <select name="role" id="role">
            <option value="admin">Admin</option>
            <option value="reader">User</option>
        </select>
        <button type="submit">Submit</button>
    </form>
</div>
