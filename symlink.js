import fs from 'fs';
import path from 'path';
import os from 'os';

const wpThemesDir = path.join(os.homedir(), 'Local Sites', 'wp-theme', 'app', 'public', 'wp-content', 'themes');
const sourceDir = path.resolve('.');
const themeName = path.basename(sourceDir);
const linkPath = path.join(wpThemesDir, themeName);
const isRemove = process.argv.includes('--remove');

if (isRemove) {
  // ── Remove symlink ─────────────────────────────────────────
  console.log(`\n🗑️  Removing symlink: ${themeName}\n`);

  if (!fs.existsSync(linkPath)) {
    console.error(`❌ Symlink not found: ${linkPath}`);
    console.error(`   Nothing to remove.`);
    process.exit(1);
  }

  // Make sure it's a symlink not an actual folder
  if (!fs.lstatSync(linkPath).isSymbolicLink()) {
    console.error(`❌ ${linkPath} is not a symlink.`);
    console.error(`   Refusing to delete a real directory.`);
    process.exit(1);
  }

  try {
    fs.unlinkSync(linkPath);
    console.log(`✅ Symlink removed: ${themeName}`);
    console.log(`\n👉 Push to GitHub before deleting the project folder:`);
    console.log(`   git add . && git commit -m "final" && git push`);
  } catch (err) {
    console.error(`❌ Failed to remove symlink:`, err.message);
    process.exit(1);
  }

} else {
  // ── Create symlink ─────────────────────────────────────────
  console.log(`\n🔗 Creating symlink for: ${themeName}`);
  console.log(`   Source: ${sourceDir}`);
  console.log(`   Target: ${wpThemesDir}\n`);

  if (!fs.existsSync(wpThemesDir)) {
    console.error(`❌ WordPress themes directory not found:\n   ${wpThemesDir}`);
    console.error(`   Make sure Local WP is installed and the site exists.`);
    process.exit(1);
  }

  if (fs.existsSync(linkPath)) {
    console.error(`❌ Already exists: ${linkPath}`);
    console.error(`   Remove it first or rename your theme folder.`);
    process.exit(1);
  }

  try {
    fs.symlinkSync(sourceDir, linkPath, 'dir');
    console.log(`✅ Symlink created:`);
    console.log(`   ${themeName} -> ${sourceDir}`);
    console.log(`\n👉 Activate the theme in WP Admin → Appearance → Themes`);
  } catch (err) {
    console.error(`❌ Failed to create symlink:`, err.message);
    process.exit(1);
  }
}