<!--

	@params
	Collection/Paginator $users

-->
<div id="tbl_users_progress_bar" class="progress" style="display: none">

    <div class="indeterminate"></div>

</div>
<table id="tbl_user_management" class="striped">

    <thead>
        <tr>
            <th data-field="id">ID</th>
            <th data-field="name">Name</th>
            <th data-field="email">Email</th>
            <th data-field="username">Username</th>
            <th data-field="department">Department</th>
            <th data-field="course">Course</th>
            <th data-field="role">Role</th>
        </tr>
    </thead>

	<tbody>

		@if ($users->lastPage() !== 0) 

		    @foreach ($users as $user)

		        <tr>
		        	@if ($user->profile()->first())
		        		<input type="hidden" id="profile_id" value="{{ $user->profile->id }}"/>
		        	@endif

		        		<input type="hidden" id="id" value="{{ $user->id }}"/>
		        		<input type="hidden" id="name" value="{{ $user->name }}"/>
		        		<input type="hidden" id="email" value="{{ $user->email }}"/>
		        		<input type="hidden" id="username" value="{{ $user->username }}"/>
		        		<input type="hidden" id="department" value="{{ $user->department_id }}"/>
		        		<input type="hidden" id="course" value="{{ $user->course_id }}"/>
		        		<input type="hidden" id="role" value="{{ $user->role_id }}"/>

		            <td>{{ $user->id }}</td>
		            <td>{{ $user->name }}</td>
		            <td>{{ $user->email }}</td>
		            <td>{{ $user->username }}</td>
		            <td>{{ $user->department->name }}</td>

		            @if ($user->course()->first())
		            	<td>{{ $user->course->name }}</td>
		            @else
		            	<td> - </td>
		            @endif

		            <td>{{ $user->role->name }}</td>

		        </tr>

		    @endforeach

		@else

		    <tr>No users found.</tr>

		@endif

	</tbody>
	

</table>
<div id="tbl_users_pagination">
	{!! $users->render() !!}
</div>