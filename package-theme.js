import fs from 'fs';
import path from 'path';
import { execSync } from 'child_process';

const themeName = path.basename(path.resolve('.'));
const releaseDir = './release';
const themeDir = path.join(releaseDir, themeName);
const shouldZip = process.argv.includes('--zip');

const exclude = [
  'node_modules',
  'src',
  'release',
  '.git',
  '.gitignore',
  '.env',
  'package.json',
  'package-lock.json',
  'package-theme.js',
  'symlink.js',
  'README.md',
  '.DS_Store',
  'vite.config.js',
  'public',
];

// Clean release folder
if (fs.existsSync(releaseDir)) {
  fs.rmSync(releaseDir, { recursive: true });
}
fs.mkdirSync(themeDir, { recursive: true });

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

// Copy everything
fs.readdirSync('.').forEach(file => {
  copyRecursive(
    path.resolve(file),
    path.join(themeDir, file)
  );
});

if (shouldZip) {
  const zipName = `${themeName}.zip`;
  execSync(`cd release && zip -r ${zipName} ${themeName}`);
  fs.rmSync(themeDir, { recursive: true });
  console.log(`\n✅ Theme zipped → release/${zipName}`);
} else {
  console.log(`\n✅ Theme packaged → release/${themeName}/`);
}