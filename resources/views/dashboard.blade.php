@section('title', 'Tableau de bord')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Produits
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" py-5 bg-white">
                    @include('dashboard.nav')

                    <form class="max-w-md mx-auto">
                        <label for="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nom du produits, Fournisseurs..." required />
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Chercher</button>
                        </div>
                    </form>
                    <div class="flex justify-end mr-5">
                        <a href="{{ route('dashboard.commandes.add_produits') }}"
                            class="bg-blue-600 text-white py-2 px-3 rounded-md hover:bg-blue-800 ">Ajouter
                            un nouveau produit
                        </a>
                    </div>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nom du produit
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Code bare
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Prix d'achat
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Prix de vente
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Quantité en stock
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Seuil d'alerte
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date d'ajout
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Catégorie
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fournisseur
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produits as $produit)
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                    <td class="px-6 py-4">
                                        {{ $produit->id }}
                                    </td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $produit->nom }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $produit->code_barre }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $produit->prix_achat }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $produit->prix_vente }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $produit->quantite_stock }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $produit->seuil_alerte }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $produit->created_at->format('d-m-Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $produit->categorie->nom }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $produit->fournisseur->nom }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifier</a>
                                        <a href="#"
                                            class="font-medium text-red-600 dark:text-blue-500 hover:underline">Supprimer</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="m-5">
                        {{ $produits->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
