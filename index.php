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
<title>A50 Life Art - Life is Art. Art is Life.</title>
<link rel="icon" type="image/png" href="uploads/picha9.jpg">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Inter:wght@300;400;500;600&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
/* === CSS VARIABLES - Afro-Modern Editorial Palette === */
:root {
  /* Earth Tones */
  --bg-sand: #E8DCC6;        /* Soft Sand/Clay Background */
  --bg-clay: #D4C4B0;        /* Clay Background Variant */
  --text-charcoal: #2C2416;  /* Deep Brown/Charcoal Text */
  --text-dark: #1A1611;      /* Darker Text */
  
  /* African Fabric Colors */
  --accent-orange: #CC5500;  /* Burnt Orange */
  --accent-indigo: #4B0082;  /* Indigo */
  --accent-gold: #D4AF37;    /* Gold */
  --accent-terracotta: #B87333; /* Terracotta */
  
  /* Neutrals */
  --text-muted: #5C4A37;     /* Muted Brown Text */
  --border-subtle: rgba(44, 36, 22, 0.1); /* Subtle Borders */
  
  /* Transitions */
  --transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  --transition-slow: all 1.2s ease-out;
  --transition-fast: all 0.4s ease;
  
  /* Success */
  --success: #25D366;        /* WhatsApp Green */
}

/* === BASE === */
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
  font-weight: 400;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  padding-top: 0;
  position: relative;
}

body > * {
  position: relative;
  z-index: 1;
}

body::before {
  content: '';
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: 
    repeating-linear-gradient(
      0deg,
      transparent,
      transparent 2px,
      rgba(44, 36, 22, 0.02) 2px,
      rgba(44, 36, 22, 0.02) 4px
    );
  pointer-events: none;
  z-index: 0;
  opacity: 0.5;
}

/* === NAVBAR === */
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
  transition: var(--transition-fast);
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

/* === HERO SECTION - Split Editorial Layout === */
.hero-elegant {
  position: relative;
  min-height: 100vh;
  width: 100%;
  overflow-x: hidden;
  display: grid;
  grid-template-columns: 1fr 1fr;
  align-items: center;
  background: var(--bg-sand);
  color: var(--text-charcoal);
  padding: 120px 5% 80px;
  gap: 60px;
  box-sizing: border-box;
}

.hero-left {
  position: relative;
  z-index: 2;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  text-align: left;
  width: 100%;
  max-width: 100%;
  box-sizing: border-box;
}

.hero-tag {
  font-size: 0.75rem;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: var(--accent-orange);
  margin-bottom: 2rem;
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  opacity: 0;
  animation: fadeUp 1s ease 0.3s forwards;
  text-align: left;
}

.hero-heading {
  font-size: clamp(3.5rem, 8vw, 7rem);
  font-weight: 900;
  line-height: 1.05;
  margin-bottom: 2rem;
  letter-spacing: -2px;
  color: var(--text-charcoal);
  font-family: 'Playfair Display', serif;
  opacity: 0;
  animation: fadeUp 1.2s ease 0.5s forwards;
  text-align: left;
}

.hero-cta-group {
  display: flex;
  gap: 1.5rem;
  flex-wrap: wrap;
  margin-top: 3rem;
  opacity: 0;
  animation: fadeUp 1s ease 0.8s forwards;
}

.hero-right {
  position: relative;
  z-index: 1;
  height: 100%;
  min-height: 500px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.hero-collage {
  position: relative;
  width: 100%;
  height: 100%;
  max-width: 600px;
  aspect-ratio: 4/5;
}

.hero-collage img {
  position: absolute;
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 4px;
  box-shadow: 0 20px 60px rgba(44, 36, 22, 0.2);
  transition: var(--transition-slow);
}

.hero-collage img:nth-child(1) {
  z-index: 3;
  transform: translate(0, 0) rotate(0deg);
}

.hero-collage img:nth-child(2) {
  z-index: 2;
  transform: translate(20px, 20px) rotate(2deg);
  opacity: 0.9;
}

.hero-collage img:nth-child(3) {
  z-index: 1;
  transform: translate(40px, 40px) rotate(-1deg);
  opacity: 0.8;
}

.hero-collage:hover img:nth-child(1) {
  transform: translate(-10px, -10px) rotate(-1deg);
}

.hero-collage:hover img:nth-child(2) {
  transform: translate(10px, 10px) rotate(3deg);
}

.hero-collage:hover img:nth-child(3) {
  transform: translate(30px, 30px) rotate(-2deg);
}

/* === EDITORIAL FEATURE SECTION === */
.editorial-feature {
  padding: 120px 5%;
  background: var(--bg-sand);
  position: relative;
  overflow: hidden;
}

.editorial-container {
  max-width: 1400px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1.2fr 1fr;
  gap: 80px;
  align-items: start;
  position: relative;
}

.editorial-text-wrapper {
  position: relative;
  z-index: 2;
}

.editorial-dropcap {
  font-size: clamp(1.1rem, 2vw, 1.4rem);
  line-height: 1.9;
  color: var(--text-charcoal);
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  text-align: justify;
  position: relative;
}

.dropcap {
  float: left;
  font-size: 6rem;
  line-height: 0.85;
  padding-right: 12px;
  padding-top: 8px;
  font-family: 'Playfair Display', serif;
  font-weight: 700;
  color: var(--accent-orange);
}

.editorial-images {
  position: relative;
  height: 100%;
  min-height: 500px;
}

.editorial-image {
  position: absolute;
  width: 100%;
  max-width: 400px;
  aspect-ratio: 3/4;
  overflow: hidden;
  border-radius: 4px;
  box-shadow: 0 15px 50px rgba(44, 36, 22, 0.15);
  transition: var(--transition-slow);
}

.editorial-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: var(--transition-slow);
}

.editorial-image-1 {
  top: 0;
  left: 0;
  z-index: 2;
  transform: rotate(-2deg);
}

.editorial-image-2 {
  bottom: 0;
  right: 0;
  z-index: 1;
  transform: rotate(3deg);
}

.editorial-image:hover {
  transform: rotate(0deg) scale(1.05);
  z-index: 3;
  box-shadow: 0 20px 60px rgba(44, 36, 22, 0.25);
}

.editorial-image:hover img {
  transform: scale(1.1);
}

.btn-main {
  background: var(--text-charcoal);
  color: var(--bg-sand);
  border: 2px solid var(--text-charcoal);
  border-radius: 0;
  font-weight: 500;
  padding: 16px 40px;
  font-size: 0.9rem;
  transition: var(--transition);
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  letter-spacing: 1px;
  font-family: 'Inter', sans-serif;
  position: relative;
  overflow: hidden;
}

.btn-main::before {
  content: "";
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: var(--accent-orange);
  transition: left 0.5s ease;
  z-index: -1;
}

.btn-main:hover {
  color: var(--bg-sand);
  border-color: var(--accent-orange);
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(204, 85, 0, 0.3);
}

.btn-main:hover::before {
  left: 0;
}

.btn-outline {
  background: var(--text-charcoal);
  color: var(--bg-sand);
  border: 2px solid var(--text-charcoal);
  border-radius: 0;
  font-weight: 500;
  padding: 16px 40px;
  font-size: 0.9rem;
  transition: var(--transition);
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  letter-spacing: 1px;
  font-family: 'Inter', sans-serif;
  position: relative;
  overflow: hidden;
}

.btn-outline::before {
  content: "";
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: var(--accent-orange);
  transition: left 0.5s ease;
  z-index: -1;
}

