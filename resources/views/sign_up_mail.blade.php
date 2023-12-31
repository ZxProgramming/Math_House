
<h3>
    Welcome to Math House To Confirm Your Email
</h3>

<h2>

<form action="{{route('signup_confirm')}}" method="POST">
    <input type="hidden" name="email" value="{{ $email}}" />
    <input type="hidden" name="code" value="{{ $code}}" />
    <button>
        Confirm
    </button>
</form>
</h2>