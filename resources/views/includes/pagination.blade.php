<!--

	@params

	Paginator $paginator

-->
@if($paginator->lastPage() !== 1)

    <div id="pagination" class="row">

		<ul class="pagination">

			<li class="{{ $paginator->currentPage() === 1 ? 'disabled ' : '' }} waves-effect pagination_arrows">

				<a href="{{ $paginator->url($paginator->previousPageUrl()) }}"><i class="material-icons">chevron_left</i></a>

			</li>

				@for ($i = 1; $i <= $paginator->lastPage(); $i++) 

			        <li class="{{ $paginator->currentPage() === $i ? 'active ' : '' }} waves-effect pagination_pages">

			        	<a href="{{ $paginator->url($i) }}">{{ $i }}</a>

			        </li>

				@endfor

			<li class="{{ $paginator->currentPage() === $paginator->lastPage() ? 'disabled ' : '' }} waves-effect pagination_arrows" id="btn_forward">

				<a href="{{ $paginator->url($paginator->nextPageUrl()) }}"><i class="material-icons">chevron_right</i></a>

			</li>

		</ul>

	</div>

@endif