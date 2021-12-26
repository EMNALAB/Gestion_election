<!DOCTYPE html>
<html>
<head>
<link href="styles.css" rel="stylesheet">

<link rel="stylesheet" href="bootstrap2.css" >
<script language="JavaScript" src="js/admin.js"></script>
</head>
 

	<body leftmargin="20%">	
	<div class="log-div">
			<div>
				<img src="images/admin.png"  width=30%  ></img>
			 <h1>Administrateur  </h1><a href="admin/index.php"></a>
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
		 
		 
			 
			</div>
		</div>
	</body>

  
</html>