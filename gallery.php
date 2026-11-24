<?php
include 'config.php';
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="google-site-verification" content="7WVVtzyKuvA4h_tEq6DMvC-BzIYCsvtUjU6BpVmoZ_Q" />
<title>Full Gallery — A50 Life Art</title>
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
  padding-top: 0;
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

.glass-nav .navbar-brand {
  font-weight: 500;
  font-size: 1rem;
  color: var(--text-charcoal);
  text-decoration: none;
  letter-spacing: 1.5px;
  font-family: 'Inter', sans-serif;
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
  transition: var(--transition-fast);
  margin: 0 0.8rem;
  letter-spacing: 0.5px;
  font-family: 'Inter', sans-serif;
  padding: 0.5rem 0;
}

.glass-nav .nav-link:hover {
  color: var(--text-charcoal);
}

.custom-toggler .navbar-toggler-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(44,36,22,1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

/* Gallery Header */
.gallery-header {
  padding: 150px 5% 80px;
  text-align: center;
  background: var(--bg-sand);
}

.gallery-header h1 {
  font-size: clamp(3rem, 8vw, 5rem);
  font-weight: 900;
  color: var(--text-charcoal);
  margin-bottom: 1.5rem;
  letter-spacing: -2px;
  font-family: 'Playfair Display', serif;
}

.gallery-header p {
  font-size: clamp(1rem, 1.5vw, 1.2rem);
  color: var(--text-muted);
  max-width: 700px;
  margin: 0 auto;
  font-family: 'Inter', sans-serif;
}

/* Sorting and Controls */
.gallery-controls {
  max-width: 1400px;
  margin: 0 auto 40px;
  padding: 0 5%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 20px;
}

.sort-controls {
  display: flex;
  align-items: center;
  gap: 15px;
  flex-wrap: wrap;
}

.sort-label {
  font-size: 0.9rem;
  color: var(--text-muted);
  font-weight: 500;
  font-family: 'Inter', sans-serif;
}

.sort-select {
  padding: 12px 20px;
  background: var(--bg-clay);
  border: 2px solid var(--border-subtle);
  border-radius: 0;
  color: var(--text-charcoal);
  font-size: 0.9rem;
  font-family: 'Inter', sans-serif;
  cursor: pointer;
  transition: var(--transition);
  min-width: 200px;
}

.sort-select:hover,
.sort-select:focus {
  border-color: var(--accent-orange);
  outline: none;
}

.results-info {
  font-size: 0.9rem;
  color: var(--text-muted);
  font-family: 'Inter', sans-serif;
}

/* Gallery Grid */
.gallery-section {
  padding: 0 5% 100px;
  background: var(--bg-sand);
}

.gallery-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
  gap: 30px;
  max-width: 1400px;
  margin: 0 auto;
}

.art-card {
  background: var(--bg-clay);
  overflow: hidden;
  transition: var(--transition);
  border: 1px solid var(--border-subtle);
  position: relative;
}

.art-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 40px rgba(44, 36, 22, 0.15);
  border-color: var(--accent-orange);
}

.art-image {
  position: relative;
  overflow: hidden;
  background: var(--bg-clay);
  aspect-ratio: 4/3;
}

.art-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 1.2s ease;
}

.art-card:hover .art-image img {
  transform: scale(1.1);
}

.art-overlay {
  position: absolute;
  inset: 0;
  background: rgba(44, 36, 22, 0.7);
  opacity: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: var(--transition);
}

.art-card:hover .art-overlay {
  opacity: 1;
}

.btn-view {
  background: transparent;
  color: var(--bg-sand);
  border: 2px solid var(--bg-sand);
  padding: 14px 28px;
  border-radius: 0;
  text-decoration: none;
  font-weight: 500;
  transition: var(--transition);
  display: inline-flex;
  align-items: center;
  gap: 10px;
  font-size: 0.85rem;
  letter-spacing: 1px;
  font-family: 'Inter', sans-serif;
}

.btn-view:hover {
  background: var(--bg-sand);
  color: var(--text-charcoal);
  transform: translateY(-2px);
}

