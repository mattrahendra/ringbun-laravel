<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Helpers\WhatsAppHelper;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function checkout(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'customer_name' => 'required|string|max:255',
                'customer_phone' => 'required|string|max:20',
                'customer_address' => 'required|string',
                'cart_items' => 'required|array',
                'subtotal' => 'required|numeric',
                'tax' => 'required|numeric',
                'discount' => 'nullable|numeric',
                'total' => 'required|numeric',
                'promo_code' => 'nullable|string'
            ]);

            // Create order in database
            $order = Order::create([
                'order_code' => 'TEMP_' . time(), // Temporary code
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,
                'items' => $request->cart_items,
                'subtotal' => $request->subtotal,
                'tax' => $request->tax,
                'discount' => $request->discount ?? 0,
                'total' => $request->total,
                'status' => 'pending',
                'promo_code' => $request->promo_code
            ]);

            // Generate proper order code
            $orderCode = 'RB' . date('Ymd') . str_pad($order->id, 4, '0', STR_PAD_LEFT);
            $order->update(['order_code' => $orderCode]);

            // Format WhatsApp message
            $whatsappMessage = $this->formatWhatsAppMessage($order);

            // Generate WhatsApp URL
            // $whatsappNumber = '6282268438151';
            $whatsappNumber = '6285161399003'; // Ganti dengan nomor WhatsApp toko
            $whatsappUrl = "https://wa.me/{$whatsappNumber}?text=" . urlencode($whatsappMessage);

            return response()->json([
                'success' => true,
                'message' => 'Pesanan berhasil dibuat',
                'order_code' => $orderCode,
                'whatsapp_url' => $whatsappUrl
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    private function formatWhatsAppMessage(Order $order): string
    {
        $message = "*PESANAN RING BUN*\n\n";
        $message .= "*Kode Pesanan:* {$order->order_code}\n";
        $message .= "*Nama:* {$order->customer_name}\n";
        $message .= "*No. HP:* {$order->customer_phone}\n";
        $message .= "*Alamat:* {$order->customer_address}\n\n";

        $message .= "*Detail Pesanan:*\n";
        $index = 1;
        foreach ($order->items as $item) {
            $itemTotal = $item['price'] * $item['quantity'];
            $message .= "{$index}. {$item['name']} x{$item['quantity']} - Rp " . number_format($itemTotal, 0, ',', '.') . "\n";
            $index++;
        }

        $message .= "\n*Ringkasan Pembayaran:*\n";
        $message .= "Subtotal: Rp " . number_format($order->subtotal, 0, ',', '.') . "\n";
        $message .= "PPN (11%): Rp " . number_format($order->tax, 0, ',', '.') . "\n";

        if ($order->discount > 0) {
            $message .= "Diskon ({$order->promo_code}): -Rp " . number_format($order->discount, 0, ',', '.') . "\n";
        }

        $message .= "*Total: Rp " . number_format($order->total, 0, ',', '.') . "*\n\n";

        $message .= "Pesanan dibuat pada: " . $order->created_at->format('d/m/Y H:i') . "\n\n";
        $message .= "Terima kasih telah memesan di *Ring Bun!*";

        return $message;
    }
}
