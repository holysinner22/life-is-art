<?php
include 'config.php';
$id = intval($_GET['id']);

// Fetch artwork
$res = $conn->query("SELECT * FROM paintings WHERE id=$id");
if (!$res || $res->num_rows == 0) {
  die("<h2 style='text-align:center;margin-top:50px;'>Artwork not found.</h2>");
}
$art = $res->fetch_assoc();
$formattedPrice = number_format($art['price'], 0, '.', ',');

// Next / Prev
$prev_query = $conn->query("SELECT id FROM paintings WHERE id < $id ORDER BY id DESC LIMIT 1");
$next_query = $conn->query("SELECT id FROM paintings WHERE id > $id ORDER BY id ASC LIMIT 1");
$prev_id = $prev_query && $prev_query->num_rows > 0 ? $prev_query->fetch_assoc()['id'] : null;
$next_id = $next_query && $next_query->num_rows > 0 ? $next_query->fetch_assoc()['id'] : null;

$whatsappNumber = "255650488101";
$message = "Hi A50! I'm interested in your artwork.\n\n"
         . "Title: {$art['title']}\n"
         . "Description: {$art['description']}\n"
         . "Price: {$formattedPrice} USD\n\n"
         . "Is this piece still available?";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?= htmlspecialchars($art['title']) ?> — A50 Life Art</title>
<link rel="icon" type="image/png" href="uploads/picha9.jpg">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
/* === CSS VARIABLES - Afro-Modern Editorial Palette === */
:root {
  --bg-sand: #E8DCC6;
  --bg-clay: #D4C4B0;
  --text-charcoal: #2C2416;
  --text-muted: #5C4A37;
  --accent-orange: #CC5500;
  --accent-indigo: #4B0082;
  --accent-gold: #D4AF37;
  --border-subtle: rgba(44, 36, 22, 0.1);
  --transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  --success: #25D366;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  scroll-behavior: smooth;
}

body {
  font-family: 'Inter', sans-serif;
  background-color: var(--bg-sand);
  background-image: 
    url("data:image/svg+xml,%3Csvg width='100' height='100' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E"),
    linear-gradient(180deg, var(--bg-sand) 0%, var(--bg-clay) 100%);
  color: var(--text-charcoal);
  line-height: 1.7;
  overflow-x: hidden;
  padding-top: 80px;
}

/* Navbar */
.glass-nav {
  background: rgba(232, 220, 198, 0.85);
  backdrop-filter: blur(20px);
  border-bottom: 1px solid var(--border-subtle);
  transition: var(--transition);
  z-index: 1030;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  padding: 1.2rem 0;
}

.glass-nav.scrolled {
  background: rgba(232, 220, 198, 0.95);
  box-shadow: 0 4px 30px rgba(44, 36, 22, 0.1);
}

.glass-nav .navbar-brand {
  font-weight: 600;
  font-size: 1rem;
  color: var(--text-charcoal);
  text-decoration: none;
  letter-spacing: 1.5px;
  font-family: 'Inter', sans-serif;
  font-weight: 500;
}

.glass-nav .navbar-brand img {
  height: 36px;
  width: 36px;
  border-radius: 50%;
  object-fit: cover;
  margin-right: 10px;
}

.glass-nav .nav-link {
  color: var(--text-muted);
  font-weight: 400;
  font-size: 0.85rem;
  transition: all 0.4s ease;
  position: relative;
  margin: 0 0.8rem;
  letter-spacing: 0.5px;
  font-family: 'Inter', sans-serif;
  padding: 0.5rem 0;
  display: block;
  -webkit-tap-highlight-color: transparent;
}

.glass-nav .nav-link:hover,
.glass-nav .nav-link.active {
  color: var(--text-charcoal);
}

.glass-nav .nav-link.active::after {
  content: "";
  position: absolute;
  left: 50%;
  bottom: -10px;
  transform: translateX(-50%);
  width: 25px;
  height: 2px;
  background: var(--accent-orange);
}