.art-meta {
  padding: 2rem;
  background: var(--bg-clay);
}

.art-meta h3 {
  font-size: 1.3rem;
  font-weight: 700;
  margin-bottom: 0.5rem;
  color: var(--text-charcoal);
  letter-spacing: -0.5px;
  font-family: 'Playfair Display', serif;
}

.short-desc {
  color: var(--text-muted);
  font-size: 0.95rem;
  line-height: 1.7;
  margin-bottom: 1.5rem;
  font-family: 'Inter', sans-serif;
}

.art-price {
  font-weight: 700;
  font-size: 1.3rem;
  color: var(--accent-orange);
  margin-bottom: 1.5rem;
  letter-spacing: -0.5px;
  font-family: 'Inter', sans-serif;
}

.art-actions {
  display: flex;
  gap: 12px;
}

.btn-whatsapp {
  border: none;
  background: var(--success);
  color: #fff;
  padding: 14px 24px;
  border-radius: 0;
  cursor: pointer;
  font-weight: 500;
  transition: var(--transition);
  display: flex;
  align-items: center;
  gap: 10px;
  flex: 1;
  justify-content: center;
  font-size: 0.85rem;
  letter-spacing: 1px;
  font-family: 'Inter', sans-serif;
}

.btn-whatsapp:hover {
  background: #1ebd5f;
  transform: translateY(-2px);
  box-shadow: 0 5px 20px rgba(37, 211, 102, 0.4);
}

.no-art {
  text-align: center;
  font-size: 1.3rem;
  color: var(--text-muted);
  padding: 4rem 0;
  font-family: 'Inter', sans-serif;
}

/* Pagination */
.pagination {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 8px;
  margin-top: 80px;
  padding: 40px 5%;
}

.page-btn {
  background: transparent;
  color: var(--text-muted);
  padding: 12px 20px;
  border: 1px solid var(--border-subtle);
  text-decoration: none;
  font-weight: 500;
  transition: var(--transition);
  font-size: 0.9rem;
  letter-spacing: 1px;
  font-family: 'Inter', sans-serif;
  border-radius: 0;
  cursor: pointer;
}

.page-btn:hover {
  background: var(--accent-orange);
  color: var(--bg-sand);
  border-color: var(--accent-orange);
}

.page-btn.active {
  background: var(--accent-orange);
  color: var(--bg-sand);
  border-color: var(--accent-orange);
  pointer-events: none;
}

.page-btn:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

/* Back to Home */
.back-to-home {
  text-align: center;
  padding: 60px 5% 40px;
  background: var(--bg-sand);
}

.btn-home {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 16px 40px;
  background: var(--text-charcoal);
  color: var(--bg-sand);
  border: 2px solid var(--text-charcoal);
  border-radius: 0;
  text-decoration: none;
  font-weight: 500;
  font-size: 0.9rem;
  letter-spacing: 1px;
  font-family: 'Inter', sans-serif;
  transition: var(--transition);
}

.btn-home:hover {
  background: var(--accent-orange);
  border-color: var(--accent-orange);
  color: var(--bg-sand);
  transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 768px) {
  .gallery-header {
    padding: 120px 4% 60px;
  }

  .gallery-controls {
    flex-direction: column;
    align-items: flex-start;
    gap: 15px;
  }

  .sort-controls {
    width: 100%;
  }

  .sort-select {
    width: 100%;
    min-width: auto;
  }

  .gallery-grid {
    grid-template-columns: 1fr;
    gap: 20px;
  }

  .gallery-section {
    padding: 0 4% 80px;
  }

  .pagination {
    padding: 30px 4%;
    margin-top: 40px;
  }

  .page-btn {
    padding: 10px 16px;
    font-size: 0.85rem;
  }
}

@media (max-width: 576px) {
  .gallery-header h1 {
    font-size: 2.5rem;
  }

  .art-meta {
    padding: 1.5rem;
  }

  .gallery-controls {
    padding: 0 4%;
  }

  .results-info {
    font-size: 0.85rem;
  }
}
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg glass-nav sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="index.php">
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

