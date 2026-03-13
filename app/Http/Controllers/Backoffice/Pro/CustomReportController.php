<?php

namespace App\Http\Controllers\Backoffice\Pro;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reports\CustomReportRequest;
use App\Models\Reports\CustomReport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;

class CustomReportController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', CustomReport::class);

        $query = CustomReport::query()->with('creator');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
            });
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $reports = $query->latest()->paginate(request()->input('per_page', 15))->withQueryString();

        return view('backoffice.pro.rapports.index', compact('reports'));
    }

    public function create()
    {
        $this->authorize('create', CustomReport::class);

        return view('backoffice.pro.rapports.create');
    }

    public function store(CustomReportRequest $request)
    {
        $this->authorize('create', CustomReport::class);

        $report = CustomReport::create(array_merge(
            $request->validated(),
            ['created_by' => auth()->id()]
        ));

        return redirect()->route('bo.pro.rapports.show', $report)
            ->with('success', __('Rapport créé avec succès.'));
    }

    public function show(CustomReport $customReport)
    {
        $this->authorize('view', $customReport);

        $customReport->load('creator');

        return view('backoffice.pro.rapports.show', ['report' => $customReport]);
    }

    public function edit(CustomReport $customReport)
    {
        $this->authorize('update', $customReport);

        return view('backoffice.pro.rapports.edit', ['report' => $customReport]);
    }

    public function update(CustomReportRequest $request, CustomReport $customReport)
    {
        $this->authorize('update', $customReport);

        $customReport->update($request->validated());

        return redirect()->route('bo.pro.rapports.show', $customReport)
            ->with('success', __('Rapport mis à jour avec succès.'));
    }

    public function destroy(CustomReport $customReport)
    {
        $this->authorize('delete', $customReport);

        $customReport->delete();

        return redirect()->route('bo.pro.rapports.index')
            ->with('success', __('Rapport supprimé avec succès.'));
    }

    public function exportPdf(CustomReport $customReport)
    {
        $this->authorize('export', $customReport);

        $customReport->load('creator');

        $pdf = Pdf::loadView('backoffice.pro.rapports.pdf', ['report' => $customReport])
            ->setPaper('a4', 'portrait');

        $filename = 'rapport-' . \Str::slug($customReport->title) . '.pdf';

        return $pdf->download($filename);
    }

    public function exportWord(CustomReport $customReport)
    {
        $this->authorize('export', $customReport);

        $customReport->load('creator');

        $phpWord = new PhpWord();
        $phpWord->setDefaultFontName('Arial');
        $phpWord->setDefaultFontSize(11);

        $section = $phpWord->addSection();

        // Title
        $section->addText(
            $customReport->title,
            ['bold' => true, 'size' => 20],
            ['spaceAfter' => 120]
        );

        // Metadata
        $meta = 'Catégorie : ' . ($customReport->category ?? '—')
            . ' | Créé par : ' . ($customReport->creator->name ?? '—')
            . ' | Date : ' . $customReport->created_at->format('d/m/Y');
        $section->addText($meta, ['size' => 9, 'color' => '666666'], ['spaceAfter' => 240]);

        $section->addLine(['weight' => 1, 'width' => 450, 'height' => 0, 'color' => 'CCCCCC']);
        $section->addTextBreak();

        // Sanitize HTML to valid XHTML for PHPWord's DOMDocument parser
        $html = $customReport->content;

        // Convert HTML to XHTML using DOMDocument::loadHTML (tolerant parser)
        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->substituteEntities = false;
        @$dom->loadHTML(
            '<?xml encoding="UTF-8"><body>' . $html . '</body>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD | LIBXML_NOERROR
        );

        // Ensure tables have border and width attributes for PHPWord
        foreach ($dom->getElementsByTagName('table') as $table) {
            if (!$table->hasAttribute('border')) {
                $table->setAttribute('border', '1');
            }
            if (!$table->hasAttribute('width')) {
                $table->setAttribute('width', '100%');
            }
            $table->setAttribute('cellpadding', '4');
            $table->setAttribute('cellspacing', '0');
        }
        // Ensure td/th have valign for proper rendering
        foreach (['td', 'th'] as $tag) {
            foreach ($dom->getElementsByTagName($tag) as $cell) {
                if (!$cell->hasAttribute('valign')) {
                    $cell->setAttribute('valign', 'top');
                }
            }
        }

        $xhtml = '';
        $body = $dom->getElementsByTagName('body')->item(0);
        if ($body) {
            foreach ($body->childNodes as $child) {
                $xhtml .= $dom->saveXML($child);
            }
        }

        // Fallback: if empty after parse, wrap in paragraph
        if (trim($xhtml) === '') {
            $xhtml = '<p>' . strip_tags($html) . '</p>';
        }

        Html::addHtml($section, $xhtml, false, false);

        $tempPath = tempnam(sys_get_temp_dir(), 'report_') . '.docx';
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($tempPath);

        $filename = 'rapport-' . \Str::slug($customReport->title) . '.docx';

        return response()->download($tempPath, $filename)->deleteFileAfterSend(true);
    }
}
