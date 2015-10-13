<div id="form_userManagementContainer" class="marg_20 white z-depth-1 col s12 m6 l6 offset-m3 offset-l3" style="display: none">

    <form id="form_userManagement" class="pad_20" action=" {{ url('users') }} " method="post">

        <input type="hidden" id="laravel_method">

        <!-- Assign 1 as default course ID for new users created by admin -->
        <input type="hidden" name="course_id" value="1"/>

        {!! csrf_field() !!}

        <a id="btn_back" href><i class="material-icons">arrow_back</i></a>
        <h5 style="display: inline-block">User Management:</h5>


        <div class="input-field">

            <input id="name" name="name" type="text" value="{{ old('name') }}" required>

            <label id="lbl_name" for="name">Full Name: </label>

        </div>


        <div class="input-field">

            <input id="email" name="email" type="email" value="{{ old('email') }}" required>

            <label id="lbl_email" for="email">Email: </label>

        </div>



        <div class="input-field">

            <input id="username" name="username" type="text" value="{{ old('username') }}" required>

            <label id="lbl_username" for="username">Username: </label>

        </div>

        <div class="row">

            <div class="col s12 m6 l6">

                <div class="input-field">

                    <select id="department_id" name="department_id">

                        <option disabled {{ old('department_id') === null ? "selected" : "" }} >Choose option</option>

                        <option value="2" {{ old('department_id') === "2" ? "selected" : "" }} >CICS</option>

                        <option value="3" {{ old('department_id') === "3" ? "selected" : "" }} >CABA</option>

                        <option value="4" {{ old('department_id') === "4" ? "selected" : "" }} >CTE</option>

                        <option value="5" {{ old('department_id') === "5" ? "selected" : "" }} >High School</option>

                        <option value="6" {{ old('department_id') === "6" ? "selected" : "" }} >UPHS</option>

                    </select>

                    <label for="department_id">Department: </label>

                </div>

            </div>

            <div class="col s12 m6 l6">

                <div class="input-field">

                    <select id="role_id" name="role_id">

                        <option disabled {{ old('role_id') === null ? "selected" : "" }} >Choose option</option>

                        <option value="1" {{ old('role_id') === "1" ? "selected" : "" }} >Admin</option>

                        <option value="2" {{ old('role_id') === "2" ? "selected" : "" }} >Editor</option>

                        <!--<option value="3" {{ old('role_id') === "3" ? "selected" : "" }} >User</option>-->

                    </select>

                    <label for="role_id">Role: </label>

                </div>

            </div>

        </div>

        <div class="input-field">

            @if (Auth::user()->role->name === 'admin')

                <button id="btn_submit" class="btn waves-effect waves-light red darken-1" type="submit">Authorize Account</button>

                <a id="btn_delete" class="btn-flat waves-effect waves-dark red-text">Delete Account</a>

            @endif

                <a id ="btn_goToProfile" class="btn-flat waves-effect waves-dark blue-text">Go to profile</a>

        </div>


        @include('errors.form_errors')


    </form>

</div>