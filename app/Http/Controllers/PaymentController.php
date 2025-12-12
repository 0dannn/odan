<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Show Dana payment page
     */
    public function showDanaPayment(Request $request)
    {
        $enrollment = session('pending_enrollment');
        
        if (!$enrollment) {
            return redirect()->route('enroll')->with('error', 'No enrollment found. Please start over.');
        }

        // Generate payment reference
        $paymentRef = 'DANA-' . strtoupper(Str::random(12));
        session(['payment_reference' => $paymentRef]);

        // Calculate amount (you can get this from course pricing)
        $amount = $request->get('amount', 99);

        return view('payment.dana', compact('enrollment', 'paymentRef', 'amount'));
    }

    /**
     * Process Dana payment
     */
    public function processDanaPayment(Request $request)
    {
        $request->validate([
            'dana_phone' => 'required|string|min:10|max:15',
            'payment_reference' => 'required|string',
        ]);

        $enrollment = session('pending_enrollment');
        $paymentRef = session('payment_reference');

        if (!$enrollment || !$paymentRef) {
            return redirect()->route('enroll')->with('error', 'Session expired. Please try again.');
        }

        // Simulate Dana payment processing
        // In production, you would integrate with Dana API here
        $danaPhone = $request->input('dana_phone');
        
        // Log payment attempt
        $entry = "[" . now() . "] DANA PAYMENT | Ref: {$paymentRef} | Phone: {$danaPhone} | Course: {$enrollment['course_name']} | Amount: {$request->input('amount', 99)}" . PHP_EOL;
        $logfile = storage_path('logs/payments.log');
        file_put_contents($logfile, $entry, FILE_APPEND | LOCK_EX);

        // Simulate payment processing delay
        // In production, this would be an API call to Dana
        $paymentStatus = $this->simulateDanaPayment($paymentRef, $danaPhone);

        if ($paymentStatus['success']) {
            // Store payment in session for success page
            session([
                'payment_success' => true,
                'payment_details' => [
                    'reference' => $paymentRef,
                    'method' => 'dana',
                    'phone' => $danaPhone,
                    'amount' => $request->input('amount', 99),
                    'timestamp' => now(),
                ],
                'enrollment' => $enrollment,
            ]);

            // Clear pending enrollment
            session()->forget('pending_enrollment');
            session()->forget('payment_reference');

            return redirect()->route('payment.success');
        } else {
            return redirect()->back()->with('error', $paymentStatus['message'] ?? 'Payment failed. Please try again.');
        }
    }

    /**
     * Simulate Dana payment (replace with actual API integration)
     */
    private function simulateDanaPayment($reference, $phone)
    {
        // Simulate API call delay
        sleep(2);

        // Simulate success (90% success rate for demo)
        // In production, this would be an actual API response from Dana
        $success = rand(1, 10) <= 9;

        if ($success) {
            return [
                'success' => true,
                'transaction_id' => 'DANA-' . time() . '-' . Str::random(8),
                'message' => 'Payment successful',
            ];
        }

        return [
            'success' => false,
            'message' => 'Payment failed. Please check your Dana balance and try again.',
        ];
    }

    /**
     * Dana payment callback (webhook)
     */
    public function danaCallback(Request $request)
    {
        // Handle Dana webhook callback
        // In production, verify the signature from Dana
        $data = $request->all();

        $entry = "[" . now() . "] DANA CALLBACK: " . json_encode($data) . PHP_EOL;
        $logfile = storage_path('logs/payments.log');
        file_put_contents($logfile, $entry, FILE_APPEND | LOCK_EX);

        // Process callback data
        // Update payment status in database
        // Send confirmation email, etc.

        return response()->json(['status' => 'received']);
    }

    /**
     * Show payment success page
     */
    public function paymentSuccess()
    {
        $paymentDetails = session('payment_details');
        $enrollment = session('enrollment');

        if (!$paymentDetails || !$enrollment) {
            return redirect()->route('enroll')->with('error', 'Payment session expired.');
        }

        return view('payment.success', compact('paymentDetails', 'enrollment'));
    }

    /**
     * Show payment failure page
     */
    public function paymentFailure()
    {
        return view('payment.failure');
    }
}

