<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use RealRashid\SweetAlert\Facades\Alert;

class KritikController extends Controller
{
    protected $database;

    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount(storage_path(config('firebase.credentials')))
            ->withDatabaseUri(config('firebase.database_url'));

        $this->database = $factory->createDatabase();
    }

    public function index(Request $request)
    {
        $feedbacks = $this->database->getReference('feedback')->getValue() ?? [];

        // Filter by search
        if ($request->has('search') && $request->input('search') !== null) {
            $search = strtolower($request->input('search'));
            $feedbacks = array_filter($feedbacks, function ($item) use ($search) {
                return str_contains(strtolower($item['name']), $search) ||
                    str_contains(strtolower($item['email']), $search) ||
                    str_contains(strtolower($item['subject']), $search) ||
                    str_contains(strtolower($item['message']), $search);
            });
        }

        // Filter by status
        if ($request->has('status') && $request->input('status') !== null && $request->input('status') !== '') {
            $status = strtolower($request->input('status'));
            $feedbacks = array_filter($feedbacks, function ($item) use ($status) {
                return strtolower($item['status']) === $status;
            });
        }

        // Sort by date
        if ($request->has('sort') && $request->input('sort') !== null) {
            $sort = strtolower($request->input('sort'));
            usort($feedbacks, function ($a, $b) use ($sort) {
                if ($sort === 'newest') {
                    return strtotime($b['created_at']) - strtotime($a['created_at']);
                } else {
                    return strtotime($a['created_at']) - strtotime($b['created_at']);
                }
            });
        }

        // Pagination
        $page = $request->input('page', 1);
        $perPage = 10;
        $total = count($feedbacks);
        $feedbacks = array_slice($feedbacks, ($page - 1) * $perPage, $perPage);

        return view('admin.feedback', compact('feedbacks', 'page', 'perPage', 'total'));
    }

    public function show($id)
    {
        $ref = $this->database->getReference('feedback/' . $id);
        $snapshot = $ref->getSnapshot();
        if (!$snapshot->exists()) {
            Alert::error('Error', 'Feedback not found.');
            return redirect()->route('admin.feedback')->with('error', 'Feedback not found.');
        } else {
            $feedback = $snapshot->getValue();
            return view('admin.feedback-show', compact('feedback'));
        }
    }

    public function markAsRead($id)
    {
        $ref = $this->database->getReference('feedback/' . $id);
        $snapshot = $ref->getSnapshot();
        if (!$snapshot->exists()) {
            Alert::error('Error', 'Feedback not found.');
            return redirect()->route('admin.feedback')->with('error', 'Feedback not found.');
        } else {
            $ref->update(['status' => 'read']);
            Alert::success('Success', 'Feedback marked as read.');
            return redirect()->route('admin.feedback')->with('success', 'Feedback marked as read.');
        }
    }

    public function archive($id)
    {
        $ref = $this->database->getReference('feedback/' . $id);
        $snapshot = $ref->getSnapshot();
        if (!$snapshot->exists()) {
            Alert::error('Error', 'Feedback not found.');
            return redirect()->route('admin.feedback')->with('error', 'Feedback not found.');
        } else {
            $ref->update(['status' => 'archived']);
            Alert::success('Success', 'Feedback archived.');
            return redirect()->route('admin.feedback')->with('success', 'Feedback archived.');
        }
    }

    public function destroy($id)
    {
        $ref = $this->database->getReference('feedback/' . $id);
        $snapshot = $ref->getSnapshot();
        if (!$snapshot->exists()) {
            Alert::error('Error', 'Feedback not found.');
            return redirect()->route('admin.feedback')->with('error', 'Feedback not found.');
        } else {
            $ref->remove();
            Alert::success('Success', 'Feedback deleted.');
            return redirect()->route('admin.feedback')->with('success', 'Feedback deleted.');
        }
    }
}
