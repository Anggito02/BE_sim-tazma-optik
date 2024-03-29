<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\StockOpnameDetail\GetStockOpnameDetailService;
use App\Services\Modules\StockOpnameDetail\GetAllStockOpnameDetailService;
use App\Services\Modules\StockOpnameDetail\AddStockOpnameDetailService;
use App\Services\Modules\StockOpnameDetail\EditStockOpnameDetailService;
use App\Services\Modules\StockOpnameDetail\AdjustStockOpnameDetailService;
use App\Services\Modules\StockOpnameDetail\MakeAdjustmentSODetailService;

class StockOpnameDetailController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetStockOpnameDetailService $getStockOpnameDetailService,
        private GetAllStockOpnameDetailService $getAllStockOpnameDetailService,
        private AddStockOpnameDetailService $addStockOpnameDetailService,
        private EditStockOpnameDetailService $editStockOpnameDetailService,
        private AdjustStockOpnameDetailService $adjustStockOpnameDetailService,
        private MakeAdjustmentSODetailService $makeAdjustmentSODetailService,
    )
    {}

    /**
     * Get Stock Opname Detail
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStockOpnameDetail(Request $request) {
        try {
            $stockOpnameDetailInfoDTO = $this->getStockOpnameDetailService->getStockOpnameDetail($request);

            return response()->json([
                'message' => 'Success',
                'data' => $stockOpnameDetailInfoDTO,
            ]);
        } catch (Exception $error) {
            return response()->json([
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Get All Stock Opname Detail
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllStockOpnameDetail(Request $request) {
        try {
            $stockOpnameDetailInfoDTO = $this->getAllStockOpnameDetailService->getAllStockOpnameDetail($request);

            return response()->json([
                'message' => 'Success',
                'data' => $stockOpnameDetailInfoDTO,
            ]);
        } catch (Exception $error) {
            return response()->json([
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Add Stock Opname Detail
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addStockOpnameDetail(Request $request) {
        try {
            $newStockOpnameDetailDTO = $this->addStockOpnameDetailService->addStockOpnameDetail($request);

            return response()->json([
                'message' => 'Success',
                'data' => $newStockOpnameDetailDTO,
            ]);
        } catch (Exception $error) {
            return response()->json([
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Edit Stock Opname Detail
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function editStockOpnameDetail(Request $request) {
        try {
            $editStockOpnameDetailDTO = $this->editStockOpnameDetailService->editStockOpnameDetail($request);

            return response()->json([
                'message' => 'Success',
                'data' => $editStockOpnameDetailDTO,
            ]);
        } catch (Exception $error) {
            return response()->json([
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Update Stock Opname Detail Adjustment
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function adjustStockOpnameDetail(Request $request) {
        try {
            $updateSODetailAdjustmentDTO = $this->adjustStockOpnameDetailService->adjustStockOpnameDetail($request);

            return response()->json([
                'message' => 'Success',
                'data' => $updateSODetailAdjustmentDTO,
            ]);
        } catch (Exception $error) {
            return response()->json([
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Make Adjustment Stock Opname Detail
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function makeAdjustmentSODetail(Request $request) {
        try {
            $makeAdjustmentSODetailDTO = $this->makeAdjustmentSODetailService->makeAdjustmentSODetail($request);

            return response()->json([
                'message' => 'Success',
                'data' => $makeAdjustmentSODetailDTO,
            ]);
        } catch (Exception $error) {
            return response()->json([
                'message' => $error->getMessage(),
            ], 500);
        }
    }
}
