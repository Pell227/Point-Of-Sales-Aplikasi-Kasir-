<?php

namespace App\Http\Controllers;

use App\Models\account;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    /**
     * GET /api/accounts  ← butuh token
     * List semua akun beserta data staff-nya.
     */
    public function index(Request $request): JsonResponse
    {
        $query = account::with('staff');

        if ($request->filled('role')) {
            $query->byRole($request->role);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        return response()->json([
            'message' => 'Data akun berhasil diambil.',
            'data'    => $query->orderBy('id')->get(),
        ]);
    }

    /**
     * GET /api/accounts/{id}
     */
    public function show(account $account): JsonResponse
    {
        return response()->json([
            'message' => 'Detail akun.',
            'data'    => $account->load('staff'),
        ]);
    }

    /**
     * PUT /api/accounts/{id}
     */
    public function update(Request $request, account $account): JsonResponse
    {
        $validated = $request->validate([
            'email'    => ['sometimes', 'required', 'email', Rule::unique('accounts', 'email')->ignore($account->id)],
            'password' => ['sometimes', 'nullable', 'confirmed', Password::min(8)],
            'role'     => ['sometimes', 'required', Rule::in(['admin', 'kasir'])],
            'status'   => ['sometimes', Rule::in(['aktif', 'nonaktif'])],
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        $account->update($validated);

        return response()->json([
            'message' => 'Akun berhasil diperbarui.',
            'data'    => $account->fresh()->load('staff'),
        ]);
    }

    /**
     * DELETE /api/accounts/{id}
     */
    public function destroy(account $account): JsonResponse
    {
        $account->delete();

        return response()->json([
            'message' => 'Akun berhasil dihapus.',
        ]);
    }

    /**
     * PATCH /api/accounts/{id}/status
     */
    public function toggleStatus(account $account): JsonResponse
    {
        $account->status = $account->status === 'aktif' ? 'nonaktif' : 'aktif';
        $account->save();

        return response()->json([
            'message' => 'Status akun berhasil diubah.',
            'data'    => $account->load('staff'),
        ]);
    }
}
