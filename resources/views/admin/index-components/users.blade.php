<h3 class="text-center" style="background-color: #0069d9; color: white; border: none; border-radius: 5px;">Users</h3>

<table class="table-striped" style="width: 100%;">  
  @foreach( $users as $user )     
    <tr>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->role->role }}</td>
      
    </tr>
  @endforeach
</table>