 <!doctype html>
 <html lang='en'>

 <head>
     <title>@yield('title', 'Item Inventory Management')</title>
     <meta charset='utf-8'>
     <link href='/css/main.css' type='text/css' rel='stylesheet'>

     @yield('head')
 </head>

 <body>
     {{-- Using show message --}}
     @if (session('message'))
         <div class="alert-success">
             {{ session('message') }}
         </div>
     @endif
     {{-- end of message --}}

     <header>
         <a class='logo' href='/'><img src='/images/logo.png' id='logo' alt='Item Inventory Management'></a>
         <nav>
             <ul>
                 <li><a href='/'>Home</a></li>

                 @if (Auth::user())
                     <li><a href='/items'>All Items</a></li>
                     <li><a href='/list'>Your Items List</a></li>
                     <li><a href='/customers'>Customers</a></li>
                 @endif

                 <li><a href='/contact'>Contact</a></li>
                 <li>
                     @if (!Auth::user())
                         <a test='login-link' href='/login'>Login</a>
                     @else
                         <form method='POST' id='logout' action='/logout'>
                             {{ csrf_field() }}

                             <button type='submit' class='button-link' test='logout-button'>
                                 Logout
                             </button>
                         </form>
                     @endif
                 </li>
             </ul>
         </nav>
     </header>


     <section id='main'>
         @yield('content')
     </section>

 </body>

 </html>
