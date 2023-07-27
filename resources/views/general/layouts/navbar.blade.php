<header class="header">
    <nav class="nav">
      <a href="{{ route('home') }}" class="nav-logo">CodeBlogs</a>
      <ul class="nav-lists">
        <li class="nav-list">
          <a href="{{ route('home') }}" class="nav-link">home</a>
        </li>
        @auth
            <li class="nav-list">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"
                >dashboard</a
                >
            </li>
            <li class="nav-list">
              <a href="{{ route('user.show', Auth::user()->slug) }}" class="nav-link">profile</a>
            </li>
        @endauth
        <li class="nav-list">
          <a href="./pages/posts.html" class="nav-link">posts</a>
        </li>
        <li class="nav-list">
          <a href="{{ route('general.tag.index') }}" class="nav-link">tags</a>
        </li>
        @guest
        <li class="nav-list">
          <a href="{{ route('auth.signin') }}" class="nav-link">signin</a>
        </li>
        <li class="nav-list">
          <a href="{{ route('auth.signup') }}" class="nav-link">signup</a>
        </li>
        @endguest
        @auth
        <li class="nav-list">
          <a id="signoutBtn" href="{{ route('auth.signout') }}" class="nav-link">signout</a>
        </li>
        <form id="signoutForm" action="{{ route('auth.signout') }}" method="get"></form>
        @endauth
      </ul>
    </nav>
  </header>
