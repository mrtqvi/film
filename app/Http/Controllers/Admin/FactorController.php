<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Factor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\DB;

class FactorController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $validData = $request->validate([
            'factors.*.key' => ["required", Rule::in(Factor::VALID_KEYS)],
            'factors.*.value' => "nullable|min:2|max:300",
            'actors.*' => "exists:actors,id"
        ]);

        DB::transaction(function () use($request , $validData) {
            [$model, $id] = [$request->factorizable_type, $request->factorizable_id];

            $findItem = $model::findOrFail($id);

            $findItem->actors()->sync($request->actors);

            if (!empty($validData)) {
                foreach ($validData['factors'] as $factor) {
                    if (!empty($factor['value'])) {
                        Factor::updateOrCreate(
                            [
                                'key' => $factor['key']
                            ],
                            array_merge($factor, [
                                'factorizable_type' => $model,
                                'factorizable_id' => $id
                            ])
                        );
                    }
                }
            }
        });

        return back()->with('toast-success', 'اطلاعات عوامل فیلم ثبت شد.');
    }
}