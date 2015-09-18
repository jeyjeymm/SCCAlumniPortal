<!--

	@Params

	Article $article;
	String $role;

-->

<?php

    //Default Values for Article Template
    $show_admin_panel = false;
    $show_approve_btn = false;
    $show_edit_btn = false;
    $show_delete_btn = false;
    

    if ($role === 'admin') {

            $is_approved = $article->status === 'APPROVED' ? true : false ;

            $approve_url = $is_approved ? 'unapprove' : 'approve';

            $show_admin_panel = true;

            $show_approve_btn = true;

            $show_edit_btn = true;

            $show_delete_btn = true;

    }else if ($role === 'editor'){

    		$is_approved = $article->status === 'APPROVED' ? true : false ;

            $approve_url = $is_approved ? 'unapprove' : 'approve';

            $show_admin_panel = Auth::user()->id === $article->user_id ? true : false;

            $show_edit_btn = Auth::user()->id === $article->user_id ? true : false;

            $show_delete_btn = Auth::user()->id === $article->user_id ? true : false;

    }


    

?>

<div class="col s12 m6 l6 my_articles" id="article_{{ $article->id }}">

    <div class="card hoverable">

        <div class="card-image waves-effect waves-block waves-light">

            <img class="activator responsive-img" src="{{ route('getPhoto',['url' => 'articles'. '.' . $article->id, 'name' => $article->image_name]) }}">

        </div>

        <div class="card-content">

            <span class="card-title activator grey-text text-darken-4 truncate">

                {{ $article->title }}

                <i class="material-icons right">expand_less</i>

            </span>

            <p> {{ $article->published_at->diffForHumans() }}

            @if($show_admin_panel)

                <p class="{{ $is_approved ? 'blue-text' : 'red-text' }}"> {{ $is_approved ? 'APPROVED' : 'NOT YET APPROVED'  }}

            @endif

        </div>

        <div class='card-reveal'>

            <span class='card-title grey-text text-darken-4'> 

                {{ $article->title }}

                <i class='material-icons right'>close</i>

            </span>

            <p> {{ $article->published_at->diffForHumans() }}

            <p> {{ $article->description }}

            <div class="input-field">

                <a href=" {{ url( 'articles/' . $article->id ) }} " class="btn waves-effect waves-light red darken-2">

                    Click here to read the full article.

                </a>
            </div>
            
            @if ($show_admin_panel)

                <div id="admin_section">

                    <hr class="input-field">

                    <h5>Administrator Panel</h5>

                    @if ($show_edit_btn)


                        <div class="input-field col s12">

                            <a href=" {{ url( 'articles/' . $article->id . '/edit' ) }} " class="btn-flat waves-effect waves-dark blue-text">

                                <i class="material-icons left"> create </i>

                                Edit Article

                            </a>
                        </div>


                    @endif

                    @if ($show_approve_btn)

                        <div class="input-field col s12">

                        	<form action=" {{ url( 'articles/' . $article->id . '/' . $approve_url ) }} " method="post">

                        		{!! csrf_field() !!}

	                            <button type="submit" class="btn-flat waves-effect waves-dark deep-orange-text transparent">
	                                
	                                <i class="material-icons left"> {{ $is_approved ? 'visibility_off' : 'visibility' }} </i> 

	                                {{ $is_approved ? 'Unapprove Article' : 'Approve Article' }}

	                            </button>

                            </form>


                        </div>

                    @endif

                    @if ($show_delete_btn)

                        <div class="input-field col s12">

                            <form action=" {{ url('articles/' . $article->id ) }} " method="post">

                                {!! method_field('delete') !!}

                                {!! csrf_field() !!}

                                <button type="submit" class="btn-flat waves-effect waves-dark red-text transparent">

                                    <i class="material-icons left"> delete </i>

                                    Delete Article

                                </button>

                            </form>

                        </div>

                    @endif

                </div>

            @endif

        </div>

    </div>

 </div>
