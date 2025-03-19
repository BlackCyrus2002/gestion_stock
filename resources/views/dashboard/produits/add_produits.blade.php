@section('title', 'Ajouter un produit')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ajouter un produit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Ajouter un produit</h2>

                    <form action="{{ route('dashboard.commandes.add_produits') }}" method="POST" class="space-y-4">
                        @csrf
                        <!-- Nom -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="nom" class="block text-sm font-medium text-gray-700">Nom du
                                    produit</label>
                                <input type="text" id="nom" name="nom" required
                                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2.5">
                                @error('nom')
                                    {{ $message }}
                                @enderror
                            </div>

                            <!-- Code Barre -->


                            <div>
                                <label for="code_barre" class="block text-sm font-medium text-gray-700">Code
                                    Barre</label>
                                <input type="text" id="code_barre" name="code_barre" required
                                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2.5">
                                @error('code_barre')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>


                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description" name="description" rows="3" required
                                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2.5"></textarea>
                            @error('description')
                                {{ $message }}
                            @enderror
                        </div>

                        <!-- Prix Achat & Prix Vente -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="prix_achat" class="block text-sm font-medium text-gray-700">Prix
                                    d'achat</label>
                                <input type="number" id="prix_achat" name="prix_achat" required
                                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2.5">
                                @error('prix_achat')
                                    {{ $message }}
                                @enderror
                            </div>

                            <div>
                                <label for="prix_vente" class="block text-sm font-medium text-gray-700">Prix de
                                    vente</label>
                                <input type="number" id="prix_vente" name="prix_vente" required
                                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2.5">
                                @error('prix_vente')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <!-- Quantité Stock & Seuil Alerte -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="quantite_stock" class="block text-sm font-medium text-gray-700">Quantité en
                                    stock</label>
                                <input type="number" id="quantite_stock" name="quantite_stock" required
                                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2.5">
                                @error('quantite_stock')
                                    {{ $message }}
                                @enderror
                            </div>

                            <div>
                                <label for="seuil_alerte" class="block text-sm font-medium text-gray-700">Seuil
                                    d'alerte</label>
                                <input type="number" id="seuil_alerte" name="seuil_alerte" required
                                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2.5">
                                @error('seuil_alerte')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <!-- Catégorie -->
                        <div>
                            <label for="categorie_id" class="block text-sm font-medium text-gray-700">Catégorie</label>
                            <select id="categorie_id" name="categorie_id" required
                                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2.5">
                                <option value="">Sélectionner une catégorie</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                @endforeach
                            </select>
                            @error('categorie_id')
                                {{ $message }}
                            @enderror
                        </div>

                        <!-- Fournisseur -->
                        <div>
                            <label for="fournisseur_id"
                                class="block text-sm font-medium text-gray-700">Fournisseur</label>
                            <select id="fournisseur_id" name="fournisseur_id" required
                                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2.5">
                                <option value="">Sélectionner un fournisseur</option>
                                @foreach ($fournisseurs as $fournisseur)
                                    <option value="{{ $fournisseur->id }}">{{ $fournisseur->nom }}</option>
                                @endforeach
                            </select>
                            @error('fournisseur_id')
                                {{ $message }}
                            @enderror
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                Ajouter le produit
                            </button>
                        </div>

                    </form>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