.custom-toggler .navbar-toggler-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(44,36,22,1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

/* Art Container */
.art-container {
  max-width: 1400px;
  margin: 80px auto;
  padding: 0 5%;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 60px;
  align-items: start;
  animation: fadeUp 1s ease forwards;
}

.art-image-wrapper {
  position: sticky;
  top: 100px;
  width: 100%;
}

.art-image {
  position: relative;
  width: 100%;
  aspect-ratio: 4/5;
  overflow: hidden;
  border-radius: 4px;
  background: var(--bg-clay);
  box-shadow: 0 20px 60px rgba(44, 36, 22, 0.15);
}

.art-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: var(--transition);
}

.art-image:hover img {
  transform: scale(1.05);
}

.art-details {
  padding: 40px 0;
}

.art-details h1 {
  font-size: clamp(2.5rem, 6vw, 4rem);
  font-weight: 900;
  color: var(--text-charcoal);
  margin-bottom: 2rem;
  letter-spacing: -2px;
  font-family: 'Playfair Display', serif;
  line-height: 1.2;
}

.art-description {
  font-size: clamp(1rem, 1.5vw, 1.2rem);
  color: var(--text-muted);
  line-height: 1.9;
  margin-bottom: 2.5rem;
  font-family: 'Inter', sans-serif;
}

.art-price {
  font-size: clamp(1.5rem, 3vw, 2rem);
  font-weight: 700;
  color: var(--accent-orange);
  margin-bottom: 3rem;
  font-family: 'Inter', sans-serif;
}

.actions {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
  margin-bottom: 3rem;
}

.btn {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 16px 32px;
  border-radius: 0;
  font-weight: 500;
  font-size: 0.9rem;
  letter-spacing: 1px;
  text-decoration: none;
  transition: var(--transition);
  font-family: 'Inter', sans-serif;
  border: 2px solid;
  cursor: pointer;
}

.btn-primary {
  background: var(--text-charcoal);
  color: var(--bg-sand);
  border-color: var(--text-charcoal);
}

.btn-primary:hover {
  background: var(--accent-orange);
  border-color: var(--accent-orange);
  color: var(--bg-sand);
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(204, 85, 0, 0.3);
}

.btn-secondary {
  background: transparent;
  color: var(--text-charcoal);
  border-color: var(--text-charcoal);
}

.btn-secondary:hover {
  background: var(--text-charcoal);
  color: var(--bg-sand);
  transform: translateY(-2px);
}

.btn-whatsapp {
  background: var(--success);
  color: white;
  border-color: var(--success);
}

.btn-whatsapp:hover {
  background: #1ebd5f;
  border-color: #1ebd5f;
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(37, 211, 102, 0.3);
}

/* Navigation */
.nav-section {
  max-width: 1400px;
  margin: 60px auto;
  padding: 0 5%;
  display: flex;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
}

.nav-link {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 14px 28px;
  background: var(--bg-clay);
  color: var(--text-charcoal);
  border: 2px solid var(--border-subtle);
  border-radius: 0;
  font-weight: 500;
  font-size: 0.9rem;
  letter-spacing: 1px;
  text-decoration: none;
  transition: var(--transition);
  font-family: 'Inter', sans-serif;
}

.nav-link:hover {
  background: var(--text-charcoal);
  color: var(--bg-sand);
  border-color: var(--text-charcoal);
  transform: translateY(-2px);
}

@keyframes fadeUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Responsive */
@media (max-width: 992px) {
  .art-container {
    grid-template-columns: 1fr;
    gap: 40px;
    margin: 60px auto;
  }

  .art-image-wrapper {
    position: static;
  }

  .art-image {
    aspect-ratio: 4/3;
  }
}

@media (max-width: 768px) {
  body {
    padding-top: 70px;
  }

  .glass-nav {
    padding: 1rem 0;
  }

  .art-container {
    padding: 0 4%;
    margin: 40px auto;
  }

  .art-details {
    padding: 20px 0;
  }

  .actions {
    flex-direction: column;
  }

  .btn {
    width: 100%;
    justify-content: center;
  }
}

