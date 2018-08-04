<h3 class="text-center" style="background-color: #0069d9; color: white; border: none; border-radius: 5px;">Menu</h3>


<table class="table-striped" style="width: 100%;">
  <thead>
    <tr>
      <td><b>Point Name</b></td>
      <td colspan="2"><b>Sort</b></td>
      <td><b>Status</b></td>
    </tr>
  <thead>
  <tbody>
  @foreach( $menu as $menuPoint )
    <tr>
      <td class="edit-menu">{{ $menuPoint->menu_point }} <p>(<a href="">edit</a>)</p></td>
      <td><a href=""><i class="fas fa-angle-up"></i></a></td>
      <td><a href=""><i class="fas fa-angle-down"></i></a></td>
      <td><a href="">shown</a></td>
    </tr>
  @endforeach
  <tbody>
</table>

<style>
  
  .edit-menu p {
    font-size: 10px;
  }

</style>