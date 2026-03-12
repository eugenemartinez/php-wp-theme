import fs from 'fs';
import path from 'path';
import { execSync } from 'child_process';

const rootDir = path.resolve('.');
const themeName = path.basename(rootDir);
const sourceDir = path.resolve('src/theme');
const releaseDir = path.resolve('release');
const outDir = path.join(releaseDir, themeName);
const shouldZip = process.argv.includes('--zip');

// ── Only what WordPress needs ──────────────────────
const includeFolders = [
  'assets',
  'blocks',
  'template-parts',
];

const includeFiles = [
  // ── Core required ──────────────────────────────
  'style.css',          // WordPress theme header — required
  'index.php',          // fallback template — required
  'functions.php',      // theme setup, enqueue, hooks

  // ── Layout ─────────────────────────────────────
  'header.php',
  'footer.php',
  'sidebar.php',

  // ── Page templates ─────────────────────────────
  'front-page.php',     // homepage (static front page)
  'home.php',           // blog index
  'page.php',           // singular page
  'single.php',         // singular post
  'singular.php',       // fallback for page + post

  // ── Archive templates ──────────────────────────
  'archive.php',        // all archives fallback
  'category.php',       // category archive
  'tag.php',            // tag archive
  'author.php',         // author archive
  'date.php',           // date archive
  'taxonomy.php',       // custom taxonomy archive

  // ── Search & 404 ───────────────────────────────
  'search.php',
  '404.php',

  // ── Attachment & embeds ────────────────────────
  'attachment.php',
  'image.php',
  'embed.php',

  // ── Comments ───────────────────────────────────
  'comments.php',

  // ── RTL ────────────────────────────────────────
  'rtl.css',

  // ── Screenshot ─────────────────────────────────
  'screenshot.png',
];

// ── Helpers ────────────────────────────────────────

function copyDir(src, dest) {
  if (!fs.existsSync(src)) return;
  fs.mkdirSync(dest, { recursive: true });
  for (const entry of fs.readdirSync(src, { withFileTypes: true })) {
    const srcPath = path.join(src, entry.name);
    const destPath = path.join(dest, entry.name);
    if (entry.isDirectory()) {
      copyDir(srcPath, destPath);
    } else {
      fs.copyFileSync(srcPath, destPath);
    }
  }
}

function cleanDir(dir) {
  if (fs.existsSync(dir)) fs.rmSync(dir, { recursive: true, force: true });
  fs.mkdirSync(dir, { recursive: true });
}

// ── 1) Prepare release/<themeName>/ ───────────────
console.log(`📦 Packaging theme: ${themeName}\n`);
cleanDir(outDir);

// Copy folders
for (const folder of includeFolders) {
  const src = path.join(sourceDir, folder);
  const dest = path.join(outDir, folder);
  if (fs.existsSync(src)) {
    copyDir(src, dest);
    console.log(`  ✓ ${folder}/`);
  } else {
    console.log(`  ⚠ skipped ${folder}/ (not found)`);
  }
}

// Copy files
for (const file of includeFiles) {
  const src = path.join(sourceDir, file);
  const dest = path.join(outDir, file);
  if (fs.existsSync(src)) {
    fs.copyFileSync(src, dest);
    console.log(`  ✓ ${file}`);
  } else {
    console.log(`  ⚠ skipped ${file} (not found)`);
  }
}

// ── 2) Optionally zip ──────────────────────────────
if (shouldZip) {
  const zipPath = path.join(releaseDir, `${themeName}.zip`);
  if (fs.existsSync(zipPath)) fs.rmSync(zipPath);
  execSync(`cd ${releaseDir} && zip -r ${themeName}.zip ${themeName}`);
  console.log(`\n🎉 Zip created → release/${themeName}.zip`);
} else {
  console.log(`\n🎉 Theme folder ready → release/${themeName}/`);
}
