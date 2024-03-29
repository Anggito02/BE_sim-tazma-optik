<?php

namespace App\Services\Employee;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Employee\DeleteEmployeeRepository;

class DeleteEmployeeService {
    public function __construct(
        private DeleteEmployeeRepository $employeeRepository
    ) {}

    /**
     * Delete employee
     * @param Request $request
     */
    public function deleteEmployee(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:users,id',
            ]);

            $userDTO = $this->employeeRepository->deleteEmployee($request->id);

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