@media (max-width: 576px) {
  .glass-nav {
    padding: 1rem 0;
  }

  .glass-nav .navbar-brand {
    font-size: 0.9rem;
  }

  .glass-nav .nav-link {
    font-size: 0.8rem;
    margin: 0 0.5rem;
  }

  .art-details h1 {
    font-size: 2rem;
  }

  .art-price {
    font-size: 1.5rem;
  }
}

@media (max-width: 400px) {
  .glass-nav .navbar-nav {
    padding: 1rem 0;
  }

  .glass-nav .nav-link {
    padding: 0.75rem 0;
    font-size: 0.9rem;
  }
}
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg glass-nav sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="index.php#home">
      <img src="uploads/picha9.jpg" alt="A50 Life Art Logo">
      <span>A50_Life_Art</span>
    </a>

    <button class="navbar-toggler custom-toggler" type="button"
      data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center gap-3">
        <li class="nav-item"><a class="nav-link" href="index.php#home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#collections">Collections</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#gallery">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#commissions">Commissions</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="art-container">
  <div class="art-image-wrapper">
    <div class="art-image">
      <img src="<?= htmlspecialchars($art['image_url']) ?>" alt="<?= htmlspecialchars($art['title']) ?>">
    </div>
  </div>

  <div class="art-details">
    <h1><?= htmlspecialchars($art['title']) ?></h1>
    <div class="art-description">
      <?= nl2br(htmlspecialchars($art['description'])) ?>
    </div>
    <div class="art-price"><?= $formattedPrice ?> USD</div>

    <div class="actions">
      <a href="https://wa.me/<?= $whatsappNumber ?>?text=<?= urlencode($message) ?>" 
         target="_blank" class="btn btn-whatsapp">
        <i class="fab fa-whatsapp"></i> Inquire via WhatsApp
      </a>
      <a href="index.php#gallery" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to Gallery
      </a>
    </div>
  </div>
</div>

<!-- Next / Previous navigation -->
<div class="nav-section">
  <?php if ($prev_id): ?>
    <a href="details.php?id=<?= $prev_id ?>" class="nav-link">
      <i class="fas fa-chevron-left"></i> Previous Artwork
    </a>
  <?php endif; ?>

  <?php if ($next_id): ?>
    <a href="details.php?id=<?= $next_id ?>" class="nav-link">
      Next Artwork <i class="fas fa-chevron-right"></i>
    </a>
  <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Smooth scroll + auto-close mobile menu
document.querySelectorAll('.glass-nav .nav-link[href^="#"]').forEach(anchor => {
  anchor.addEventListener("click", function(e) {
    e.preventDefault();
    const targetId = this.getAttribute("href").substring(1);
    const target = document.getElementById(targetId);
    if (target) {
      const offset = 80;
      const elementPosition = target.offsetTop - offset;
      window.scrollTo({ top: elementPosition, behavior: "smooth" });
    }
    // Close mobile menu
    const navCollapse = document.getElementById("navbarNav");
    if (navCollapse && navCollapse.classList.contains("show") && typeof bootstrap !== "undefined") {
      const bsCollapse = new bootstrap.Collapse(navCollapse, { toggle: false });
      bsCollapse.hide();
    }
  });
});

// Handle external links (to index.php)
document.querySelectorAll('.glass-nav .nav-link[href^="index.php"]').forEach(anchor => {
  anchor.addEventListener("click", function(e) {
    // Let the link work normally, but close menu if open
    const navCollapse = document.getElementById("navbarNav");
    if (navCollapse && navCollapse.classList.contains("show") && typeof bootstrap !== "undefined") {
      const bsCollapse = new bootstrap.Collapse(navCollapse, { toggle: false });
      bsCollapse.hide();
    }
  });
});

// Solid background on scroll
window.addEventListener("scroll", function() {
  const nav = document.querySelector(".glass-nav");
  if (!nav) return;
  if (window.scrollY > 50) {
    nav.classList.add("scrolled");
  } else {
    nav.classList.remove("scrolled");
  }
}, { passive: true });
</script>

</body>
</html>
