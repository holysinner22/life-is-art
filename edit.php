<?php 
include 'config.php'; 
$id = intval($_GET['id']);
$res = $conn->query("SELECT * FROM paintings WHERE id=$id");
$row = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Painting — A50 Life Art</title>
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
  --success: #D4AF37;
  --danger: #C53030;
  --bg: #E8DCC6;
  --white: #fff;
}

/* Base */
body {
  font-family: 'Inter', sans-serif;
  background: var(--bg-sand);
  background-image: 
    url("data:image/svg+xml,%3Csvg width='100' height='100' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E"),
    linear-gradient(135deg, var(--accent-orange), var(--accent-terracotta) 60%, var(--accent-gold));
  margin: 0;
  padding: 40px 20px;
  color: var(--text-charcoal);
  overflow-x: hidden;
}

/* Container */
.container {
  max-width: 700px;
  margin: 40px auto;
  background: var(--bg-clay);
  backdrop-filter: blur(12px);
  border-radius: 4px;
  box-shadow: 0 15px 40px rgba(44, 36, 22, 0.15);
  border: 2px solid var(--accent-orange);
  padding: 50px 40px;
  animation: fadeUp 0.8s ease forwards;
}
h2 {
  text-align: center;
  color: var(--text-charcoal);
  font-weight: 700;
  font-size: 2rem;
  margin-bottom: 35px;
  font-family: 'Playfair Display', serif;
}
h2 i { color: var(--accent-orange); margin-right: 8px; }

