import fs from 'fs'
import path from 'path'
import os from 'os'

// ─────────────────────────────────────────────
// LocalWP Setup (Simple Single Site)
// Uncomment this if you're using LocalWP.
// LocalWP uses a self-contained MySQL setup,
// so only one site usually needs to be configured.
// ─────────────────────────────────────────────

// const wpSiteName = 'dev-site'

// const wpThemesDirs = [
//   path.join(
//     os.homedir(),
//     'Local Sites',
//     wpSiteName,
//     'app',
//     'public',
//     'wp-content',
//     'themes'
//   )
// ]

// ─────────────────────────────────────────────
// Valet / Manual WordPress Setup (Multi-Site)
// Used for lower RAM usage with SQLite dev site
// and MySQL production mirror.
// ─────────────────────────────────────────────

const sites = [
  'dev-site', // sqlite site
  'wp-theme'  // mysql site
]

// Base directory (Valet Park setup)
const wpBaseDir = path.join(os.homedir(), 'Wordpress')

const rootDir = path.resolve('.')
const sourceDir = path.resolve('src/theme')
const themeName = path.basename(rootDir)

const isRemove = process.argv.includes('--remove')

// Build full theme directories
const wpThemesDirs = sites.map(site =>
  path.join(wpBaseDir, site, 'wp-content', 'themes')
)

if (isRemove) {

  console.log(`\n🗑️ Removing symlinks for: ${themeName}\n`)

  wpThemesDirs.forEach((themesDir) => {
    const linkPath = path.join(themesDir, themeName)

    if (!fs.existsSync(linkPath)) {
      console.log(`⚠️  Not found: ${linkPath}`)
      return
    }

    if (!fs.lstatSync(linkPath).isSymbolicLink()) {
      console.error(`❌ ${linkPath} is not a symlink. Skipping.`)
      return
    }

    try {
      fs.unlinkSync(linkPath)
      console.log(`✅ Removed: ${linkPath}`)
    } catch (err) {
      console.error(`❌ Failed removing ${linkPath}:`, err.message)
    }
  })

  console.log(`\n👉 Push to GitHub before deleting the project folder:`)
  console.log(`   git add . && git commit -m "final" && git push`)

} else {

  console.log(`\n🔗 Creating symlinks for: ${themeName}`)
  console.log(`   Source: ${sourceDir}\n`)

  wpThemesDirs.forEach((themesDir) => {

    const linkPath = path.join(themesDir, themeName)

    console.log(`Target: ${themesDir}`)

    if (!fs.existsSync(themesDir)) {
      console.error(`❌ Themes directory missing:`)
      console.error(`   ${themesDir}`)
      return
    }

    if (fs.existsSync(linkPath)) {
      console.error(`⚠️ Already exists: ${linkPath}`)
      return
    }

    try {
      fs.symlinkSync(sourceDir, linkPath, 'dir')
      console.log(`✅ Symlink created:`)
      console.log(`   ${linkPath} -> ${sourceDir}`)
    } catch (err) {
      console.error(`❌ Failed creating symlink:`, err.message)
    }

    console.log('')
  })

  console.log(`👉 Activate the theme in WP Admin → Appearance → Themes`)
}
