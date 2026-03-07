import fs from 'fs';
import path from 'path';

const distDir = './dist';

// Only these are excluded from the package
const exclude = [
  'node_modules',
  'dist',
  'src',
  '.git',
  '.gitignore',
  '.env',
  'vite.config.js',
  'package.json',
  'package-lock.json',
  'package-theme.js',
  '.DS_Store',
  'symlink.js',
  'README.md',
];

// Clean dist folder
if (fs.existsSync(distDir)) {
  fs.rmSync(distDir, { recursive: true });
}
fs.mkdirSync(distDir);

function shouldExclude(filePath) {
  const relative = path.relative('.', filePath);
  return exclude.some(ex => 
    relative === ex || 
    relative.startsWith(ex + path.sep) ||
    path.basename(filePath) === ex
  );
}

function copyRecursive(src, dest) {
  if (shouldExclude(src)) return;
  if (!fs.existsSync(src)) return;

  const stat = fs.statSync(src);

  if (stat.isDirectory()) {
    fs.mkdirSync(dest, { recursive: true });
    fs.readdirSync(src).forEach(file => {
      copyRecursive(path.join(src, file), path.join(dest, file));
    });
  } else {
    fs.mkdirSync(path.dirname(dest), { recursive: true });
    fs.copyFileSync(src, dest);
    console.log(`✓ ${path.relative('.', src)}`);
  }
}

// Copy everything from root except excluded
fs.readdirSync('.').forEach(file => {
  copyRecursive(
    path.resolve(file),
    path.join(distDir, file)
  );
});

console.log('\n✅ Theme packaged successfully → /dist');