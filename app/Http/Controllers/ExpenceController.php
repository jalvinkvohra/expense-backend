<?php

namespace App\Http\Controllers;

use App\Models\Expence;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExpenceController extends Controller
{
    use ResponseTrait;

    /**
     * Create new expence
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $rules = [
            'reason' => 'required',
            'amount' => 'required',
        ];

        $this->validate($request, $rules);

        $expence = Expence::create($request->only(['reason', 'amount', 'spent_at']));

        return $this->successResponse($expence, Response::HTTP_CREATED);
    }

    /**
     * List all expences
     *
     * @return JsonResponse
     */
    public function list()
    {
        $expences = Expence::all();

        return $this->successResponse($expences);
    }

    /**
     * Get expence
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function get($id)
    {
        $expence = Expence::findOrFail($id);

        return $this->successResponse($expence);
    }

    /**
     * Delete expence
     *
     * @param int $id
     *
     * @return void
     */
    public function delete($id) {
        $expence = Expence::findOrFail($id);

        $expence->delete();

        return $this->emptyResponse();
    }
}
