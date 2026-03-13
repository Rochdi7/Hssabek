{{-- Shared Summernote WYSIWYG Editor Component --}}
{{-- Usage: @include('backoffice.components._summernote-editor', ['editorId' => 'content', 'height' => 300]) --}}

@php
    $editorId = $editorId ?? 'summernote';
    $height = $height ?? 300;
@endphp

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('build/plugins/summernote/summernote-lite.min.css') }}">
    <style>
        /* ── Editor frame ─────────────────────────────── */
        .note-editor.note-frame {
            border: 1px solid #d1d5db;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .06);
        }

        /* ── Toolbar ──────────────────────────────────── */
        .note-editor .note-toolbar {
            background: linear-gradient(to bottom, #f8f9fb, #eef0f4);
            border-bottom: 1px solid #d1d5db;
            padding: 6px 8px;
            flex-wrap: wrap;
            gap: 2px;
        }

        .note-editor .note-toolbar .note-btn-group {
            margin-right: 4px;
        }

        .note-editor .note-toolbar .note-btn {
            border-radius: 4px;
            padding: 4px 8px;
            font-size: 13px;
            border: 1px solid transparent;
            background: transparent;
            color: #374151;
            transition: all .15s;
        }

        .note-editor .note-toolbar .note-btn:hover {
            background: #fff;
            border-color: #c5c9d2;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .06);
        }

        .note-editor .note-toolbar .note-btn.active {
            background: #e0e7ff;
            border-color: #818cf8;
            color: #4338ca;
        }

        .note-editor .note-toolbar .note-color-btn {
            padding: 2px 4px;
        }

        /* ── Editing area ─────────────────────────────── */
        .note-editor .note-editing-area .note-editable {
            padding: 16px 20px;
            min-height: {{ $height }}px;
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, 'Helvetica Neue', Arial, sans-serif;
            font-size: 14px;
            line-height: 1.7;
            color: #1f2937;
            background: #fff;
        }

        .note-editor .note-editing-area .note-editable:focus {
            outline: none;
        }

        /* ── Statusbar ────────────────────────────────── */
        .note-editor .note-statusbar {
            border-top: 1px solid #d1d5db;
            background: #f8f9fb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 4px 12px;
        }

        .note-editor .note-statusbar .note-resizebar {
            border-top: none;
            padding: 3px 0;
        }

        /* ── Dropdown menus ───────────────────────────── */
        .note-editor .note-dropdown-menu {
            border-radius: 6px;
            border: 1px solid #d1d5db;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .1);
            padding: 4px;
        }

        .note-editor .note-dropdown-item {
            border-radius: 4px;
            padding: 6px 10px;
        }

        .note-editor .note-dropdown-item:hover {
            background: #f3f4f6;
        }

        /* ── Modal dialogs ────────────────────────────── */
        .note-modal .modal-dialog {
            max-width: 550px;
        }

        .note-modal .note-modal-content {
            border-radius: 10px;
            border: none;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .15);
        }

        /* ── Tables inside editor ─────────────────────── */
        .note-editor .note-editable table {
            width: 100%;
            border-collapse: collapse;
            margin: 12px 0;
            border: 1px solid #d1d5db;
            border-radius: 6px;
        }

        .note-editor .note-editable table td,
        .note-editor .note-editable table th {
            border: 1px solid #d1d5db;
            padding: 10px 14px;
            vertical-align: top;
            min-width: 60px;
        }

        .note-editor .note-editable table th {
            background-color: #f1f5f9;
            font-weight: 600;
            color: #1e293b;
        }

        .note-editor .note-editable table tr:hover td {
            background-color: #f8fafc;
        }

        /* ── Lists ────────────────────────────────────── */
        .note-editor .note-editable ul,
        .note-editor .note-editable ol {
            padding-left: 24px;
            margin: 10px 0;
        }

        .note-editor .note-editable li {
            margin-bottom: 6px;
        }

        /* ── Blockquote ───────────────────────────────── */
        .note-editor .note-editable blockquote {
            border-left: 4px solid #6366f1;
            padding: 12px 20px;
            margin: 16px 0;
            background: #f5f3ff;
            font-style: italic;
            color: #4338ca;
        }

        /* ── Code ─────────────────────────────────────── */
        .note-editor .note-editable code {
            background: #f3f4f6;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: 'Consolas', monospace;
            font-size: 13px;
            color: #dc2626;
        }

        .note-editor .note-editable pre {
            background: #1e293b;
            color: #e2e8f0;
            padding: 16px;
            border-radius: 8px;
            overflow-x: auto;
        }

        .note-editor .note-editable pre code {
            background: transparent;
            color: inherit;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ URL::asset('build/plugins/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/summernote/lang/summernote-fr-FR.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#{{ $editorId }}').summernote({
                lang: 'fr-FR',
                height: {{ $height }},
                placeholder: {!! json_encode(__('Rédigez votre contenu ici...')) !!},
                tabsize: 2,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                fontSizes: ['8', '9', '10', '11', '12', '13', '14', '16', '18', '20', '24', '28', '32',
                    '36'],
                styleTags: [
                    'p',
                    {
                        title: {!! json_encode(__('Titre 1')) !!},
                        tag: 'h1',
                        className: '',
                        value: 'h1'
                    },
                    {
                        title: {!! json_encode(__('Titre 2')) !!},
                        tag: 'h2',
                        className: '',
                        value: 'h2'
                    },
                    {
                        title: {!! json_encode(__('Titre 3')) !!},
                        tag: 'h3',
                        className: '',
                        value: 'h3'
                    },
                    {
                        title: {!! json_encode(__('Titre 4')) !!},
                        tag: 'h4',
                        className: '',
                        value: 'h4'
                    },
                    {
                        title: {!! json_encode(__('Citation')) !!},
                        tag: 'blockquote',
                        className: '',
                        value: 'blockquote'
                    },
                    {
                        title: {!! json_encode(__('Code')) !!},
                        tag: 'pre',
                        className: '',
                        value: 'pre'
                    }
                ],
                callbacks: {
                    onInit: function() {
                        console.log('Summernote initialized');
                    }
                }
            });
        });
    </script>
@endpush
