<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}">Email Marketing</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="{{ Request::is('clients')? 'active':'' }}"><a href="{{ url('/clients') }}">Clients</a></li>
            <li class="{{ Request::is('transactions')? 'active':'' }}"><a href="{{ url('/transactions') }}">Transactions</a></li>
            <li class="{{ Request::is('emails')? 'active':'' }}"><a href="{{ url('/emails') }}">Emails</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>