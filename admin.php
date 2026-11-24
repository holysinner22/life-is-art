<?php
session_start();
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: login.php");
    exit();
}
include 'config.php';

// Pagination setup
$limit = 6; // paintings per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

// Get total count
$totalRes = $conn->query("SELECT COUNT(*) AS total FROM paintings");
$totalRows = $totalRes->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $limit);

// Fetch data
$res = $conn->query("SELECT * FROM paintings ORDER BY id DESC LIMIT $limit OFFSET $offset");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>A50 Life Art — Admin Dashboard</title>
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
  
  /* Legacy variables for compatibility */
  --primary: #CC5500;
  --primary-light: #E67E22;
  --danger: #C53030;
  --danger-dark: #A02020;
  --bg: #E8DCC6;
  --white: #fff;
  --text: #2C2416;
}

/* Base */
body {
  font-family: 'Inter', sans-serif;
  margin: 0;
  background: var(--bg-sand);
  background-image: 
    url("data:image/svg+xml,%3Csvg width='100' height='100' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E"),
    linear-gradient(180deg, var(--bg-sand) 0%, var(--bg-clay) 100%);
  color: var(--text-charcoal);
}

/* Topbar */
.topbar {
  position: sticky;
  top: 0;
  z-index: 10;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: linear-gradient(90deg, var(--accent-orange), var(--accent-terracotta));
  padding: 20px 30px;
  color: var(--bg-sand);
  box-shadow: 0 4px 15px rgba(44, 36, 22, 0.15);
}
.topbar h2 {
  font-weight: 600;
  display: flex;
  align-items: center;
  gap: 10px;
}
.btn {
  background: var(--bg-sand);
  color: var(--text-charcoal);
  padding: 10px 16px;
  border-radius: 0;
  font-weight: 500;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: all 0.3s ease;
  border: 2px solid var(--bg-sand);
  font-family: 'Inter', sans-serif;
}
.btn:hover {
  background: var(--accent-gold);
  color: var(--text-charcoal);
  border-color: var(--accent-gold);
  transform: translateY(-2px);
  box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
}

/* Container */
.container {
  max-width: 1250px;
  margin: 40px auto;
  padding: 0 20px;
}

/* Search bar */
.search-bar {
  display: flex;
  justify-content: flex-end;
  margin-bottom: 15px;
}
.search-bar input {
  padding: 10px 15px;
  width: 250px;
  border-radius: 10px;
  border: 1px solid #ccc;
  font-size: 0.95rem;
}
.search-bar input:focus {
  border-color: var(--primary);
  box-shadow: 0 0 8px rgba(107,70,193,0.2);
}

