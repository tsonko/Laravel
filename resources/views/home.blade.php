<h1>Welcome to my Laravel test project!</h1>

@auth
    Welcome back.
    <form method="post" action="./logout">
        @csrf
        <input type="submit" value="Logout">
    </form>

@else
    <p>You need authorization to view this page.</p>
    <form action="./login" method="post">
        @csrf
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Log in">
    </form>
    <a href="./register">Register</a>
@endauth
