@extends('frontoffice.layouts.app')

@section('title', 'Aperçu de la plateforme | استعراض المنصة')
@section('meta_description', 'Découvrez toutes les fonctionnalités de Hssabek — tableaux de bord, factures, devis, achats, stocks, rapports et plus. اكتشف جميع ميزات حسابك قبل الاشتراك.')
@section('meta_robots', 'noindex, nofollow')

@push('styles')
<style>
/* ─── Preview Page ──────────────────────────────────────────── */
.preview-hero {
    background: linear-gradient(135deg, #1a0533 0%, #3b1a7a 50%, #7f56ff 100%);
    padding: 80px 0 60px;
    text-align: center;
    color: #fff;
    position: relative;
    overflow: hidden;
}
.preview-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    pointer-events: none;
}
.preview-hero h1 {
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 800;
    margin-bottom: 12px;
    line-height: 1.2;
}
.preview-hero .ar-title {
    font-size: clamp(1.4rem, 3vw, 2rem);
    font-weight: 700;
    direction: rtl;
    margin-bottom: 20px;
    opacity: 0.9;
}
.preview-hero p {
    font-size: 1.1rem;
    opacity: 0.85;
    max-width: 650px;
    margin: 0 auto 10px;
}
.preview-hero .ar-sub {
    direction: rtl;
    font-size: 1rem;
    opacity: 0.75;
    max-width: 600px;
    margin: 0 auto 30px;
}
.badge-cta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.25);
    border-radius: 50px;
    padding: 8px 20px;
    color: #fff;
    font-size: 0.9rem;
    font-weight: 500;
    margin-bottom: 40px;
}

/* ─── Category Nav ─────────────────────────────────────────── */
.preview-nav {
    background: #fff;
    border-bottom: 1px solid #e8e8f0;
    position: sticky;
    top: 0;
    z-index: 100;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
}
.preview-nav .nav-pills {
    gap: 4px;
    padding: 12px 0;
    flex-wrap: wrap;
}
.preview-nav .nav-link {
    color: #555;
    font-size: 0.82rem;
    font-weight: 500;
    padding: 7px 14px;
    border-radius: 8px;
    transition: all 0.2s;
    white-space: nowrap;
}
.preview-nav .nav-link:hover,
.preview-nav .nav-link.active {
    background: #7f56ff;
    color: #fff;
}

/* ─── Section headings ─────────────────────────────────────── */
.preview-section {
    padding: 70px 0 30px;
}
.preview-section:nth-child(even) {
    background: #f8f7ff;
}
.section-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #ede9ff;
    color: #7f56ff;
    border-radius: 50px;
    padding: 5px 14px;
    font-size: 0.8rem;
    font-weight: 600;
    margin-bottom: 10px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}
.section-heading-block {
    margin-bottom: 40px;
}
.section-heading-block h2 {
    font-size: 1.75rem;
    font-weight: 800;
    color: #1a0533;
    margin-bottom: 4px;
}
.section-heading-block .ar-h2 {
    font-size: 1.3rem;
    font-weight: 700;
    color: #7f56ff;
    direction: rtl;
    margin-bottom: 8px;
}
.section-heading-block p {
    color: #666;
    font-size: 0.95rem;
    margin-bottom: 4px;
}
.section-heading-block .ar-p {
    color: #888;
    font-size: 0.88rem;
    direction: rtl;
}

