<nav class="navig container-fluid" style="background-color: #0099ff; ">
    
    <div class="row h4" style="display:inline;">
        <div class="col-md-8 text-left">
            <!-- left -->
            <a href="/" class="h1 text-white" style="padding:10px;">Blog</a>
            
            <a href="/" class="text-white" style="padding:10px;">
                <span class="glyphicon glyphicon-home"></span>
                Home
            </a>
            
            <a href="/posts" class="text-white" style="padding:10px;">
                <span class="glyphicon glyphicon-book"></span>
                Posts
            </a>

            <a href="/tasks" class="text-white" style="padding:10px;">
                <span class="glyphicon glyphicon-check"></span>
                Tasks
            </a>

            @if( Auth::check() )
            <a href="#" class="text-white" style="padding:10px;">
                <span class="glyphicon glyphicon-envelope"></span>
                Messages
            </a>

            <a href="/posts/create" class="text-white" style="padding:10px;">
                <span class="glyphicon glyphicon-send"></span>
                Create
            </a>
            @endif
        </div>
        <div class="col-md-4 text-right">
            <!-- right -->

            @if( Auth::check() )
            <a href="#" class="text-white" style="padding:10px;">
                {{ Auth::user()->name}}
            </a>

            <!-- settings -->
            <a href="settings" class="text-white" style="padding:10px;">
                <span class="glyphicon glyphicon-cog"></span>
            </a>
            @endif

            @if( ! Auth::check() )
            <a href="/register" class="text-white" style="padding:10px;">
                <span class="glyphicon glyphicon-log-out"></span>
                Register
            </a>

            <a href="/login" class="text-white" style="padding:10px;">
                <span class="glyphicon glyphicon-log-out"></span>
                Login
            </a>
            @endif

            @if( Auth::check() )
            <a href="/logout" class="text-white" style="padding:10px;">
                <span class="glyphicon glyphicon-log-out"></span>
                Logout
            </a>
            @endif
        </div>
    </div>
    
    
</nav>