.btn-outline:hover {
  color: var(--bg-sand);
  border-color: var(--accent-orange);
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(204, 85, 0, 0.3);
}

.btn-outline:hover::before {
  left: 0;
}

.scroll-icon {
  position: absolute;
  bottom: 40px;
  left: 50%;
  transform: translateX(-50%);
  animation: bounce 2s infinite;
  font-size: 1.5rem;
  color: var(--text-charcoal);
  z-index: 3;
  cursor: pointer;
}

@keyframes bounce {
  0%, 20%, 50%, 80%, 100% { transform: translate(-50%, 0); }
  40% { transform: translate(-50%, -10px); }
  60% { transform: translate(-50%, -5px); }
}

@keyframes fadeUp {
  from { opacity: 0; transform: translateY(50px); }
  to { opacity: 1; transform: translateY(0); }
}

/* === SCROLL GALLERY SECTION === */
.scroll-gallery {
  position: relative;
  background: var(--bg-sand);
}

.gallery-item {
  min-height: 100vh;
  width: 100%;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.gallery-item-image {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}

.gallery-item-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transform: scale(1.1);
  transition: transform 0.8s ease;
}

.gallery-item-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(44, 36, 22, 0.4);
  z-index: 2;
}

.gallery-item-content {
  position: relative;
  z-index: 3;
  max-width: 1200px;
  padding: 0 5%;
  text-align: center;
  opacity: 0;
  transform: translateY(50px);
  transition: all 1s ease;
}

.gallery-item-content.visible {
  opacity: 1;
  transform: translateY(0);
}

.gallery-item-title {
  font-size: clamp(3rem, 8vw, 6rem);
  font-weight: 900;
  color: var(--bg-sand);
  margin-bottom: 1.5rem;
  letter-spacing: -2px;
  font-family: 'Playfair Display', serif;
}

.gallery-item-caption {
  font-size: clamp(1rem, 2vw, 1.3rem);
  color: var(--bg-sand);
  max-width: 600px;
  margin: 0 auto;
  line-height: 1.8;
  font-weight: 400;
  letter-spacing: 0.5px;
  font-family: 'Inter', sans-serif;
}

/* === GALLERY GRID (for pagination) === */
.gallery-section {
  padding: 0;
  background: var(--bg-sand);
  position: relative;
}

.gallery-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 30px;
  margin-top: 0;
}

.art-card {
  background: var(--bg-clay);
  overflow: hidden;
  transition: var(--transition);
  border: none;
  position: relative;
}

.art-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 40px rgba(44, 36, 22, 0.15);
  z-index: 10;
}

.gallery-cta-wrapper {
  text-align: center;
  margin-top: 80px;
  margin-bottom: 40px;
  padding: 0 5%;
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
  transform: scale(1.15);
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
  font-weight: 600;
  transition: var(--transition);
  display: flex;
  align-items: center;
  gap: 10px;
  flex: 1;
  justify-content: center;
  font-size: 0.85rem;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  font-family: 'Space Grotesk', sans-serif;
}

.btn-whatsapp:hover {
  background: #1ebd5f;
  transform: translateY(-2px);
  box-shadow: 0 5px 20px rgba(37, 211, 102, 0.4);
}

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
  transition: var(--transition-fast);
  font-size: 0.9rem;
  letter-spacing: 1px;
  font-family: 'Inter', sans-serif;
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

.no-art {
  text-align: center;
  font-size: 1.3rem;
  color: var(--text-muted);
  padding: 4rem 0;
}

/* === CULTURAL INFLUENCE SECTION === */
.cultural-influence-section {
  padding: 120px 5%;
  background: var(--bg-clay);
  position: relative;
}

.cultural-header {
  text-align: center;
  margin-bottom: 60px;
}

.cultural-title {
  font-size: clamp(2.5rem, 6vw, 4.5rem);
  font-weight: 900;
  color: var(--text-charcoal);
  margin-bottom: 1rem;
  font-family: 'Playfair Display', serif;
  letter-spacing: -1px;
}

.cultural-subtitle {
  font-size: 1.1rem;
  color: var(--text-muted);
  font-family: 'Inter', sans-serif;
  font-weight: 400;
}

.cultural-strip {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  margin-bottom: 60px;
  max-width: 1400px;
  margin-left: auto;
  margin-right: auto;
}

.cultural-item {
  position: relative;
  aspect-ratio: 4/5;
  overflow: hidden;
  border-radius: 4px;
  background: var(--bg-sand);
  transition: var(--transition);
}

.cultural-item img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: var(--transition-slow);
  filter: grayscale(30%) contrast(1.1);
}

.cultural-item:hover img {
  transform: scale(1.1);
  filter: grayscale(0%) contrast(1.2);
}

.cultural-label {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: linear-gradient(to top, rgba(44, 36, 22, 0.9), transparent);
  padding: 20px;
  color: var(--bg-sand);
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 0.9rem;
  letter-spacing: 1px;
  text-transform: uppercase;
  opacity: 0;
  transition: var(--transition);
}

.cultural-item:hover .cultural-label {
  opacity: 1;
}

.cultural-text {
  max-width: 800px;
  margin: 0 auto;
  text-align: center;
}

.cultural-text p {
  font-size: clamp(1rem, 1.5vw, 1.2rem);
  line-height: 1.9;
  color: var(--text-charcoal);
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-style: italic;
}

/* === COLLECTIONS SECTION === */
.collections-section {
  background: var(--bg-sand);
  position: relative;
  padding: 120px 5%;
}

.collection-item {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 600px;
  align-items: center;
  gap: 0;
  position: relative;
  overflow: hidden;
}

.collection-item:nth-child(even) {
  grid-template-columns: 1fr 1fr;
}

.collection-item:nth-child(even) .collection-content {
  order: 1;
}

.collection-item:nth-child(even) .collection-image {
  order: 2;
}

.collection-image {
  position: relative;
  width: 100%;
  height: 100%;
  min-height: 450px;
  max-height: 500px;
  overflow: hidden;
  background: var(--bg-clay);
}

.collection-murals .collection-image {
  min-height: 400px;
  max-height: 450px;
}

.collection-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: var(--transition-slow);
  filter: grayscale(20%) contrast(1.1);
}

.collection-item:hover .collection-image img {
  transform: scale(1.08);
  filter: grayscale(0%) contrast(1.2);
}

.collection-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, rgba(204, 85, 0, 0.1) 0%, rgba(75, 0, 130, 0.1) 100%);
  opacity: 0;
  transition: var(--transition);
}

.collection-item:hover .collection-overlay {
  opacity: 1;
}

.collection-content {
  padding: 80px 60px;
  background: var(--bg-sand);
  display: flex;
  flex-direction: column;
  justify-content: center;
  position: relative;
  z-index: 2;
}

.collection-content::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 4px;
  height: 100%;
  background: var(--accent-orange);
  opacity: 0.3;
}

.collection-title {
  font-size: clamp(3rem, 6vw, 5rem);
  font-weight: 900;
  color: var(--text-charcoal);
  margin-bottom: 2rem;
  letter-spacing: -2px;
  font-family: 'Playfair Display', serif;
  line-height: 1.1;
}

.collection-description {
  font-size: clamp(1rem, 1.5vw, 1.2rem);
  color: var(--text-muted);
  line-height: 1.9;
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  max-width: 500px;
}

.collection-murals {
  background: linear-gradient(135deg, var(--bg-sand) 0%, rgba(212, 175, 55, 0.05) 100%);
}

