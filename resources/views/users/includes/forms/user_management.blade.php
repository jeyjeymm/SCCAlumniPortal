<div id="form_user_management_container" class="marg_20 white z-depth-1 col s12 m6 l6 offset-m3 offset-l3" style="display: none">

    <form id="form_user_management" class="pad_20" action=" {{ url('users') }} " method="post">

        <input type="hidden" id="laravel_method">

        <!-- Assign 1 as default course ID for new users created by admin -->
        <input type="hidden" name="course_id" value="1"/>

        {!! csrf_field() !!}

        <a id="btn_back" href><i class="material-icons">arrow_back</i></a>
        <h5 style="display: inline-block">User Management:</h5>

        <!--<div class="input-field">

            <input id="id" name="id" type="text" value="{{ old('id') }}" readonly>

            <label id="lbl_id" for="id">ID: </label>

        </div>-->

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


        <!-- <div class="input-field">

            <input name="password" type="password" required>

            <label for="password">Password: </label>

        </div>

        
        <div class="input-field">

            <input name="password_confirmation" type="password" required>

            <label for="password_confirmation">Confirm Password: </label>

        </div> -->

        <div class="row">

            <div class="input-field col s12 m6 l6">

                <select id="department_id" name="department_id">

                    <option disabled {{ old('department_id') === null ? "selected" : "" }} >Choose option</option>

                    <option value="2" {{ old('department_id') === "2" ? "selected" : "" }} >CICS</option>

                    <option value="3" {{ old('department_id') === "3" ? "selected" : "" }} >CABA</option>

                    <option value="4" {{ old('department_id') === "4" ? "selected" : "" }} >CTE</option>

                    <option value="5" {{ old('department_id') === "5" ? "selected" : "" }} >High School</option>

                    <option value="6" {{ old('department_id') === "6" ? "selected" : "" }} >UPHS</option>

                </select>

                <label>Department: </label>

            </div>

            <!--<div class="col s12 m4 l4">

                <label>Course: </label>
                <select id="course_id" name="course_id" class="browser-default">

                    <option disabled {{ old("course_id") === null ? "selected" : "" }} >Select course</option>
                    <option value="1" {{ old("course_id") === '1' ? "selected" : "" }}>N/A</option>
                    <option value="2" {{ old("course_id") === '2' ? "selected" : "" }}>BSIT</option>
                    <option value="3" {{ old("course_id") === '3' ? "selected" : "" }}>CICS</option>
                    <option value="4" {{ old("course_id") === '4' ? "selected" : "" }}>IS</option>
                    <option value="5" {{ old("course_id") === '5' ? "selected" : "" }}>ACT</option>
                    <option value="6" {{ old("course_id") === '6' ? "selected" : "" }}>BSA</option>
                    <option value="7" {{ old("course_id") === '7' ? "selected" : "" }}>BSBA</option>
                    <option value="8" {{ old("course_id") === '8' ? "selected" : "" }}>JSC</option>
                    <option value="9" {{ old("course_id") === '9' ? "selected" : "" }}>BEED-Gen ED</option>
                    <option value="10" {{ old("course_id") === '10' ? "selected" : "" }}>BEED</option>
                    <option value="11" {{ old("course_id") === '11' ? "selected" : "" }}>BSED</option>

                </select>

            </div>-->

            <div class="input-field col s12 m6 l6 role_container">

                <select id="role_id" name="role_id">

                    <option disabled {{ old('role_id') === null ? "selected" : "" }} >Choose option</option>

                    <option value="1" {{ old('role_id') === "1" ? "selected" : "" }} >Admin</option>

                    <option value="2" {{ old('role_id') === "2" ? "selected" : "" }} >Editor</option>

                    <!--<option value="3" {{ old('role_id') === "3" ? "selected" : "" }} >User</option>-->

                </select>

                <label>Role: </label>

            </div>

        </div>

        <!--<div class="row">

            <div class="col s12 m12 l12">

                <label>Batch</label>
                <select name="batch" class="browser-default">

                    <option disabled {{ old('batch') === null ? "selected" : "" }} >Select batch</option>

                    @for ($year = 2000; $year <= date('Y'); $year++)

                        <option value="{{ $year }}" {{ old('batch') === "$year" ? "selected" : "" }} >{{ $year }}</option>

                    @endfor

                </select>

            </div>

        </div>-->

        <div class="input-field">

            @if (Auth::user()->role->name === 'admin')

                <button id="btn_submit" class="btn waves-effect waves-light red darken-1" type="submit">Authorize Account</button>

                <a id="btn_delete" class="btn-flat waves-effect waves-dark red-text">Delete Account</a>

            @endif

                <a id ="btn_goto_profile" class="btn-flat waves-effect waves-dark blue-text">Go to profile</a>

        </div>

        @include('errors.form_errors')

    </form>

</div>