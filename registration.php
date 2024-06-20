<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <style>
        * { box-sizing: border-box; }
@import url('https://fonts.googleapis.com/css?family=Rubik:400,500&display=swap');


body {
  font-family: 'Rubik', sans-serif;
}

.container {
  display: flex;
  height: 100vh;
}

.left {
  overflow: hidden;
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  justify-content: center;
  animation-name: left;
  animation-duration: 1s;
  animation-fill-mode: both;
  animation-delay: 1s;
}

.right {
  flex: 1;
  background-color: black;
  transition: 1s;
  background-image: url(assets/images/train.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}



h2 {
  margin: 0;
  color: #4f46a5;
}

h4 {
  margin-top: 10px;
  font-weight: normal;
  font-size: 15px;
  color: rgba(0,0,0,.4);
}

.form {
  max-width: 80%;
  display: flex;
  flex-direction: column;
}

.form > p {
  text-align: right;
}

.form > p > a {
  color: #000;
  font-size: 14px;
}

.form-field {
  height: 46px;
  padding: 0 16px;
  border: 2px solid #ddd;
  border-radius: 4px;
  font-family: 'Rubik', sans-serif;
  outline: 0;
  transition: .2s;
  margin-top: 20px;
}

.form-field:focus {
  border-color: #0f7ef1;
}

.form > button {
  padding: 12px 10px;
  border: 0;
  background: linear-gradient(to right, #de48b5 0%,#0097ff 100%); 
  border-radius: 3px;
  margin-top: 10px;
  color: #fff;
  letter-spacing: 1px;
  font-family: 'Rubik', sans-serif;
}

.animation {
  animation-name: move;
  animation-duration: .4s;
  animation-fill-mode: both;
  animation-delay: 2s;
}

.a1 {
  animation-delay: 2s;
}

.a2 {
  animation-delay: 2.1s;
}

.a3 {
  animation-delay: 2.2s;
}

.a4 {
  animation-delay: 2.3s;
}

.a5 {
  animation-delay: 2.4s;
}

.a6 {
  animation-delay: 2.5s;
}

@keyframes move {
  0% {
    opacity: 0;
    visibility: hidden;
    transform: translateY(-40px);
  }

  100% {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }
}

@keyframes left {
  0% {
    opacity: 0;
    width: 0;
  }

  100% {
    opacity: 1;
    padding: 20px 40px;
    width: 440px;
  }
}</style>
</head>
<body>
<div class="container">
  <div class="left">
    <div class="header">
      <h2 class="animation a1">Create Your IRCTC Account.</h2>
      
    </div>
    <form action="register.php" method="post" enctype="multipart/form-data">
    <div class="form">
        
      <input type="text" name='username' class="form-field animation a3" placeholder="User Name" required>
      <input type="password" name="password" class="form-field animation a4" placeholder="Password" required>
      <input type="text" name="name" class="form-field animation a5" placeholder="Full Name" required>
        <br><label for="dob">Date of Birth:</label>
        <input type="date" name="dob" class="form-field animation a6" placeholder="Date of Birth" required>
        <input type="email" name="email" class="form-field animation a7" placeholder="Email" required>
        <input type="number" name="mobno" class="form-field animation a8" placeholder="Mobile Number" required>
        <br>
        <label for="gender">Gender:</label>
        <select name="gender" class="form-field animation a9" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>

    
      
      
      <button class="animation a6" type="submit">SIGN IN</button><br>
      
      
    </form>
    
     

    </div>
  </div>
  <div class="right"></div>
</div>
<h3>               Already have an account? <a href="login.php">Login</h3>
  </div></p>

</body>
</html>

