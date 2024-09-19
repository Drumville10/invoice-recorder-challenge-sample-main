<?php

namespace App\Http\Controllers\Vouchers\Voucher;

use App\Models\Voucher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Add this line to import the Log class

class DeleteVoucherHandler
{
    public function deleteVoucher (Request $request)
    {
        try {
            $request -> validate([
                'voucher' => 'required|exists:vouchers,id',
            ]);

            $voucher = Voucher::find($request->voucher);
            $voucher->delete();

            return response([
                'message' => 'Voucher deleted successfully',
            ], 200);
        } catch (Exception $exception) {
            return response([
                Log::error($exception->getMessage()),
                'message' => $exception->getMessage(),
            ], 400);
        }
    }
}
