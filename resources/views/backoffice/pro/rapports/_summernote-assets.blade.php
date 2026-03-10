{{-- Shared Summernote CSS + JS for custom reports create/edit --}}

{{-- Hidden emoji data source — read by JS to avoid encoding issues --}}
<div id="sn-emoji-data" style="display:none">😀 😃 😄 😁 😆 😅 🤣 😂 🙂 😊 😇 🥰 😍 🤩 😘 😗 😚 😙 🥲 😋 😛 😜 🤪 😝 🤑 🤗 🤭 🤫 🤔 🫡 🤐 🤨 😐 😑 😶 🫥 😏 😒 🙄 😬 🤥 😌 😔 😪 🤤 😴 😷 🤒 🤕 🤢 🤮 🥵 🥶 🥴 😵 🤯 🤠 🥳 🥸 😎 🤓 🧐 😕 🫤 😟 🙁 😮 😯 😲 😳 🥺 🥹 😦 😧 😨 😰 😥 😢 😭 😱 😖 😣 😞 😓 😩 😫 🥱 😤 😡 😠 🤬 👍 👎 👏 🙌 🤝 👊 ✊ 🤜 🤛 🫶 👐 🤲 🙏 ✌️ 🤟 🤘 🫰 👌 🤌 🤏 👈 👉 👆 👇 ☝️ ✋ 🤚 🖐️ 🖖 👋 🤙 💪 🦾 ❤️ 🧡 💛 💚 💙 💜 🖤 🤍 🤎 💔 ❤️‍🔥 💕 💞 💓 💗 💖 💘 💝 🔥 ⭐ 🌟 ✨ ⚡ 💡 🎯 🏆 🎉 🎊 🥇 🥈 🥉 🏅 🎖️ 💎 👑 💰 💵 💴 💶 💷 💳 🧾 📊 📈 📉 📌 📎 📝 📅 📆 🗓️ 📧 📞 📱 💻 🖥️ ⌨️ 🖨️ 🏢 🏭 🏪 🏬 🚚 ✈️ 🚀 🌍 🌎 🌏 🔒 🔓 🔑 ⚙️ 🛠️ 🔧 📦 📁 📂 🗂️ ✅ ❌ ⚠️ ℹ️ ❓ ❗ 💬 💭 🗨️ 👤 👥 🏠 📍 🔔 🔕 ♻️ 💯</div>

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('build/plugins/summernote/summernote-lite.min.css') }}">
    <style>
        /* ── Editor frame ─────────────────────────────── */
        .note-editor.note-frame {
            border: 1px solid #d1d5db;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,.06);
        }

        /* ── Toolbar ──────────────────────────────────── */
        .note-editor .note-toolbar {
            background: linear-gradient(to bottom, #f8f9fb, #eef0f4);
            border-bottom: 1px solid #d1d5db;
            padding: 6px 8px;
            flex-wrap: wrap;
            gap: 2px;
        }
        .note-editor .note-toolbar .note-btn-group { margin-right: 4px; }
        .note-editor .note-toolbar .note-btn {
            border-radius: 4px; padding: 4px 8px; font-size: 13px;
            border: 1px solid transparent; background: transparent;
            color: #374151; transition: all .15s;
        }
        .note-editor .note-toolbar .note-btn:hover {
            background: #fff; border-color: #c5c9d2;
            box-shadow: 0 1px 2px rgba(0,0,0,.06);
        }
        .note-editor .note-toolbar .note-btn.active {
            background: #e0e7ff; border-color: #818cf8; color: #4338ca;
        }
        .note-editor .note-toolbar .note-color-btn { padding: 2px 4px; }

        /* ── Editing area ─────────────────────────────── */
        .note-editor .note-editing-area .note-editable {
            padding: 20px 25px; min-height: 500px;
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, 'Helvetica Neue', Arial, sans-serif;
            font-size: 14px; line-height: 1.8; color: #1f2937; background: #fff;
        }
        .note-editor .note-editing-area .note-editable:focus { outline: none; }

        /* ── Statusbar ────────────────────────────────── */
        .note-editor .note-statusbar {
            border-top: 1px solid #d1d5db; background: #f8f9fb;
            display: flex; align-items: center; justify-content: space-between;
            padding: 4px 12px;
        }
        .note-editor .note-statusbar .note-resizebar { border-top: none; padding: 3px 0; }

        /* ── Word count bar ───────────────────────────── */
        .sn-word-count {
            font-size: 11px; color: #6b7280; padding: 4px 12px;
            display: flex; gap: 16px; user-select: none;
        }
        .sn-word-count span { white-space: nowrap; }

        /* ── Zoom control ─────────────────────────────── */
        .sn-zoom-control {
            display: flex; align-items: center; gap: 6px;
            font-size: 11px; color: #6b7280;
        }
        .sn-zoom-control input[type=range] { width: 80px; height: 4px; cursor: pointer; }
        .sn-zoom-control .zoom-label { min-width: 36px; text-align: center; }

        /* ── Dropdown menus ───────────────────────────── */
        .note-editor .note-dropdown-menu {
            border-radius: 6px; border: 1px solid #d1d5db;
            box-shadow: 0 4px 12px rgba(0,0,0,.1); padding: 4px;
        }
        .note-editor .note-dropdown-item { border-radius: 4px; padding: 6px 10px; }
        .note-editor .note-dropdown-item:hover { background: #f3f4f6; }

        /* ── Modal dialogs ────────────────────────────── */
        .note-modal .modal-dialog { max-width: 550px; }
        .note-modal .note-modal-content {
            border-radius: 10px; border: none;
            box-shadow: 0 20px 60px rgba(0,0,0,.15);
        }

        /* ── Tables inside editor ─────────────────────── */
        .note-editor .note-editable table {
            width: 100%; border-collapse: collapse; margin: 12px 0;
            border: 1px solid #d1d5db; border-radius: 6px;
        }
        .note-editor .note-editable table td,
        .note-editor .note-editable table th {
            border: 1px solid #d1d5db; padding: 10px 14px;
            vertical-align: top; min-width: 60px;
        }
        .note-editor .note-editable table th {
            background-color: #f1f5f9; font-weight: 600; color: #1e293b;
        }
        .note-editor .note-editable table tr:hover td { background-color: #f8fafc; }

        /* ── Checklist ────────────────────────────────── */
        .note-editor .note-editable .sn-checklist {
            list-style: none; padding-left: 4px; margin: 8px 0;
        }
        .note-editor .note-editable .sn-checklist li {
            position: relative; padding-left: 28px; margin-bottom: 6px; line-height: 1.6;
        }
        .note-editor .note-editable .sn-checklist li:before {
            content: ''; position: absolute; left: 0; top: 3px;
            width: 18px; height: 18px; border: 2px solid #9ca3af;
            border-radius: 4px; background: #fff;
        }
        .note-editor .note-editable .sn-checklist li.checked:before {
            background: #6366f1; border-color: #6366f1;
        }
        .note-editor .note-editable .sn-checklist li.checked:after {
            content: '\2713'; position: absolute; left: 3px; top: 0;
            color: #fff; font-size: 13px; font-weight: 700;
        }

        /* ── Callout boxes ────────────────────────────── */
        .note-editor .note-editable .sn-callout {
            padding: 14px 18px; border-radius: 8px; margin: 12px 0;
            border-left: 4px solid; font-size: 14px;
        }
        .note-editor .note-editable .sn-callout-info { background: #eff6ff; border-color: #3b82f6; color: #1e40af; }
        .note-editor .note-editable .sn-callout-success { background: #f0fdf4; border-color: #22c55e; color: #166534; }
        .note-editor .note-editable .sn-callout-warning { background: #fffbeb; border-color: #f59e0b; color: #92400e; }
        .note-editor .note-editable .sn-callout-danger { background: #fef2f2; border-color: #ef4444; color: #991b1b; }

        /* ── Text box ─────────────────────────────────── */
        .note-editor .note-editable .sn-textbox {
            border: 2px solid #d1d5db; border-radius: 8px;
            padding: 16px 20px; margin: 12px 0; background: #fafafa;
        }

        /* ── Columns layout ───────────────────────────── */
        .note-editor .note-editable .sn-columns {
            display: flex; gap: 16px; margin: 12px 0;
        }
        .note-editor .note-editable .sn-columns .sn-col {
            flex: 1; border: 1px dashed #d1d5db; border-radius: 6px;
            padding: 12px; min-height: 80px;
        }

        /* ── Divider styles ───────────────────────────── */
        .note-editor .note-editable hr.sn-hr-dashed { border-style: dashed; border-color: #9ca3af; }
        .note-editor .note-editable hr.sn-hr-dotted { border-style: dotted; border-color: #9ca3af; }
        .note-editor .note-editable hr.sn-hr-double { border: none; border-top: 3px double #9ca3af; }
        .note-editor .note-editable hr.sn-hr-thick  { border: none; border-top: 3px solid #374151; }

        /* ── Page break marker ────────────────────────── */
        .note-editor .note-editable .sn-page-break {
            border: none; border-top: 2px dashed #6366f1;
            margin: 30px 0; position: relative; page-break-after: always;
        }
        .note-editor .note-editable .sn-page-break:after {
            content: 'Saut de page'; position: absolute; top: -10px;
            left: 50%; transform: translateX(-50%);
            background: #fff; padding: 0 10px;
            font-size: 11px; color: #6366f1; font-weight: 600;
        }

        /* ── Find & Replace overlay ───────────────────── */
        .sn-find-replace {
            position: absolute; top: 50px; right: 12px; z-index: 100;
            background: #fff; border: 1px solid #d1d5db; border-radius: 8px;
            padding: 12px 16px; box-shadow: 0 8px 24px rgba(0,0,0,.12);
            width: 320px; display: none;
        }
        .sn-find-replace.show { display: block; }
        .sn-find-replace input {
            width: 100%; padding: 6px 10px; border: 1px solid #d1d5db;
            border-radius: 4px; font-size: 13px; margin-bottom: 6px;
        }
        .sn-find-replace .sn-fr-buttons {
            display: flex; gap: 6px; margin-top: 6px;
        }
        .sn-find-replace .sn-fr-buttons button {
            padding: 4px 12px; border-radius: 4px; font-size: 12px;
            border: 1px solid #d1d5db; background: #f8f9fa; cursor: pointer;
        }
        .sn-find-replace .sn-fr-buttons button:hover { background: #e5e7eb; }
        .sn-find-replace .sn-fr-buttons button.primary { background: #6366f1; color: #fff; border-color: #6366f1; }
        .sn-find-replace .sn-fr-count { font-size: 11px; color: #6b7280; }

        /* ── Special characters popup ─────────────────── */
        .sn-special-chars-popup {
            position: absolute; top: 100%; left: 0; z-index: 100;
            background: #fff; border: 1px solid #d1d5db; border-radius: 8px;
            padding: 10px; box-shadow: 0 4px 12px rgba(0,0,0,.12);
            width: 280px; display: none;
        }
        .sn-special-chars-popup.show { display: block; }
        .sn-special-chars-popup .sn-char {
            display: inline-flex; align-items: center; justify-content: center;
            width: 32px; height: 32px; border-radius: 4px; margin: 2px;
            cursor: pointer; font-size: 16px; border: 1px solid #e5e7eb;
            transition: all .12s;
        }
        .sn-special-chars-popup .sn-char:hover {
            background: #e0e7ff; border-color: #818cf8; transform: scale(1.15);
        }

        /* ── Emoji popup ──────────────────────────────── */
        .sn-emoji-popup {
            position: absolute; top: 100%; left: 0; z-index: 100;
            background: #fff; border: 1px solid #d1d5db; border-radius: 8px;
            padding: 10px; box-shadow: 0 4px 12px rgba(0,0,0,.12);
            width: 300px; max-height: 220px; overflow-y: auto; display: none;
        }
        .sn-emoji-popup.show { display: block; }
        .sn-emoji-popup .sn-emoji {
            display: inline-flex; align-items: center; justify-content: center;
            width: 32px; height: 32px; border-radius: 4px; margin: 1px;
            cursor: pointer; font-size: 20px; transition: transform .12s;
        }
        .sn-emoji-popup .sn-emoji:hover { background: #f3f4f6; transform: scale(1.25); }

        /* ── Color palette shared ─────────────────────── */
        .btn-row-bg-color, .btn-cell-bg-color { position: relative; }
        .row-color-palette {
            display: none; position: absolute; top: 100%; left: 0; z-index: 10;
            background: #fff; border: 1px solid #d1d5db; border-radius: 8px;
            padding: 8px; box-shadow: 0 4px 12px rgba(0,0,0,.12); width: 200px;
        }
        .row-color-palette.show { display: block; }
        .row-color-palette .color-swatch {
            display: inline-block; width: 24px; height: 24px; border-radius: 4px;
            margin: 2px; cursor: pointer; border: 2px solid transparent; transition: all .15s;
        }
        .row-color-palette .color-swatch:hover { border-color: #6366f1; transform: scale(1.15); }
        .row-color-palette .palette-label {
            font-size: 11px; font-weight: 600; color: #6b7280;
            text-transform: uppercase; letter-spacing: .5px; margin-bottom: 4px; display: block;
        }

        /* ── Fullscreen mode ──────────────────────────── */
        .note-editor.note-frame.fullscreen { z-index: 10500; }
        .note-editor.note-frame.fullscreen .note-editable { background: #fff; }

        /* ── Table border style popup ─────────────────── */
        .sn-border-popup {
            position: absolute; top: 100%; left: 0; z-index: 100;
            background: #fff; border: 1px solid #d1d5db; border-radius: 8px;
            padding: 8px; box-shadow: 0 4px 12px rgba(0,0,0,.12);
            width: 180px; display: none;
        }
        .sn-border-popup.show { display: block; }
        .sn-border-popup .sn-border-opt {
            display: flex; align-items: center; padding: 6px 8px;
            cursor: pointer; border-radius: 4px; font-size: 12px; gap: 8px;
        }
        .sn-border-popup .sn-border-opt:hover { background: #f3f4f6; }
        .sn-border-popup .sn-border-opt .sn-preview {
            width: 60px; height: 0; border-top-width: 2px; flex-shrink: 0;
        }

        /* ── Dark mode overrides ──────────────────────── */
        [data-bs-theme=dark] .note-editor.note-frame { border-color: #3a3f51; }
        [data-bs-theme=dark] .note-editor .note-toolbar {
            background: linear-gradient(to bottom, #2a2e3e, #252836); border-color: #3a3f51;
        }
        [data-bs-theme=dark] .note-editor .note-toolbar .note-btn { color: #c9d1d9; }
        [data-bs-theme=dark] .note-editor .note-toolbar .note-btn:hover { background: #363b4e; border-color: #4a5068; }
        [data-bs-theme=dark] .note-editor .note-toolbar .note-btn.active { background: #312e81; border-color: #6366f1; color: #a5b4fc; }
        [data-bs-theme=dark] .note-editor .note-editing-area .note-editable { background: #1e2235; color: #c9d1d9; }
        [data-bs-theme=dark] .note-editor .note-editable table { border-color: #3a3f51; }
        [data-bs-theme=dark] .note-editor .note-editable table td,
        [data-bs-theme=dark] .note-editor .note-editable table th { border-color: #3a3f51; }
        [data-bs-theme=dark] .note-editor .note-editable table th { background-color: #2a2e3e; color: #e2e8f0; }
        [data-bs-theme=dark] .note-editor .note-editable table tr:hover td { background-color: #262a3a; }
        [data-bs-theme=dark] .note-editor .note-statusbar { background: #252836; border-color: #3a3f51; }
        [data-bs-theme=dark] .note-editor .note-dropdown-menu { background: #2a2e3e; border-color: #3a3f51; }
        [data-bs-theme=dark] .note-editor .note-dropdown-item:hover { background: #363b4e; }
        [data-bs-theme=dark] .row-color-palette,
        [data-bs-theme=dark] .sn-special-chars-popup,
        [data-bs-theme=dark] .sn-emoji-popup,
        [data-bs-theme=dark] .sn-border-popup,
        [data-bs-theme=dark] .sn-find-replace { background: #2a2e3e; border-color: #3a3f51; color: #c9d1d9; }
        [data-bs-theme=dark] .sn-find-replace input { background: #1e2235; border-color: #3a3f51; color: #c9d1d9; }
        [data-bs-theme=dark] .sn-special-chars-popup .sn-char { border-color: #3a3f51; color: #c9d1d9; }
        [data-bs-theme=dark] .sn-special-chars-popup .sn-char:hover { background: #312e81; }
        [data-bs-theme=dark] .note-editor .note-editable .sn-callout-info { background: #1e293b; color: #93c5fd; }
        [data-bs-theme=dark] .note-editor .note-editable .sn-callout-success { background: #14532d; color: #86efac; }
        [data-bs-theme=dark] .note-editor .note-editable .sn-callout-warning { background: #451a03; color: #fde68a; }
        [data-bs-theme=dark] .note-editor .note-editable .sn-callout-danger { background: #450a0a; color: #fca5a5; }
        [data-bs-theme=dark] .note-editor .note-editable .sn-textbox { background: #252836; border-color: #3a3f51; }
        [data-bs-theme=dark] .note-editor .note-editable .sn-columns .sn-col { border-color: #3a3f51; }
        [data-bs-theme=dark] .note-editor .note-editable .sn-page-break:after { background: #1e2235; color: #818cf8; }
        [data-bs-theme=dark] .note-editor .note-editable .sn-checklist li:before { background: #1e2235; border-color: #4a5068; }
        [data-bs-theme=dark] .sn-word-count { color: #9ca3af; }
        [data-bs-theme=dark] .sn-zoom-control { color: #9ca3af; }
    </style>
@endpush

@push('scripts')
    <script src="{{ URL::asset('build/plugins/summernote/summernote-lite.min.js') }}"></script>
    <script>
    $(document).ready(function() {

        // ═══════════════════════════════════════════════════════════
        //  HELPER: get current cell/row from selection
        // ═══════════════════════════════════════════════════════════
        function getNode() { return window.getSelection().anchorNode; }
        function getCell() {
            var n = getNode(), $c = $(n).closest('td, th');
            return $c.length ? $c : $(n).parents('td, th').first();
        }
        function getRow() {
            var n = getNode(), $r = $(n).closest('tr');
            return $r.length ? $r : $(n).parents('tr').first();
        }
        function getTable() {
            var $c = getCell();
            return $c.length ? $c.closest('table') : $();
        }

        // Helper: build color palette popup
        function buildColorPalette(colors, onClick) {
            var html = '<div class="row-color-palette show">';
            if (Array.isArray(colors[0])) {
                // grouped
                colors.forEach(function(g) {
                    if (g.label) html += '<span class="palette-label">' + g.label + '</span>';
                    g.colors.forEach(function(c) {
                        var s = c === 'transparent' ? 'background:repeating-conic-gradient(#ccc 0% 25%,#fff 0% 50%) 50%/12px 12px' : 'background:'+c;
                        html += '<span class="color-swatch" data-color="'+c+'" style="'+s+'" title="'+c+'"></span>';
                    });
                    html += '<br>';
                });
            } else {
                colors.forEach(function(c) {
                    var s = c === 'transparent' ? 'background:repeating-conic-gradient(#ccc 0% 25%,#fff 0% 50%) 50%/12px 12px' : 'background:'+c;
                    html += '<span class="color-swatch" data-color="'+c+'" style="'+s+'" title="'+c+'"></span>';
                });
            }
            html += '</div>';
            return html;
        }

        var paletteColors = [
            { label: 'Aucune', colors: ['transparent'] },
            { label: 'Basiques', colors: ['#ffffff','#f8f9fa','#e9ecef','#dee2e6','#ced4da','#adb5bd','#6c757d','#495057','#343a40','#212529'] },
            { label: 'Couleurs', colors: ['#fff3cd','#fef3c7','#fde68a','#d1fae5','#a7f3d0','#6ee7b7','#dbeafe','#bfdbfe','#93c5fd','#e0e7ff','#c7d2fe','#a5b4fc','#fce7f3','#fbcfe8','#f9a8d4','#fee2e2','#fecaca','#fca5a5','#ffedd5','#fed7aa','#fdba74'] },
        ];
        var flatColors = ['transparent','#fff3cd','#d1fae5','#dbeafe','#fce7f3','#fee2e2','#ffedd5','#e0e7ff','#f8f9fa','#e9ecef','#fef3c7','#a7f3d0','#93c5fd','#f9a8d4','#fca5a5','#fdba74','#c7d2fe'];

        var TD_STYLE = 'border:1px solid #d1d5db;padding:10px 14px;vertical-align:top';
        var TH_STYLE = 'border:1px solid #d1d5db;padding:10px 14px;background-color:#f1f5f9;font-weight:600;color:#1e293b';
        var TABLE_STYLE = 'width:100%;border-collapse:collapse;border:1px solid #d1d5db;margin:12px 0';

        // ═══════════════════════════════════════════════════════════
        //  TEXT FORMATTING BUTTONS
        // ═══════════════════════════════════════════════════════════

        // ── Highlight ────────────────────────────────────
        var HighlightButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<i class="note-icon-pencil" style="color:#fbbf24"></i>',
                tooltip: 'Surligneur',
                click: function() {
                    var sel = window.getSelection();
                    if (!sel.rangeCount) return;
                    var range = sel.getRangeAt(0);
                    var span = document.createElement('span');
                    span.style.backgroundColor = '#fde68a';
                    range.surroundContents(span);
                }
            }).render();
        };

        // ── UPPERCASE ────────────────────────────────────
        var UpperCaseButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<b style="font-size:11px">AB</b>',
                tooltip: 'MAJUSCULES',
                click: function() {
                    var sel = window.getSelection();
                    if (!sel.rangeCount || sel.isCollapsed) return;
                    var range = sel.getRangeAt(0);
                    var span = document.createElement('span');
                    span.style.textTransform = 'uppercase';
                    range.surroundContents(span);
                }
            }).render();
        };

        // ── lowercase ────────────────────────────────────
        var LowerCaseButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<b style="font-size:11px">ab</b>',
                tooltip: 'minuscules',
                click: function() {
                    var sel = window.getSelection();
                    if (!sel.rangeCount || sel.isCollapsed) return;
                    var range = sel.getRangeAt(0);
                    var span = document.createElement('span');
                    span.style.textTransform = 'lowercase';
                    range.surroundContents(span);
                }
            }).render();
        };

        // ── Small Caps ───────────────────────────────────
        var SmallCapsButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<b style="font-size:11px;font-variant:small-caps">Sc</b>',
                tooltip: 'Petites capitales',
                click: function() {
                    var sel = window.getSelection();
                    if (!sel.rangeCount || sel.isCollapsed) return;
                    var range = sel.getRangeAt(0);
                    var span = document.createElement('span');
                    span.style.fontVariant = 'small-caps';
                    range.surroundContents(span);
                }
            }).render();
        };

        // ── Letter Spacing ───────────────────────────────
        var LetterSpacingButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<span style="font-size:11px;letter-spacing:3px">AV</span>',
                tooltip: 'Espacement des lettres',
                click: function() {
                    var val = prompt('Espacement (ex: 1px, 2px, 3px, 0) :', '2px');
                    if (val === null) return;
                    var sel = window.getSelection();
                    if (!sel.rangeCount || sel.isCollapsed) return;
                    var range = sel.getRangeAt(0);
                    var span = document.createElement('span');
                    span.style.letterSpacing = val;
                    range.surroundContents(span);
                }
            }).render();
        };

        // ── RTL / LTR ───────────────────────────────────
        var RtlButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<span style="font-size:11px">RTL</span>',
                tooltip: 'Texte droite-à-gauche',
                click: function() {
                    var n = getNode();
                    var $block = $(n).closest('p, div, li, h1, h2, h3, h4, h5, h6, td, th');
                    if ($block.length) {
                        var dir = $block.attr('dir') === 'rtl' ? 'ltr' : 'rtl';
                        $block.attr('dir', dir);
                    }
                }
            }).render();
        };

        // ═══════════════════════════════════════════════════════════
        //  INSERT ELEMENTS
        // ═══════════════════════════════════════════════════════════

        // ── Emoji ────────────────────────────────────────
        // Read emojis from hidden DOM element to avoid JS encoding issues
        var emojiSource = document.getElementById('sn-emoji-data');
        var emojis = emojiSource ? emojiSource.textContent.trim().split(' ') : [];

        var EmojiButton = function(ctx) {
            var $btn = $.summernote.ui.button({
                contents: '<span style="font-size:15px">&#x1F600;</span>',
                tooltip: 'Insérer un emoji',
            }).render();

            // Prevent focus loss from editor when clicking the button
            $btn.on('mousedown', function(e) {
                e.preventDefault();
            });

            $btn.on('click', function(e) {
                e.stopPropagation();
                var $popup = $btn.find('.sn-emoji-popup');
                if ($popup.length) { $popup.toggleClass('show'); return; }

                // Save cursor position before opening popup
                try { ctx.invoke('editor.saveRange'); } catch(err) {}

                var $container = document.createElement('div');
                $container.className = 'sn-emoji-popup show';

                emojis.forEach(function(emoji) {
                    var span = document.createElement('span');
                    span.className = 'sn-emoji';
                    span.textContent = emoji;
                    span.addEventListener('mousedown', function(ev) {
                        ev.preventDefault();
                        ev.stopPropagation();
                    });
                    span.addEventListener('click', function(ev) {
                        ev.stopPropagation();
                        ev.preventDefault();
                        try {
                            ctx.invoke('editor.restoreRange');
                            ctx.invoke('editor.focus');
                        } catch(err) {
                            ctx.invoke('editor.focus');
                        }
                        ctx.invoke('editor.pasteHTML', '<span>' + emoji + '</span>');
                        $container.classList.remove('show');
                    });
                    $container.appendChild(span);
                });

                this.style.position = 'relative';
                this.appendChild($container);
            });

            return $btn;
        };

        // ── Special Characters ───────────────────────────
        var specialChars = ['©','®','™','€','£','¥','¢','§','¶','†','‡','°','±','²','³','¼','½','¾','×','÷','≠','≤','≥','≈','∞','µ','Ω','π','√','∑','∆','←','→','↑','↓','↔','♠','♥','♦','♣','★','☆','✓','✗','•','―','…','«','»','‰','♪','♫'];

        var SpecialCharsButton = function(ctx) {
            var $btn = $.summernote.ui.button({
                contents: '<span style="font-size:13px">\u03A9</span>',
                tooltip: 'Caractères spéciaux',
            }).render();

            $btn.on('mousedown', function(e) {
                e.preventDefault();
            });

            $btn.on('click', function(e) {
                e.stopPropagation();
                var $popup = $btn.find('.sn-special-chars-popup');
                if ($popup.length) { $popup.toggleClass('show'); return; }

                try { ctx.invoke('editor.saveRange'); } catch(err) {}

                var $container = $('<div class="sn-special-chars-popup show"></div>');
                specialChars.forEach(function(ch, idx) {
                    var $ch = $('<span class="sn-char"></span>').text(ch);
                    $ch.on('mousedown', function(ev) { ev.preventDefault(); });
                    $ch.on('click', function(ev) {
                        ev.stopPropagation();
                        ev.preventDefault();
                        try {
                            ctx.invoke('editor.restoreRange');
                            ctx.invoke('editor.focus');
                        } catch(err) {
                            ctx.invoke('editor.focus');
                        }
                        document.execCommand('insertText', false, specialChars[idx]);
                        $container.removeClass('show');
                    });
                    $container.append($ch);
                });
                $btn.css('position','relative').append($container);
            });

            return $btn;
        };

        // ── Date/Time Stamp ──────────────────────────────
        var DateStampButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<i class="note-icon-calendar"></i>',
                tooltip: 'Insérer la date et heure',
                click: function() {
                    var now = new Date();
                    var d = ('0'+now.getDate()).slice(-2)+'/'+('0'+(now.getMonth()+1)).slice(-2)+'/'+now.getFullYear();
                    var t = ('0'+now.getHours()).slice(-2)+':'+('0'+now.getMinutes()).slice(-2);
                    ctx.invoke('editor.insertText', d + ' ' + t);
                }
            }).render();
        };

        // ── Page Break ───────────────────────────────────
        var PageBreakButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<i class="note-icon-minus"></i> <span style="font-size:11px">Page</span>',
                tooltip: 'Saut de page (pour PDF)',
                click: function() {
                    ctx.invoke('editor.pasteHTML', '<hr class="sn-page-break"><p><br></p>');
                }
            }).render();
        };

        // ── Callout Boxes ────────────────────────────────
        var CalloutButton = function(ctx) {
            return $.summernote.ui.buttonGroup([
                $.summernote.ui.button({
                    className: 'dropdown-toggle',
                    contents: '<i class="note-icon-frame"></i> <span style="font-size:11px">Encadré</span>',
                    tooltip: 'Insérer un encadré',
                    data: { toggle: 'dropdown' }
                }),
                $.summernote.ui.dropdown({
                    items: [
                        '<span style="color:#3b82f6">ℹ</span> Info',
                        '<span style="color:#22c55e">✓</span> Succès',
                        '<span style="color:#f59e0b">⚠</span> Attention',
                        '<span style="color:#ef4444">✗</span> Danger',
                    ],
                    callback: function($dropdown) {
                        $dropdown.find('a').each(function(i) {
                            $(this).on('click', function(e) {
                                e.preventDefault();
                                var types = ['info','success','warning','danger'];
                                var placeholders = ['Information...','Succès...','Attention...','Danger...'];
                                ctx.invoke('editor.pasteHTML',
                                    '<div class="sn-callout sn-callout-'+types[i]+'">'+placeholders[i]+'</div><p><br></p>'
                                );
                            });
                        });
                    }
                })
            ]).render();
        };

        // ── Divider Styles ───────────────────────────────
        var DividerButton = function(ctx) {
            return $.summernote.ui.buttonGroup([
                $.summernote.ui.button({
                    className: 'dropdown-toggle',
                    contents: '<span style="font-size:11px">― Ligne</span>',
                    tooltip: 'Style de séparateur',
                    data: { toggle: 'dropdown' }
                }),
                $.summernote.ui.dropdown({
                    items: ['─ Solide','┄ Tirets','··· Points','═ Double','━ Épais'],
                    callback: function($dropdown) {
                        $dropdown.find('a').each(function(i) {
                            $(this).on('click', function(e) {
                                e.preventDefault();
                                var classes = ['','sn-hr-dashed','sn-hr-dotted','sn-hr-double','sn-hr-thick'];
                                ctx.invoke('editor.pasteHTML', '<hr class="'+classes[i]+'"><p><br></p>');
                            });
                        });
                    }
                })
            ]).render();
        };

        // ── Text Box ─────────────────────────────────────
        var TextBoxButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<i class="note-icon-frame"></i>',
                tooltip: 'Zone de texte encadrée',
                click: function() {
                    ctx.invoke('editor.pasteHTML', '<div class="sn-textbox">Saisissez votre texte ici...</div><p><br></p>');
                }
            }).render();
        };

        // ── Column Layout ────────────────────────────────
        var ColumnsButton = function(ctx) {
            return $.summernote.ui.buttonGroup([
                $.summernote.ui.button({
                    className: 'dropdown-toggle',
                    contents: '<i class="note-icon-align-justify"></i> <span style="font-size:11px">Colonnes</span>',
                    tooltip: 'Mise en page colonnes',
                    data: { toggle: 'dropdown' }
                }),
                $.summernote.ui.dropdown({
                    items: ['2 colonnes','3 colonnes'],
                    callback: function($dropdown) {
                        $dropdown.find('a').each(function(i) {
                            $(this).on('click', function(e) {
                                e.preventDefault();
                                var cols = i + 2;
                                var html = '<div class="sn-columns">';
                                for (var c = 0; c < cols; c++) html += '<div class="sn-col">Colonne '+(c+1)+'</div>';
                                html += '</div><p><br></p>';
                                ctx.invoke('editor.pasteHTML', html);
                            });
                        });
                    }
                })
            ]).render();
        };

        // ── Checklist ────────────────────────────────────
        var ChecklistButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<span style="font-size:12px">☑</span>',
                tooltip: 'Liste à cocher',
                click: function() {
                    ctx.invoke('editor.pasteHTML',
                        '<ul class="sn-checklist">' +
                        '<li>Tâche 1</li>' +
                        '<li>Tâche 2</li>' +
                        '<li>Tâche 3</li>' +
                        '</ul><p><br></p>'
                    );
                }
            }).render();
        };

        // ═══════════════════════════════════════════════════════════
        //  TABLE BUTTONS (existing + new)
        // ═══════════════════════════════════════════════════════════

        // ── Insert Styled Table ──────────────────────────
        var StyledTableButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<i class="note-icon-table"></i> <span style="font-size:11px">Tableau</span>',
                tooltip: 'Insérer un tableau avec en-tête',
                click: function() {
                    var rows = prompt('Nombre de lignes (sans en-tête) :', '3');
                    var cols = prompt('Nombre de colonnes :', '3');
                    if (!rows || !cols) return;
                    rows = parseInt(rows) || 3; cols = parseInt(cols) || 3;
                    var t = '<table style="'+TABLE_STYLE+'"><thead><tr>';
                    for (var c = 0; c < cols; c++) t += '<th style="'+TH_STYLE+'">En-tête '+(c+1)+'</th>';
                    t += '</tr></thead><tbody>';
                    for (var r = 0; r < rows; r++) {
                        t += '<tr>';
                        for (var c2 = 0; c2 < cols; c2++) t += '<td style="'+TD_STYLE+'">&nbsp;</td>';
                        t += '</tr>';
                    }
                    t += '</tbody></table><p><br></p>';
                    ctx.invoke('editor.pasteHTML', t);
                }
            }).render();
        };

        // ── Row BG Color ─────────────────────────────────
        var RowBgColorButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<i class="note-icon-magic"></i> <span style="font-size:11px">Fond ligne</span>',
                tooltip: 'Couleur de fond de la ligne',
                className: 'btn-row-bg-color',
                click: function() {
                    var $p = $(this).find('.row-color-palette');
                    if ($p.length) { $p.toggleClass('show'); return; }
                    $(this).css('position','relative').append(buildColorPalette(paletteColors));
                    $(this).find('.color-swatch').on('click', function(e) {
                        e.stopPropagation();
                        var color = $(this).data('color'), $row = getRow();
                        if ($row.length) {
                            if (color === 'transparent') { $row.css('background-color',''); $row.find('td,th').css('background-color',''); }
                            else { $row.css('background-color', color); $row.find('td,th').css('background-color', color); }
                        }
                        $(this).closest('.row-color-palette').removeClass('show');
                    });
                }
            }).render();
        };

        // ── Cell BG Color ────────────────────────────────
        var CellBgColorButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<i class="note-icon-pencil"></i> <span style="font-size:11px">Fond cellule</span>',
                tooltip: 'Couleur de fond de la cellule',
                className: 'btn-cell-bg-color',
                click: function() {
                    var $p = $(this).find('.row-color-palette');
                    if ($p.length) { $p.toggleClass('show'); return; }
                    var html = '<div class="row-color-palette show">';
                    flatColors.forEach(function(c) {
                        var s = c === 'transparent' ? 'background:repeating-conic-gradient(#ccc 0% 25%,#fff 0% 50%) 50%/12px 12px' : 'background:'+c;
                        html += '<span class="color-swatch" data-color="'+c+'" style="'+s+'" title="'+c+'"></span>';
                    });
                    html += '</div>';
                    $(this).css('position','relative').append(html);
                    $(this).find('.color-swatch').on('click', function(e) {
                        e.stopPropagation();
                        var color = $(this).data('color'), $cell = getCell();
                        if ($cell.length) $cell.css('background-color', color === 'transparent' ? '' : color);
                        $(this).closest('.row-color-palette').removeClass('show');
                    });
                }
            }).render();
        };

        // ── Add Row ──────────────────────────────────────
        var AddRowButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<i class="note-icon-row-below"></i>', tooltip: 'Ajouter une ligne',
                click: function() {
                    var $row = getRow();
                    if ($row.length) {
                        var cols = $row.find('td,th').length, nr = '<tr>';
                        for (var i = 0; i < cols; i++) nr += '<td style="'+TD_STYLE+'">&nbsp;</td>';
                        $row.after(nr + '</tr>');
                    }
                }
            }).render();
        };

        // ── Add Column ───────────────────────────────────
        var AddColButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<i class="note-icon-col-after"></i>', tooltip: 'Ajouter une colonne',
                click: function() {
                    var $cell = getCell();
                    if ($cell.length) {
                        var idx = $cell.index();
                        $cell.closest('table').find('tr').each(function() {
                            var isH = $(this).find('th').length && idx < $(this).find('th').length;
                            var tag = isH ? 'th' : 'td', st = isH ? TH_STYLE : TD_STYLE;
                            $(this).find('td,th').eq(idx).after('<'+tag+' style="'+st+'">&nbsp;</'+tag+'>');
                        });
                    }
                }
            }).render();
        };

        // ── Delete Row ───────────────────────────────────
        var DeleteRowButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<i class="note-icon-row-remove"></i>', tooltip: 'Supprimer la ligne',
                click: function() { var $r = getRow(); if ($r.length) $r.remove(); }
            }).render();
        };

        // ── Delete Column ────────────────────────────────
        var DeleteColButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<i class="note-icon-col-remove"></i>', tooltip: 'Supprimer la colonne',
                click: function() {
                    var $cell = getCell();
                    if ($cell.length) {
                        var idx = $cell.index();
                        $cell.closest('table').find('tr').each(function() { $(this).find('td,th').eq(idx).remove(); });
                    }
                }
            }).render();
        };

        // ── Merge Cells ──────────────────────────────────
        var MergeCellsButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<span style="font-size:11px">⊞ Fusion</span>', tooltip: 'Fusionner avec cellule droite',
                click: function() {
                    var $cell = getCell();
                    if ($cell.length) {
                        var cs = parseInt($cell.attr('colspan')||1), $next = $cell.next('td,th');
                        if ($next.length) { $cell.attr('colspan', cs+1); $cell.html($cell.html()+' '+$next.html()); $next.remove(); }
                    }
                }
            }).render();
        };

        // ── Split Cell ───────────────────────────────────
        var SplitCellButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<span style="font-size:11px">⊟ Scinder</span>', tooltip: 'Scinder la cellule',
                click: function() {
                    var $cell = getCell();
                    if ($cell.length) {
                        var cs = parseInt($cell.attr('colspan') || 1);
                        if (cs > 1) {
                            $cell.attr('colspan', cs - 1);
                            var tag = $cell.is('th') ? 'th' : 'td';
                            var st = tag === 'th' ? TH_STYLE : TD_STYLE;
                            $cell.after('<'+tag+' style="'+st+'">&nbsp;</'+tag+'>');
                        }
                    }
                }
            }).render();
        };

        // ── Toggle Header ────────────────────────────────
        var ToggleHeaderButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<b style="font-size:11px">TH</b>', tooltip: 'Basculer en-tête',
                click: function() {
                    var $cell = getCell();
                    if ($cell.length) {
                        var isH = $cell.is('th'), newTag = isH ? 'td' : 'th';
                        var st = isH ? TD_STYLE : TH_STYLE;
                        var $new = $('<'+newTag+' style="'+st+'">'+$cell.html()+'</'+newTag+'>');
                        $.each($cell[0].attributes, function() {
                            if (this.name !== 'style') $new.attr(this.name, this.value);
                        });
                        $cell.replaceWith($new);
                    }
                }
            }).render();
        };

        // ── Table Border Style ───────────────────────────
        var TableBorderButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<span style="font-size:11px">☐ Bordure</span>', tooltip: 'Style de bordure du tableau',
                click: function() {
                    var $popup = $(this).find('.sn-border-popup');
                    if ($popup.length) { $popup.toggleClass('show'); return; }
                    var opts = [
                        { label: 'Solide', style: 'solid', color: '#d1d5db' },
                        { label: 'Tirets', style: 'dashed', color: '#9ca3af' },
                        { label: 'Points', style: 'dotted', color: '#9ca3af' },
                        { label: 'Double', style: 'double', color: '#374151' },
                        { label: 'Aucune', style: 'none', color: 'transparent' },
                    ];
                    var html = '<div class="sn-border-popup show">';
                    opts.forEach(function(o) {
                        html += '<div class="sn-border-opt" data-style="'+o.style+'" data-color="'+o.color+'">';
                        html += '<span class="sn-preview" style="border-top-style:'+o.style+';border-top-color:'+o.color+'"></span>';
                        html += '<span>'+o.label+'</span></div>';
                    });
                    html += '</div>';
                    $(this).css('position','relative').append(html);
                    $(this).find('.sn-border-opt').on('click', function(e) {
                        e.stopPropagation();
                        var bs = $(this).data('style'), bc = $(this).data('color');
                        var $t = getTable();
                        if ($t.length) {
                            var b = bs === 'none' ? 'none' : '1px '+bs+' '+bc;
                            $t.css('border', b);
                            $t.find('td,th').css('border', b);
                        }
                        $(this).closest('.sn-border-popup').removeClass('show');
                    });
                }
            }).render();
        };

        // ── Table Border Color ───────────────────────────
        var TableBorderColorButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<span style="font-size:11px">🎨 Bordure</span>', tooltip: 'Couleur de bordure',
                click: function() {
                    var $p = $(this).find('.row-color-palette');
                    if ($p.length) { $p.toggleClass('show'); return; }
                    var colors = ['#d1d5db','#9ca3af','#374151','#000000','#ef4444','#f59e0b','#22c55e','#3b82f6','#6366f1','#8b5cf6','#ec4899','transparent'];
                    var html = '<div class="row-color-palette show">';
                    colors.forEach(function(c) {
                        var s = c === 'transparent' ? 'background:repeating-conic-gradient(#ccc 0% 25%,#fff 0% 50%) 50%/12px 12px' : 'background:'+c;
                        html += '<span class="color-swatch" data-color="'+c+'" style="'+s+'" title="'+c+'"></span>';
                    });
                    html += '</div>';
                    $(this).css('position','relative').append(html);
                    $(this).find('.color-swatch').on('click', function(e) {
                        e.stopPropagation();
                        var color = $(this).data('color'), $t = getTable();
                        if ($t.length) {
                            var b = color === 'transparent' ? '1px solid transparent' : '1px solid '+color;
                            $t.css('border-color', color); $t.find('td,th').css('border-color', color);
                        }
                        $(this).closest('.row-color-palette').removeClass('show');
                    });
                }
            }).render();
        };

        // ── Auto-fit Columns ─────────────────────────────
        var AutoFitButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<span style="font-size:11px">⇔ Auto</span>', tooltip: 'Colonnes égales',
                click: function() {
                    var $t = getTable();
                    if ($t.length) {
                        var cols = $t.find('tr:first').children('td,th').length;
                        if (cols) {
                            var w = (100/cols).toFixed(2)+'%';
                            $t.find('td,th').css('width', w);
                        }
                    }
                }
            }).render();
        };

        // ── Stripe Rows ─────────────────────────────────
        var StripeRowsButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<span style="font-size:11px">▤ Rayé</span>', tooltip: 'Alterner les couleurs de lignes',
                click: function() {
                    var $t = getTable();
                    if ($t.length) {
                        $t.find('tbody tr').each(function(i) {
                            if (i % 2 === 1) {
                                $(this).css('background-color', '#f8fafc');
                                $(this).find('td').css('background-color', '#f8fafc');
                            } else {
                                $(this).css('background-color', '');
                                $(this).find('td').css('background-color', '');
                            }
                        });
                    }
                }
            }).render();
        };

        // ═══════════════════════════════════════════════════════════
        //  IMAGE CENTER
        // ═══════════════════════════════════════════════════════════
        var ImageCenterButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<i class="note-icon-align-center"></i>', tooltip: 'Centrer l\'image',
                click: function() {
                    var $img = $(ctx.invoke('restoreTarget'));
                    if ($img.is('img')) {
                        $img.css({'float':'','margin-left':'','margin-right':''});
                        var $p = $img.parent();
                        if ($p.is('p,div,span')) $p.css('text-align','center');
                        else $img.wrap('<p style="text-align:center"></p>');
                        $img.css({'display':'inline-block','margin':'0 auto'});
                    }
                }
            }).render();
        };

        // ═══════════════════════════════════════════════════════════
        //  PRODUCTIVITY
        // ═══════════════════════════════════════════════════════════

        // ── Print ────────────────────────────────────────
        var PrintButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<i class="note-icon-pencil"></i> <span style="font-size:11px">Imprimer</span>',
                tooltip: 'Imprimer le contenu',
                click: function() {
                    var content = ctx.invoke('code');
                    var win = window.open('', '_blank');
                    win.document.write('<html><head><title>Impression</title><style>body{font-family:Segoe UI,Arial,sans-serif;padding:30px;font-size:14px;line-height:1.8}table{width:100%;border-collapse:collapse}td,th{border:1px solid #ccc;padding:8px}th{background:#f1f5f9;font-weight:600}.sn-callout{padding:12px 16px;border-radius:6px;border-left:4px solid;margin:10px 0}.sn-callout-info{background:#eff6ff;border-color:#3b82f6}.sn-callout-success{background:#f0fdf4;border-color:#22c55e}.sn-callout-warning{background:#fffbeb;border-color:#f59e0b}.sn-callout-danger{background:#fef2f2;border-color:#ef4444}.sn-textbox{border:2px solid #ccc;padding:14px;border-radius:6px;margin:10px 0}.sn-columns{display:flex;gap:16px}.sn-col{flex:1;border:1px dashed #ccc;padding:12px;border-radius:6px}.sn-checklist{list-style:none;padding-left:4px}.sn-checklist li{position:relative;padding-left:28px;margin-bottom:6px}.sn-checklist li:before{content:"";position:absolute;left:0;top:3px;width:16px;height:16px;border:2px solid #999;border-radius:3px}.sn-checklist li.checked:before{background:#6366f1;border-color:#6366f1}.sn-checklist li.checked:after{content:"\\2713";position:absolute;left:3px;top:0;color:#fff;font-size:12px;font-weight:700}.sn-page-break{page-break-after:always;border-top:2px dashed #999;margin:30px 0}@media print{.sn-page-break{border:none}}</style></head><body>'+content+'</body></html>');
                    win.document.close();
                    win.focus();
                    win.print();
                    win.close();
                }
            }).render();
        };

        // ── Find & Replace ───────────────────────────────
        var FindReplaceButton = function(ctx) {
            return $.summernote.ui.button({
                contents: '<i class="note-icon-magic"></i> <span style="font-size:11px">Chercher</span>',
                tooltip: 'Chercher et remplacer (Ctrl+H)',
                click: function() {
                    var $editor = $(this).closest('.note-editor');
                    var $panel = $editor.find('.sn-find-replace');
                    if ($panel.length) { $panel.toggleClass('show'); return; }
                    var html = '<div class="sn-find-replace show">' +
                        '<div style="font-weight:600;font-size:13px;margin-bottom:8px">Chercher et remplacer</div>' +
                        '<input type="text" class="sn-fr-find" placeholder="Rechercher...">' +
                        '<input type="text" class="sn-fr-replace" placeholder="Remplacer par...">' +
                        '<div class="sn-fr-count"></div>' +
                        '<div class="sn-fr-buttons">' +
                        '<button class="sn-fr-btn-next">Suivant</button>' +
                        '<button class="sn-fr-btn-replace">Remplacer</button>' +
                        '<button class="sn-fr-btn-all primary">Tout remplacer</button>' +
                        '<button class="sn-fr-btn-close">✕</button>' +
                        '</div></div>';
                    $editor.css('position','relative').append(html);
                    var $fr = $editor.find('.sn-find-replace');
                    var $editable = $editor.find('.note-editable');

                    $fr.find('.sn-fr-btn-close').on('click', function() { $fr.removeClass('show'); });

                    $fr.find('.sn-fr-btn-next').on('click', function() {
                        var term = $fr.find('.sn-fr-find').val();
                        if (!term) return;
                        window.getSelection().removeAllRanges();
                        if (window.find) window.find(term);
                    });

                    $fr.find('.sn-fr-btn-replace').on('click', function() {
                        var term = $fr.find('.sn-fr-find').val();
                        var rep = $fr.find('.sn-fr-replace').val();
                        if (!term) return;
                        var sel = window.getSelection();
                        if (sel.toString() === term) {
                            document.execCommand('insertText', false, rep);
                        }
                        if (window.find) window.find(term);
                    });

                    $fr.find('.sn-fr-btn-all').on('click', function() {
                        var term = $fr.find('.sn-fr-find').val();
                        var rep = $fr.find('.sn-fr-replace').val();
                        if (!term) return;
                        var html = $editable.html();
                        var escaped = term.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
                        var regex = new RegExp(escaped, 'g');
                        var count = (html.match(regex) || []).length;
                        $editable.html(html.replace(regex, rep));
                        $fr.find('.sn-fr-count').text(count + ' remplacement(s) effectué(s)');
                        ctx.invoke('triggerEvent', 'change', $editable.html());
                    });

                    $fr.find('.sn-fr-find').on('input', function() {
                        var term = $(this).val();
                        if (!term) { $fr.find('.sn-fr-count').text(''); return; }
                        var text = $editable.text();
                        var escaped = term.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
                        var matches = (text.match(new RegExp(escaped, 'gi')) || []).length;
                        $fr.find('.sn-fr-count').text(matches + ' occurrence(s)');
                    });
                }
            }).render();
        };

        // ── Template Insert ──────────────────────────────
        var TemplateButton = function(ctx) {
            return $.summernote.ui.buttonGroup([
                $.summernote.ui.button({
                    className: 'dropdown-toggle',
                    contents: '<i class="note-icon-picture"></i> <span style="font-size:11px">Modèle</span>',
                    tooltip: 'Insérer un modèle pré-défini',
                    data: { toggle: 'dropdown' }
                }),
                $.summernote.ui.dropdown({
                    items: ['En-tête rapport','Tableau financier','Section résumé','Signature'],
                    callback: function($dropdown) {
                        var templates = [
                            // Header
                            '<div style="text-align:center;margin-bottom:20px"><h2 style="color:#1e293b;margin-bottom:4px">Titre du rapport</h2><p style="color:#6b7280;font-size:13px">Société — Date — Réf: XXXX</p><hr style="border-color:#e5e7eb"></div>',
                            // Financial table
                            '<table style="'+TABLE_STYLE+'"><thead><tr><th style="'+TH_STYLE+'">Description</th><th style="'+TH_STYLE+'">Quantité</th><th style="'+TH_STYLE+'">Prix unitaire</th><th style="'+TH_STYLE+'">Total</th></tr></thead><tbody><tr><td style="'+TD_STYLE+'">Article 1</td><td style="'+TD_STYLE+';text-align:center">1</td><td style="'+TD_STYLE+';text-align:right">0,00</td><td style="'+TD_STYLE+';text-align:right">0,00</td></tr><tr><td style="'+TD_STYLE+'">Article 2</td><td style="'+TD_STYLE+';text-align:center">1</td><td style="'+TD_STYLE+';text-align:right">0,00</td><td style="'+TD_STYLE+';text-align:right">0,00</td></tr><tr><td colspan="3" style="'+TD_STYLE+';text-align:right;font-weight:600">Total</td><td style="'+TD_STYLE+';text-align:right;font-weight:600">0,00</td></tr></tbody></table>',
                            // Summary section
                            '<div class="sn-callout sn-callout-info"><strong>Résumé</strong><br>Points clés :<ul><li>Point 1</li><li>Point 2</li><li>Point 3</li></ul></div>',
                            // Signature
                            '<div style="margin-top:40px"><div class="sn-columns"><div class="sn-col" style="border:none"><p style="margin-bottom:40px"><strong>Établi par :</strong></p><hr style="border-color:#d1d5db;width:200px"><p style="color:#6b7280;font-size:12px">Nom et signature</p></div><div class="sn-col" style="border:none"><p style="margin-bottom:40px"><strong>Approuvé par :</strong></p><hr style="border-color:#d1d5db;width:200px"><p style="color:#6b7280;font-size:12px">Nom et signature</p></div></div></div>',
                        ];
                        $dropdown.find('a').each(function(i) {
                            $(this).on('click', function(e) {
                                e.preventDefault();
                                ctx.invoke('editor.pasteHTML', templates[i] + '<p><br></p>');
                            });
                        });
                    }
                })
            ]).render();
        };

        // ═══════════════════════════════════════════════════════════
        //  CLOSE POPUPS ON OUTSIDE CLICK
        // ═══════════════════════════════════════════════════════════
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.btn-row-bg-color,.btn-cell-bg-color,.row-color-palette,.sn-emoji-popup,.sn-special-chars-popup,.sn-border-popup').length) {
                $('.row-color-palette,.sn-emoji-popup,.sn-special-chars-popup,.sn-border-popup').removeClass('show');
            }
        });

        // ═══════════════════════════════════════════════════════════
        //  INITIALIZE SUMMERNOTE
        // ═══════════════════════════════════════════════════════════
        $('#summernote').summernote({
            height: 550,
            placeholder: 'Commencez à rédiger votre rapport ici...',
            tabsize: 2,
            dialogsInBody: true,
            disableDragAndDrop: false,

            toolbar: [
                // Row 1: Basic formatting
                ['undo',        ['undo', 'redo']],
                ['style',       ['style']],
                ['font',        ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontname',    ['fontname']],
                ['fontsize',    ['fontsize']],
                ['color',       ['forecolor', 'backcolor']],
                ['textFx',      ['highlight', 'upperCase', 'lowerCase', 'smallCaps', 'letterSpacing', 'rtl']],
                // Row 2: Paragraph & lists
                ['para',        ['ul', 'ol', 'paragraph']],
                ['height',      ['height']],
                ['checklist',   ['checklist']],
                // Row 3: Table tools
                ['styledTable', ['styledTable']],
                ['tableEdit',   ['addRow', 'addCol', 'deleteRow', 'deleteCol']],
                ['tableMerge',  ['mergeCells', 'splitCell', 'toggleHeader']],
                ['tableBg',     ['rowBgColor', 'cellBgColor']],
                ['tableStyle',  ['tableBorder', 'tableBorderColor', 'autoFit', 'stripeRows']],
                // Row 4: Insert
                ['insert',      ['link', 'picture', 'video', 'hr']],
                ['insertAdv',   ['emoji', 'specialChars', 'dateStamp', 'pageBreak']],
                ['divider',     ['dividerStyle']],
                // Row 5: Layout & productivity
                ['layout',      ['callout', 'textBox', 'columns', 'template']],
                ['tools',       ['findReplace', 'printBtn']],
                ['view',        ['fullscreen', 'codeview', 'help']],
            ],

            buttons: {
                // Text formatting
                highlight: HighlightButton,
                upperCase: UpperCaseButton,
                lowerCase: LowerCaseButton,
                smallCaps: SmallCapsButton,
                letterSpacing: LetterSpacingButton,
                rtl: RtlButton,
                // Insert
                emoji: EmojiButton,
                specialChars: SpecialCharsButton,
                dateStamp: DateStampButton,
                pageBreak: PageBreakButton,
                callout: CalloutButton,
                dividerStyle: DividerButton,
                textBox: TextBoxButton,
                columns: ColumnsButton,
                checklist: ChecklistButton,
                template: TemplateButton,
                // Table
                styledTable: StyledTableButton,
                rowBgColor: RowBgColorButton,
                cellBgColor: CellBgColorButton,
                addRow: AddRowButton,
                addCol: AddColButton,
                deleteRow: DeleteRowButton,
                deleteCol: DeleteColButton,
                mergeCells: MergeCellsButton,
                splitCell: SplitCellButton,
                toggleHeader: ToggleHeaderButton,
                tableBorder: TableBorderButton,
                tableBorderColor: TableBorderColorButton,
                autoFit: AutoFitButton,
                stripeRows: StripeRowsButton,
                // Image
                imageCenter: ImageCenterButton,
                // Productivity
                printBtn: PrintButton,
                findReplace: FindReplaceButton,
            },

            fontNames: [
                'Arial', 'Arial Black', 'Calibri', 'Cambria', 'Comic Sans MS', 'Courier New',
                'Georgia', 'Helvetica', 'Impact', 'Lucida Console', 'Lucida Sans',
                'Palatino Linotype', 'Segoe UI', 'Tahoma', 'Times New Roman',
                'Trebuchet MS', 'Verdana'
            ],

            fontSizes: ['8','9','10','11','12','13','14','16','18','20','24','28','32','36','42','48','56','64','72','96'],

            styleTags: [
                'p',
                { title: 'Titre 1', tag: 'h1', className: '', value: 'h1' },
                { title: 'Titre 2', tag: 'h2', className: '', value: 'h2' },
                { title: 'Titre 3', tag: 'h3', className: '', value: 'h3' },
                { title: 'Titre 4', tag: 'h4', className: '', value: 'h4' },
                { title: 'Titre 5', tag: 'h5', className: '', value: 'h5' },
                { title: 'Titre 6', tag: 'h6', className: '', value: 'h6' },
                'blockquote', 'pre'
            ],

            popover: {
                image: [
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['align', ['imageCenter']],
                    ['remove', ['removeMedia']]
                ],
                link: [
                    ['link', ['linkDialogShow', 'unlink']]
                ],
                table: [
                    ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                ],
            },

            callbacks: {
                onImageUpload: function(files) {
                    for (var i = 0; i < files.length; i++) {
                        (function(file) {
                            var reader = new FileReader();
                            reader.onloadend = function() {
                                var img = $('<img>').attr('src', this.result).css({'max-width':'100%','height':'auto','border-radius':'4px'});
                                $('#summernote').summernote('insertNode', img[0]);
                            };
                            reader.readAsDataURL(file);
                        })(files[i]);
                    }
                },
                onInit: function() {
                    var $editor = $(this).siblings('.note-editor');
                    var $editable = $editor.find('.note-editable');
                    var $statusbar = $editor.find('.note-statusbar');

                    // ── Word count ───────────────────────
                    var $wordCount = $('<div class="sn-word-count"><span class="wc-words">0 mots</span><span class="wc-chars">0 caractères</span></div>');
                    $statusbar.prepend($wordCount);

                    function updateWordCount() {
                        var text = $editable.text().trim();
                        var words = text ? text.split(/\s+/).length : 0;
                        var chars = text.length;
                        $wordCount.find('.wc-words').text(words + ' mots');
                        $wordCount.find('.wc-chars').text(chars + ' caractères');
                    }
                    updateWordCount();
                    $editable.on('keyup paste', updateWordCount);

                    // ── Zoom control ─────────────────────
                    var baseFontSize = 14;
                    var $zoom = $('<div class="sn-zoom-control"></div>');
                    var $zoomOut = $('<span style="cursor:pointer;padding:2px 6px;font-size:16px;font-weight:bold">−</span>');
                    var $zoomSlider = $('<input type="range" min="50" max="200" value="100" step="10">');
                    var $zoomLabel = $('<span class="zoom-label">100%</span>');
                    var $zoomIn = $('<span style="cursor:pointer;padding:2px 6px;font-size:16px;font-weight:bold">+</span>');
                    $zoom.append($zoomOut, $zoomSlider, $zoomLabel, $zoomIn);
                    $statusbar.append($zoom);

                    function applyZoom(val) {
                        val = Math.max(50, Math.min(200, parseInt(val)));
                        var newSize = Math.round(baseFontSize * val / 100);
                        $editable.css('font-size', newSize + 'px');
                        $zoomSlider.val(val);
                        $zoomLabel.text(val + '%');
                    }
                    $zoomSlider.on('input', function() { applyZoom($(this).val()); });
                    $zoomOut.on('click', function() { applyZoom(parseInt($zoomSlider.val()) - 10); });
                    $zoomIn.on('click', function() { applyZoom(parseInt($zoomSlider.val()) + 10); });

                    // ── Auto-style pasted tables ─────────
                    $editable.on('DOMNodeInserted', function(e) {
                        if (e.target.tagName === 'TABLE') {
                            $(e.target).css({'width':'100%','border-collapse':'collapse','border':'1px solid #d1d5db','margin':'12px 0'});
                            $(e.target).find('td,th').css({'border':'1px solid #d1d5db','padding':'10px 14px','vertical-align':'top'});
                            $(e.target).find('th').css({'background-color':'#f1f5f9','font-weight':'600','color':'#1e293b'});
                        }
                    });

                    // ── Checklist click to toggle ────────
                    $editable.on('click', '.sn-checklist li', function() {
                        $(this).toggleClass('checked');
                    });

                    // ── Keyboard shortcut Ctrl+H for Find & Replace ──
                    $editable.on('keydown', function(e) {
                        if (e.ctrlKey && e.key === 'h') {
                            e.preventDefault();
                            $editor.find('[data-original-title="Chercher et remplacer (Ctrl+H)"]').trigger('click');
                        }
                    });
                },
                onChange: function(contents) {
                    // Keep word count updated on programmatic changes
                    var $editor = $(this).siblings('.note-editor');
                    var text = $editor.find('.note-editable').text().trim();
                    var words = text ? text.split(/\s+/).length : 0;
                    $editor.find('.wc-words').text(words + ' mots');
                    $editor.find('.wc-chars').text(text.length + ' caractères');
                }
            }
        });
    });
    </script>
@endpush
