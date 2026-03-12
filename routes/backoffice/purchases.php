<?php

use App\Http\Controllers\Backoffice\Purchases\SupplierController;
use App\Http\Controllers\Backoffice\Purchases\PurchaseOrderController;
use App\Http\Controllers\Backoffice\Purchases\VendorBillController;
use App\Http\Controllers\Backoffice\Purchases\GoodsReceiptController;
use App\Http\Controllers\Backoffice\Purchases\DebitNoteController;
use App\Http\Controllers\Backoffice\Purchases\SupplierPaymentController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backoffice Purchases Routes (Tenant)
|--------------------------------------------------------------------------
*/

Route::prefix('purchases')->as('purchases.')->group(function () {

    // Suppliers
    Route::prefix('suppliers')->as('suppliers.')->group(function () {
        Route::get('/', [SupplierController::class, 'index'])
            ->middleware('permission:purchases.suppliers.view')
            ->name('index');

        Route::get('/create', [SupplierController::class, 'create'])
            ->middleware('permission:purchases.suppliers.create')
            ->name('create');

        Route::post('/', [SupplierController::class, 'store'])
            ->middleware('permission:purchases.suppliers.create')
            ->name('store');

        Route::get('/{supplier}', [SupplierController::class, 'show'])
            ->middleware('permission:purchases.suppliers.view')
            ->name('show');

        Route::get('/{supplier}/edit', [SupplierController::class, 'edit'])
            ->middleware('permission:purchases.suppliers.edit')
            ->name('edit');

        Route::put('/{supplier}', [SupplierController::class, 'update'])
            ->middleware('permission:purchases.suppliers.edit')
            ->name('update');

        Route::delete('/{supplier}', [SupplierController::class, 'destroy'])
            ->middleware('permission:purchases.suppliers.delete')
            ->name('destroy');
    });

    // Purchase Orders
    Route::prefix('purchase-orders')->as('purchase-orders.')->group(function () {
        Route::get('/', [PurchaseOrderController::class, 'index'])
            ->middleware('permission:purchases.purchase-orders.view')
            ->name('index');

        Route::get('/create', [PurchaseOrderController::class, 'create'])
            ->middleware('permission:purchases.purchase-orders.create')
            ->name('create');

        Route::post('/', [PurchaseOrderController::class, 'store'])
            ->middleware('permission:purchases.purchase-orders.create')
            ->name('store');

        Route::get('/{purchaseOrder}', [PurchaseOrderController::class, 'show'])
            ->middleware('permission:purchases.purchase-orders.view')
            ->name('show');

        Route::get('/{purchaseOrder}/edit', [PurchaseOrderController::class, 'edit'])
            ->middleware('permission:purchases.purchase-orders.edit')
            ->name('edit');

        Route::put('/{purchaseOrder}', [PurchaseOrderController::class, 'update'])
            ->middleware('permission:purchases.purchase-orders.edit')
            ->name('update');

        Route::delete('/{purchaseOrder}', [PurchaseOrderController::class, 'destroy'])
            ->middleware('permission:purchases.purchase-orders.delete')
            ->name('destroy');

        Route::get('/{purchaseOrder}/download', [PurchaseOrderController::class, 'download'])
            ->middleware(['permission:purchases.purchase-orders.view', 'plan.limit:exports_per_month', 'throttle:pdf-download'])
            ->name('download');

        Route::get('/{purchaseOrder}/stream', [PurchaseOrderController::class, 'stream'])
            ->middleware(['permission:purchases.purchase-orders.view', 'plan.limit:exports_per_month', 'throttle:pdf-download'])
            ->name('stream');

        Route::post('/{purchaseOrder}/receive', [PurchaseOrderController::class, 'receive'])
            ->middleware('permission:purchases.purchase-orders.edit')
            ->name('receive');

        Route::post('/{purchaseOrder}/cancel', [PurchaseOrderController::class, 'cancel'])
            ->middleware('permission:purchases.purchase-orders.edit')
            ->name('cancel');
    });

    // Vendor Bills
    Route::prefix('vendor-bills')->as('vendor-bills.')->group(function () {
        Route::get('/', [VendorBillController::class, 'index'])
            ->middleware('permission:purchases.vendor-bills.view')
            ->name('index');

        Route::get('/create', [VendorBillController::class, 'create'])
            ->middleware('permission:purchases.vendor-bills.create')
            ->name('create');

        Route::post('/', [VendorBillController::class, 'store'])
            ->middleware('permission:purchases.vendor-bills.create')
            ->name('store');

        Route::get('/{vendorBill}', [VendorBillController::class, 'show'])
            ->middleware('permission:purchases.vendor-bills.view')
            ->name('show');

        Route::get('/{vendorBill}/edit', [VendorBillController::class, 'edit'])
            ->middleware('permission:purchases.vendor-bills.edit')
            ->name('edit');

        Route::put('/{vendorBill}', [VendorBillController::class, 'update'])
            ->middleware('permission:purchases.vendor-bills.edit')
            ->name('update');

        Route::delete('/{vendorBill}', [VendorBillController::class, 'destroy'])
            ->middleware('permission:purchases.vendor-bills.delete')
            ->name('destroy');

        Route::get('/{vendorBill}/download', [VendorBillController::class, 'download'])
            ->middleware(['permission:purchases.vendor-bills.view', 'plan.limit:exports_per_month', 'throttle:pdf-download'])
            ->name('download');
    });

    // Goods Receipts
    Route::prefix('goods-receipts')->as('goods-receipts.')->group(function () {
        Route::get('/', [GoodsReceiptController::class, 'index'])
            ->middleware('permission:purchases.goods_receipts.view')
            ->name('index');

        Route::get('/create', [GoodsReceiptController::class, 'create'])
            ->middleware('permission:purchases.goods_receipts.create')
            ->name('create');

        Route::post('/', [GoodsReceiptController::class, 'store'])
            ->middleware('permission:purchases.goods_receipts.create')
            ->name('store');

        Route::get('/{goodsReceipt}', [GoodsReceiptController::class, 'show'])
            ->middleware('permission:purchases.goods_receipts.view')
            ->name('show');

        Route::get('/{goodsReceipt}/edit', [GoodsReceiptController::class, 'edit'])
            ->middleware('permission:purchases.goods_receipts.edit')
            ->name('edit');

        Route::put('/{goodsReceipt}', [GoodsReceiptController::class, 'update'])
            ->middleware('permission:purchases.goods_receipts.edit')
            ->name('update');

        Route::delete('/{goodsReceipt}', [GoodsReceiptController::class, 'destroy'])
            ->middleware('permission:purchases.goods_receipts.delete')
            ->name('destroy');

        Route::post('/{goodsReceipt}/confirm', [GoodsReceiptController::class, 'confirm'])
            ->middleware('permission:purchases.goods_receipts.edit')
            ->name('confirm');

        Route::get('/{goodsReceipt}/download', [GoodsReceiptController::class, 'download'])
            ->middleware(['permission:purchases.goods_receipts.view', 'plan.limit:exports_per_month', 'throttle:pdf-download'])
            ->name('download');
    });

    // Debit Notes
    Route::prefix('debit-notes')->as('debit-notes.')->group(function () {
        Route::get('/', [DebitNoteController::class, 'index'])
            ->middleware('permission:purchases.debit_notes.view')
            ->name('index');

        Route::get('/create', [DebitNoteController::class, 'create'])
            ->middleware('permission:purchases.debit_notes.create')
            ->name('create');

        Route::post('/', [DebitNoteController::class, 'store'])
            ->middleware('permission:purchases.debit_notes.create')
            ->name('store');

        Route::get('/{debitNote}', [DebitNoteController::class, 'show'])
            ->middleware('permission:purchases.debit_notes.view')
            ->name('show');

        Route::get('/{debitNote}/edit', [DebitNoteController::class, 'edit'])
            ->middleware('permission:purchases.debit_notes.edit')
            ->name('edit');

        Route::put('/{debitNote}', [DebitNoteController::class, 'update'])
            ->middleware('permission:purchases.debit_notes.edit')
            ->name('update');

        Route::delete('/{debitNote}', [DebitNoteController::class, 'destroy'])
            ->middleware('permission:purchases.debit_notes.delete')
            ->name('destroy');

        Route::post('/{debitNote}/apply', [DebitNoteController::class, 'apply'])
            ->middleware('permission:purchases.debit_notes.edit')
            ->name('apply');

        Route::get('/{debitNote}/download', [DebitNoteController::class, 'download'])
            ->middleware(['permission:purchases.debit_notes.view', 'plan.limit:exports_per_month', 'throttle:pdf-download'])
            ->name('download');
    });

    // Supplier Payments
    Route::prefix('supplier-payments')->as('supplier-payments.')->group(function () {
        Route::get('/', [SupplierPaymentController::class, 'index'])
            ->middleware('permission:purchases.supplier_payments.view')
            ->name('index');

        Route::get('/create', [SupplierPaymentController::class, 'create'])
            ->middleware('permission:purchases.supplier_payments.create')
            ->name('create');

        Route::post('/', [SupplierPaymentController::class, 'store'])
            ->middleware('permission:purchases.supplier_payments.create')
            ->name('store');

        Route::get('/{supplierPayment}', [SupplierPaymentController::class, 'show'])
            ->middleware('permission:purchases.supplier_payments.view')
            ->name('show');

        Route::get('/{supplierPayment}/edit', [SupplierPaymentController::class, 'edit'])
            ->middleware('permission:purchases.supplier_payments.view')
            ->name('edit');

        Route::put('/{supplierPayment}', [SupplierPaymentController::class, 'update'])
            ->middleware('permission:purchases.supplier_payments.view')
            ->name('update');

        Route::delete('/{supplierPayment}', [SupplierPaymentController::class, 'destroy'])
            ->middleware('permission:purchases.supplier_payments.delete')
            ->name('destroy');

        Route::get('/{supplierPayment}/download', [SupplierPaymentController::class, 'download'])
            ->middleware(['permission:purchases.supplier_payments.view', 'plan.limit:exports_per_month', 'throttle:pdf-download'])
            ->name('download');
    });

});
