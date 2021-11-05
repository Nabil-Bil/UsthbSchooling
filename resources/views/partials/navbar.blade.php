<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">
        <h1 >UsthbSchooling</h1>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <form action="{{route('logout') }}" method="POST" class="nav-link">
                @csrf
                <input type="submit"  id="logout" class="d-none">
                <label for="logout" class="remove-background" style="cursor: pointer">Logout</label>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
