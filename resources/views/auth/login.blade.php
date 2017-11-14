@extends ('layouts.layout')

@section('content')

    <form method="POST" action="/">

        {{ csrf_field() }}

        <div class="formInput">
            <input type="text" name="username" placeholder="Username" required onfocus="this.placeholder =''" onblur="this.placeholder = 'Username'"/>
        </div>

        <div class="formInput">
            <input type="password" name="password" placeholder="Password" required onfocus="this.placeholder =''" onblur="this.placeholder = 'Password'"/>
        </div>

        @if($errors->any())
            <div id="loginErrorBox">
                <h4>{{$errors->first()}}</h4>
            </div>
        @endif

        <button class="btn btnLogin" type="submit">INLOGGEN</button>

    </form>
@endsection