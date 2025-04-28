    @auth('admin')
      @if (auth('admin')->check())
        <!--Name: -->{{ auth('admin')->user()->fullName }}<br>
        @if (auth('admin')->user()->is_admin)
          Administrator<br>
        @endif
        <form action="{{ route('admin.logout') }}" method="POST">
          @csrf
          @method('POST')
          <button type="submit">Log Out</button>
        </form>
      @else
        <a class="link-button" href="{{ route('login.show') }}">Log In</a><br>
      @endif
    @else
      Name: guest
    @endauth
