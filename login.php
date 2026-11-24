<?php
session_start();

/* --- SECURE ADMIN LOGIN CONFIG --- */
// Generate new hashes using: echo password_hash("pass2026", PASSWORD_DEFAULT);
$ADMIN_USERNAME = "admine";
$HASHED_PASSWORD = '$2y$10$CwE47V/yYTUtEI1.ypYgmu63N4McDHwFJge.HWrKhLXmlcrgJe1hK'; // hash for "pass2026"

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($username === $ADMIN_USERNAME && password_verify($password, $HASHED_PASSWORD)) {
        // Instead of immediate redirect, we’ll handle it with JS splash
        $_SESSION["admin_logged_in"] = true;
        echo "<script>sessionStorage.setItem('loginSuccess', 'true');</script>";
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login — A50 Life Art</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
:root {
  /* Earth Tones */
  --bg-sand: #E8DCC6;
  --bg-clay: #D4C4B0;
  --text-charcoal: #2C2416;
  --text-dark: #1A1611;
  
  /* African Fabric Colors */
  --accent-orange: #CC5500;
  --accent-indigo: #4B0082;
  --accent-gold: #D4AF37;
  --accent-terracotta: #B87333;
  
  /* Neutrals */
  --text-muted: #5C4A37;
  --border-subtle: rgba(44, 36, 22, 0.1);
  
  /* Legacy variables */
  --primary: #CC5500;
  --primary-light: #E67E22;
  --bg-gradient: linear-gradient(135deg, var(--accent-orange), var(--accent-terracotta) 60%, var(--accent-gold));
}

/* Base */
* { box-sizing: border-box; margin: 0; padding: 0; }
body {
  font-family: 'Inter', sans-serif;
  background: var(--bg-sand);
  background-image: 
    url("data:image/svg+xml,%3Csvg width='100' height='100' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E"),
    linear-gradient(135deg, var(--accent-orange), var(--accent-terracotta) 60%, var(--accent-gold));
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  overflow: hidden;
  color: var(--text-charcoal);
}

/* Floating ambient lights */
body::before, body::after {
  content: "";
  position: absolute;
  border-radius: 50%;
  background: radial-gradient(circle at center, rgba(212, 175, 55, 0.15), transparent);
  animation: float 10s ease-in-out infinite alternate;
}
body::before { width: 250px; height: 250px; top: 15%; left: 10%; }
body::after { width: 300px; height: 300px; bottom: 10%; right: 8%; animation-delay: 3s; }

@keyframes float {
  0% { transform: translateY(0px); opacity: 0.8; }
  100% { transform: translateY(-25px); opacity: 1; }
}

/* Login Card */
.login-box {
  background: rgba(232, 220, 198, 0.95);
  backdrop-filter: blur(18px);
  border: 2px solid var(--accent-orange);
  border-radius: 4px;
  padding: 45px 50px;
  box-shadow: 0 8px 25px rgba(44, 36, 22, 0.2);
  width: 360px;
  text-align: center;
  animation: fadeIn 0.8s ease forwards;
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(40px); }
  to { opacity: 1; transform: translateY(0); }
}

.login-box h2 {
  margin-bottom: 25px;
  font-weight: 700;
  color: var(--text-charcoal);
  font-family: 'Playfair Display', serif;
}
.login-box h2 i { color: var(--accent-orange); margin-right: 8px; }

input[type="text"], input[type="password"] {
  width: 100%;
  padding: 12px 14px;
  margin: 10px 0 18px;
  border: 2px solid var(--border-subtle);
  border-radius: 0;
  background: var(--bg-sand);
  color: var(--text-charcoal);
  font-size: 1rem;
  font-family: 'Inter', sans-serif;
  outline: none;
  transition: 0.3s;
}
input:focus { 
  border-color: var(--accent-orange);
  box-shadow: 0 0 0 3px rgba(204, 85, 0, 0.2); 
}

button {
  width: 100%;
  padding: 12px;
  background: var(--accent-orange);
  color: var(--bg-sand);
  border: 2px solid var(--accent-orange);
  border-radius: 0;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: 0.3s ease;
  margin-top: 5px;
  font-family: 'Inter', sans-serif;
}
button:hover {
  transform: translateY(-2px);
  background: var(--accent-terracotta);
  border-color: var(--accent-terracotta);
  box-shadow: 0 4px 15px rgba(204, 85, 0, 0.4);
}

.error {
  color: var(--danger);
  margin-top: 12px;
  font-size: 0.9rem;
  background: rgba(197, 48, 48, 0.1);
  border: 1px solid var(--danger);
  border-radius: 0;
  padding: 8px 10px;
  font-family: 'Inter', sans-serif;
}
.back {
  display: inline-block;
  margin-top: 18px;
  color: var(--accent-orange);
  text-decoration: none;
  font-weight: 500;
  font-family: 'Inter', sans-serif;
}
.back:hover { 
  color: var(--accent-terracotta);
  text-decoration: underline; 
}

/* Success Splash */
.splash {
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0,0,0,0.7);
  display: none;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  z-index: 999;
  color: white;
  backdrop-filter: blur(10px);
  animation: fadeInSplash 0.4s ease;
}
@keyframes fadeInSplash {
  from { opacity: 0; }
  to { opacity: 1; }
}
.checkmark {
  width: 90px;
  height: 90px;
  border-radius: 50%;
  border: 6px solid var(--accent-gold);
  position: relative;
  animation: popIn 0.5s ease forwards;
}
.checkmark::after {
  content: '';
  position: absolute;
  left: 24px; top: 38px;
  width: 25px; height: 45px;
  border-right: 6px solid var(--accent-gold);
  border-bottom: 6px solid var(--accent-gold);
  transform: rotate(45deg);
  animation: draw 0.6s ease 0.4s forwards;
  opacity: 0;
}
@keyframes popIn {
  from { transform: scale(0); opacity: 0; }
  to { transform: scale(1); opacity: 1; }
}
@keyframes draw {
  to { opacity: 1; }
}
.welcome-text {
  margin-top: 25px;
  font-size: 1.3rem;
  font-weight: 600;
  letter-spacing: 0.5px;
  font-family: 'Playfair Display', serif;
  color: var(--text-charcoal);
}
</style>
</head>
<body>

<form class="login-box" method="POST" id="loginForm">
  <h2><i class="fas fa-user-shield"></i> Admin Login</h2>
  <input type="text" name="username" placeholder="Username" required autofocus>
  <input type="password" name="password" placeholder="Password" required>
  <button type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
  <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
  <a href="index.php" class="back"><i class="fas fa-arrow-left"></i> Back to Home</a>
</form>

<!-- Success Splash -->
<div class="splash" id="splash">
  <div class="checkmark"></div>
  <div class="welcome-text">Welcome back, A50!</div>
</div>

<script>
if (sessionStorage.getItem('loginSuccess') === 'true') {
  // Clear flag immediately so it doesn’t replay
  sessionStorage.removeItem('loginSuccess');

  const splash = document.getElementById('splash');
  splash.style.display = 'flex';

  setTimeout(() => {
    splash.querySelector('.checkmark').style.transform = 'scale(1.2)';
  }, 300);

  // Redirect after 2 seconds
  setTimeout(() => {
    splash.style.opacity = '0';
    setTimeout(() => { window.location.href = 'admin.php'; }, 500);
  }, 2000);
}
</script>

</body>
</html>
