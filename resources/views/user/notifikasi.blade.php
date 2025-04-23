@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Notifikasi Kamu</h2>

    @if($notifications->isEmpty())
        <div class="text-gray-600">Kamu belum punya notifikasi.</div>
    @else
        <ul class="space-y-4">
            @foreach($notifications as $notification)
                <li class="bg-white p-4 rounded shadow">
                    {{ $notification->data['message'] ?? 'Notifikasi baru' }}
                    <div class="text-sm text-gray-400">{{ $notification->created_at->diffForHumans() }}</div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
