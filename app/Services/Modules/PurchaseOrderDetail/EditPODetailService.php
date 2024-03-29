<?php

namespace App\Services\Modules\PurchaseOrderDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\PurchaseOrderDetail\EditPurchaseOrderDetailDTO;
use App\Repositories\Modules\PurchaseOrderDetail\EditPODetailRepository;
use App\Repositories\Modules\Item\UpdateItemDeleteableRepository;
use App\Services\Modules\PurchaseOrderDetail\GetPODetailService;

class EditPODetailService {
    public function __construct(
        private EditPODetailRepository $poDetailRepository,
        private UpdateItemDeleteableRepository $updateItemDeleteableRepository,
        private GetPODetailService $getPODetailService
    ) {}

    /**
     * Edit Purchase Order Detail
     * @param Request $request
     * @return PurchaseOrderDetail
     */
    public function editPurchaseOrderDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
                'pre_order_qty' => 'required|gte:0',
                'unit' => 'required',
                'harga_beli_satuan' => 'required|gte:0',
                'harga_jual_satuan' => 'required|gte:0',
                'diskon' => 'required|gte:0',
                'item_id' => 'required|exists:items,id',
            ]);

            $poDetailDTO = new EditPurchaseOrderDetailDTO(
                $request->id,
                $request->pre_order_qty,
                $request->unit,
                $request->harga_beli_satuan,
                $request->harga_jual_satuan,
                $request->diskon,
            );

            // update item deleteable
            $this->updateItemDeleteableRepository->updateItemDeleteable($request->item_id, FALSE);

            $poDetailDTO = $this->poDetailRepository->editPurchaseOrderDetail($poDetailDTO);

            return $poDetailDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