/* Table */
.table-container {
  background: var(--bg-clay);
  border-radius: 4px;
  overflow: hidden;
  box-shadow: 0 10px 25px rgba(44, 36, 22, 0.1);
  border: 1px solid var(--border-subtle);
}
table {
  width: 100%;
  border-collapse: collapse;
}
th, td {
  padding: 14px 16px;
  text-align: left;
}
th {
  background: var(--accent-orange);
  color: var(--bg-sand);
  text-transform: uppercase;
  font-size: 0.9rem;
  cursor: pointer;
  font-family: 'Inter', sans-serif;
  font-weight: 600;
}
th.sortable:hover { background: var(--accent-terracotta); }
td {
  border-bottom: 1px solid #eee;
  font-size: 0.95rem;
  vertical-align: middle;
}
tr:nth-child(even) td { background: rgba(232, 220, 198, 0.5); }
tr:hover td { background: rgba(212, 175, 55, 0.2); }
img.thumb {
  width: 90px;
  height: 70px;
  object-fit: cover;
  border-radius: 10px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

/* Action buttons */
.action-btns a, .action-btns span {
  text-decoration: none;
  font-weight: 600;
  border-radius: 6px;
  padding: 8px 12px;
  color: #fff;
  margin-right: 8px;
  display: inline-block;
  transition: 0.3s ease;
}
.action-btns .edit { background: var(--accent-gold); }
.action-btns .edit:hover { background: #B8941F; transform: translateY(-2px); }
.action-btns .delete { background: var(--danger); cursor: pointer; }
.action-btns .delete:hover { background: var(--danger-dark); transform: translateY(-2px); }

/* Pagination */
.pagination {
  display: flex;
  justify-content: center;
  margin: 25px 0;
  flex-wrap: wrap;
  gap: 8px;
}
.page-btn {
  background: var(--bg-clay);
  color: var(--text-charcoal);
  padding: 10px 15px;
  border-radius: 0;
  text-decoration: none;
  font-weight: 500;
  transition: all 0.3s ease;
  border: 1px solid var(--border-subtle);
  font-family: 'Inter', sans-serif;
}
.page-btn:hover { background: var(--accent-orange); color: var(--bg-sand); border-color: var(--accent-orange); }
.page-btn.active {
  background: var(--accent-orange);
  color: var(--bg-sand);
  border-color: var(--accent-orange);
  pointer-events: none;
}

/* Modal */
.modal-overlay {
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0,0,0,0.4);
  display: none;
  justify-content: center;
  align-items: center;
  backdrop-filter: blur(6px);
  z-index: 999;
}
.modal {
  background: var(--bg-clay);
  padding: 30px;
  border-radius: 4px;
  max-width: 400px;
  text-align: center;
  animation: pop 0.3s ease forwards;
  border: 2px solid var(--accent-orange);
  box-shadow: 0 10px 40px rgba(44, 36, 22, 0.2);
}
@keyframes pop {
  from { opacity: 0; transform: scale(0.9); }
  to { opacity: 1; transform: scale(1); }
}
.modal img {
  width: 100%;
  max-height: 220px;
  object-fit: cover;
  border-radius: 10px;
  margin-bottom: 10px;
}
.modal h3 { color: var(--danger); margin-bottom: 10px; }
.modal .buttons { display: flex; justify-content: center; gap: 15px; margin-top: 20px; }
.modal .btn-danger {
  background: linear-gradient(90deg, var(--danger), var(--danger-dark));
  color: var(--bg-sand);
}
.modal .btn-cancel { background: var(--bg-clay); color: var(--text-charcoal); border: 2px solid var(--border-subtle); }

/* Toast */
.toast {
  position: fixed;
  bottom: 25px;
  left: 50%;
  transform: translateX(-50%);
  background: var(--accent-gold);
  color: var(--text-charcoal);
  padding: 12px 24px;
  border-radius: 0;
  font-weight: 600;
  opacity: 0;
  pointer-events: none;
  transition: all 0.6s ease;
  font-family: 'Inter', sans-serif;
  box-shadow: 0 4px 15px rgba(212, 175, 55, 0.4);
}
.toast.show { opacity: 1; bottom: 40px; }

@media (max-width: 768px) {
  .topbar { flex-direction: column; gap: 10px; }
  .search-bar { justify-content: center; }
  .table-container { overflow-x: auto; }
}
</style>
</head>
<body>

<div class="topbar">
  <h2><i class="fas fa-palette"></i> A50 Life Art — Admin Dashboard</h2>
  <div>
    <a href="add.php" class="btn"><i class="fas fa-plus-circle"></i> Add Painting</a>
    <a href="index.php" class="btn"><i class="fas fa-home"></i> Home</a>
    <a href="logout.php" class="btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>
</div>

<div class="container">
  <div class="search-bar">
    <input type="text" id="searchInput" placeholder="Search paintings..." />
  </div>

  <div class="table-container">
    <table id="artTable">
      <thead>
        <tr>
          <th class="sortable">ID</th>
          <th>Preview</th>
          <th class="sortable">Title</th>
          <th>Description</th>
          <th class="sortable">Price (USD)</th>
          <th class="sortable">Date Added</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
    <?php
    if ($res->num_rows > 0) {

        // STEP 2: Start index counter
        $index = 0;

        while ($r = $res->fetch_assoc()) {
            echo "
            <tr data-id='{$r['id']}'>
              <td>" . ($offset + $index + 1) . "</td>
              <td><img src='{$r['image_url']}' alt='{$r['title']}' class='thumb'></td>
              <td>{$r['title']}</td>
              <td>" . substr($r['description'], 0, 60) . "...</td>
              <td>" . number_format($r['price'], 0) . "</td>
              <td>" . date('M d, Y', strtotime($r['created_at'])) . "</td>
              <td class='action-btns'>
                <a href='edit.php?id={$r['id']}' class='edit'><i class='fas fa-edit'></i> Edit</a>
                <span class='delete' data-id='{$r['id']}' data-title='{$r['title']}' data-image='{$r['image_url']}'><i class='fas fa-trash'></i> Delete</span>
              </td>
            </tr>";
            $index++; // IMPORTANT: increase counter
        }
    } else {
        echo "<tr><td colspan='7' class='empty'>No paintings uploaded yet.</td></tr>";
    }
    ?>

      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <?php if ($totalPages > 1): ?>
  <div class="pagination">
    <?php if ($page > 1): ?>
      <a href="?page=<?= $page - 1 ?>" class="page-btn">« Prev</a>
    <?php endif; ?>
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
      <a href="?page=<?= $i ?>" class="page-btn <?= ($i == $page) ? 'active' : '' ?>"><?= $i ?></a>
    <?php endfor; ?>
    <?php if ($page < $totalPages): ?>
      <a href="?page=<?= $page + 1 ?>" class="page-btn">Next »</a>
    <?php endif; ?>
  </div>
  <?php endif; ?>
</div>

<!-- Modal -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal">
    <img id="modalImg" src="" alt="">
    <h3><i class="fas fa-trash"></i> Confirm Deletion</h3>
    <p id="modalText"></p>
    <div class="buttons">
      <button class="btn btn-danger" id="confirmDelete"><i class="fas fa-check"></i> Yes, Delete</button>
      <button class="btn btn-cancel" id="cancelDelete"><i class="fas fa-times"></i> Cancel</button>
    </div>
  </div>
</div>

<div class="toast" id="toast">✅ Painting deleted successfully!</div>

<script>
// Search
document.getElementById("searchInput").addEventListener("keyup", function() {
  const value = this.value.toLowerCase();
  document.querySelectorAll("#artTable tbody tr").forEach(row => {
    const text = row.textContent.toLowerCase();
    row.style.display = text.includes(value) ? "" : "none";
  });
});

// Sort
document.querySelectorAll("th.sortable").forEach(header => {
  header.addEventListener("click", () => {
    const table = header.closest("table");
    const tbody = table.querySelector("tbody");
    const index = Array.from(header.parentNode.children).indexOf(header);
    const isAsc = header.classList.toggle("asc");
    header.classList.toggle("desc", !isAsc);
    const rows = Array.from(tbody.querySelectorAll("tr"));
    rows.sort((a, b) => {
      const valA = a.children[index].textContent.trim().toLowerCase();
      const valB = b.children[index].textContent.trim().toLowerCase();
      if (!isNaN(valA) && !isNaN(valB)) return isAsc ? valA - valB : valB - valA;
      return isAsc ? valA.localeCompare(valB) : valB.localeCompare(valA);
    });
    tbody.innerHTML = "";
    rows.forEach(r => tbody.appendChild(r));
  });
});

// Modal Delete
const modal = document.getElementById('modalOverlay');
const modalImg = document.getElementById('modalImg');
const modalText = document.getElementById('modalText');
const confirmBtn = document.getElementById('confirmDelete');
const cancelBtn = document.getElementById('cancelDelete');
const toast = document.getElementById('toast');
let deleteId = null;

document.querySelectorAll('.delete').forEach(btn => {
  btn.addEventListener('click', () => {
    deleteId = btn.dataset.id;
    modalImg.src = btn.dataset.image;
    modalText.innerHTML = `Are you sure you want to delete <strong>${btn.dataset.title}</strong>?`;
    modal.style.display = 'flex';
  });
});

cancelBtn.addEventListener('click', () => modal.style.display = 'none');

confirmBtn.addEventListener('click', async () => {
  const formData = new FormData();
  formData.append('id', deleteId);
  const res = await fetch('delete_action.php', { method: 'POST', body: formData });
  const result = await res.text();
  if (result.trim() === 'success') {
    document.querySelector(`tr[data-id="${deleteId}"]`).remove();
    showToast();
  }
  modal.style.display = 'none';
});

function showToast() {
  toast.classList.add('show');
  setTimeout(() => toast.classList.remove('show'), 2500);
}
</script>
</body>
</html>
