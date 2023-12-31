<?php

namespace App\Services\Modules\PurchaseOrderDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\PurchaseOrderDetail\PurchaseOrderDetailInfoDTO;

use App\Repositories\Modules\PurchaseOrderDetail\GetPODetailRepository;

class GetPODetailService {
    public function __construct(
        private GetPODetailRepository $poDetailRepository
    ) {}

    /**
     * Get Purchase Order Detail
     * @param Request $request
     * @return PurchaseOrderDetailInfoDTO
     */
    public function getPurchaseOrderDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
            ]);

            $id = $request->id;

            $poDetailDTO = $this->poDetailRepository->getPurchaseOrderDetail($id);

            $poDetailDTO = $poDetailDTO->toArray();

            return $poDetailDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