.collection-portraits {
  background: linear-gradient(135deg, rgba(75, 0, 130, 0.03) 0%, var(--bg-sand) 100%);
}

.collection-street {
  background: linear-gradient(135deg, var(--bg-sand) 0%, rgba(204, 85, 0, 0.05) 100%);
}

.collection-typography {
  background: linear-gradient(135deg, rgba(212, 175, 55, 0.03) 0%, var(--bg-sand) 100%);
}

/* === ARTIST MANIFESTO SECTION === */
.manifesto-section {
  padding: 150px 5%;
  background: var(--bg-clay);
  text-align: center;
  position: relative;
}

.manifesto-content {
  max-width: 900px;
  margin: 0 auto;
}

.manifesto-content h2 {
  font-size: clamp(2.5rem, 6vw, 5rem);
  font-weight: 900;
  color: var(--text-charcoal);
  margin-bottom: 4rem;
  letter-spacing: -2px;
  font-family: 'Playfair Display', serif;
}

.manifesto-text {
  font-size: clamp(1.2rem, 2.5vw, 1.8rem);
  color: var(--text-charcoal);
  line-height: 2;
  font-weight: 400;
  letter-spacing: 0.5px;
  margin-bottom: 2rem;
  font-family: 'Inter', sans-serif;
}

.manifesto-text strong {
  color: var(--accent-orange);
  font-weight: 600;
}

.manifesto-text.animate {
  animation: fadeInUp 1s ease forwards;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.fade-left, .fade-right, .fade-up {
  opacity: 0;
  transform: translateY(50px);
  transition: all 1s ease-out;
}

.fade-left.visible, .fade-right.visible, .fade-up.visible {
  opacity: 1;
  transform: translateY(0);
}

/* === COMMISSIONS SECTION === */
.commissions-section {
  padding: 120px 5%;
  background: var(--bg-sand);
  position: relative;
}

.commissions-container {
  max-width: 1200px;
  margin: 0 auto;
}

.commissions-header {
  text-align: center;
  margin-bottom: 80px;
}

.commissions-title {
  font-size: clamp(2.5rem, 6vw, 4.5rem);
  font-weight: 900;
  color: var(--text-charcoal);
  margin-bottom: 1rem;
  font-family: 'Playfair Display', serif;
  letter-spacing: -1px;
}

.commissions-subtitle {
  font-size: 1.1rem;
  color: var(--text-muted);
  font-family: 'Inter', sans-serif;
  font-weight: 400;
}

.process-steps {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  gap: 40px;
  margin-bottom: 60px;
}

.process-step {
  flex: 1;
  min-width: 200px;
  max-width: 250px;
  text-align: center;
  padding: 40px 20px;
  background: var(--bg-clay);
  border-radius: 4px;
  transition: var(--transition);
}

.process-step:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 30px rgba(44, 36, 22, 0.1);
}

.step-number {
  font-size: 3rem;
  font-weight: 900;
  color: var(--accent-orange);
  font-family: 'Playfair Display', serif;
  margin-bottom: 1rem;
  opacity: 0.3;
}

.step-title {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--text-charcoal);
  margin-bottom: 1rem;
  font-family: 'Playfair Display', serif;
}

.step-description {
  font-size: 0.95rem;
  color: var(--text-muted);
  line-height: 1.7;
  font-family: 'Inter', sans-serif;
}

.process-arrow {
  font-size: 2rem;
  color: var(--accent-gold);
  font-family: 'Playfair Display', serif;
  font-weight: 700;
}

.pricing-info {
  text-align: center;
  margin-bottom: 40px;
}

.pricing-text {
  font-size: 1rem;
  color: var(--text-muted);
  font-family: 'Inter', sans-serif;
  font-style: italic;
}

.commissions-cta {
  text-align: center;
}


/* === PRESS & RECOGNITION SECTION === */
.press-section {
  padding: 100px 5%;
  background: var(--bg-clay);
  position: relative;
}

.press-container {
  max-width: 1200px;
  margin: 0 auto;
}

.press-title {
  font-size: clamp(2.5rem, 6vw, 4rem);
  font-weight: 900;
  color: var(--text-charcoal);
  margin-bottom: 60px;
  text-align: center;
  font-family: 'Playfair Display', serif;
  letter-spacing: -1px;
}

.press-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 40px;
}

.press-item {
  padding: 40px;
  background: var(--bg-sand);
  border-radius: 4px;
  border-left: 3px solid var(--accent-gold);
}

.press-label {
  font-size: 0.85rem;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: var(--accent-orange);
  margin-bottom: 1.5rem;
  font-family: 'Inter', sans-serif;
  font-weight: 600;
}

.press-content p {
  font-size: 1rem;
  color: var(--text-charcoal);
  margin-bottom: 0.8rem;
  font-family: 'Inter', sans-serif;
  line-height: 1.6;
}

.press-content p:last-child {
  margin-bottom: 0;
}

/* === CONTACT SECTION === */
.contact-section {
  background: var(--bg-sand);
  color: var(--text-charcoal);
  padding: 150px 5%;
  position: relative;
}

.contact-container {
  max-width: 1400px;
  margin: 0 auto;
}

.contact-header {
  text-align: center;
  margin-bottom: 80px;
}

.contact-heading {
  font-size: clamp(3rem, 8vw, 6rem);
  font-weight: 900;
  color: var(--text-charcoal);
  line-height: 1.1;
  letter-spacing: -2px;
  font-family: 'Playfair Display', serif;
  margin-bottom: 1.5rem;
}

.contact-subtitle {
  font-size: clamp(1rem, 1.5vw, 1.2rem);
  color: var(--text-muted);
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  max-width: 600px;
  margin: 0 auto;
  line-height: 1.8;
}

.contact-info-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 30px;
  max-width: 1400px;
  margin: 0 auto;
}

.contact-card {
  background: var(--bg-clay);
  border: 1px solid var(--border-subtle);
  padding: 3rem;
  border-radius: 4px;
  transition: var(--transition);
  position: relative;
  overflow: hidden;
}

.contact-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 4px;
  height: 100%;
  background: var(--accent-orange);
  transform: scaleY(0);
  transition: var(--transition);
}

.contact-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 40px rgba(44, 36, 22, 0.1);
  border-color: var(--accent-orange);
}

.contact-card:hover::before {
  transform: scaleY(1);
}

.contact-icon-wrapper {
  margin-bottom: 2rem;
}

.contact-icon {
  width: 70px;
  height: 70px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.8rem;
  transition: var(--transition);
  position: relative;
}

.contact-icon-instagram {
  background: linear-gradient(135deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
  color: white;
}

.contact-icon-whatsapp {
  background: var(--success);
  color: white;
}

.contact-icon-email {
  background: var(--accent-orange);
  color: var(--bg-sand);
}

.contact-icon-location {
  background: var(--accent-gold);
  color: var(--text-charcoal);
}

.contact-card:hover .contact-icon {
  transform: scale(1.1) rotate(5deg);
}

.contact-card-title {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--text-charcoal);
  margin-bottom: 0.5rem;
  font-family: 'Playfair Display', serif;
}

.contact-card-label {
  font-size: 0.85rem;
  color: var(--text-muted);
  text-transform: uppercase;
  letter-spacing: 1.5px;
  margin-bottom: 1.5rem;
  font-family: 'Inter', sans-serif;
  font-weight: 500;
}

