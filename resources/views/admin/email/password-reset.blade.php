<style>
    p {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 1.1em;
        line-height: 1.6em;
    }
</style>

<div style="max-width: 400px; margin:30 auto; padding: 30px;">
    <h1>Link for password reset : <span style="color:red">site.test</span></h1>

    <p> This link is valid 60 minutes</p>

    <a style="padding:8px 10px; display:block; text-align:center; min-width:150px; color:white; background-color:rgb(32, 32, 51);"
        href="{{ route('password.reset', ['token' => $token, 'email' => $email]) }}">Link for reset</a>

    <p>If the button above does not work, you can copy and paste the link below:</p>

    {{ route('password.reset', ['token' => $token, 'email' => $email]) }}

</div>
