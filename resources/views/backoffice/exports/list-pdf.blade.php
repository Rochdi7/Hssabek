<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 10px; color: #333; }
        .header { padding: 15px 20px; border-bottom: 2px solid #5112a9; margin-bottom: 10px; }
        .header h1 { font-size: 16px; color: #8351fd; }
        .header .meta { font-size: 9px; color: #666; margin-top: 4px; }
        .header-logo { height: 30px; margin-bottom: 6px; }
        .company { font-size: 11px; font-weight: bold; color: #333; }
        table { width: 100%; border-collapse: collapse; margin: 0 20px; }
        table { width: calc(100% - 40px); }
        th { background-color: #5112a9; color: #fff; padding: 6px 8px; text-align: left; font-size: 9px; text-transform: uppercase; }
        td { padding: 5px 8px; border-bottom: 1px solid #e9ecef; font-size: 9px; }
        tr:nth-child(even) td { background-color: #f8f9fa; }
        .footer { position: fixed; bottom: 0; width: 100%; text-align: center; font-size: 8px; color: #fff; padding: 10px; background-color: #5112a9; }
        .footer-logo { height: 18px; margin-bottom: 4px; }
    </style>
</head>
<body>
    <div class="header">
        <img class="header-logo" src="{{ public_path('assets/images/logo/logo-wide.png') }}" alt="Hssabek">
        @if($tenant)
            <div class="company">{{ $tenant->name }}</div>
        @endif
        <h1>{{ $title }}</h1>
        <div class="meta">Exporté le {{ now()->format('d/m/Y à H:i') }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                @foreach($columns as $label)
                    <th>{{ $label }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse($rows as $i => $row)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    @foreach(array_keys($columns) as $key)
                        <td>
                            @php
                                $val = data_get($row, $key);
                                if ($val instanceof \DateTimeInterface) {
                                    $val = $val->format('d/m/Y');
                                } elseif (is_numeric($val) && (str_contains($key, 'price') || str_contains($key, 'total') || str_contains($key, 'amount') || str_contains($key, 'balance'))) {
                                    $val = number_format((float)$val, 2, ',', ' ');
                                }
                            @endphp
                            {{ $val ?? '-' }}
                        </td>
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($columns) + 1 }}" style="text-align:center; padding: 20px;">Aucun enregistrement trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <img class="footer-logo" src="{{ public_path('assets/images/logo/logo-wide-white.png') }}" alt="Hssabek"><br>
        {{ $tenant?->name }} &mdash; Export généré automatiquement &mdash; Page {PAGE_NUM} / {PAGE_COUNT}
    </div>
</body>
</html>