.contact-link {
  display: inline-flex;
  align-items: center;
  gap: 12px;
  color: var(--text-charcoal);
  text-decoration: none;
  font-family: 'Inter', sans-serif;
  font-size: 1rem;
  font-weight: 500;
  transition: var(--transition-fast);
  padding: 0.5rem 0;
  border-bottom: 2px solid transparent;
  flex-wrap: wrap;
  word-break: break-word;
}

.contact-link:hover {
  color: var(--accent-orange);
  border-bottom-color: var(--accent-orange);
}

.contact-link i {
  font-size: 0.9rem;
  transition: var(--transition-fast);
}

.contact-link:hover i {
  transform: translateX(5px);
}

.contact-location {
  font-size: 1rem;
  color: var(--text-charcoal);
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-style: italic;
}

.contact-card-location {
  text-align: center;
  background: linear-gradient(135deg, var(--bg-clay) 0%, rgba(212, 175, 55, 0.1) 100%);
}

.contact-card-location .contact-icon-wrapper {
  display: flex;
  justify-content: center;
}

.contact-card-location .contact-card-title {
  text-align: center;
}

.contact-card-location .contact-card-label {
  text-align: center;
}

.contact-card-location .contact-location {
  text-align: center;
  font-size: 1.2rem;
}

.btn {
  display: inline-flex;
  align-items: center;
  gap: 12px;
  border-radius: 0;
  padding: 18px 42px;
  font-weight: 600;
  transition: var(--transition);
  font-size: 0.9rem;
  text-decoration: none;
  border: none;
  cursor: pointer;
  letter-spacing: 2px;
  text-transform: uppercase;
  font-family: 'Space Grotesk', sans-serif;
}

.btn-whatsapp {
  background: var(--success);
  color: white;
}

.btn-whatsapp:hover {
  background: #1ebd5f;
  transform: translateY(-2px);
  color: white;
  box-shadow: 0 5px 20px rgba(37, 211, 102, 0.4);
}

.btn-email {
  background: transparent;
  border: 2px solid var(--text-soft);
  color: var(--text-soft);
}

.btn-email:hover {
  background: var(--text-soft);
  color: var(--bg-dark);
  transform: translateY(-2px);
}

.social-links {
  margin-top: 3rem;
  display: flex;
  gap: 1.5rem;
  flex-wrap: wrap;
}

.social-links a {
  color: var(--text-muted);
  font-size: 1.2rem;
  transition: var(--transition-fast);
  text-decoration: none;
}

.social-links a:hover {
  color: var(--accent);
  transform: translateY(-3px);
}

/* === FOOTER === */
.footer-elevated {
  position: relative;
  background: var(--bg-clay);
  background-image: 
    url("data:image/svg+xml,%3Csvg width='100' height='100' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.05'/%3E%3C/svg%3E"),
    linear-gradient(180deg, var(--bg-clay) 0%, var(--bg-sand) 100%);
  color: var(--text-charcoal);
  padding: 100px 5% 60px;
  overflow: hidden;
  border-top: 2px solid var(--accent-gold);
}

.footer-container {
  max-width: 1400px;
  margin: 0 auto;
}

.footer-content {
  display: grid;
  grid-template-columns: 1.2fr 2fr;
  gap: 80px;
  margin-bottom: 60px;
  align-items: start;
}

.footer-brand {
  text-align: left;
}

.footer-brand img {
  width: 70px;
  height: 70px;
  border-radius: 50%;
  object-fit: cover;
  margin-bottom: 1.5rem;
  border: 3px solid var(--accent-gold);
  box-shadow: 0 4px 15px rgba(212, 175, 55, 0.2);
}

.footer-brand h3 {
  color: var(--text-charcoal);
  font-size: 1.5rem;
  font-weight: 700;
  margin-bottom: 1rem;
  letter-spacing: 1px;
  font-family: 'Inter', sans-serif;
}

.footer-statement {
  font-size: 1rem;
  color: var(--text-muted);
  line-height: 1.8;
  font-family: 'Inter', sans-serif;
  font-style: italic;
}

.footer-links {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 40px;
}

.footer-column {
  text-align: left;
}

.footer-column-title {
  font-size: 1.1rem;
  font-weight: 700;
  color: var(--text-charcoal);
  margin-bottom: 1.5rem;
  font-family: 'Playfair Display', serif;
  letter-spacing: 0.5px;
  position: relative;
  padding-bottom: 0.5rem;
}

.footer-column-title::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 40px;
  height: 2px;
  background: var(--accent-orange);
}

.footer-nav,
.footer-social {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-nav li,
.footer-social li {
  margin-bottom: 1rem;
}

.footer-nav a,
.footer-social a {
  color: var(--text-muted);
  text-decoration: none;
  font-family: 'Inter', sans-serif;
  font-size: 0.95rem;
  transition: var(--transition-fast);
  display: inline-flex;
  align-items: center;
  gap: 10px;
}

.footer-nav a:hover,
.footer-social a:hover {
  color: var(--accent-orange);
  transform: translateX(5px);
}

.footer-social a i {
  font-size: 1.1rem;
  width: 20px;
}

.footer-location {
  color: var(--text-muted);
  font-family: 'Inter', sans-serif;
  font-size: 0.95rem;
  display: flex;
  align-items: center;
  gap: 10px;
  margin-top: 0.5rem;
}

.footer-location i {
  color: var(--accent-orange);
}

.footer-bottom {
  margin-top: 60px;
  padding-top: 30px;
  border-top: 1px solid var(--border-subtle);
  text-align: center;
  font-size: 0.85rem;
  color: var(--text-muted);
  letter-spacing: 0.5px;
  font-family: 'Inter', sans-serif;
}

/* === BACK TO TOP BUTTON === */
.back-to-top {
  position: fixed;
  bottom: 30px;
  right: 30px;
  width: 50px;
  height: 50px;
  background: var(--text-charcoal);
  color: var(--bg-sand);
  border: 2px solid var(--text-charcoal);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  opacity: 0;
  visibility: hidden;
  transition: var(--transition);
  z-index: 1000;
  font-size: 1.2rem;
}

.back-to-top.visible {
  opacity: 1;
  visibility: visible;
}

.back-to-top:hover {
  background: var(--accent-orange);
  border-color: var(--accent-orange);
  transform: translateY(-5px);
  box-shadow: 0 8px 25px rgba(204, 85, 0, 0.3);
}

@media (max-width: 768px) {
  .back-to-top {
    bottom: 20px;
    right: 20px;
    width: 45px;
    height: 45px;
    font-size: 1rem;
  }
}

/* === RESPONSIVE === */
@media (max-width: 992px) {
  .hero-elegant {
    grid-template-columns: 1fr;
    gap: 30px;
    padding: 120px 5% 60px;
    display: grid;
    grid-template-rows: auto auto auto auto;
  }

  .hero-left {
    display: contents;
  }

  .hero-tag {
    grid-row: 1;
    order: 1;
    margin-top: 0;
  }

  .hero-heading {
    grid-row: 2;
    order: 2;
    position: relative;
    z-index: 2;
    margin-bottom: 1.5rem;
  }

  .hero-right {
    grid-row: 3;
    min-height: 400px;
    width: 100%;
    display: flex !important;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 1;
    margin-top: 1rem;
    margin-bottom: 2rem;
  }

  .hero-cta-group {
    grid-row: 4;
    margin-top: 0;
    margin-bottom: 0;
    padding-top: 0;
    width: 100%;
    position: relative;
    z-index: 2;
  }

  .hero-collage {
    width: 100% !important;
    max-width: 100%;
    min-height: 400px;
    position: relative;
    display: block !important;
    aspect-ratio: 4/3;
  }

  .editorial-container {
    grid-template-columns: 1fr;
    gap: 40px;
  }

  .editorial-text-wrapper {
    margin-bottom: 0;
  }

  .editorial-images {
    min-height: 400px;
    margin-top: 3rem;
  }

  .collection-item {
    grid-template-columns: 1fr;
    min-height: auto;
    margin-bottom: 40px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(44, 36, 22, 0.08);
  }

  .collection-item:last-child {
    margin-bottom: 0;
  }

  .collection-item:nth-child(even) .collection-content {
    order: 2;
  }

  .collection-item:nth-child(even) .collection-image {
    order: 1;
  }

  .collection-image {
    min-height: 300px;
    max-height: 350px;
    border-radius: 0;
  }

  .collection-murals .collection-image {
    min-height: 280px;
    max-height: 320px;
  }

  .cultural-strip {
    grid-template-columns: repeat(2, 1fr);
  }

  .process-steps {
    flex-direction: column;
    gap: 30px;
  }

  .process-arrow {
    transform: rotate(90deg);
  }

  .press-grid {
    grid-template-columns: 1fr;
  }

  .contact-info-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
  }

  .contact-card-location {
    grid-column: auto;
  }
}

