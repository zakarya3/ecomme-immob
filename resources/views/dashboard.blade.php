<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold">Immobilliers</h3>
                        <a href="{{ route('dashboard.decorator.create') }}"
                            class="px-4 py-2 text-white hover:bg-indigo-700 rounded-md shadow-md"
                            style="background-color: #5a67d8;">
                            Ajouter une immobillier
                        </a>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200 w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">
                                    Nom</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">
                                    Categorie</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">
                                    Prix</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">
                                        Quantité</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($decorators as $decorator)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">{{ $decorator->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">{{ $decorator->category }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">{{ number_format($decorator->price) }} DH</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">{{ $decorator->quantity }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex justify-center space-x-3">
                                            <a href="{{ route('dashboard.decorator.edit', $decorator->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>

                                            <form action="{{ route('dashboard.decorator.destroy', $decorator->id) }}"
                                                method="POST" onsubmit="return confirm('Are you sure?')"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $decorators->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold">commandes</h3>
                </div>
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">
                                Immobillier Name</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">
                                Client</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">
                                Email</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">
                                Téléphone</th>
                            <th class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($commands as $command)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-center">{{ $command->panels->decorators->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">{{ $command->client_name }} </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    {{ $command->client_email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">{{ $command->client_phone }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex justify-center space-x-3">
                                        @if ($command->status == 'pending')
                                            <form
                                                action="{{ route('dashboard.command.updateStatus', ['id' => $command->id, 'status' => 'approved']) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="px-4 py-2 text-white hover:bg-indigo-700 rounded-md shadow-md"
                                                    style="background-color: #00ff00c9; margin: 0 1rem;">
                                                    Accepter
                                                </button>
                                            </form>
                                            <form
                                                action="{{ route('dashboard.command.updateStatus', ['id' => $command->id, 'status' => 'rejected']) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="px-4 py-2 text-white hover:bg-indigo-700 rounded-md shadow-md"
                                                    style="background-color: #ff0000;">
                                                    Rejeter
                                                </button>
                                            </form>
                                        @elseif ($command->status == 'approved')
                                            <span class="text-green-600">Accepté</span>
                                        @elseif ($command->status == 'rejected')
                                            <span class="text-red-600">Rejeté</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $commands->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
