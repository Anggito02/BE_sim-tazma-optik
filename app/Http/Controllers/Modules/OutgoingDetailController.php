<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\OutgoingDetail\GetAllOutgoingDetailService;
use App\Services\Modules\OutgoingDetail\AddOutgoingDetailService;
use App\Services\Modules\OutgoingDetail\EditOutgoingDetailService;
use App\Services\Modules\OutgoingDetail\DeleteOutgoingDetailService;
use App\Services\Modules\OutgoingDetail\VerifyOutgoingDetailService;

class OutgoingDetailController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetAllOutgoingDetailService $getAllOutgoingDetailService,
        private AddOutgoingDetailService $addOutgoingDetailService,
        private EditOutgoingDetailService $editOutgoingDetailService,
        private DeleteOutgoingDetailService $deleteOutgoingDetailService,
        private VerifyOutgoingDetailService $verifyOutgoingDetailService
    ) {}

    /**
     * Get all outgoing detail
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllOutgoingDetail(Request $request) {
        try {
            $outgoingDetailDTOs = $this->getAllOutgoingDetailService->getAllOutgoingDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get all outgoing detail success',
                'data' => $outgoingDetailDTOs
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get all outgoing detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Add outgoing detail
     * @param Request $request
     * @return JsonResponse
     */
    public function addOutgoingDetail(Request $request) {
        try {
            $outgoingDetailDTO = $this->addOutgoingDetailService->addOutgoingDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Add outgoing detail success',
                'data' => $outgoingDetailDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Add outgoing detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Edit outgoing detail
     * @param Request $request
     * @return JsonResponse
     */
    public function editOutgoingDetail(Request $request) {
        try {
            $outgoingDetailDTO = $this->editOutgoingDetailService->editOutgoingDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Edit outgoing detail success',
                'data' => $outgoingDetailDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Edit outgoing detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Delete outgoing detail
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteOutgoingDetail(Request $request) {
        try {
            $outgoingDetail = $this->deleteOutgoingDetailService->deleteOutgoingDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Delete outgoing detail success',
                'data' => $outgoingDetail
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Delete outgoing detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Verify outgoing detail
     * @param Request $request
     * @return JsonResponse
     */
    public function verifyOutgoingDetail(Request $request) {
        try {
            $outgoingDetailDTO = $this->verifyOutgoingDetailService->verifyOutgoingDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Verify outgoing detail success',
                'data' => $outgoingDetailDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Verify outgoing detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}
