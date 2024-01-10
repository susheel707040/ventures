<!DOCTYPE html>  
<html lang="en">  
<head>  
  <meta charset="UTF-8">  
  <title>User Registration</title>  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">  
</head>  
<style>  
  html {   
    height: 100%;   
  }  
  body {   
    height: 100%;   
  }  
  .global-container {  
    height: 100%;  
    display: flex;  
    align-items: center;  
    justify-content: center;  
    background-color: #f5f5f5;  
  }  
  form {  
    padding-top: 10px;  
    font-size: 14px;  
    margin-top: 30px;  
  }  
  .card-title {   
    font-weight: 300;  
  }  
  .btn {  
    font-size: 14px;  
    margin-top: 20px;  
  }  
  .login-form {   
    width: 330px;  
    margin: 20px;  
  }  
  .sign-up {  
    text-align: center;  
    padding: 20px 0 0;  
  }  
  .alert {  
    margin-bottom: -30px;  
    font-size: 13px;  
    margin-top: 10px;  
  }  
</style>  
<body>  
  <div class="pt-5">  
    <div class="global-container">  
      <div class="card login-form">  
        <div class="card-body">  
          <h3 class="card-title text-center"><b><i>User Registration</i></b></h3>  
          <div class="card-text">  
            <form action="registeration_process.php" method="post" onsubmit="return validateForm()"> 
              <div class="form-group">  
                <label for="username"><b>UserName</b> <span style="color:red">*</span></label>  
                <input type="text" name="username" id="username" aria-describedby="emailHelp" class="form-control form-control-sm required">     
              </div>  

              <div class="form-group">  
                <label for="email"><b>Email</b> <span style="color:red">*</span></label>   
                <input type="email" name="email" id="email" class="form-control form-control-sm"> 
              </div>  

              <div class="form-group">  
                <label for="password"><b>Password</b> <span style="color:red">*</span></label>   
                <input type="password" name="password" id="password" class="form-control form-control-sm"> 
              </div>  
              <button type="submit" class="btn btn-primary btn-block" value="Register"><b>Signup </b></button>      
              <div class="sign-up">
              </div>  
            </form>  
          </div>  
        </div>  
      </div>  
    </div>  
  </div>  

  <script>

    function validateForm() {
      
      var username = document.getElementById("username").value;
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;

    
      if (username.trim() === "" || email.trim() === "" || password.trim() === "") {
        alert("All fields must be filled out");
        return false;
      }
      if (password.length < 6 || password.length > 8) {
        alert("Password must be between 6 and 8 characters");
        return false;
      }
      return true;
    }
  </script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>  
</html>
