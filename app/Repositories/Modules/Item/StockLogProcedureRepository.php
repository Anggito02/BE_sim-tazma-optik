<?php

namespace App\Repositories\Modules\Item;

use Exception;
use Illuminate\Support\Facades\DB;

class StockLogProcedureRepository {
    /**
     * Call stock log procedure
     * @param string $tanggal_berubah
     * @param int $stok_lama
     * @param int $stok_baru
     * @param string $bentuk_perubahan
     * @param int $item_id
     * @param int $purchase_order_id | null
     *
     */
    public function stockLogProcedure(
        string $tanggal_berubah,
        int $stok_lama,
        int $stok_baru,
        string $bentuk_perubahan,
        int $item_id,
        ?int $purchase_order_id
        ) {
        try {
            if ($purchase_order_id == null) {
                $purchase_order_id = 'NULL';
            }

            $sqlStatement = "CALL item_stock_logging_procedure(
                '$tanggal_berubah',
                $stok_lama,
                $stok_baru,
                '$bentuk_perubahan',
                $item_id,
                $purchase_order_id
            )";
            DB::statement($sqlStatement);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
