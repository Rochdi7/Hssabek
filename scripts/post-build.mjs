/**
 * Post-build optimizations:
 * 1. Minify static CSS files that Vite copies as-is
 * 2. Resize oversized images (template thumbnails, screenshots)
 * 3. Compress sec-bg-03.webp harder
 *
 * Usage: node scripts/post-build.mjs
 */
import sharp from 'sharp';
import { readFile, writeFile, readdir, stat } from 'fs/promises';
import { join, extname, basename } from 'path';
import CleanCSS from 'clean-css';

const BUILD = 'public/build';

// ─── 1. Minify CSS ───────────────────────────────────────────
const CSS_FILES = [
    `${BUILD}/css/landing.css`,
    `${BUILD}/css/iconsax.css`,
    `${BUILD}/css/feather.css`,
];

async function minifyCSS() {
    const minifier = new CleanCSS({ level: 1 });
    for (const file of CSS_FILES) {
        try {
            const src = await readFile(file, 'utf8');
            const out = minifier.minify(src);
            if (out.errors.length) { console.error(`  CSS errors in ${file}:`, out.errors); continue; }
            const savedKB = ((src.length - out.styles.length) / 1024).toFixed(1);
            await writeFile(file, out.styles);
            console.log(`  ${file} — saved ${savedKB} KB`);
        } catch (e) {
            console.log(`  Skipping ${file}: ${e.message}`);
        }
    }
}

// ─── 2. Resize template thumbnails (794x1123 → 300x424) ─────
const TEMPLATE_DIR = 'public/assets/images/templates';
const THUMB_WIDTH = 300; // Displayed at 132x187, so 300px gives 2x retina

async function resizeTemplates() {
    let dirs;
    try { dirs = await readdir(TEMPLATE_DIR); } catch { console.log('  Templates dir not found'); return; }

    for (const sub of dirs) {
        const subPath = join(TEMPLATE_DIR, sub);
        const s = await stat(subPath);
        if (!s.isDirectory()) continue;

        let files;
        try { files = await readdir(subPath); } catch { continue; }

        for (const file of files) {
            if (!['.png', '.jpg', '.jpeg'].includes(extname(file).toLowerCase())) continue;
            const filePath = join(subPath, file);
            const info = await stat(filePath);
            if (info.size < 30 * 1024) continue; // skip small files

            try {
                const buf = await sharp(filePath)
                    .resize(THUMB_WIDTH, null, { withoutEnlargement: true })
                    .png({ quality: 80, compressionLevel: 9 })
                    .toBuffer();

                const savedKB = ((info.size - buf.length) / 1024).toFixed(1);
                if (buf.length < info.size) {
                    await writeFile(filePath, buf);
                    console.log(`  ${sub}/${file}: ${(info.size/1024).toFixed(0)}KB → ${(buf.length/1024).toFixed(0)}KB (saved ${savedKB}KB)`);
                }
            } catch (e) {
                console.error(`  Error resizing ${sub}/${file}:`, e.message);
            }
        }
    }
}

// ─── 3. Resize dashboard screenshots ─────────────────────────
const SCREENSHOTS = [
    'public/assets/images/sass screenshots/dashboard.png',
    'public/assets/images/sass screenshots/arabci dashboard 2.png',
];
const SCREENSHOT_WIDTH = 800; // displayed ~400px, 2x retina

async function resizeScreenshots() {
    for (const file of SCREENSHOTS) {
        try {
            const info = await stat(file);
            const buf = await sharp(file)
                .resize(SCREENSHOT_WIDTH, null, { withoutEnlargement: true })
                .png({ quality: 80, compressionLevel: 9 })
                .toBuffer();

            const savedKB = ((info.size - buf.length) / 1024).toFixed(1);
            if (buf.length < info.size) {
                await writeFile(file, buf);
                console.log(`  ${basename(file)}: ${(info.size/1024).toFixed(0)}KB → ${(buf.length/1024).toFixed(0)}KB (saved ${savedKB}KB)`);
            }
        } catch (e) {
            console.log(`  Skipping ${basename(file)}: ${e.message}`);
        }
    }
}

// ─── 4. Compress sec-bg-03.webp harder ───────────────────────
async function compressBgImages() {
    const targets = [
        { file: `${BUILD}/img/bg/sec-bg-03.webp`, quality: 50 },
    ];
    for (const { file, quality } of targets) {
        try {
            const info = await stat(file);
            const buf = await sharp(file)
                .webp({ quality })
                .toBuffer();
            const savedKB = ((info.size - buf.length) / 1024).toFixed(1);
            if (buf.length < info.size) {
                await writeFile(file, buf);
                console.log(`  ${basename(file)}: ${(info.size/1024).toFixed(0)}KB → ${(buf.length/1024).toFixed(0)}KB (saved ${savedKB}KB)`);
            }
        } catch (e) {
            console.log(`  Skipping ${basename(file)}: ${e.message}`);
        }
    }
}

console.log('\n=== Minifying CSS ===');
await minifyCSS();

console.log('\n=== Resizing template thumbnails ===');
await resizeTemplates();

console.log('\n=== Resizing dashboard screenshots ===');
await resizeScreenshots();

console.log('\n=== Compressing background images ===');
await compressBgImages();

console.log('\nDone!');
