<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link href="style2.css" rel="stylesheet">

<link rel="stylesheet" href="bootstrap.css" >
<script language="JavaScript" src="js/user.js"></script>

</head>
	<body leftmargin="20%">	
	<div class="log-div">
			<div>
				<img src="Election-Vote-2-icon.png"  width=10%  ></img>
			 <h1>Se conneceter pour voter </h1><a href="admin/index.php"></a>
			</div>
			<div>
			<div class="modal-body">
			<form [formGroup] = "formValue" name="form1" method="post" action="checklogin.php" onsubmit="return loginValidate(this)">
              <div class="mb-3">
                <label  class="form-label">Email</label>
                <input  name="myusername" type="text" id="myusername" class="form-control"   >
              </div>
                <div class="mb-3">
                  <label  class="form-label">password</label>
                  <input name="mypassword" type="password" id="mypassword"class="form-control" >
                  
                </div>
				<input class="btn btn-success" type="submit" name="Submit" value="Se connecter">
            
              </form>

	 
			  </div>
			  <a mat-list-item routerLinkActive="list-item-active" href="register.php" class ="mat-list-item">S'inscrire</a>
			  <br/> 
			  <a mat-list-item routerLinkActive="list-item-active" href="admin/index.php">Se connecter comme Admin</a>
		 
			 
			</div>
		</div>
	</body>
</html>
