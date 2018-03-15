<div class="container">
    @if (Auth::guard('web')->check())
        <div class="row">
            <div class="col-sm-12">Je bent ingelogd als gebruiker: {{ Auth::guard('web')->user()->firstname . " " . Auth::guard('web')->user()->lastname}}</div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <a href="logout">Gebruiker uitloggen</a>
            </div>
            {{--  <form id='uitloggen-form' method='get' action='/logout'>
                <p><input type='submit' name='uitloggen' value='User Logout'></p>
            </form>  --}}
        </div>
        <br />
    @endif

    @if (Auth::guard('admin')->check())    
        <div class="row">
            <div class="col-sm-12">Je bent ingelogd als admin: {{ Auth::guard('admin')->user()->name }}</div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <a href="admin/logout">Admin uitloggen</a>
                {{--  <form id='uitloggen-form' method='get' action='admin/logout'>
                    <p><input type='submit' name='uitloggen' value='Admin Logout'></p>
                </form>  --}}
            </div>
        </div>
    @endif
</div>