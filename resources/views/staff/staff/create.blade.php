<form action="{{ route('staff.store') }}" method="post">
@csrf

<input type="text" name="name">
<input type="email" name="email">
<input type="password" name="password">
<input type="submit">
</form>