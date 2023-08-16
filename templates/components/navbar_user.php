<nav class="navbar navbar-expand-lg navbar-light bg-light ">

  <a class="navbar-brand">Event Website</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <a class="nav-link" href="{{path('app_static')}}">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/main/">Events</a>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Event Type
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ path('app_main_index_type', {'type': 'sport'}) }}">Sport</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ path('app_main_index_type', {'type': 'movie'}) }}">Movie</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ path('app_main_index_type', {'type': 'music'}) }}">Music</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ path('app_main_index_type', {'type': 'theater'}) }}">Theater</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ path('app_main_index_type', {'type': 'other'}) }}">Other</a></li>
          </ul>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{path('app_logout')}}">Log Out</a>
      </li>
    </ul>
  </div>

</nav>