<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrders;
use Illuminate\Http\Request;

class ProformaController extends Controller
{
    public function __construct(PurchaseOrders $purchaseOrders)
    {
        $this->purchaseOrders = $purchaseOrders;
    }

    public function updateInvoiceToProforma(Request $request,  $purchaseId = null)
    {
        $code = $this->purchaseOrders::generateInvoiceCode();
        $dvStatus = 'pending';
        $orTypeStats = 'pro_forma';

        $updateStatus = $this->purchaseOrders::find($purchaseId)->update(['status' => $request->status, 'order_type' => $orTypeStats]);
        return $updateStatus ? redirect()->route('dashboard.index') : redirect()->route('dashboard.index');
    }
}
