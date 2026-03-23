/**
 * Convert large PNG/JPG images to WebP for the frontoffice landing page.
 *
 * Usage: node scripts/optimize-images.mjs
 *
 * Requires: npm install --save-dev sharp
 */
import sharp from 'sharp';
import { readdir, stat, mkdir } from 'fs/promises';
import { join, extname, basename } from 'path';

const DIRS = [
    'resources/img/bg',
    'resources/img/icons',
    'resources/img/layouts',
    'resources/img/inner-pages',
];

const MIN_SIZE = 50 * 1024; // Only convert files > 50KB
const QUALITY = 80;

async function processDir(dir) {
    let files;
    try {
        files = await readdir(dir);
    } catch {
        console.log(`  Skipping ${dir} (not found)`);
        return;
    }

    for (const file of files) {
        const ext = extname(file).toLowerCase();
        if (!['.png', '.jpg', '.jpeg'].includes(ext)) continue;

        const filePath = join(dir, file);
        const info = await stat(filePath);
        if (info.size < MIN_SIZE) continue;

        const webpPath = join(dir, basename(file, ext) + '.webp');
        const sizeMB = (info.size / 1024 / 1024).toFixed(2);

        try {
            await sharp(filePath)
                .webp({ quality: QUALITY })
                .toFile(webpPath);

            const webpInfo = await stat(webpPath);
            const webpSizeMB = (webpInfo.size / 1024 / 1024).toFixed(2);
            const savings = ((1 - webpInfo.size / info.size) * 100).toFixed(0);

            console.log(`  ${file} (${sizeMB}MB) → ${basename(webpPath)} (${webpSizeMB}MB) — ${savings}% smaller`);
        } catch (err) {
            console.error(`  Error converting ${file}:`, err.message);
        }
    }
}

console.log('Converting images to WebP...\n');
for (const dir of DIRS) {
    console.log(`Processing ${dir}/`);
    await processDir(dir);
    console.log('');
}
console.log('Done! Now run: npm run build');