/* ─── Screenshot cards ─────────────────────────────────────── */
.screenshot-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 24px rgba(127,86,255,0.08);
    overflow: hidden;
    margin-bottom: 28px;
    transition: transform 0.25s, box-shadow 0.25s;
    cursor: zoom-in;
    border: 1px solid #ede9ff;
}
.screenshot-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 40px rgba(127,86,255,0.18);
}
.screenshot-card .card-top-bar {
    background: #f3f0ff;
    padding: 10px 16px;
    display: flex;
    align-items: center;
    gap: 6px;
    border-bottom: 1px solid #e8e3ff;
}
.screenshot-card .dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
}
.screenshot-card .dot-red   { background: #ff5f57; }
.screenshot-card .dot-yellow{ background: #febc2e; }
.screenshot-card .dot-green { background: #28c840; }
.screenshot-card .bar-url {
    flex: 1;
    background: #fff;
    border-radius: 6px;
    padding: 3px 12px;
    font-size: 0.72rem;
    color: #999;
    margin-left: 6px;
}
.screenshot-card img {
    width: 100%;
    height: auto;
    display: block;
}
.screenshot-card .card-caption {
    padding: 14px 18px;
    border-top: 1px solid #f0eeff;
}
.screenshot-card .card-caption h5 {
    font-size: 0.92rem;
    font-weight: 700;
    color: #1a0533;
    margin-bottom: 2px;
}
.screenshot-card .card-caption .ar-caption {
    font-size: 0.82rem;
    color: #7f56ff;
    direction: rtl;
    display: block;
}

/* ─── Feature Tags ─────────────────────────────────────────── */
.feature-tag {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: #f0ebff;
    color: #5e35b1;
    border-radius: 6px;
    padding: 3px 10px;
    font-size: 0.75rem;
    font-weight: 500;
    margin: 3px 2px;
}

/* ─── Mobile mockup ─────────────────────────────────────────── */
.mobile-mockup-wrap {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}
.mobile-frame {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 24px rgba(127,86,255,0.12);
    border: 1px solid #ede9ff;
    max-width: 200px;
    transition: transform 0.25s;
    cursor: zoom-in;
}
.mobile-frame:hover { transform: scale(1.04); }
.mobile-frame img { width: 100%; height: auto; display: block; }

/* ─── Lightbox ──────────────────────────────────────────────── */
#lightbox-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.88);
    z-index: 9999;
    align-items: center;
    justify-content: center;
    padding: 24px;
}
#lightbox-overlay.active { display: flex; }
#lightbox-overlay img {
    max-width: 94vw;
    max-height: 90vh;
    border-radius: 12px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.5);
}
#lightbox-close {
    position: fixed;
    top: 20px;
    right: 24px;
    background: rgba(255,255,255,0.15);
    border: none;
    color: #fff;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    font-size: 22px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s;
}
#lightbox-close:hover { background: rgba(255,255,255,0.3); }