<!-- Gallery Header -->
<section class="gallery-header">
  <h1>Full Gallery</h1>
  <p>A complete collection of murals, portraits, street art, and custom designs</p>
</section>

<!-- Gallery Grid -->
<section class="gallery-section">
  <?php
  // Pagination setup
  $items_per_page = 6;
  $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
  if ($page < 1) $page = 1;
  
  // Sorting setup
  $sort = isset($_GET['sort']) ? $_GET['sort'] : 'newest';
  $sort_options = [
    'newest' => 'id DESC',
    'oldest' => 'id ASC',
    'price_low' => 'price ASC',
    'price_high' => 'price DESC',
    'title_asc' => 'title ASC',
    'title_desc' => 'title DESC'
  ];
  $order_by = isset($sort_options[$sort]) ? $sort_options[$sort] : 'id DESC';
  
  // Get total count
  $countResult = $conn->query("SELECT COUNT(*) AS total FROM paintings");
  $total_items = $countResult->fetch_assoc()['total'];
  $total_pages = ceil($total_items / $items_per_page);
  if ($page > $total_pages && $total_pages > 0) $page = $total_pages;
  
  // Calculate offset
  $offset = ($page - 1) * $items_per_page;
  
  // Build query
  $query = "SELECT * FROM paintings ORDER BY $order_by LIMIT $items_per_page OFFSET $offset";
  $res = $conn->query($query);
  
  // Calculate display range
  $start_item = $total_items > 0 ? $offset + 1 : 0;
  $end_item = min($offset + $items_per_page, $total_items);
  ?>
  
  <div class="gallery-controls">
    <div class="sort-controls">
      <label class="sort-label" for="sortSelect">Sort by:</label>
      <select id="sortSelect" class="sort-select" onchange="updateSort(this.value)">
        <option value="newest" <?= $sort === 'newest' ? 'selected' : '' ?>>Newest First</option>
        <option value="oldest" <?= $sort === 'oldest' ? 'selected' : '' ?>>Oldest First</option>
        <option value="price_low" <?= $sort === 'price_low' ? 'selected' : '' ?>>Price: Low to High</option>
        <option value="price_high" <?= $sort === 'price_high' ? 'selected' : '' ?>>Price: High to Low</option>
        <option value="title_asc" <?= $sort === 'title_asc' ? 'selected' : '' ?>>Title: A-Z</option>
        <option value="title_desc" <?= $sort === 'title_desc' ? 'selected' : '' ?>>Title: Z-A</option>
      </select>
    </div>
    <?php if ($total_items > 0): ?>
      <div class="results-info">
        Showing <?= $start_item ?>-<?= $end_item ?> of <?= $total_items ?> artworks
      </div>
    <?php endif; ?>
  </div>
  
  <div class="gallery-grid">
    <?php
    if ($res && $res->num_rows > 0) {
      while ($row = $res->fetch_assoc()) {
        $formattedPrice = number_format($row['price'], 0, '.', ',');
        $whatsappNumber = "255650488101";
        $message = "Hi A50! I'm interested in your artwork.\n\n"
                 . "Title: {$row['title']}\n"
                 . "Description: {$row['description']}\n"
                 . "Price: {$formattedPrice} USD\n\n"
                 . "Is this piece still available?";
    ?>
      <div class="art-card">
        <div class="art-image">
          <img src="<?= htmlspecialchars($row['image_url']) ?>" alt="<?= htmlspecialchars($row['title']) ?>">
          <div class="art-overlay">
            <a href="details.php?id=<?= $row['id'] ?>" class="btn-view">
              <i class="fas fa-eye"></i> View Details
            </a>
          </div>
        </div>

        <div class="art-meta">
          <h3><?= htmlspecialchars($row['title']) ?></h3>
          <p class="short-desc"><?= htmlspecialchars(substr($row['description'], 0, 90)) ?>...</p>
          <div class="art-price"><?= $formattedPrice ?> USD</div>
          <div class="art-actions">
            <button class="btn-whatsapp"
              data-number="<?= $whatsappNumber ?>"
              data-message="<?= htmlspecialchars($message) ?>">
              <i class="fab fa-whatsapp"></i> Inquire
            </button>
          </div>
        </div>
      </div>
    <?php
      }
    } else {
      echo "<p class='no-art'>No paintings uploaded yet.</p>";
    }
    ?>
  </div>
  
  <?php if ($total_pages > 1): ?>
    <div class="pagination">
      <?php
      // Previous button
      if ($page > 1):
        $prev_url = "?page=" . ($page - 1) . "&sort=" . urlencode($sort);
      ?>
        <a href="<?= $prev_url ?>" class="page-btn">
          <i class="fas fa-chevron-left"></i> Previous
        </a>
      <?php else: ?>
        <span class="page-btn" style="opacity: 0.5; cursor: not-allowed;">
          <i class="fas fa-chevron-left"></i> Previous
        </span>
      <?php endif; ?>
      
      <?php
      // Page numbers
      $start_page = max(1, $page - 2);
      $end_page = min($total_pages, $page + 2);
      
      if ($start_page > 1):
        $first_url = "?page=1&sort=" . urlencode($sort);
      ?>
        <a href="<?= $first_url ?>" class="page-btn">1</a>
        <?php if ($start_page > 2): ?>
          <span class="page-btn" style="border: none; cursor: default;">...</span>
        <?php endif; ?>
      <?php endif; ?>
      
      <?php for ($i = $start_page; $i <= $end_page; $i++): 
        $page_url = "?page=$i&sort=" . urlencode($sort);
        $is_active = $i == $page;
      ?>
        <a href="<?= $page_url ?>" class="page-btn <?= $is_active ? 'active' : '' ?>">
          <?= $i ?>
        </a>
      <?php endfor; ?>
      
      <?php
      if ($end_page < $total_pages):
        $last_url = "?page=$total_pages&sort=" . urlencode($sort);
      ?>
        <?php if ($end_page < $total_pages - 1): ?>
          <span class="page-btn" style="border: none; cursor: default;">...</span>
        <?php endif; ?>
        <a href="<?= $last_url ?>" class="page-btn"><?= $total_pages ?></a>
      <?php endif; ?>
      
      <?php
      // Next button
      if ($page < $total_pages):
        $next_url = "?page=" . ($page + 1) . "&sort=" . urlencode($sort);
      ?>
        <a href="<?= $next_url ?>" class="page-btn">
          Next <i class="fas fa-chevron-right"></i>
        </a>
      <?php else: ?>
        <span class="page-btn" style="opacity: 0.5; cursor: not-allowed;">
          Next <i class="fas fa-chevron-right"></i>
        </span>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</section>

<!-- Back to Home -->
<section class="back-to-home">
  <a href="index.php" class="btn-home">
    <i class="fas fa-arrow-left"></i> Back to Home
  </a>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Update sort function
function updateSort(sortValue) {
  const urlParams = new URLSearchParams(window.location.search);
  urlParams.set('sort', sortValue);
  urlParams.set('page', '1'); // Reset to page 1 when sorting changes
  window.location.href = '?' + urlParams.toString();
}

// WhatsApp button functionality
document.querySelectorAll('.btn-whatsapp').forEach(btn => {
  btn.addEventListener('click', async () => {
    const number = btn.dataset.number;
    const message = encodeURIComponent(btn.dataset.message);
    const link = `https://wa.me/${number}?text=${message}`;
    window.open(link, '_blank');
  });
});

// Auto-close mobile menu on link click
document.querySelectorAll('.glass-nav .nav-link').forEach(anchor => {
  anchor.addEventListener("click", function() {
    const navCollapse = document.getElementById("navbarNav");
    if (navCollapse && navCollapse.classList.contains("show") && typeof bootstrap !== "undefined") {
      new bootstrap.Collapse(navCollapse).toggle();
    }
  });
});
</script>

</body>
</html>

