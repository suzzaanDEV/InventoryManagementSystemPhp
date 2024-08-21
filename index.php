<?php
  ob_start();
  require_once('includes/load.php');
  if ($session->isUserLoggedIn(true)) { redirect('home.php', false); }
?>
<?php include_once('layouts/header.php'); ?>
<style>
  body {
    background: linear-gradient(135deg, #4a90e2, #50e3c2);
    height: 100vh;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .login-page {
    background: rgba(255, 255, 255, 0.8);
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    max-width: 400px;
    width: 100%;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    text-align: center;
  }
  .login-page h1 {
    color: #333;
    margin-bottom: 10px;
  }
  .login-page h4 {
    color: #555;
    margin-bottom: 30px;
  }
  .form-group {
    margin-bottom: 20px;
  }
  .form-group label {
    display: block;
    font-size: 14px;
    color: #333;
    margin-bottom: 5px;
  }
  .form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
  }
  .form-group button {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #4a90e2;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  .form-group button:hover {
    background-color: #357abd;
  }
</style>

<div class="login-page">
    <div class="text-center">
       <h1>Login Panel</h1>
       <h4>Inventory Management System</h4>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="auth.php" class="clearfix">
        <div class="form-group">
              <label for="username" class="control-label">Username</label>
              <input type="text" class="form-control" name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
            <label for="Password" class="control-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group">
                <button type="submit">Login</button>
        </div>
    </form>
</div>
<?php include_once('layouts/footer.php'); ?>
