@extends('layouts.company')
@section('dashboard.company')
<div class="container mx-auto p-4 bg-gray-900 text-gray-200">
    <h2 class="text-2xl font-bold mb-4 text-white">📊 Rapport annonce</h2>
    @if(session('success'))
      <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div class="ms-3 text-sm font-medium">
          Success! your status has been changed successfully.
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
          <span class="sr-only">Dismiss</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
        </button>
    </div>
    @endif
    <table class="min-w-full bg-gray-800 border border-gray-700 rounded-md shadow-sm">
        <thead>
            <tr class="bg-gray-700 text-left">
                <th class="py-2 px-4 border-b border-gray-600">Date</th>
                <th class="py-2 px-4 border-b border-gray-600">Annonce</th>
                <th class="py-2 px-4 border-b border-gray-600">Prix</th>
                <th class="py-2 px-4 border-b border-gray-600">Client</th>
                <th class="py-2 px-4 border-b border-gray-600">Status</th>
                <th class="py-2 px-4 border-b border-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($annonces as $annonce)
                @php
                $user = \App\Models\User::find($annonce->user_id);
                @endphp
                    <tr class="border-b border-gray-700 hover:bg-gray-700">
                        <td class="py-2 px-4">{{$annonce->created_at }}</td>
                        <td class="py-2 px-4">{{ $annonce->title }}</td>
                        <td class="py-2 px-4">{{ number_format($annonce->price, 2) }} USD</td>
                        <td class="py-2 px-4">{{ $user->name ?? 'N/A' }}</td>
                        <td class="py-2 px-4">
                            @if ($annonce->status == 'succeeded')
                                <span class="text-green-400">Succeeded</span>
                            @elseif ($annonce->status == 'pending')
                                <span class="text-yellow-400 cursor-pointer"><a href="billing/{{$annonce->id}}">Pending</a></span> 
                            @elseif ($annonce->status == 'failed')
                                <span class="text-red-400">Failed</span>
                            @endif
                        </td>
                        <td class="py-2 px-4"><a href="" class="text-blue-400 hover:text-blue-300">Edit</a></td>
                    </tr>
                    @if ($annonce->status == 'succeeded')
                        @php $total += $annonce->price; @endphp
                    @endif
            @endforeach 
        </tbody>
        <tfoot>
            <tr class="bg-gray-700 font-bold">
                <td colspan="3" class="py-2 px-4 text-right">Total</td>
                <td class="py-2 px-4">{{ number_format($total, 2) }} USD</td>
                <td colspan="3"></td>
            </tr>
        </tfoot>
    </table>
</div>

@endsection