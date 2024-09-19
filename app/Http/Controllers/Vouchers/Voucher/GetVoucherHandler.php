<?php

namespace App\Http\Controllers\Vouchers\Voucher;

use App\Models\Voucher;

class GetVoucherHandler
{
    public function getVoucher ($id) {
        $voucher = Voucher::find($id);
        return response()->json($voucher);

    }
}
