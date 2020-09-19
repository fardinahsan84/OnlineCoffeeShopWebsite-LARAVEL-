<!DOCTYPE html>
<html>
<head>
    <title>Delete Student</title>
</head>
<body>
    <form method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">

      <center>
        <fieldset>
            <table>
              <tr>
                <td>Student name: </td>
                <td>{{$user['name']}} </td>
              </tr>
              <tr>
                <td>Student password:</td>
                <td>{{$user['password']}}</td>
              </tr>
              <tr>
                <td>Email address:</td>
                <td>{{$user['email']}}</td>
              </tr>
              <tr>
                <td><h3>Are you sure you want to delete?</h3></td>
              </tr>
              <tr>
                <td><input type="submit" name="submit" value="Confirm"></td>
                <td><input type="hidden" name="id" value="{{$user['id']}}"></td>
              </tr>
            </table>
        </fieldset>

      </center>
    </form>
</body>
