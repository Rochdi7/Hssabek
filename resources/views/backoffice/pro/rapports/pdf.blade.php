<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $report->title }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 40px;
            line-height: 1.6;
        }
        h1 {
            font-size: 22px;
            margin-bottom: 5px;
            color: #111;
        }
        .meta {
            color: #666;
            font-size: 10px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        .content {
            line-height: 1.8;
        }
        .content h1 { font-size: 20px; }
        .content h2 { font-size: 17px; }
        .content h3 { font-size: 15px; }
        .content h4 { font-size: 13px; }
        .content img {
            max-width: 100%;
            height: auto;
        }
        .content blockquote {
            border-left: 3px solid #ccc;
            padding-left: 10px;
            margin-left: 0;
            color: #555;
        }
        .content table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }
        .content table th,
        .content table td {
            border: 1px solid #ddd;
            padding: 6px 8px;
            text-align: left;
        }
        .content table th {
            background-color: #f5f5f5;
        }
        .footer {
            position: fixed;
            bottom: 20px;
            left: 40px;
            right: 40px;
            text-align: center;
            font-size: 9px;
            color: #999;
            border-top: 1px solid #eee;
            padding-top: 5px;
        }
    </style>
</head>
<body>
    <h1>{{ $report->title }}</h1>
    <div class="meta">
        @if($report->category)
            Catégorie : {{ $report->category }} &nbsp;|&nbsp;
        @endif
        Créé par : {{ $report->creator->name ?? '—' }} &nbsp;|&nbsp;
        Date : {{ $report->created_at->format('d/m/Y') }}
    </div>
    <div class="content">
        {!! $report->content !!}
    </div>
    <div class="footer">
        {{ $report->title }} &mdash; Généré le {{ now()->format('d/m/Y à H:i') }}
    </div>
</body>
</html>
