@extends('layouts.app')
@section('dashboard.admin')

<div class="container mx-auto px-4 py-6">
    <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden border border-gray-700">
        <div class="bg-gradient-to-r from-purple-600 to-indigo-800 px-6 py-4">
            <h3 class="text-xl font-bold text-white">Reports Feedback</h3>
        </div>
        
        <div class="p-6 bg-gray-900">
            @if(session('success'))
                <div class="bg-green-900 border-l-4 border-green-500 text-green-300 p-4 mb-4 rounded">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if(count($reports ?? []) > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-800">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Announcement Title</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Announcement Owner</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Message</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-800 divide-y divide-gray-700">
                            @foreach($reports as $report)
                                <tr class="hover:bg-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                        <a href="/annonceDetails/{{$report->annonce->id}}">{{ $report->annonce->title ?? 'N/A' }}</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $report->annonce->user->name ?? 'Unknown' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ Str::limit($report->message, 50) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $report->created_at->format('Y-m-d H:i') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="" class="inline-flex items-center px-3 py-1 bg-blue-900 text-blue-200 rounded-md hover:bg-blue-800 mr-2">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            View
                                        </a>
                                        <a href="" class="inline-flex items-center px-3 py-1 bg-purple-900 text-purple-200 rounded-md hover:bg-purple-800">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="bg-gray-800 border-l-4 border-blue-500 text-blue-300 p-4 rounded">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-gray-300">No reports found.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>


@endsection