/* Form */
form {
  display: flex;
  flex-direction: column;
  gap: 25px;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

/* Labels & Inputs */
label {
  font-weight: 600;
  color: var(--text-charcoal);
  font-size: 0.95rem;
  font-family: 'Inter', sans-serif;
  letter-spacing: 0.3px;
}
input, textarea {
  width: 100%;
  padding: 14px 18px;
  border-radius: 0;
  border: 2px solid var(--border-subtle);
  font-size: 1rem;
  background: var(--bg-sand);
  color: var(--text-charcoal);
  transition: all 0.3s ease;
  font-family: 'Inter', sans-serif;
  box-sizing: border-box;
}
input:focus, textarea:focus {
  border-color: var(--accent-orange);
  box-shadow: 0 0 0 3px rgba(204, 85, 0, 0.2);
}

textarea {
  resize: vertical;
  min-height: 100px;
  line-height: 1.6;
}

/* File Input */
input[type="file"] {
  padding: 12px;
  border: 2px dashed var(--accent-orange);
  cursor: pointer;
  background: var(--bg-sand);
  font-size: 0.95rem;
}
input[type="file"]:hover { 
  background: rgba(232, 220, 198, 0.8);
  border-color: var(--accent-terracotta);
}

/* Image */
.image-preview {
  width: 100%;
  max-height: 350px;
  object-fit: cover;
  border-radius: 4px;
  border: 2px solid var(--border-subtle);
  margin-top: 10px;
  display: block;
  box-shadow: 0 4px 15px rgba(44, 36, 22, 0.1);
}

/* Buttons */
button, .nav-link {
  border: none;
  border-radius: 0;
  padding: 12px 20px;
  font-weight: 500;
  cursor: pointer;
  text-decoration: none;
  transition: all 0.3s ease;
  font-family: 'Inter', sans-serif;
}
button {
  background: var(--accent-orange);
  color: var(--bg-sand);
  width: 100%;
  font-size: 1rem;
  border: 2px solid var(--accent-orange);
  padding: 16px 24px;
  margin-top: 10px;
  box-shadow: 0 6px 18px rgba(204, 85, 0, 0.3);
}
button:hover {
  background: var(--accent-terracotta);
  border-color: var(--accent-terracotta);
  transform: translateY(-2px);
  box-shadow: 0 8px 22px rgba(204, 85, 0, 0.4);
}

/* Nav Buttons */
.nav-buttons {
  display: flex;
  justify-content: space-between;
  gap: 12px;
  margin-top: 30px;
}
.nav-link {
  flex: 1;
  background: var(--bg-sand);
  color: var(--text-charcoal);
  text-align: center;
  font-weight: 500;
  border: 2px solid var(--border-subtle);
  padding: 12px 20px;
}
.nav-link:hover { 
  background: var(--accent-gold); 
  color: var(--text-charcoal);
  border-color: var(--accent-gold);
}

/* Splash Success */
.splash {
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0,0,0,0.7);
  display: none;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  z-index: 9999;
  color: white;
  backdrop-filter: blur(10px);
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
.welcome-text {
  margin-top: 25px;
  font-size: 1.3rem;
  font-weight: 600;
  font-family: 'Playfair Display', serif;
  color: var(--text-charcoal);
}
@keyframes popIn { from { transform: scale(0); opacity: 0; } to { transform: scale(1); opacity: 1; } }
@keyframes draw { to { opacity: 1; } }
@keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

/* Responsive */
@media (max-width: 768px) {
  .container {
    max-width: 95%;
    padding: 30px 20px;
  }

  h2 {
    font-size: 1.5rem;
    margin-bottom: 25px;
  }

  form {
    gap: 20px;
  }

  .form-group {
    gap: 6px;
  }

  input, textarea {
    padding: 12px 15px;
    font-size: 0.95rem;
  }

  .nav-buttons {
    flex-direction: column;
    gap: 10px;
  }

  .nav-link {
    width: 100%;
  }
}

@media (max-width: 480px) {
  .container {
    padding: 25px 15px;
  }

  h2 {
    font-size: 1.3rem;
  }

  label {
    font-size: 0.9rem;
  }

  input, textarea {
    padding: 10px 12px;
    font-size: 0.9rem;
  }

  button {
    padding: 14px 20px;
    font-size: 0.95rem;
  }
}
</style>
</head>
<body>

<div class="container">
  <h2><i class="fas fa-edit"></i> Edit Painting</h2>

  <form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title"><i class="fas fa-heading"></i> Title</label>
      <input type="text" name="title" id="title" value="<?= htmlspecialchars($row['title']) ?>" required>
    </div>

    <div class="form-group">
      <label for="description"><i class="fas fa-align-left"></i> Description</label>
      <textarea name="description" id="description" rows="4"><?= htmlspecialchars($row['description']) ?></textarea>
    </div>

    <div class="form-group">
      <label for="price"><i class="fas fa-dollar-sign"></i> Price (USD)</label>
      <input type="number" name="price" id="price" value="<?= htmlspecialchars($row['price']) ?>" min="0" step="0.01" required>
    </div>

    <div class="form-group">
      <label><i class="fas fa-image"></i> Current Image</label>
      <img src="<?= htmlspecialchars($row['image_url']) ?>" class="image-preview" alt="Current Image">
    </div>

    <div class="form-group">
      <label for="image_file"><i class="fas fa-image"></i> Change Image (Optional)</label>
      <input type="file" name="image_file" id="image_file" accept="image/*">
      <img id="preview" class="image-preview" style="display:none;" alt="Preview">
    </div>

    <button type="submit" name="update"><i class="fas fa-save"></i> Save Changes</button>
  </form>

  <div class="nav-buttons">
    <a href="admin.php" class="nav-link"><i class="fas fa-arrow-left"></i> Back to Admin</a>
    <a href="index.php" class="nav-link"><i class="fas fa-home"></i> Home</a>
  </div>

  <?php
  if (isset($_POST['update'])) {
      $title = $conn->real_escape_string($_POST['title']);
      $desc = $conn->real_escape_string($_POST['description']);
      $price = $conn->real_escape_string($_POST['price']);
      $image_url = $row['image_url'];

      if (!empty($_FILES["image_file"]["name"])) {
          $upload_folder = "uploads/";
          $target_dir = $upload_folder;
          if (!file_exists($target_dir)) mkdir($target_dir, 0777, true);
          $file_name = time() . "_" . basename($_FILES["image_file"]["name"]);
          $target_file = $target_dir . $file_name;
          $ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
          $valid_ext = ["jpg","jpeg","png","gif","webp"];

          if (in_array($ext, $valid_ext)) {
              if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_file)) {
                  // Verify file was saved
                  if (file_exists($target_file)) {
                      $image_url = $upload_folder . $file_name;
                  } else {
                      echo "<p class='error'>❌ File was not saved correctly.</p>";
                  }
              } else {
                  $upload_error = $_FILES["image_file"]["error"];
                  $error_messages = [
                      UPLOAD_ERR_INI_SIZE => "File exceeds upload_max_filesize directive",
                      UPLOAD_ERR_FORM_SIZE => "File exceeds MAX_FILE_SIZE directive",
                      UPLOAD_ERR_PARTIAL => "File was only partially uploaded",
                      UPLOAD_ERR_NO_FILE => "No file was uploaded",
                      UPLOAD_ERR_NO_TMP_DIR => "Missing temporary folder",
                      UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
                      UPLOAD_ERR_EXTENSION => "File upload stopped by extension"
                  ];
                  $error_msg = isset($error_messages[$upload_error]) ? $error_messages[$upload_error] : "Unknown upload error";
                  echo "<p class='error'>❌ Error uploading new image: $error_msg</p>";
              }
          } else {
              echo "<p class='error'>❌ Invalid file type. Only images allowed (jpg, jpeg, png, gif, webp).</p>";
          }
      }

      $sql = "UPDATE paintings SET title='$title', description='$desc', price='$price', image_url='$image_url' WHERE id=$id";
      if ($conn->query($sql)) {
          echo "<script>sessionStorage.setItem('paintingUpdated', 'true');</script>";
      } else {
          echo "<p class='error'>❌ Database Error: ".$conn->error."</p>";
      }
  }
  ?>
</div>

<!-- Splash Success -->
<div class="splash" id="splash">
  <div class="checkmark"></div>
  <div class="welcome-text">Painting updated successfully!</div>
</div>

<script>
// Live preview
const fileInput = document.getElementById('image_file');
const preview = document.getElementById('preview');
fileInput.addEventListener('change', e => {
  const file = e.target.files[0];
  if (file) {
    preview.src = URL.createObjectURL(file);
    preview.style.display = 'block';
  } else {
    preview.style.display = 'none';
  }
});

// Show splash on success
if (sessionStorage.getItem('paintingUpdated') === 'true') {
  sessionStorage.removeItem('paintingUpdated');
  const splash = document.getElementById('splash');
  splash.style.display = 'flex';
  setTimeout(() => {
    splash.style.opacity = '0';
    setTimeout(() => { window.location.href = 'admin.php'; }, 600);
  }, 2000);
}
</script>

</body>
</html>
