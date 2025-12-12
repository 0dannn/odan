<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /**
     * Show admin dashboard
     */
    public function dashboard()
    {
        // Get statistics
        $stats = [
            'total_projects' => \App\Models\Project::count(),
            'total_enrollments' => $this->countEnrollments(),
            'total_contacts' => $this->countContacts(),
            'total_payments' => $this->countPayments(),
            'recent_enrollments' => $this->getRecentEnrollments(5),
            'recent_contacts' => $this->getRecentContacts(5),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    /**
     * Show enrollments
     */
    public function enrollments()
    {
        $enrollments = $this->getAllEnrollments();
        return view('admin.enrollments', compact('enrollments'));
    }

    /**
     * Show contact messages
     */
    public function contacts()
    {
        $contacts = $this->getAllContacts();
        return view('admin.contacts', compact('contacts'));
    }

    /**
     * Show payments
     */
    public function payments()
    {
        $payments = $this->getAllPayments();
        return view('admin.payments', compact('payments'));
    }

    /**
     * Show logs
     */
    public function logs()
    {
        $logFiles = [
            'enrollments' => storage_path('logs/enrollments.log'),
            'payments' => storage_path('logs/payments.log'),
            'contact' => storage_path('logs/contact.log'),
        ];

        $logs = [];
        foreach ($logFiles as $type => $file) {
            if (File::exists($file)) {
                $logs[$type] = array_slice(file($file), -50); // Last 50 lines
            }
        }

        return view('admin.logs', compact('logs'));
    }

    /**
     * Count enrollments from log file
     */
    private function countEnrollments()
    {
        $logFile = storage_path('logs/enrollments.log');
        if (!File::exists($logFile)) {
            return 0;
        }
        return count(file($logFile));
    }

    /**
     * Count contacts from log file
     */
    private function countContacts()
    {
        $logFile = storage_path('logs/contact.log');
        if (!File::exists($logFile)) {
            return 0;
        }
        return count(file($logFile));
    }

    /**
     * Count payments from log file
     */
    private function countPayments()
    {
        $logFile = storage_path('logs/payments.log');
        if (!File::exists($logFile)) {
            return 0;
        }
        return count(file($logFile));
    }

    /**
     * Get recent enrollments
     */
    private function getRecentEnrollments($limit = 10)
    {
        $logFile = storage_path('logs/enrollments.log');
        if (!File::exists($logFile)) {
            return [];
        }

        $lines = array_slice(file($logFile), -$limit);
        return array_reverse($lines);
    }

    /**
     * Get all enrollments
     */
    private function getAllEnrollments()
    {
        $logFile = storage_path('logs/enrollments.log');
        if (!File::exists($logFile)) {
            return [];
        }

        $lines = file($logFile);
        return array_reverse($lines);
    }

    /**
     * Get recent contacts
     */
    private function getRecentContacts($limit = 10)
    {
        $logFile = storage_path('logs/contact.log');
        if (!File::exists($logFile)) {
            return [];
        }

        $lines = array_slice(file($logFile), -$limit);
        return array_reverse($lines);
    }

    /**
     * Get all contacts
     */
    private function getAllContacts()
    {
        $logFile = storage_path('logs/contact.log');
        if (!File::exists($logFile)) {
            return [];
        }

        $lines = file($logFile);
        return array_reverse($lines);
    }

    /**
     * Get all payments
     */
    private function getAllPayments()
    {
        $logFile = storage_path('logs/payments.log');
        if (!File::exists($logFile)) {
            return [];
        }

        $lines = file($logFile);
        return array_reverse($lines);
    }
}

