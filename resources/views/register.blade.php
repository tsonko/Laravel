<h1>Sign up</h1>
<p>Please fill the form below to create a new account.</p>
<form action="./register" method="post">
    @csrf
    <input type="name" name="name" placeholder="Full Name">
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="address" placeholder="Address">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Create an account">
</form>
<p><a href="./">Sign in</a></p>
