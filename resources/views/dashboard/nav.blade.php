<div class="flex justify-center items-center gap-4 mb-5 mx-5">
    <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white py-2 px-3 rounded-md hover:bg-blue-800 ">
        Nos produit</a>

    <button type="button" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
        class="bg-black text-white py-2 px-3 rounded-md hover:bg-gray-300 hover:text-black">Ajouter
        une catégorie
    </button>
    <a href="{{ route('dashboard.clients') }}" class="bg-green-600 text-white py-2 px-3 rounded-md hover:bg-green-800 ">
        Nos clients
    </a>
    @include('dashboard.add_categorie')
</div>
