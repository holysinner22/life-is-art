<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Painting — A50 Life Art</title>
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
  color: var(--text-charcoal);
  margin: 0;
  padding: 40px 20px;
  overflow-x: hidden;
}

/* Container Card */
.container {
  max-width: 700px;
  margin: auto;
  background: var(--bg-clay);
  backdrop-filter: blur(12px);
  border-radius: 4px;
  padding: 50px 40px;
  box-shadow: 0 15px 40px rgba(44, 36, 22, 0.15);
  border: 2px solid var(--accent-orange);
  animation: fadeUp 0.8s ease forwards;
}
h2 {
  text-align: center;
  font-size: 2rem;
  color: var(--text-charcoal);
  font-weight: 700;
  margin-bottom: 35px;
  letter-spacing: 0.5px;
  font-family: 'Playfair Display', serif;
}

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
  outline: none;
  background: var(--bg-sand);
  color: var(--text-charcoal);
  transition: 0.3s;
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

/* File input */
input[type="file"] {
  padding: 12px;
  background: var(--bg-sand);
  border: 2px dashed var(--accent-orange);
  cursor: pointer;
  font-size: 0.95rem;
}
input[type="file"]:hover {
  background: rgba(232, 220, 198, 0.8);
  border-color: var(--accent-terracotta);
}

/* Image preview */
.image-preview {
  width: 100%;
  max-height: 350px;
  object-fit: cover;
  border-radius: 4px;
  border: 2px solid var(--border-subtle);
  margin-top: 10px;
  display: none;
  box-shadow: 0 4px 15px rgba(44, 36, 22, 0.1);
}

/* Buttons */
button, .nav-link {
  border: none;
  border-radius: 0;
  padding: 12px 20px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
  text-decoration: none;
  text-align: center;
  font-family: 'Inter', sans-serif;
}
button {
  background: var(--accent-orange);
  color: var(--bg-sand);
  width: 100%;
  border: 2px solid var(--accent-orange);
  padding: 16px 24px;
  font-size: 1rem;
  margin-top: 10px;
}
button:hover {
  background: var(--accent-terracotta);
  border-color: var(--accent-terracotta);
  transform: translateY(-2px);
  box-shadow: 0 4px 15px rgba(204, 85, 0, 0.4);
}

.nav-buttons {
  display: flex;
  justify-content: space-between;
  margin-top: 30px;
  gap: 12px;
}
.nav-link {
  flex: 1;
  background: var(--bg-sand);
  color: var(--text-charcoal);
  border: 2px solid var(--border-subtle);
  padding: 12px 20px;
}
.nav-link:hover {
  background: var(--accent-gold);
  color: var(--text-charcoal);
  border-color: var(--accent-gold);
}

/* Splash */
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
}
.checkmark {
  width: 90px;
  height: 90px;
  border-radius: 50%;
  border: 6px solid var(--accent-gold);
  position: relative;
}
.checkmark::after {
  content: '';
  position: absolute;
  left: 24px; top: 38px;
  width: 25px; height: 45px;
  border-right: 6px solid var(--accent-gold);
  border-bottom: 6px solid var(--accent-gold);
  transform: rotate(45deg);
}
.welcome-text {
  font-family: 'Playfair Display', serif;
  color: var(--text-charcoal);
}

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
  <h2><i class="fas fa-plus-circle"></i> Add New Painting</h2>

  <form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title"><i class="fas fa-heading"></i> Title</label>
      <input type="text" name="title" id="title" placeholder="Enter painting title" required>
    </div>

    <div class="form-group">
      <label for="description"><i class="fas fa-align-left"></i> Description</label>
      <textarea name="description" id="description" placeholder="Enter painting description" rows="4"></textarea>
    </div>

    <div class="form-group">
      <label for="price"><i class="fas fa-dollar-sign"></i> Price (USD)</label>
      <input type="number" name="price" id="price" placeholder="Enter price in USD" min="0" step="0.01" required>
    </div>

    <div class="form-group">
      <label for="image_file"><i class="fas fa-image"></i> Image</label>
      <input type="file" name="image_file" id="image_file" accept="image/*" required>
      <img id="preview" class="image-preview" alt="Image Preview">
    </div>

    <button type="submit" name="save"><i class="fas fa-save"></i> Save Painting</button>
  </form>

  <div class="nav-buttons">
    <a href="admin.php" class="nav-link">← Back to Admin</a>
    <a href="index.php" class="nav-link">Home</a>
  </div>

<?php
if (isset($_POST['save'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $desc = $conn->real_escape_string($_POST['description']);
    $price = $conn->real_escape_string($_POST['price']);

    /* FINAL PATH — ALWAYS PUBLIC_HTML/uploads/ */
    $upload_folder = "uploads/";
    // Use relative path for XAMPP compatibility
    $target_dir = $upload_folder;
    
    // Create directory if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $file_name = time() . "_" . basename($_FILES["image_file"]["name"]);
    $target_file = $target_dir . $file_name;

    // What goes into the database - use relative path for web access
    $image_url = $upload_folder . $file_name;

    $ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed = ["jpg", "jpeg", "png", "gif", "webp"];

    if (in_array($ext, $allowed)) {

        if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_file)) {
            // Verify file was actually saved
            if (file_exists($target_file)) {
                $sql = "INSERT INTO paintings (title, description, image_url, price)
                        VALUES ('$title', '$desc', '$image_url', '$price')";

                if ($conn->query($sql)) {
                    echo "<script>sessionStorage.setItem('paintingAdded', 'true');</script>";
                } else {
                    echo "<p style='color:red;'>❌ Database Error: ".$conn->error."</p>";
                }
            } else {
                echo "<p style='color:red;'>❌ File was not saved correctly. Please try again.</p>";
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
            echo "<p style='color:red;'>❌ Error uploading file: $error_msg</p>";
        }

    } else {
        echo "<p style='color:red;'>❌ Invalid file format. Allowed formats: jpg, jpeg, png, gif, webp</p>";
    }
}
?>
</div>

<div class="splash" id="splash">
  <div class="checkmark"></div>
  <div class="welcome-text">Painting added successfully!</div>
</div>

<script>
document.getElementById('image_file').addEventListener('change', e => {
  const file = e.target.files[0];
  const preview = document.getElementById('preview');
  if (file) {
    preview.src = URL.createObjectURL(file);
    preview.style.display = 'block';
  }
});

// Success popup then redirect
if (sessionStorage.getItem('paintingAdded') === 'true') {
  sessionStorage.removeItem('paintingAdded');
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
