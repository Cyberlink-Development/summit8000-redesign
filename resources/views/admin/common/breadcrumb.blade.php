<header id="topbar">
  <div class="topbar-left">
    <ol class="breadcrumb">
      <li class="crumb-active">
        <a href="{{url('dashboard')}}">Dashboard</a>
      </li>
      <li class="crumb-icon">
        <a href="{{url('dashboard')}}">
          <span class="glyphicon glyphicon-home"></span>
        </a>
      </li>
      <li class="crumb-link">
        <a href="{{url('dashboard')}}">Home</a>
      </li>
      <li class="crumb-trail">Dashboard </li>
    </ol>
  </div>
  
  <div class="topbar-right"> @include('admin.common.action') </div>
</header>