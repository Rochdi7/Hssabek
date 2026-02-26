<head>

	<!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @if (Route::is(['index']))
    <title> Admin Dashboard | Kanakku - Invoice and Billing Management Admin Dashboard Template</title>
    @endif
    @if (!Route::is(['index']))
    <title>{{ implode(' ', collect(explode('-', Route::currentRouteName()))->reject(fn($word, $i) => $i === 0 && $word === 'ui')->map(fn($word) => ucfirst($word))->toArray()) }} | Kanakku - Invoice and Billing Management Admin Dashboard Template</title>
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Kanakku is a Sales, Invoices & Accounts Admin template for Accountant or Companies/Offices with various features for all your needs. Try Demo and Buy Now.">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreams Technologies">

    @include('layout.partials.head')

</head>