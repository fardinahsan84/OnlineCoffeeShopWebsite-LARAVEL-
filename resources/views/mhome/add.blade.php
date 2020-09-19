
@extends('welcome')
<!-- @extends('Layout.main') -->
  <form method="post">
    <div class="p-3 mb-2 bg-dark text-white">

  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <style>
  table.center {
        margin-left: auto;
        margin-right: auto;
      }
  </style>
            <legend>Add Coffee Item</legend>
            <table class="center">
              <tr>
                <td class="p-3 mb-2 bg-dark text-white">Item name</td>
                <td><input type="text" name="name" ><span style="color:red;">{{$errors->first('name')}}</span></td>

              </tr>
              <tr>
                <td class="p-3 mb-2 bg-dark text-white">Item price</td>
                <td><input type="text" name="price" ><span style="color:red;">{{$errors->first('price')}}</span></td>

              </tr>
              <tr>
                <td class="p-3 mb-2 bg-dark text-white">Ingredients</td>
                <td><input type="text" name="ingredients" ><span style="color:red;">{{$errors->first('ingredients')}}</span></td>

              </tr>

              <tr>
                <td class="p-3 mb-2 bg-dark text-white">Item status</td>
                <td>  <input type="radio" id="available" name="status" value="available" checked="checked">
                      <label for="available" class="p-3 mb-2 bg-dark text-white">Available</label><br>
                      <input type="radio" id="notAvailable" name="status" value="not available" >
                      <label for="notAvailable" class="p-3 mb-2 bg-dark text-white">Not Available</label><br>
                </td>
              </tr>

              <tr>
                <td></td>
                <td><button type="submit" name"choice" value="Insert" class="btn btn-success">Insert</button></td>
              </tr>
            </table>
      <table>
          <tr>
            <td><a href="{{route('manager.index')}}"  class="btn btn-secondary" >Back</a>
          	<a href="{{route('logout.index')}}" class="btn btn-danger" >Logout</a></td>
          </tr>
      </table>
    </div>
    </form>