@media (max-width: 768px) {
  body {
    padding-top: 0;
  }

  .glass-nav {
    padding: 1rem 0;
  }

  .hero-elegant {
    padding: 120px 4% 60px;
    min-height: auto;
  }

  .hero-collage {
    max-width: 100%;
    width: 100%;
    min-height: 350px;
    aspect-ratio: 4/3;
  }

  .hero-right {
    min-height: 350px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .editorial-feature,
  .cultural-influence-section,
  .commissions-section,
  .press-section,
  .manifesto-section,
  .contact-section {
    padding: 80px 4%;
  }

  .collections-section {
    padding: 80px 4%;
  }

  .editorial-dropcap {
    font-size: 1rem;
  }

  .dropcap {
    font-size: 4rem;
  }

  .collection-content {
    padding: 50px 30px;
    text-align: center;
  }

  .collection-content::before {
    display: none;
  }

  .collection-title {
    margin-bottom: 1.5rem;
  }

  .collection-description {
    max-width: 100%;
    text-align: center;
  }

  .cultural-strip {
    grid-template-columns: 1fr;
    gap: 15px;
  }

  .process-step {
    max-width: 100%;
  }

  .contact-card {
    padding: 2.5rem 2rem;
  }

  .contact-header {
    margin-bottom: 60px;
  }

  .gallery-item {
    min-height: 70vh;
  }

  .scroll-gallery {
    padding-top: 0;
  }
}

@media (max-width: 576px) {
  .hero-elegant {
    padding: 120px 4% 40px;
    min-height: auto;
    overflow: visible;
    width: 100%;
    box-sizing: border-box;
  }

  .hero-tag {
    margin-top: 0;
    margin-bottom: 1.5rem;
  }

  .hero-heading {
    font-size: clamp(2.5rem, 12vw, 4rem);
    margin-bottom: 1.5rem;
    position: relative;
    z-index: 2;
    width: 100%;
    max-width: 100%;
    word-wrap: break-word;
    overflow-wrap: break-word;
  }

  .hero-right {
    margin-top: 1.5rem;
    margin-bottom: 2rem;
    position: relative;
    z-index: 1;
    width: 100%;
    max-width: 100%;
    min-height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-sizing: border-box;
    overflow: hidden;
  }

  .hero-cta-group {
    flex-direction: column;
    width: 100%;
    max-width: 100%;
    gap: 1.5rem;
    margin-top: 0;
    margin-bottom: 2rem;
    position: relative;
    z-index: 2;
    box-sizing: border-box;
    padding: 0;
  }

  .hero-cta-group .btn-main,
  .hero-cta-group .btn-outline {
    width: 100%;
    max-width: 100%;
    justify-content: center;
    box-sizing: border-box;
    padding: 16px 20px;
  }

  .hero-collage {
    max-width: 100%;
    width: 100%;
    min-height: 300px;
    aspect-ratio: 4/3;
    box-sizing: border-box;
    position: relative;
    overflow: hidden;
  }

  .hero-collage img:nth-child(1) {
    position: relative !important;
    transform: none !important;
    width: 100% !important;
    max-width: 100% !important;
    height: auto !important;
    min-height: 300px;
    object-fit: cover;
    border-radius: 4px;
    box-sizing: border-box;
  }

  .hero-collage img:nth-child(2),
  .hero-collage img:nth-child(3) {
    display: none;
  }

  .editorial-feature {
    padding: 60px 4%;
  }

  .editorial-container {
    gap: 30px;
  }

  .editorial-text-wrapper {
    margin-bottom: 0;
  }

  .editorial-images {
    margin-top: 3.5rem;
  }

  .dropcap {
    font-size: 3rem;
  }

  .editorial-image-2 {
    display: none;
  }

  .collections-section {
    padding: 60px 4% !important;
  }

  .collection-item {
    margin-bottom: 30px;
    box-shadow: 0 2px 15px rgba(44, 36, 22, 0.06);
  }

  .collection-image {
    min-height: 250px;
    max-height: 300px;
  }

  .collection-murals .collection-image {
    min-height: 240px;
    max-height: 280px;
  }

  .collection-content {
    padding: 35px 25px;
    text-align: center;
  }

  .collection-title {
    font-size: clamp(2rem, 8vw, 3rem);
    margin-bottom: 1.2rem;
  }

  .collection-description {
    font-size: 0.95rem;
    line-height: 1.7;
    text-align: center;
  }

  .cultural-influence-section {
    padding: 60px 4%;
  }

  .cultural-strip {
    gap: 15px;
  }

  .cultural-title,
  .commissions-title,
  .press-title {
    font-size: clamp(2rem, 8vw, 3rem);
  }

  .process-steps {
    gap: 20px;
  }

  .process-step {
    padding: 30px 15px;
  }

  .step-number {
    font-size: 2.5rem;
  }

  .step-title {
    font-size: 1.2rem;
  }

  .press-grid {
    gap: 20px;
  }

  .press-item {
    padding: 30px 20px;
  }

  .contact-section {
    padding: 80px 4%;
  }

  .contact-heading {
    font-size: clamp(2.5rem, 10vw, 4rem);
  }

  .contact-info-grid {
    grid-template-columns: 1fr;
    gap: 25px;
  }

  .contact-card {
    padding: 2rem 1.5rem;
  }

  .contact-icon {
    width: 60px;
    height: 60px;
    font-size: 1.5rem;
  }

  .contact-card-title {
    font-size: 1.3rem;
  }

  .contact-link {
    font-size: 0.9rem;
    word-break: break-word;
    flex-direction: column;
    align-items: flex-start;
    gap: 8px;
  }

  .contact-link i {
    align-self: flex-end;
  }

  .contact-card-location {
    text-align: center !important;
  }

  .contact-card-location .contact-location {
    text-align: center !important;
    width: 100%;
    display: block;
    margin: 0 auto;
  }
  @media (max-width: 576px) {
  .footer-location {
    justify-content: center;
  }
}


  .manifesto-section {
    padding: 80px 4%;
  }

  .manifesto-content h2 {
    font-size: clamp(2rem, 8vw, 3rem);
  }

  .manifesto-text {
    font-size: 1.1rem;
  }

  .gallery-grid {
    grid-template-columns: 1fr;
    gap: 20px;
  }

  .gallery-cta-wrapper {
    margin-top: 60px;
    margin-bottom: 30px;
  }

  .art-card {
    margin-bottom: 0;
  }

  .art-meta {
    padding: 1.5rem;
  }

  .pagination {
    padding: 30px 4%;
    margin-top: 40px;
  }

  .page-btn {
    padding: 10px 16px;
    font-size: 0.85rem;
  }

  .footer-elevated {
    padding: 60px 4% 40px;
  }

  .footer-content {
    grid-template-columns: 1fr;
    gap: 50px;
  }

  .footer-brand {
    text-align: center;
  }

  .footer-links {
    grid-template-columns: 1fr;
    gap: 40px;
  }

  .footer-column {
    text-align: center;
  }

  .footer-column-title::after {
    left: 50%;
    transform: translateX(-50%);
  }

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
}

/* Extra small devices */
@media (max-width: 400px) {
  .hero-heading {
    font-size: 2rem;
  }

  .collection-title {
    font-size: 1.8rem;
  }

  .contact-heading {
    font-size: 2rem;
  }

  .btn-main,
  .btn-outline {
    padding: 14px 28px;
    font-size: 0.85rem;
  }

  .glass-nav .navbar-nav {
    padding: 1rem 0;
  }

  .glass-nav .nav-link {
    padding: 0.75rem 0;
    font-size: 0.9rem;
  }
}

/* Touch device improvements */
@media (hover: none) and (pointer: coarse) {
  .btn-main,
  .btn-outline,
  .btn-view,
  .page-btn,
  .nav-link {
    min-height: 44px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }

  .art-card:hover {
    transform: none;
  }

  .collection-item:hover .collection-image img {
    transform: none;
  }

  .editorial-image:hover {
    transform: none;
  }
}

/* High DPI displays */
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
  .art-image img,
  .collection-image img,
  .editorial-image img {
    image-rendering: -webkit-optimize-contrast;
    image-rendering: crisp-edges;
  }
}

