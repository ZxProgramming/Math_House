
<h3>
    To Confirm your email with Math House
</h3>

<h2>

<form action="{{route('profile_confirm')}}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{ $user_id}}" />
    <input type="hidden" name="email" value="{{ $email}}" />
    <input type="hidden" name="code" value="{{ $type}}" />
    <button>
        Confirm
    </button>
</form>
</h2>