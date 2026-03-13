{{-- Embedded Bootstrap + Hssabek theme CSS subset for DomPDF rendering --}}
<style>
    /* ─── Reset & Base ─────────────────────────────────────────── */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: DejaVu Sans, sans-serif; font-size: 14px; color: #333; line-height: 1.5; }
    img { max-width: 100%; height: auto; }
    p { margin-bottom: 20px; line-height: 20px; }
    p:last-child { margin-bottom: 0; }
    h1, h2, h3, h4, h5, h6 { margin: 0; font-weight: 500; line-height: 1.2; color: #212529; }
    h5 { font-size: 1.25rem; }
    h6 { font-size: 1rem; }
    a { text-decoration: none; color: #0d6efd; }

    /* ─── Bootstrap Grid (simplified for PDF) ──────────────────── */
    .row { display: flex; flex-wrap: wrap; margin-right: -12px; margin-left: -12px; }
    .row > * { flex-shrink: 0; width: 100%; max-width: 100%; padding-right: 12px; padding-left: 12px; }
    .gx-0 { margin-right: 0; margin-left: 0; }
    .gx-0 > * { padding-right: 0; padding-left: 0; }
    .col-md-4 { flex: 0 0 auto; width: 33.333333%; }
    .col-md-6 { flex: 0 0 auto; width: 50%; }
    .col-md-8 { flex: 0 0 auto; width: 66.666667%; }
    .col-md-10 { flex: 0 0 auto; width: 83.333333%; }
    .col-md-12 { flex: 0 0 auto; width: 100%; }
    .col-lg-3 { flex: 0 0 auto; width: 25%; }
    .col-lg-4 { flex: 0 0 auto; width: 33.333333%; }
    .col-lg-5 { flex: 0 0 auto; width: 41.666667%; }
    .col-lg-6 { flex: 0 0 auto; width: 50%; }
    .col-lg-7 { flex: 0 0 auto; width: 58.333333%; }
    .col-lg-8 { flex: 0 0 auto; width: 66.666667%; }
    .col-lg-9 { flex: 0 0 auto; width: 75%; }
    .col-lg-10 { flex: 0 0 auto; width: 83.333333%; }
    .col-sm-6 { flex: 0 0 auto; width: 50%; }

    /* ─── Flexbox Utilities ────────────────────────────────────── */
    .d-flex { display: flex !important; }
    .d-block { display: block !important; }
    .d-none { display: none !important; }
    .align-items-center { align-items: center !important; }
    .align-items-start { align-items: start !important; }
    .justify-content-between { justify-content: space-between !important; }
    .justify-content-center { justify-content: center !important; }
    .flex-wrap { flex-wrap: wrap !important; }
    .flex-fill { flex: 1 1 auto !important; }
    .flex-column { flex-direction: column !important; }
    .row-gap-3 { row-gap: 1rem !important; }
    .gap-2 { gap: 0.5rem !important; }

    /* ─── Spacing ──────────────────────────────────────────────── */
    .m-auto { margin: auto !important; }
    .mx-auto { margin-left: auto !important; margin-right: auto !important; }
    .mb-0 { margin-bottom: 0 !important; }
    .mb-1 { margin-bottom: 0.25rem !important; }
    .mb-2 { margin-bottom: 0.5rem !important; }
    .mb-3 { margin-bottom: 1rem !important; }
    .mb-4 { margin-bottom: 1.5rem !important; }
    .mt-1 { margin-top: 0.25rem !important; }
    .mt-2 { margin-top: 0.5rem !important; }
    .mt-3 { margin-top: 1rem !important; }
    .me-1 { margin-right: 0.25rem !important; }
    .me-2 { margin-right: 0.5rem !important; }
    .me-3 { margin-right: 1rem !important; }
    .me-4 { margin-right: 1.5rem !important; }
    .ms-1 { margin-left: 0.25rem !important; }
    .pb-0 { padding-bottom: 0 !important; }
    .pb-2 { padding-bottom: 0.5rem !important; }
    .pb-3 { padding-bottom: 1rem !important; }
    .pb-4 { padding-bottom: 1.5rem !important; }
    .pt-0 { padding-top: 0 !important; }
    .pt-3 { padding-top: 1rem !important; }
    .p-0 { padding: 0 !important; }
    .p-1 { padding: 0.25rem !important; }
    .p-2 { padding: 0.5rem !important; }
    .p-3 { padding: 1rem !important; }
    .p-4 { padding: 1.5rem !important; }
    .px-3 { padding-left: 1rem !important; padding-right: 1rem !important; }
    .py-2 { padding-top: 0.5rem !important; padding-bottom: 0.5rem !important; }
    .py-3 { padding-top: 1rem !important; padding-bottom: 1rem !important; }
    .pe-0 { padding-right: 0 !important; }
    .ps-0 { padding-left: 0 !important; }
    .ps-5 { padding-left: 3rem !important; }

    /* ─── Text ─────────────────────────────────────────────────── */
    .text-center { text-align: center !important; }
    .text-end { text-align: right !important; }
    .text-start { text-align: left !important; }
    .text-lg-end { text-align: right !important; }
    .text-dark { color: #212529 !important; }
    .text-primary { color: #0d6efd !important; }
    .text-success { color: #198754 !important; }
    .text-danger { color: #dc3545 !important; }
    .text-info { color: #0dcaf0 !important; }
    .text-white { color: #fff !important; }
    .text-orange { color: #fd7e14 !important; }
    .text-gray { color: #6c757d !important; }
    .text-gray-5 { color: #adb5bd !important; }
    .fw-medium { font-weight: 500 !important; }
    .fw-semibold { font-weight: 600 !important; }
    .fw-bold { font-weight: 700 !important; }

    /* ─── Font Sizes (Hssabek) ─────────────────────────────────── */
    .fs-10 { font-size: 0.75em !important; }
    .fs-12 { font-size: 0.75rem !important; }
    .fs-13 { font-size: 0.8125rem; }
    .fs-14 { font-size: 0.875rem !important; }
    .fs-16 { font-size: 1rem !important; }
    .fs-18 { font-size: 1.125rem !important; }
    .fs-48 { font-size: 3rem; }

    /* ─── Borders ──────────────────────────────────────────────── */
    .border { border: 1px solid #dee2e6 !important; }
    .border-bottom { border-bottom: 1px solid #dee2e6 !important; }
    .border-top { border-top: 1px solid #dee2e6 !important; }
    .border-end { border-right: 1px solid #dee2e6 !important; }
    .border-start { border-left: 1px solid #dee2e6 !important; }
    .border-0 { border: 0 !important; }
    .border-top-0 { border-top: 0 !important; }
    .border-bottom-0 { border-bottom: 0 !important; }
    .border-end-0 { border-right: 0 !important; }
    .border-start-0 { border-left: 0 !important; }
    .border-bottom-transparent { border-bottom-color: transparent !important; }
    .rounded { border-radius: 0.375rem !important; }
    .rounded-0 { border-radius: 0 !important; }

    /* ─── Backgrounds ──────────────────────────────────────────── */
    .bg-light { background-color: #f8f9fa !important; }
    .bg-dark { background-color: #212529 !important; }
    .bg-gray-9 { background-color: #212529 !important; }
    .bg-gradient-primary { background: linear-gradient(270.14deg, #DDCEFF -0.04%, #DBECFF 100%); }
    .bg-primary-subtle { background-color: #cfe2ff !important; }
    .bg-orange-transparent { background-color: rgba(253, 126, 20, 0.1) !important; }

    /* ─── Bootstrap Tables ─────────────────────────────────────── */
    .table-responsive { overflow-x: auto; }
    .table { width: 100%; margin-bottom: 1rem; color: #212529; vertical-align: top; border-color: #dee2e6; border-collapse: collapse; }
    .table > :not(caption) > * > * { padding: 0.5rem 0.5rem; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #dee2e6; }
    .table > thead { vertical-align: bottom; }
    .table > thead > tr > th { font-weight: 600; padding: 0.75rem 0.5rem; }
    .table-nowrap th, .table-nowrap td { white-space: nowrap; }
    .table-bordered > :not(caption) > * { border-width: 1px 0; }
    .table-bordered > :not(caption) > * > * { border-width: 0 1px; }
    .thead-light th { background-color: #f8f9fa !important; color: #212529; }
    .thead-dark th { background-color: #212529 !important; color: #fff !important; }
    .thead-primary th { background-color: #0d6efd !important; color: #fff !important; }
    .table-dark { color: #fff; background-color: #212529; }
    .table-dark td, .table-dark th { border-color: #495057; }

    /* ─── Bootstrap Card ───────────────────────────────────────── */
    .card { position: relative; display: flex; flex-direction: column; min-width: 0; word-wrap: break-word; background-color: #fff; background-clip: border-box; border: 1px solid rgba(0,0,0,.125); border-radius: 0.375rem; }
    .card-header { padding: 0.75rem 1rem; margin-bottom: 0; background-color: rgba(0,0,0,.03); border-bottom: 1px solid rgba(0,0,0,.125); }
    .card-body { flex: 1 1 auto; padding: 1rem; }
    .shadow-none { box-shadow: none !important; }

    /* ─── Badge ────────────────────────────────────────────────── */
    .badge { display: inline-block; padding: 0.35em 0.65em; font-size: 0.75em; font-weight: 700; line-height: 1; text-align: center; white-space: nowrap; vertical-align: baseline; border-radius: 0.375rem; }

    /* ─── Image ────────────────────────────────────────────────── */
    .img-fluid { max-width: 100% !important; height: auto !important; }

    /* ─── Border Dashed (Hssabek) ──────────────────────────────── */
    .border-dashed { border-bottom: 1px dashed #dee2e6; }

    /* ─── Invoice Wrapper (Hssabek) ────────────────────────────── */
    .invoice-wrapper { padding: 40px; }
    .invoice-wrapper .invoice-tables thead tr th { padding: 10px 16px; }
    .invoice-wrapper .invoice-tables .border-bottom-transparent { border-bottom: transparent; }

    /* ─── Invoice Dark (Hssabek) ───────────────────────────────── */
    .invoice-dark .bg-gray-9 { background: #212529; }
    .invoice-dark h2, .invoice-dark h3, .invoice-dark h4, .invoice-dark h5, .invoice-dark h6, .invoice-dark p, .invoice-dark span { color: #fff !important; }
    .invoice-dark table tr { border-color: #6c757d !important; }
    .invoice-dark table tr td { background: #212529; color: #fff !important; border-color: #6c757d !important; }
    .invoice-dark table tr th { border-color: #6c757d !important; }
    .invoice-dark .thead-dark th { background: #343a40 !important; }
    .invoice-dark .border-bottom { border-color: #6c757d !important; }

    /* ─── Invoice Design 6 (Hssabek) ───────────────────────────── */
    .invoice-design-6 { background: linear-gradient(270.14deg, #DDCEFF -0.04%, #DBECFF 100%); border-radius: 14px 77px 14px 14px; }

    /* ─── Inv Details (Hssabek) ─────────────────────────────────── */
    .inv-details { position: relative; }
    .inv-date-no { font-size: 18px; color: #3F4254; background: linear-gradient(320deg, #7539FF 0%, #7539FF 100%); padding: 14px 20px 15px; min-width: 300px; }
    .inv-date-rest { font-size: 18px; color: #3F4254; background: linear-gradient(320deg, #141414 0%, #141414 100%); padding: 14px 20px 15px; min-width: 300px; }
    .inv-date-nine { font-size: 18px; color: #3F4254; background: linear-gradient(320deg, #DBECFF 0%, #DDCEFF 100%); padding: 14px 20px 15px 87px; min-width: 300px; }
    .triangle-right { width: 56px; height: 49px; border-top: 30px solid transparent; border-right: 58px solid #F7F8F9; border-bottom: 26px solid transparent; position: absolute; top: 0; right: 0; }
    .triangle-left { width: 56px; height: 49px; border-top: 30px solid transparent; border-left: 58px solid #fff; border-bottom: 26px solid transparent; position: absolute; top: 0; left: 0; }

    /* ─── Inv Medical (Hssabek) ─────────────────────────────────── */
    .inv-medical { padding: 36px 120px 36px 30px; z-index: 0; }
    .inv-medical span { z-index: -1; }

    /* ─── Invoice Five Details (Hssabek) ───────────────────────── */
    .invoice-five-details { gap: 24px; padding: 50px 0; }
    .invoice-five-details .gradient-block { width: 629px; height: 36px; background: linear-gradient(320deg, #DDCEFF 0%, #DBECFF 100%); border-radius: 59px; }

    /* ─── Ribbon Hotel (Hssabek) ───────────────────────────────── */
    .ribbon-hotel { background-color: #7539FF; clip-path: polygon(100% 100%, 8% 100%, 0% 0%, 100% 0%); padding: 48px; text-align: center; border-start-end-radius: 4px; border-end-end-radius: 4px; }

    /* ─── Invoice Table 2 (Hssabek) ────────────────────────────── */
    .invoice-table2 { border-collapse: collapse; }
    .invoice-table2 th { border: 10px solid white !important; padding: 8px !important; }
    .invoice-table2 tbody tr th, .invoice-table2 tbody tr td { border-collapse: collapse; border: 10px solid white !important; }
    .invoice-table2 .thead-2 tr th { background: black; color: white !important; text-align: center; }
    .invoice-table2 .tbody-2 td { color: #212529; }
    .invoice-table2 .tbody-2 .odd td { background: #f8f9fa; }
    .invoice-table2 .thead-3 th { border-top: 1px solid !important; border-bottom: 1px solid !important; }
    .invoice-table2 .tbody-3 tr td { border: 0 !important; padding: 10px 5px; }

    /* ─── Receipt Page (Hssabek) ───────────────────────────────── */
    .receipt-page p { font-size: 10px; }
    .receipt-page .card { width: 340px; }
    .receipt-page .card .retail-receipt { display: flex; align-items: center; }
    .receipt-page .card .retail-receipt::before, .receipt-page .card .retail-receipt::after { content: ""; flex: 1; height: 1px; border-bottom: 1px dashed #dee2e6; }
    .receipt-page .card .retail-receipt::before { margin-right: 15px; }
    .receipt-page .card .retail-receipt::after { margin-left: 15px; }
    .receipt-page .card .receipt-header thead tr th { border-top: 1px dashed #dee2e6 !important; border-bottom: 1px dashed #dee2e6 !important; margin-bottom: 10px; }
    .receipt-page .border-dashed { border-bottom: 1px dashed #dee2e6; }

    /* ─── Activity Feed (Hssabek) ──────────────────────────────── */
    .activity-feed { list-style: none; margin-bottom: 0; padding: 20px; position: relative; }
    .activity-feed .feed-item { border-left: 2px dashed #dee2e6; padding-bottom: 19px; padding-left: 20px; position: relative; }
    .activity-feed .feed-item:last-child { border-color: transparent; padding-bottom: 0; }
    .activity-feed .feed-item:after { content: ""; display: block; position: absolute; top: 4px; left: -6px; width: 8px; height: 8px; border-radius: 50%; border: 2px solid #0d6efd; background-color: #0d6efd; }
    .activity-feed .feed-item:before { content: ""; display: block; position: absolute; top: 0; left: -10px; width: 16px; height: 16px; border-radius: 50%; border: 1px solid #0d6efd; background: #fff; }
    .invoice-wrapper .activity-feed .feed-item { border-left: 2px solid #0d6efd; line-height: 0.7; padding-bottom: 8px; }
    .invoice-wrapper .activity-feed .feed-item::after { display: none; }
    .invoice-wrapper .activity-feed .feed-item::before { left: -6px; width: 10px; height: 10px; border: 1px solid #fff; background: #0d6efd; }

    /* ─── Ribbon (Hssabek) ─────────────────────────────────────── */
    .invoice-wrapper .ribbon-tittle { background: #0d6efd; clip-path: polygon(100% 100%, 0% 100%, 0 0, 80% 0); }
    .invoice-wrapper .ribbon-tittle .ribbon-text { padding: 20px 0 20px 18px; }

    /* ─── Content wrapper ──────────────────────────────────────── */
    .content { padding: 24px; }
</style>
