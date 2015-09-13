<div id="tbl_user_management_container" class="col s12 m10 l10 offset-m1 offset-l1 card marg_20">

    <div id="user_management_search" class="pad_20">

        <div class="input-field col s10 m10 l10">
            
            <i class="material-icons prefix">search</i>
            <input type="text" id="user_search" name="search"/>
            <label for="user_search">Search</label>

        </div>

        <div class="input-field col s2 m2 l2">
            
            <select id="search_type">
                <option value="name" selected>Name</option>
                <option value="id">ID</option>
                <option value="email">Email</option>
            </select>
            <label>Search by:</label>

        </div>

        <div class="input-field col s6 m6 l6">
            
            <select id="order_by">
                <option value="id" selected>ID</option>
                <option value="name">Name</option>
                <option value="department_id">Department</option>
                <option value="updated_at">Date Updated</option>
            </select>
            <label>Order by:</label>

        </div>


        <div class="input-field col s6 m6 l6">
            
            <select id="order_by_direction">
                <option value="asc" selected>Ascending</option>
                <option value="desc">Descending</option>
            </select>
            <label>Order by:</label>

        </div>

    </div>
    <div class="row">
    
		@include('users.includes.tbl_user_management_body')

	</div>

    @if (Auth::user()->role_id === 1)

        <div class="row">
            
            <button id="btn_create_account" class="btn waves-effectw waves-light red darken-2 right">Create Account</button>

        </div>

    @endif

</div>  