/* Landscape mobile */
@media (max-width: 992px) and (orientation: landscape) {
  .hero-elegant {
    min-height: auto;
    padding: 80px 5% 60px;
  }

  .hero-right {
    min-height: 400px;
  }
}
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg glass-nav sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#home">
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
        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#collections">Collections</a></li>
        <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="#commissions">Commissions</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section - Split Editorial Layout -->
<section id="home" class="hero-elegant">
  <div class="hero-left">
    <div class="hero-tag">Zanzibar Visual Artist</div>
    <h1 class="hero-heading">Life Is Art</h1>
    <div class="hero-cta-group">
      <a href="#collections" class="btn-main">Explore Work</a>
      <a href="#commissions" class="btn-outline">Commission Art</a>
    </div>
  </div>
  <div class="hero-right">
    <div class="hero-collage">
      <img src="uploads/picha6.jpg" alt="A50 Life Art - Featured Artwork">
      <img src="uploads/picha2.jpg" alt="A50 Life Art - Artwork">
      <img src="uploads/picha3.jpg" alt="A50 Life Art - Artwork">
    </div>
  </div>
</section>



<!-- Featured Work Section -->
<section id="gallery" class="gallery-section">
  <div class="section-header" style="padding: 100px 5% 60px; text-align: center;">
    <h2 style="font-size: clamp(3rem, 8vw, 6rem); font-weight: 900; color: var(--text-soft); margin-bottom: 1rem; letter-spacing: -3px; font-family: 'Space Grotesk', sans-serif; text-transform: uppercase;">Featured Work</h2>
    <p style="color: var(--text-muted); font-size: clamp(1rem, 2vw, 1.2rem); max-width: 700px; margin: 0 auto; line-height: 1.8; font-family: 'Inter', sans-serif;">A curated selection of murals, portraits, street art, and custom designs.</p>
  </div>

  <div class="gallery-grid">
    <?php
    // Pagination setup
    $items_per_page = 6;
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
    $countResult = $conn->query("SELECT COUNT(*) AS total FROM paintings");
    $total_items = $countResult->fetch_assoc()['total'];
    $total_pages = ceil($total_items / $items_per_page);
    $offset = ($page - 1) * $items_per_page;
    $res = $conn->query("SELECT * FROM paintings ORDER BY id DESC LIMIT $items_per_page OFFSET $offset");

    if ($res->num_rows > 0) {
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

  <div class="gallery-cta-wrapper">
    <a href="gallery.php" class="btn-main">View Full Gallery</a>
  </div>

  <script>
  document.querySelectorAll('.btn-whatsapp').forEach(btn => {
    btn.addEventListener('click', async () => {
      const number = btn.dataset.number;
      const message = encodeURIComponent(btn.dataset.message);
      const link = `https://wa.me/${number}?text=${message}`;
      window.open(link, '_blank');
    });
  });
  </script>
</section>

<!-- Collections Section -->
<section id="collections" class="collections-section">
  <!-- Murals Collection -->
  <div class="collection-item collection-murals">
    <div class="collection-image">
      <img src="uploads/picha6.jpg" alt="Murals Collection">
      <div class="collection-overlay"></div>
    </div>
    <div class="collection-content">
      <h2 class="collection-title">Murals</h2>
      <p class="collection-description">
        Large-scale wall paintings that transform spaces into narratives. 
        Each mural tells a story of culture, community, and connection—bringing 
        the streets of Zanzibar to life with bold strokes and vibrant colors.
      </p>
    </div>
  </div>

  <!-- Portraits Collection -->
  <div class="collection-item collection-portraits">
    <div class="collection-content">
      <h2 class="collection-title">Portraits</h2>
      <p class="collection-description">
        Custom portraits that capture the essence of the soul. Every brushstroke 
        reveals personality, emotion, and the unique story written in each face.
      </p>
    </div>
    <div class="collection-image">
      <img src="uploads/picha2.jpg" alt="Portraits Collection">
      <div class="collection-overlay"></div>
    </div>
  </div>

  <!-- Street Art Collection -->
  <div class="collection-item collection-street">
    <div class="collection-image">
      <img src="uploads/picha5.jpg" alt="Street Art Collection">
      <div class="collection-overlay"></div>
    </div>
    <div class="collection-content">
      <h2 class="collection-title">Street Art</h2>
      <p class="collection-description">
        Bold expressions born from the urban canvas. Street art that reflects 
        the pulse of the city, the voice of the people, and the raw energy of 
        everyday life transformed into visual poetry.
      </p>
    </div>
  </div>

  <!-- Typography Collection -->
  <div class="collection-item collection-typography">
    <div class="collection-content">
      <h2 class="collection-title">Typography</h2>
      <p class="collection-description">
        Letterforms that communicate with power and grace. Sign painting and 
        typography that blend traditional craftsmanship with contemporary design, 
        creating words that are as beautiful as they are meaningful.
      </p>
    </div>
    <div class="collection-image">
      <img src="uploads/picha4.jpg" alt="Typography Collection">
      <div class="collection-overlay"></div>
    </div>
  </div>
</section>

<!-- Cultural Influence Section -->
<section id="cultural-influence" class="cultural-influence-section">
  <div class="cultural-header">
    <h2 class="cultural-title">Cultural Roots</h2>
    <p class="cultural-subtitle">How Zanzibar's vibrant culture shapes every stroke</p>
  </div>
  <div class="cultural-strip">
    <div class="cultural-item">
      <img src="uploads/picha6.jpg" alt="African Patterns">
      <div class="cultural-label">Patterns</div>
    </div>
    <div class="cultural-item">
      <img src="uploads/picha3.jpg" alt="Street Scenes">
      <div class="cultural-label">Street Life</div>
    </div>
    <div class="cultural-item">
      <img src="uploads/picha5.jpg" alt="Art Tools">
      <div class="cultural-label">Tools</div>
    </div>
    <div class="cultural-item">
      <img src="uploads/picha.jpg" alt="Local Culture">
      <div class="cultural-label">Heritage</div>
    </div>
  </div>
  <div class="cultural-text">
    <p>
      The streets of Zanzibar are my canvas, the patterns of Swahili culture my inspiration. 
      Every brushstroke carries the rhythm of taarab music, the colors of spice markets, 
      and the stories of generations. My art is a bridge between tradition and innovation, 
      honoring the past while painting the future.
    </p>
  </div>
</section>


<!-- Editorial Feature Section -->
<section id="editorial" class="editorial-feature">
  <div class="editorial-container">
    <div class="editorial-text-wrapper">
      <p class="editorial-dropcap">
        <span class="dropcap">I</span>n the streets of Zanzibar, where ancient stone meets modern rhythm, 
        art breathes through every wall, every canvas, every moment. My journey began not in a classroom 
        but in the raw classrooms of life, Morogoro's vibrant streets, Dar es Salaam's bustling energy, 
        and now Zanzibar's cultural crossroads. Each city taught me that art is not just what you create, 
        but how you live. Every mural tells a story of struggle and triumph, every portrait captures a 
        soul, every stroke honors the culture that raised me. This is not just art, This is life transformed 
        into visual poetry, where African heritage meets contemporary expression, where tradition dances 
        with innovation.
      </p>
    </div>
    <div class="editorial-images">
      <div class="editorial-image editorial-image-1">
        <img src="uploads/artist1.jpg" alt="Artist Journey">
      </div>
      <div class="editorial-image editorial-image-2">
        <img src="uploads/artist6.jpg" alt="Creative Process">
      </div>
    </div>
  </div>
</section>

<!-- Artist Manifesto Section -->
<section id="manifesto" class="manifesto-section">
  <div class="manifesto-content">
    <h2 class="fade-up">Manifesto</h2>
    <div class="manifesto-text fade-up">
      <p><strong>Art is struggle.</strong> Every stroke is a battle, every color a victory. I paint not because I can, but because I must.</p>
      <p><strong>Growth comes from the street.</strong> No art school taught me this. The walls, the people, the culture, they are my teachers.</p>
      <p><strong>Life is art.</strong> From Morogoro to Dar es Salaam to Zanzibar, every city, every wall, every canvas tells my story.</p>
      <p><strong>I create for the culture.</strong> For those who see beauty in struggle, power in expression, and art in everyday life.</p>
    </div>
  </div>
</section>

<!-- Services & Commissions Section -->
<section id="commissions" class="commissions-section">
  <div class="commissions-container">
    <div class="commissions-header">
      <h2 class="commissions-title">Services & Commissions</h2>
      <p class="commissions-subtitle">From concept to creation, a refined process</p>
    </div>
    
    <div class="process-steps">
      <div class="process-step">
        <div class="step-number">01</div>
        <h3 class="step-title">Idea</h3>
        <p class="step-description">We discuss your vision, inspiration, and goals</p>
      </div>
      <div class="process-arrow">→</div>
      <div class="process-step">
        <div class="step-number">02</div>
        <h3 class="step-title">Sketch</h3>
        <p class="step-description">Initial concepts and composition sketches</p>
      </div>
      <div class="process-arrow">→</div>
      <div class="process-step">
        <div class="step-number">03</div>
        <h3 class="step-title">Approval</h3>
        <p class="step-description">Review and refine until perfect</p>
      </div>
      <div class="process-arrow">→</div>
      <div class="process-step">
        <div class="step-number">04</div>
        <h3 class="step-title">Final Artwork</h3>
        <p class="step-description">Creation and delivery of your masterpiece</p>
      </div>
    </div>

    <div class="pricing-info">
      <p class="pricing-text">Pricing varies by project scope and complexity. Contact for a personalized quote.</p>
    </div>

    <div class="commissions-cta">
      <a href="#contact" class="btn-main">Start a Project</a>
    </div>
  </div>
</section>

<!-- About Section (Hidden, keeping for reference) -->
<section id="about" class="about-section" style="display: none;">
  <div class="about-inner">
    <div class="about-image fade-left">
      <img src="uploads/artist.jpg" alt="A50 Life Art - Self-taught Artist" />
      <div class="image-overlay"></div>
      <div class="image-caption">Born with talent. Built by passion.</div>
    </div>

    <div class="about-content fade-right">
      <h2>Meet <span class="highlight">A50_Life_Art</span></h2>

      <p class="about-intro">
        I am a <strong>unique and naturally gifted visual artist</strong>. My journey in art began in primary school, 
        around Grade Three, where I first discovered my talent. I thank God for blessing me not only with drawing 
        skills but also with other talents such as breakdancing, acrobatics, and singing.
      </p>

      <p>
        I officially started working as an artist in <strong>2017 in Morogoro</strong>, where I was born and completed 
        my primary education at <strong>Mafiga B Primary School in 2016</strong>. In <strong>2018</strong>, I received the name 
        <strong>A50</strong>, inspired by my grandfather, <strong>Ahmadi Hamsini</strong>. From that, I created the name 
        <strong>A50_Life_Art</strong>, meaning <em>life and art</em> — or <em>life is art</em>. This name represents my vision and passion.
      </p>

      <p>
        <strong>I never went to art school</strong>; everything I know comes from <strong>self-practice, street experience, and determination</strong>. 
        In <strong>2022</strong>, I moved from Morogoro to <strong>Dar es Salaam</strong>, where I worked as a street artist doing wall writings, 
        wallpapers, banners, and sign painting. Life was difficult, and I struggled to find platforms to show my talent, 
        but I stayed independent and kept working.
      </p>

      <p>
        With support from my mother and people who believed in my skills, I got opportunities and connections that helped me grow. 
        On <strong>September 28, 2024</strong>, I moved to <strong>Zanzibar</strong>, where I currently live and work. Through my art, 
        I now sell locally and internationally, and my life is improving through my talent.
      </p>

      <p>
        <strong>I truly love what I do, and I guarantee quality and commitment in every service.</strong>
      </p>

      <div class="about-stats">
        <div class="stat">
          <span class="stat-number">7+</span>
          <span class="stat-label">Years Creating</span>
        </div>
        <div class="stat">
          <span class="stat-number">100%</span>
          <span class="stat-label">Self-Taught</span>
        </div>
        <div class="stat">
          <span class="stat-number">∞</span>
          <span class="stat-label">Passion</span>
        </div>
      </div>

      <blockquote class="artist-quote">
        Art that speaks before words do. Every stroke tells my story, every color captures emotion. 
        <strong>— A50_Life_Art | God first. Art always.</strong>
      </blockquote>
    </div>
  </div>
</section>


<script>
// Parallax effect for images
window.addEventListener('scroll', () => {
  const scrolled = window.pageYOffset;
  const parallaxElements = document.querySelectorAll('.parallax-img');
  parallaxElements.forEach(el => {
    const speed = 0.5;
    el.style.transform = `translateY(${scrolled * speed}px) scale(1.1)`;
  });
}, { passive: true });

// Scroll reveal animations
const fadeElements = document.querySelectorAll('.fade-left, .fade-right, .fade-up');
const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      observer.unobserve(entry.target);
    }
  });
}, { threshold: 0.2 });
fadeElements.forEach(el => observer.observe(el));