/* ─── CTA Banner ─────────────────────────────────────────────  */
.cta-banner {
    background: linear-gradient(135deg, #7f56ff 0%, #a855f7 100%);
    border-radius: 24px;
    padding: 60px 40px;
    text-align: center;
    color: #fff;
    margin: 60px 0;
}
.cta-banner h2 { font-size: 2rem; font-weight: 800; margin-bottom: 8px; }
.cta-banner .ar-cta { font-size: 1.4rem; font-weight: 700; direction: rtl; margin-bottom: 20px; opacity: 0.9; }
.cta-banner p { opacity: 0.85; margin-bottom: 30px; }
.cta-banner .btn-white {
    background: #fff;
    color: #7f56ff;
    font-weight: 700;
    padding: 14px 36px;
    border-radius: 12px;
    border: none;
    font-size: 1rem;
    transition: all 0.2s;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}
.cta-banner .btn-white:hover { transform: scale(1.04); box-shadow: 0 8px 24px rgba(0,0,0,0.2); }

/* ─── Stats strip ─────────────────────────────────────────────  */
.stats-strip {
    background: #7f56ff;
    color: #fff;
    padding: 30px 0;
}
.stat-item { text-align: center; padding: 10px; }
.stat-item .stat-num { font-size: 2rem; font-weight: 800; display: block; }
.stat-item .stat-label { font-size: 0.82rem; opacity: 0.8; }
.stat-item .stat-ar { font-size: 0.78rem; opacity: 0.7; direction: rtl; }

@media (max-width: 767px) {
    .preview-hero { padding: 50px 0 40px; }
    .cta-banner { padding: 40px 20px; }
    .cta-banner h2 { font-size: 1.4rem; }
    .preview-nav .nav-link { font-size: 0.76rem; padding: 6px 10px; }
}
</style>
@endpush

@section('content')

<!-- ── LIGHTBOX ──────────────────────────────────────────────── -->
<div id="lightbox-overlay">
    <button id="lightbox-close" aria-label="Fermer">&#x2715;</button>
    <img id="lightbox-img" src="" alt="">
</div>

<!-- ── HERO ──────────────────────────────────────────────────── -->
<section class="preview-hero">
    <div class="container" style="position:relative;z-index:1;">
        <div class="badge-cta">
            <i class="fa fa-eye"></i>
            Aperçu complet de la plateforme &nbsp;|&nbsp; معاينة شاملة للمنصة
        </div>
        <h1>Découvrez Hssabek en détail</h1>
        <p class="ar-title">اكتشف منصة حسابك بالتفصيل</p>
        <p>Parcourez toutes les pages et fonctionnalités avant de vous inscrire — aucune connexion requise.</p>
        <p class="ar-sub">تصفح جميع الصفحات والميزات قبل التسجيل — لا حاجة لتسجيل الدخول</p>
        <a href="{{ route('request-account') }}" class="btn btn-light btn-lg fw-bold px-5" style="border-radius:12px;">
            <i class="fa fa-rocket me-2"></i>Créer mon compte gratuit — إنشاء حساب مجاني
        </a>
    </div>
</section>

<!-- ── STATS ─────────────────────────────────────────────────── -->
<div class="stats-strip">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-num">50+</span>
                    <span class="stat-label">Modules & fonctionnalités</span>
                    <span class="stat-ar">وحدة ووظيفة</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-num">64+</span>
                    <span class="stat-label">Modèles de factures PDF</span>
                    <span class="stat-ar">نموذج فاتورة PDF</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-num">2</span>
                    <span class="stat-label">Langues (FR + AR)</span>
                    <span class="stat-ar">لغتان (فرنسية + عربية)</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-num">100%</span>
                    <span class="stat-label">Adapté au Maroc (MAD / DGI)</span>
                    <span class="stat-ar">مخصص للمغرب</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ── STICKY NAV ────────────────────────────────────────────── -->
<div class="preview-nav">
    <div class="container">
        <ul class="nav nav-pills" id="previewNav">
            <li class="nav-item"><a class="nav-link active" href="#dashboard"><i class="fa fa-th-large me-1"></i>Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="#ventes"><i class="fa fa-file-invoice me-1"></i>Ventes</a></li>
            <li class="nav-item"><a class="nav-link" href="#achats"><i class="fa fa-shopping-cart me-1"></i>Achats</a></li>
            <li class="nav-item"><a class="nav-link" href="#clients"><i class="fa fa-users me-1"></i>Clients</a></li>
            <li class="nav-item"><a class="nav-link" href="#produits"><i class="fa fa-box me-1"></i>Produits & Stock</a></li>
            <li class="nav-item"><a class="nav-link" href="#finance"><i class="fa fa-chart-line me-1"></i>Finance</a></li>
            <li class="nav-item"><a class="nav-link" href="#rapports"><i class="fa fa-chart-bar me-1"></i>Rapports</a></li>
            <li class="nav-item"><a class="nav-link" href="#modeles"><i class="fa fa-file-pdf me-1"></i>Modèles PDF</a></li>
            <li class="nav-item"><a class="nav-link" href="#mobile"><i class="fa fa-mobile-alt me-1"></i>Mobile</a></li>
            <li class="nav-item"><a class="nav-link" href="#langue"><i class="fa fa-language me-1"></i>Arabe / Dark</a></li>
        </ul>
    </div>
</div>


<!-- ══════════════════════════════════════════════════════════ -->
<!-- 1. DASHBOARD                                              -->
<!-- ══════════════════════════════════════════════════════════ -->
<section class="preview-section" id="dashboard">
    <div class="container">
        <div class="section-heading-block">
            <span class="section-badge"><i class="fa fa-th-large"></i> &nbsp;01</span>
            <h2>Tableau de bord — Vue d'ensemble</h2>
            <div class="ar-h2">لوحة القيادة — نظرة عامة</div>
            <p>KPIs en temps réel : ventes, factures, dépenses, devis, clients et produits. Graphiques interactifs de revenus vs dépenses.</p>
            <div class="ar-p">مؤشرات الأداء في الوقت الفعلي: المبيعات، الفواتير، المصروفات، العروض، العملاء والمنتجات. رسوم بيانية تفاعلية.</div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/dashboard.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">hssabek.ma/backoffice/dashboard</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/dashboard.png') }}" alt="Tableau de bord Hssabek" loading="lazy">
                    <div class="card-caption">
                        <h5>Tableau de bord principal</h5>
                        <span class="ar-caption">لوحة القيادة الرئيسية</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/dashboard2.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">dashboard — KPIs</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/dashboard2.png') }}" alt="KPIs Dashboard" loading="lazy">
                    <div class="card-caption">
                        <h5>Statistiques & Graphiques</h5>
                        <span class="ar-caption">الإحصائيات والرسوم البيانية</span>
                    </div>
                </div>
                <div class="mt-2">
                    <span class="feature-tag"><i class="fa fa-check"></i> KPIs temps réel</span>
                    <span class="feature-tag"><i class="fa fa-check"></i> Graphiques revenus</span>
                    <span class="feature-tag"><i class="fa fa-check"></i> Alertes factures</span>
                    <span class="feature-tag"><i class="fa fa-check"></i> مؤشرات لحظية</span>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════ -->
<!-- 2. VENTES                                                 -->
<!-- ══════════════════════════════════════════════════════════ -->
<section class="preview-section" id="ventes">
    <div class="container">
        <div class="section-heading-block">
            <span class="section-badge"><i class="fa fa-file-invoice"></i> &nbsp;02</span>
            <h2>Ventes — Factures, Devis, Avoirs, Paiements</h2>
            <div class="ar-h2">المبيعات — الفواتير، عروض الأسعار، الأرصدة، المدفوعات</div>
            <p>Créez des factures et devis professionnels en quelques secondes. Suivi des paiements, avoirs, bons de livraison et remboursements.</p>
            <div class="ar-p">إنشاء فواتير وعروض أسعار احترافية في ثوانٍ. تتبع المدفوعات وأوامر الإرجاع وسندات التسليم.</div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/facture.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/sales/invoices</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/facture.png') }}" alt="Gestion des factures" loading="lazy">
                    <div class="card-caption">
                        <h5>Liste des Factures</h5>
                        <span class="ar-caption">قائمة الفواتير</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/facture2.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/sales/invoices/new</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/facture2.png') }}" alt="Créer une facture" loading="lazy">
                    <div class="card-caption">
                        <h5>Création de Facture</h5>
                        <span class="ar-caption">إنشاء فاتورة</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/devis.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/sales/quotes</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/devis.png') }}" alt="Gestion des devis" loading="lazy">
                    <div class="card-caption">
                        <h5>Gestion des Devis</h5>
                        <span class="ar-caption">إدارة عروض الأسعار</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/gestion peiments.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/sales/payments</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/gestion peiments.png') }}" alt="Gestion des paiements" loading="lazy">
                    <div class="card-caption">
                        <h5>Suivi des Paiements</h5>
                        <span class="ar-caption">تتبع المدفوعات</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/gestion avoirs.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/sales/credit-notes</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/gestion avoirs.png') }}" alt="Avoirs" loading="lazy">
                    <div class="card-caption">
                        <h5>Avoirs (Crédits)</h5>
                        <span class="ar-caption">أوامر الإرجاع</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/gestion bon de livraison.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/sales/delivery</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/gestion bon de livraison.png') }}" alt="Bons de livraison" loading="lazy">
                    <div class="card-caption">
                        <h5>Bons de Livraison</h5>
                        <span class="ar-caption">سندات التسليم</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/gestion Remboursements.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/sales/refunds</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/gestion Remboursements.png') }}" alt="Remboursements" loading="lazy">
                    <div class="card-caption">
                        <h5>Remboursements</h5>
                        <span class="ar-caption">المبالغ المستردة</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <span class="feature-tag"><i class="fa fa-check"></i> Factures récurrentes</span>
            <span class="feature-tag"><i class="fa fa-check"></i> Rappels automatiques</span>
            <span class="feature-tag"><i class="fa fa-check"></i> Export PDF / Excel</span>
            <span class="feature-tag"><i class="fa fa-check"></i> Envoi email automatique</span>
            <span class="feature-tag"><i class="fa fa-check"></i> فواتير متكررة</span>
            <span class="feature-tag"><i class="fa fa-check"></i> تذكيرات تلقائية</span>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════ -->
<!-- 3. ACHATS                                                 -->
<!-- ══════════════════════════════════════════════════════════ -->
<section class="preview-section" id="achats">
    <div class="container">
        <div class="section-heading-block">
            <span class="section-badge"><i class="fa fa-shopping-cart"></i> &nbsp;03</span>
            <h2>Achats — Fournisseurs & Commandes</h2>
            <div class="ar-h2">المشتريات — الموردون والطلبات</div>
            <p>Gérez vos fournisseurs, bons de commande, réceptions, factures fournisseurs, notes de débit et paiements fournisseurs.</p>
            <div class="ar-p">إدارة الموردين، أوامر الشراء، الاستلامات، فواتير الموردين، مذكرات الخصم ومدفوعات الموردين.</div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/gestion fournisseurs.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/purchases/suppliers</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/gestion fournisseurs.png') }}" alt="Fournisseurs" loading="lazy">
                    <div class="card-caption">
                        <h5>Gestion des Fournisseurs</h5>
                        <span class="ar-caption">إدارة الموردين</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/gestion bon de commande.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/purchases/orders</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/gestion bon de commande.png') }}" alt="Bons de commande" loading="lazy">
                    <div class="card-caption">
                        <h5>Bons de Commande</h5>
                        <span class="ar-caption">أوامر الشراء</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/gestion reception.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/purchases/receipts</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/gestion reception.png') }}" alt="Réceptions" loading="lazy">
                    <div class="card-caption">
                        <h5>Réceptions de Marchandises</h5>
                        <span class="ar-caption">استلام البضائع</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/factures fournisseur.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/purchases/bills</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/factures fournisseur.png') }}" alt="Factures fournisseur" loading="lazy">
                    <div class="card-caption">
                        <h5>Factures Fournisseurs</h5>
                        <span class="ar-caption">فواتير الموردين</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/paiement fournisseur .png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/purchases/payments</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/paiement fournisseur .png') }}" alt="Paiements fournisseur" loading="lazy">
                    <div class="card-caption">
                        <h5>Paiements Fournisseurs</h5>
                        <span class="ar-caption">مدفوعات الموردين</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════ -->
<!-- 4. CLIENTS                                                -->
<!-- ══════════════════════════════════════════════════════════ -->
<section class="preview-section" id="clients">
    <div class="container">
        <div class="section-heading-block">
            <span class="section-badge"><i class="fa fa-users"></i> &nbsp;04</span>
            <h2>CRM — Gestion des Clients</h2>
            <div class="ar-h2">إدارة العملاء — CRM</div>
            <p>Fiche client complète avec adresses multiples, contacts, historique des factures et notes. Rapport client détaillé.</p>
            <div class="ar-p">ملف عميل كامل مع عناوين متعددة، جهات اتصال، تاريخ الفواتير والملاحظات.</div>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/Gestion client.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/crm/customers/1</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/Gestion client.png') }}" alt="Fiche client" loading="lazy">
                    <div class="card-caption">
                        <h5>Fiche Client Détaillée</h5>
                        <span class="ar-caption">بطاقة العميل التفصيلية</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/rapport client.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/reports/customers</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/rapport client.png') }}" alt="Rapport client" loading="lazy">
                    <div class="card-caption">
                        <h5>Rapport Clients</h5>
                        <span class="ar-caption">تقرير العملاء</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════ -->
<!-- 5. PRODUITS & STOCK                                       -->
<!-- ══════════════════════════════════════════════════════════ -->
<section class="preview-section" id="produits">
    <div class="container">
        <div class="section-heading-block">
            <span class="section-badge"><i class="fa fa-box"></i> &nbsp;05</span>
            <h2>Produits, Services & Gestion du Stock</h2>
            <div class="ar-h2">المنتجات، الخدمات وإدارة المخزون</div>
            <p>Catalogue produits & services, entrepôts multiples, mouvements de stock, transferts et historique complet.</p>
            <div class="ar-p">كتالوج المنتجات والخدمات، مستودعات متعددة، حركات المخزون والتحويلات.</div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/Produits & Services.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/catalog/products</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/Produits & Services.png') }}" alt="Produits et services" loading="lazy">
                    <div class="card-caption">
                        <h5>Catalogue Produits & Services</h5>
                        <span class="ar-caption">كتالوج المنتجات والخدمات</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/Entrepôts.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/inventory/warehouses</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/Entrepôts.png') }}" alt="Entrepôts" loading="lazy">
                    <div class="card-caption">
                        <h5>Gestion des Entrepôts</h5>
                        <span class="ar-caption">إدارة المستودعات</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/Mouvements de stock.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/inventory/movements</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/Mouvements de stock.png') }}" alt="Mouvements stock" loading="lazy">
                    <div class="card-caption">
                        <h5>Mouvements de Stock</h5>
                        <span class="ar-caption">حركات المخزون</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/Transferts de stock.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/inventory/transfers</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/Transferts de stock.png') }}" alt="Transferts stock" loading="lazy">
                    <div class="card-caption">
                        <h5>Transferts entre Entrepôts</h5>
                        <span class="ar-caption">التحويلات بين المستودعات</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/Historique du stock.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/inventory/history</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/Historique du stock.png') }}" alt="Historique stock" loading="lazy">
                    <div class="card-caption">
                        <h5>Historique du Stock</h5>
                        <span class="ar-caption">تاريخ المخزون</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════ -->
<!-- 6. FINANCE                                                -->
<!-- ══════════════════════════════════════════════════════════ -->
<section class="preview-section" id="finance">
    <div class="container">
        <div class="section-heading-block">
            <span class="section-badge"><i class="fa fa-chart-line"></i> &nbsp;06</span>
            <h2>Finance — Comptabilité & Trésorerie</h2>
            <div class="ar-h2">المالية — المحاسبة والخزينة</div>
            <p>Comptes bancaires, dépenses, revenus, transferts entre comptes, prêts, catégories financières et taux de taxes.</p>
            <div class="ar-p">الحسابات البنكية، المصروفات، الإيرادات، التحويلات، القروض والفئات المالية.</div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/Comptes bancaires.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/finance/bank-accounts</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/Comptes bancaires.png') }}" alt="Comptes bancaires" loading="lazy">
                    <div class="card-caption">
                        <h5>Comptes Bancaires</h5>
                        <span class="ar-caption">الحسابات البنكية</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/Dépenses.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/finance/expenses</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/Dépenses.png') }}" alt="Dépenses" loading="lazy">
                    <div class="card-caption">
                        <h5>Gestion des Dépenses</h5>
                        <span class="ar-caption">إدارة المصروفات</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/Revenus.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/finance/incomes</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/Revenus.png') }}" alt="Revenus" loading="lazy">
                    <div class="card-caption">
                        <h5>Revenus</h5>
                        <span class="ar-caption">الإيرادات</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/Transferts entre comptes.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/finance/transfers</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/Transferts entre comptes.png') }}" alt="Transferts" loading="lazy">
                    <div class="card-caption">
                        <h5>Transferts entre Comptes</h5>
                        <span class="ar-caption">التحويلات بين الحسابات</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/gestion pretes.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/finance/loans</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/gestion pretes.png') }}" alt="Prêts" loading="lazy">
                    <div class="card-caption">
                        <h5>Gestion des Prêts</h5>
                        <span class="ar-caption">إدارة القروض</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════ -->
<!-- 7. RAPPORTS                                               -->
<!-- ══════════════════════════════════════════════════════════ -->
<section class="preview-section" id="rapports">
    <div class="container">
        <div class="section-heading-block">
            <span class="section-badge"><i class="fa fa-chart-bar"></i> &nbsp;07</span>
            <h2>Rapports & Analyses</h2>
            <div class="ar-h2">التقارير والتحليلات</div>
            <p>Rapports de ventes, achats, inventaire, finance, clients et personnalisés. Export Excel/PDF en un clic.</p>
            <div class="ar-p">تقارير المبيعات، المشتريات، المخزون، المالية، العملاء والتقارير المخصصة. تصدير بنقرة واحدة.</div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/rapport des ventes.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/reports/sales</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/rapport des ventes.png') }}" alt="Rapport des ventes" loading="lazy">
                    <div class="card-caption">
                        <h5>Rapport des Ventes</h5>
                        <span class="ar-caption">تقرير المبيعات</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/rapport finance.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/reports/finance</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/rapport finance.png') }}" alt="Rapport finance" loading="lazy">
                    <div class="card-caption">
                        <h5>Rapport Finance & Trésorerie</h5>
                        <span class="ar-caption">تقرير المالية والخزينة</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/rapport inventaire.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/reports/inventory</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/rapport inventaire.png') }}" alt="Rapport inventaire" loading="lazy">
                    <div class="card-caption">
                        <h5>Rapport Inventaire</h5>
                        <span class="ar-caption">تقرير المخزون</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/creation rapport pour les clients .png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/reports/custom</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/creation rapport pour les clients .png') }}" alt="Rapports personnalisés" loading="lazy">
                    <div class="card-caption">
                        <h5>Rapports Personnalisés</h5>
                        <span class="ar-caption">التقارير المخصصة</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════ -->
<!-- 8. MODELES PDF                                            -->
<!-- ══════════════════════════════════════════════════════════ -->
<section class="preview-section" id="modeles">
    <div class="container">
        <div class="section-heading-block">
            <span class="section-badge"><i class="fa fa-file-pdf"></i> &nbsp;08</span>
            <h2>64+ Modèles de Documents PDF</h2>
            <div class="ar-h2">أكثر من 64 نموذج وثيقة PDF</div>
            <p>Choisissez votre modèle de facture, devis, bon de commande parmi des dizaines de designs professionnels. Aperçu en temps réel.</p>
            <div class="ar-p">اختر نموذج الفاتورة وعرض السعر من بين عشرات التصاميم الاحترافية. معاينة فورية.</div>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/gestion model facture.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/settings/document-templates</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/gestion model facture.png') }}" alt="Modèles de factures" loading="lazy">
                    <div class="card-caption">
                        <h5>Bibliothèque des Modèles</h5>
                        <span class="ar-caption">مكتبة النماذج</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/apercu facture.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">aperçu PDF — Modèle 1</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/apercu facture.png') }}" alt="Aperçu facture PDF" loading="lazy">
                    <div class="card-caption">
                        <h5>Aperçu Facture PDF</h5>
                        <span class="ar-caption">معاينة الفاتورة PDF</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <span class="feature-tag"><i class="fa fa-check"></i> Factures classiques & colorées</span>
            <span class="feature-tag"><i class="fa fa-check"></i> Devis & bons de commande</span>
            <span class="feature-tag"><i class="fa fa-check"></i> Logo & couleurs personnalisés</span>
            <span class="feature-tag"><i class="fa fa-check"></i> نماذج احترافية</span>
            <span class="feature-tag"><i class="fa fa-check"></i> معاينة فورية</span>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════ -->
<!-- 9. MOBILE                                                 -->
<!-- ══════════════════════════════════════════════════════════ -->
<section class="preview-section" id="mobile">
    <div class="container">
        <div class="section-heading-block text-center">
            <span class="section-badge"><i class="fa fa-mobile-alt"></i> &nbsp;09</span>
            <h2>100% Responsive — Accessible sur Mobile</h2>
            <div class="ar-h2">متجاوب 100% — يعمل على الهاتف</div>
            <p>Gérez votre business depuis votre téléphone. L'interface s'adapte parfaitement à tous les écrans.</p>
            <div class="ar-p">أدر أعمالك من هاتفك. الواجهة تتكيف مع جميع الشاشات بشكل مثالي.</div>
        </div>
        <div class="mobile-mockup-wrap">
            <div class="mobile-frame" data-img="{{ asset('preview-screenshots/mobile/Screenshot 2026-04-17 103945.png') }}">
                <img src="{{ asset('preview-screenshots/mobile/Screenshot 2026-04-17 103945.png') }}" alt="Mobile dashboard" loading="lazy">
            </div>
            <div class="mobile-frame" data-img="{{ asset('preview-screenshots/mobile/Screenshot 2026-04-17 104029.png') }}">
                <img src="{{ asset('preview-screenshots/mobile/Screenshot 2026-04-17 104029.png') }}" alt="Mobile factures" loading="lazy">
            </div>
            <div class="mobile-frame" data-img="{{ asset('preview-screenshots/mobile/Screenshot 2026-04-17 104111.png') }}">
                <img src="{{ asset('preview-screenshots/mobile/Screenshot 2026-04-17 104111.png') }}" alt="Mobile ventes" loading="lazy">
            </div>
            <div class="mobile-frame" data-img="{{ asset('preview-screenshots/mobile/Screenshot 2026-04-17 104213.png') }}">
                <img src="{{ asset('preview-screenshots/mobile/Screenshot 2026-04-17 104213.png') }}" alt="Mobile rapports" loading="lazy">
            </div>
            <div class="mobile-frame" data-img="{{ asset('preview-screenshots/mobile/Screenshot 2026-04-17 104225.png') }}">
                <img src="{{ asset('preview-screenshots/mobile/Screenshot 2026-04-17 104225.png') }}" alt="Mobile clients" loading="lazy">
            </div>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════ -->
<!-- 10. LANGUE ARABE & DARK MODE                              -->
<!-- ══════════════════════════════════════════════════════════ -->
<section class="preview-section" id="langue">
    <div class="container">
        <div class="section-heading-block">
            <span class="section-badge"><i class="fa fa-language"></i> &nbsp;10</span>
            <h2>Interface Arabe & Mode Sombre</h2>
            <div class="ar-h2">الواجهة العربية والوضع الداكن</div>
            <p>Basculez en arabe RTL en un clic. Mode sombre disponible pour un confort visuel optimal la nuit.</p>
            <div class="ar-p">التبديل إلى العربية بنقرة واحدة. الوضع الداكن متاح لراحة العيون في الليل.</div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/arabic dashboard.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">لوحة القيادة — عربي</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/arabic dashboard.png') }}" alt="Dashboard arabe" loading="lazy">
                    <div class="card-caption">
                        <h5>Interface Arabe RTL</h5>
                        <span class="ar-caption">واجهة عربية RTL</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/arabci dashboard 2.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">لوحة القيادة — عربي 2</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/arabci dashboard 2.png') }}" alt="Dashboard arabe 2" loading="lazy">
                    <div class="card-caption">
                        <h5>Dashboard Arabe — Vue complète</h5>
                        <span class="ar-caption">لوحة القيادة العربية</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/darkmode.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">dashboard — dark mode</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/darkmode.png') }}" alt="Mode sombre" loading="lazy">
                    <div class="card-caption">
                        <h5>Mode Sombre (Dark Mode)</h5>
                        <span class="ar-caption">الوضع الداكن</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Extra screenshots -->
        <div class="row mt-3">
            <div class="col-lg-4 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/Notifications.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/notifications</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/Notifications.png') }}" alt="Notifications" loading="lazy">
                    <div class="card-caption">
                        <h5>Notifications & Alertes</h5>
                        <span class="ar-caption">الإشعارات والتنبيهات</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/gestion roles et permission.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/access/roles</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/gestion roles et permission.png') }}" alt="Rôles et permissions" loading="lazy">
                    <div class="card-caption">
                        <h5>Rôles & Permissions</h5>
                        <span class="ar-caption">الأدوار والصلاحيات</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="screenshot-card" data-img="{{ asset('preview-screenshots/Utilisateurs.png') }}">
                    <div class="card-top-bar">
                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span class="dot dot-green"></span>
                        <span class="bar-url">backoffice/users</span>
                    </div>
                    <img src="{{ asset('preview-screenshots/Utilisateurs.png') }}" alt="Utilisateurs" loading="lazy">
                    <div class="card-caption">
                        <h5>Gestion des Utilisateurs</h5>
                        <span class="ar-caption">إدارة المستخدمين</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════ -->
<!-- CTA FINAL                                                 -->
<!-- ══════════════════════════════════════════════════════════ -->
<section style="padding: 0 0 80px;">
    <div class="container">
        <div class="cta-banner">
            <h2>Prêt à démarrer ? Créez votre compte gratuit</h2>
            <div class="ar-cta">هل أنت مستعد؟ أنشئ حسابك المجاني الآن</div>
            <p>Accès complet à toutes les fonctionnalités. Aucune carte bancaire requise. — وصول كامل لجميع الميزات. لا حاجة لبطاقة بنكية.</p>
            <a href="{{ route('request-account') }}" class="btn-white">
                <i class="fa fa-rocket"></i>
                Créer mon compte — إنشاء حساب
            </a>
            <div class="mt-3">
                <a href="{{ route('pricing') }}" class="text-white text-decoration-underline" style="opacity:0.8;font-size:0.9rem;">
                    Voir les tarifs — عرض الأسعار →
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
// ── Lightbox ──────────────────────────────────────────────
(function () {
    var overlay = document.getElementById('lightbox-overlay');
    var img     = document.getElementById('lightbox-img');
    var close   = document.getElementById('lightbox-close');

    document.querySelectorAll('.screenshot-card[data-img], .mobile-frame[data-img]').forEach(function (el) {
        el.addEventListener('click', function () {
            img.src = el.dataset.img;
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    });

    function closeLightbox() {
        overlay.classList.remove('active');
        img.src = '';
        document.body.style.overflow = '';
    }

    close.addEventListener('click', closeLightbox);
    overlay.addEventListener('click', function (e) {
        if (e.target === overlay) closeLightbox();
    });
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeLightbox();
    });
})();

// ── Sticky nav active on scroll ───────────────────────────
(function () {
    var sections = document.querySelectorAll('section[id]');
    var links    = document.querySelectorAll('#previewNav .nav-link');

    function onScroll() {
        var scrollY = window.scrollY + 120;
        sections.forEach(function (section) {
            if (scrollY >= section.offsetTop && scrollY < section.offsetTop + section.offsetHeight) {
                links.forEach(function (l) { l.classList.remove('active'); });
                var active = document.querySelector('#previewNav a[href="#' + section.id + '"]');
                if (active) active.classList.add('active');
            }
        });
    }

    window.addEventListener('scroll', onScroll, { passive: true });

    // Smooth scroll on nav click
    links.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            var target = document.querySelector(this.getAttribute('href'));
            if (target) {
                var offset = target.offsetTop - 80;
                window.scrollTo({ top: offset, behavior: 'smooth' });
            }
        });
    });
})();
</script>
@endpush
