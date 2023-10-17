@include('includes/head')

<div class="register">
    <h2>Register new account</h2>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="username"><br><br>
        <input type="text" name="password" placeholder="password"><br>
        <br><button type="submit">Register</button>
    </form>
</div>

