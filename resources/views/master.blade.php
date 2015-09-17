<!DOCTYPE html>
<html>
    <head>

        <title>
            San Carlos College Alumni Portal
        </title>

        @include('includes.css')

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="San Carlos College Alumni Portal is made for all the alumni of the school to interact with each other.">
        <meta name="author" content="Joel Jeremy M. Marquez">

    </head>
    <body>

        @include('includes.header')

            
            @yield('content-fluid')
                

            </div>

            <div class="container" id="top">
   

                    @yield('fab')


                <div class="row" id="content">

                    @yield('content')

                </div>

                @yield('pagination')

            </div>


        @include('includes.footer')

        @include('includes.scripts')

    </body>

</html>