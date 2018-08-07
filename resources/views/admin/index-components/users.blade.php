<div id="user-manager">
  <h3 class="text-center header-component header-caption">Users</h3>

  <div class="component-body">
    <span><b>Email: </b></span>
    <input type="text" id="search-user" class="form-control" placeholder="Search" value=
    "{{ $searchWord }}"/>

    <table class="table-striped w-100">
      @foreach( $users as $user )
        <tr class="user-info" id="current-row-{{ $user->id }}">
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td class="role">

            <span id="role-info-{{ $user->id }}">
              <span class="role-name"> {{ $user->role->role }} </span>
              <p>(<a href="" class="open-role-editor" id-user="{{ $user->id }}">change</a>)</p>
            </span>

            <div class="role-editor" id="role-editor-{{ $user->id }}">
              <select class="w-100" id="change-role-{{ $user->id }}">
                @foreach( $roles as $role )
                <option>{{ $role->role }}</option>
                @endforeach
              </select>
              <button class="confirm-new-role btn btn-primary " id-user="{{ $user->id }}">Confirm</button>
            </div>

          </td>
        </tr>    
      @endforeach
    </table>
  </div>
</div>