// Gallery item content reveal
const galleryItems = document.querySelectorAll('.gallery-item-content');
const galleryObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
    }
  });
}, { threshold: 0.3 });
galleryItems.forEach(el => galleryObserver.observe(el));

// Manifesto text animation
const manifestoTexts = document.querySelectorAll('.manifesto-text p');
const manifestoObserver = new IntersectionObserver(entries => {
  entries.forEach((entry, index) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.classList.add('animate');
      }, index * 200);
      manifestoObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.5 });
manifestoTexts.forEach(el => manifestoObserver.observe(el));
</script>

<!-- Press & Recognition Section -->
<section id="press" class="press-section">
  <div class="press-container">
    <h2 class="press-title">Press & Recognition</h2>
    <div class="press-grid">
      <div class="press-item">
        <div class="press-label">Exhibitions</div>
        <div class="press-content">
          <p>Zanzibar Art Festival 2024</p>
          <p>Dar es Salaam Street Art Showcase</p>
        </div>
      </div>
      <div class="press-item">
        <div class="press-label">Collaborations</div>
        <div class="press-content">
          <p>Local Cultural Centers</p>
          <p>International Art Collectives</p>
        </div>
      </div>
      <div class="press-item">
        <div class="press-label">Clients</div>
        <div class="press-content">
          <p>Private Collectors</p>
          <p>Commercial Spaces</p>
          <p>Cultural Institutions</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section">
  <div class="contact-container">
    <div class="contact-header">
      <h2 class="contact-heading">Art with Soul.<br>Let's Work.</h2>
      <p class="contact-subtitle">Get in touch to discuss your project, commission, or collaboration</p>
    </div>
    
    <div class="contact-info-grid">
      <div class="contact-card">
        <div class="contact-icon-wrapper">
          <div class="contact-icon contact-icon-instagram">
            <i class="fab fa-instagram"></i>
          </div>
        </div>
        <h3 class="contact-card-title">Instagram</h3>
        <p class="contact-card-label">Follow & Connect</p>
        <a href="https://instagram.com/A50_Life_Art" target="_blank" class="contact-link">
          @A50_Life_Art
          <i class="fas fa-arrow-right"></i>
        </a>
      </div>

      <div class="contact-card">
        <div class="contact-icon-wrapper">
          <div class="contact-icon contact-icon-whatsapp">
            <i class="fab fa-whatsapp"></i>
          </div>
        </div>
        <h3 class="contact-card-title">WhatsApp</h3>
        <p class="contact-card-label">Direct Message</p>
        <a href="https://wa.me/255650488101" target="_blank" class="contact-link">
          +255 650 488 101
          <i class="fas fa-arrow-right"></i>
        </a>
      </div>

      <div class="contact-card">
        <div class="contact-icon-wrapper">
          <div class="contact-icon contact-icon-email">
            <i class="fas fa-envelope"></i>
          </div>
        </div>
        <h3 class="contact-card-title">Email</h3>
        <p class="contact-card-label">Send a Message</p>
        <a href="mailto:ahmadirahim50000000@gmail.com" class="contact-link">
          ahmadirahim50000000@gmail.com
          <i class="fas fa-arrow-right"></i>
        </a>
      </div>

      <div class="contact-card contact-card-location">
        <div class="contact-icon-wrapper">
          <div class="contact-icon contact-icon-location">
            <i class="fas fa-map-marker-alt"></i>
          </div>
        </div>
        <h3 class="contact-card-title">Location</h3>
        <p class="contact-card-label">Based In</p>
        <p class="contact-location">Zanzibar, Tanzania</p>
      </div>
    </div>
  </div>
