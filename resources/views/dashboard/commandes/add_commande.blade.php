<div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Ajouter une nouvelle commande
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="static-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ route('dashboard.commandes.add_commande') }}" method="POST" class="space-y-4 p-5">
                    @csrf

                    <!-- Sélection du client -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="client_id" class="block text-sm font-medium text-gray-700">
                                Choisir un client
                            </label>
                            <select id="client_id" name="client_id" required
                                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2.5">
                                <option value="">Sélectionner un client</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                @endforeach
                            </select>
                            @error('client_id')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Sélection des produits -->
                    <div>

                        <label for="produit-select">Sélectionnez un/des produit(s) :</label>
                        <select id="produit-select" name="produit-select[]" multiple
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2.5">
                            <option value="">Selectionner les produits</option>
                            @foreach ($produits as $produit)
                                <option value="{{ $produit->id }}" data-nom="{{ $produit->nom }}"
                                    data-prix="{{ $produit->prix_vente }}">
                                    {{ $produit->nom }}
                                </option>
                            @endforeach
                        </select>


                    </div>


                    <!-- Liste des produits sélectionnés -->
                    <div id="produits-list">
                        <!-- Les produits sélectionnés s'ajouteront ici -->
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            Ajouter la commande
                        </button>
                    </div>

                </form>

                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                    <button data-modal-hide="static-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initialiser Tom Select pour le select multiple
            const produitSelect = new TomSelect("#produit-select", {
                plugins: ['remove_button'], // Ajoute un bouton pour supprimer une sélection
                persist: false, //Empêche la sauvegarde des valeurs après rafraîchissement
                createOnBlur: true, // Permet d'ajouter un nouvel élément si besoin
                create: true, // Désactive la création manuelle d'options

            });

            const produitsList = document.getElementById("produits-list");

            // Écouter les changements du select
            produitSelect.on("change", function(values) {
                produitsList.innerHTML = ""; // Réinitialiser la liste des produits sélectionnés

                values.forEach(produitId => {
                    const option = document.querySelector(
                        `#produit-select option[value="${produitId}"]`);
                    const produitNom = option.getAttribute("data-nom");
                    const prix = option.getAttribute("data-prix");

                    const produitIndex = document.querySelectorAll("#produits-list > div").length;

                    const produitHtml = `
                <div id="produit-${produitId}" class="p-2 border rounded-md mt-2 bg-gray-100">
                    <input type="hidden" name="produits[${produitIndex}][id]" value="${produitId}">

                    <div class="flex justify-between items-center">
                        <label><strong>${produitNom}</strong></label>
                        <button type="button" onclick="removeProduit('${produitId}')" 
                            class="bg-red-500 text-white px-2 py-1 rounded">X</button>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mt-2">
                        <div>
                            <input type="number" name="produits[${produitIndex}][quantite]" placeholder="Quantité"
                                min="1" required class="border-gray-300 rounded-lg p-2.5 w-full">
                        </div>

                        <div>
                            <input type="number" name="produits[${produitIndex}][prix_unitaire]" placeholder="Prix Unitaire"
                                value="${prix}" required class="border-gray-300 rounded-lg p-2.5 w-full">
                        </div>    
                    </div>
                </div>
            `;

                    produitsList.insertAdjacentHTML("beforeend", produitHtml);
                });
            });
        });

        // Fonction pour retirer un produit sélectionné
        function removeProduit(produitId) {
            const produitElement = document.getElementById(`produit-${produitId}`);
            if (produitElement) {
                produitElement.remove();
            }

            // Retirer également du Tom Select
            const select = document.querySelector("#produit-select").tomselect;
            select.removeItem(produitId);
        }
    </script>
