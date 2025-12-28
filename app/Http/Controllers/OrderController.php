<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{

   public function update(Request $request, Order $order)
    {
        // auth()->loginUsingId(3);
        $this->authorize('update', $order);

        $order->update($request->all());
        return response()->json([
        'message' => 'تم تحديث حالة الطلب بنجاح مطابقاً لقواعد النظام.',
        'status'  => 'success',
        'data'    => $order ,
            ], 200, [], JSON_UNESCAPED_UNICODE);


    }

    public function destroy(Order $order)
    {
        $this->authorize('delete', $order);

        $order->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Order deleted successfully.'
        ]);
    }
}
