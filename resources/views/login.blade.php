@include('includes/head')

<div class="login">
    <h2>Login into an existing account</h2>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="username"><br><br>
        <input type="text" name="password" placeholder="password"><br>
        <br><button type="submit">Login</button>
    </form>
</div>
