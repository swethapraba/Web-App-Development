<!DOCTYPE html>
<html>
  <head>
    <title> The First Form</title>
    <style>
      body{
	  color: pink;
	  background-color: black;
    }
    </style>
  </head>
  <body>
      <h1> Welcome to the Form </h1>
      <form name = "myForm" method = "post" action = "10.FirstformCode.php">
      Name: <input type = "text" name = "firstname" placeholder = "First" autofocus = "autofocus"> 
            <input type = "text" name = "middle" placeholder = "Middle"> 
           <input type = "text" name = "lastname" placeholder = "Last"><br>
      Phone: <input type = "text" name = "number" placeholder = "000-000-0000"> <br>
      Birth date: <input type = "text" name = "birthday" placeholder = "00/00/0000"> <br>
      Favorite Language:
      <select size = "4" name = "language">
        <option  selected> Java
        <option> PHP 
        <option> Swift
        <option> C
      </select> <br>
      <button type = "submit"> <U>S</U>ubmit </button>
    </form>
    <br>
    <br>
   
    Entry was: &nbsp;&nbsp;&nbsp; Time Submitted: <?php echo date("m/d/Y h:i:s a", $_SERVER['REQUEST_TIME']);?> <br> 
    Name: <?php echo $_REQUEST["firstname"]; 
        echo " ";
        echo $_REQUEST["middle"]; 
        echo " ";
        echo $_REQUEST["lastname"];?></br>
    Phone: <?php echo $_REQUEST["number"]; ?> </br>
    Birth date: <?php echo $_REQUEST["birthday"]?></br>
    Favorite Language: <?php echo $_REQUEST["language"] ?> </br>
 
  </body>
</html>