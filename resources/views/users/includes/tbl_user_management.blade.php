<div id="tbl_userManagementContainer" class="col s12 m10 l10 offset-m1 offset-l1 card marg_20">

    <div id="user_management_search" class="pad_20">

        <div id="input_search_container" class="input-field col s12 m10 l10">
            
            <i class="material-icons prefix">search</i>

            <input type="text" id="input_search" name="search"/>

            <label for="input_search">Search</label>

        </div>

        <div id="industry_container" class="input-field col s12 m10 l10" style="display: none">

            @include('survey.employment_data.includes.forms._industry')

        </div>

        <div class="input-field col s12 m2 l2">
            
            <select id="search_type">

                <option value="name" selected>Name</option>
                <!--<option value="id">ID</option>
                <option value="email">Email</option>-->
                <option value="batch">Batch</option>
                <option value="industry">Industry</option>

            </select>
            <label>Search by:</label>

        </div>

        <div class="input-field col s6 m4 l4">
            
            <select id="order_by">

                <option value="name" selected>Name</option>
                <option value="batch">Batch</option>
                <!--<option value="id">ID</option>-->
                <option value="department_id">Department</option>
                <option value="updated_at">Date Updated</option>

            </select>

            <label>Order by:</label>

        </div>


        <div class="input-field col s6 m4 l4">
            
            <select id="order">

                <option value="asc" selected>Ascending</option>
                <option value="desc">Descending</option>

            </select>

            <label>Order by:</label>

        </div>

        <div class="input-field col s12 m4 l4">
            
            <select id="department_filter" class="browser-default">

                <option value="0">All Departments</option>
                <option value="1">Public Department</option>
                <option value="2">CICS Department</option>
                <option value="3">CABA Department</option>
                <option value="4">CTE Department</option>
                <option value="5">High School Department</option>
                <option value="6">UPHS Department</option>

            </select>
            
        </div>

    </div>

    <div class="row">
    
		@include('users.includes.tbl_user_management_body')

	</div>

    @if (Auth::user()->role->name === 'admin')

        <div class="row">
            
            <button id="btn_createAccount" class="btn waves-effect waves-light red darken-2 right">Create Account</button>
            <a id="btn_printTable" class="btn-flat waves-effect waves-light left"><i class="material-icons">print</i></a>

        </div>

    @endif



</div>  