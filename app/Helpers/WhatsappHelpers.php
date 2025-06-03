<?php

namespace App\Helpers;

class WhatsAppHelper
{
    public static function formatCartMessage($cartItems)
    {
        if (empty($cartItems)) {
            return "Keranjang kosong.";
        }

        $message = "Pesanan dari Ring Bun:\n";
        $total = 0;
        $index = 1;

        foreach ($cartItems as $item) {
            $itemTotal = $item['price'] * $item['quantity'];
            $message .= "{$index}. {$item['name']} x{$item['quantity']} - Rp " . number_format($itemTotal, 0, ',', '.') . "\n";
            $total += $itemTotal;
            $index++;
        }

        $ppn = $total * 0.11; // PPN 11%
        $grandTotal = $total + $ppn;

        $message .= "\nSubtotal: Rp " . number_format($total, 0, ',', '.') . "\n";
        $message .= "PPN (11%): Rp " . number_format($ppn, 0, ',', '.') . "\n";
        $message .= "Total: Rp " . number_format($grandTotal, 0, ',', '.') . "\n";

        return $message;
    }
}