</section>


<!-- Footer -->
<footer class="footer-elevated">
  <div class="footer-container">
    <div class="footer-content">
      <div class="footer-brand">
        <img src="uploads/picha9.jpg" alt="A50 Life Art Logo" />
        <h3>A50_Life_Art</h3>
        <p class="footer-statement">
          Life is Art. Art is Life. Creating visual stories that honor culture, 
          celebrate heritage, and transform spaces with soul.
        </p>
      </div>
      
      <div class="footer-links">
        <div class="footer-column">
          <h4 class="footer-column-title">Quick Links</h4>
          <ul class="footer-nav">
            <li><a href="#home">Home</a></li>
            <li><a href="#collections">Collections</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#commissions">Commissions</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="admin.php"><i class="fas fa-user-shield"></i> Admin</a></li>
          </ul>
        </div>
        
        <div class="footer-column">
          <h4 class="footer-column-title">Connect</h4>
          <ul class="footer-social">
            <li>
              <a href="https://instagram.com/A50_Life_Art" target="_blank">
                <i class="fab fa-instagram"></i> @A50_Life_Art
              </a>
            </li>
            <li>
              <a href="https://wa.me/255650488101" target="_blank">
                <i class="fab fa-whatsapp"></i> WhatsApp
              </a>
            </li>
            <li>
              <a href="mailto:ahmadirahim50000000@gmail.com">
                <i class="fas fa-envelope"></i> Email
              </a>
            </li>
          </ul>
        </div>
        
        <div class="footer-column">
          <h4 class="footer-column-title">Location</h4>
          <p class="footer-location">
            <i class="fas fa-map-marker-alt"></i> Zanzibar, Tanzania
          </p>
        </div>
      </div>
    </div>
    
    <div class="footer-bottom">
      <p>© <span id="year"></span> A50_Life_Art. All rights reserved. | Zanzibar, Tanzania</p>
    </div>
  </div>
</footer>

<!-- Back to Top Button -->
<button id="backToTop" class="back-to-top" aria-label="Back to top">
  <i class="fas fa-arrow-up"></i>
</button>

<script>
// Auto year
document.getElementById('year').textContent = new Date().getFullYear();

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

// Highlight active section while scrolling
(function(){
  const sections = document.querySelectorAll("section[id]");
  const navLinks = document.querySelectorAll(".glass-nav .nav-link");
  function setActive() {
    let current = "";
    sections.forEach(section => {
      const top = section.offsetTop - 150;
      if (window.scrollY >= top) current = section.id;
    });
    navLinks.forEach(link => {
      const href = link.getAttribute("href").substring(1);
      link.classList.toggle("active", href === current || 
        (href === "gallery" && current === "gallery") ||
        (href === "collections" && current === "collections") ||
        (href === "commissions" && current === "commissions"));
    });
  }
  window.addEventListener("scroll", setActive, { passive: true });
  window.addEventListener("load", setActive);
})();

// Solid background on scroll
window.addEventListener("scroll", function() {
  const nav = document.querySelector(".glass-nav");
  if (!nav) return;
  if (window.scrollY > 50) {
    nav.classList.add("scrolled");
  } else {
    nav.classList.remove("scrolled");
  }

  // Show/hide back to top button
  const backToTop = document.getElementById("backToTop");
  if (backToTop) {
    if (window.scrollY > 300) {
      backToTop.classList.add("visible");
    } else {
      backToTop.classList.remove("visible");
    }
  }
}, { passive: true });

// Back to top functionality
document.getElementById("backToTop")?.addEventListener("click", function() {
  window.scrollTo({ top: 0, behavior: "smooth" });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
