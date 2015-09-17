<footer class="page-footer red darken-4">

<div class="container">

    <div class="row">

        <div class="col l10 s12">

            <h5 class="white-text">San Carlos College Alumni Portal</h5>

            <p class="grey-text text-lighten-4">Comments? Suggestions? Email us at sancarloscollege.edu.ph</p>

        </div>

        <div class="col l2 s12">

            <h5 class="white-text">Pages</h5>

            <ul class="footer_link">

                <li><a class="grey-text text-lighten-3" href=" {{ url('articles') }} " value="page_home">Home</a></li>

                @if (Auth::check())

                    @if (Auth::user()->role->id === 3)

                        <li><a class="grey-text text-lighten-3" href=" {{ url('profiles') }} " value="page_profile">Profile</a></li>

                    @endif

                @endif

                <li><a class="grey-text text-lighten-3" href=" {{ url('threads') }} " value="page_forum">Forum</a></li>

                <li><a class="grey-text text-lighten-3" href=" {{ url('about') }} " value="page_about">About</a></li>

            </ul>

        </div>

    </div>

    <div class="row center">
        
    <img class="circle marg_20" src="{{ url('images/cics.png') }}" alt="cics" />
    <img class="circle marg_20" src="{{ url('images/cte.png') }}" alt="cte" />
    <img class="circle marg_20" src="{{ url('images/beso.png') }}" alt="beso" />


    </div>
</div>

<div class="footer-copyright">

    <div class="container">
       
        Copyright © <?php echo date('Y') ?> - San Carlos College - Formerly PIEAS
        
        <a href="!#" class="grey-text text-lighten-4 right" id="btn_back_to_top">Back to top</a>
    
    </div>

</div>

</footer>