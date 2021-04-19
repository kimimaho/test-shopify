    <x-master-layout title=" | Catalogue">
    <div class="container">
      <div class="row px-0 mx-0">

        <div class="col-md-12 mt-4 px-0">
            <h1 class="text-center">Tous nos produits</h1>
            <hr/>
        </div>
           <div class="row mx-0 px-0">
            <div class="col-md-12">
            @if(session('statut'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>
                  {{ session("statut") }}


            </strong>
            </div>

            <script>
              $(".alert").alert();
            </script>

            @endif

            <div>
                <a href="{{ route("produits.create") }}" class="btn btn-success btn-sm mr-4"><i class="fas fa-plus" aria-hidden="true"></i>Ajouter</a>
                <a href="{{ route("produitsExport") }}" class="btn btn-primary btn-sm mr-2"><i class="fas fa-download" aria-hidden="true"></i>Exporter</a>
            </div>

             <table class="table table-striped ">

               <thead>
                 <tr>
                   <th>Designation</th>
                   <th>Prix</th>
                   <th>Description</th>
                   <th>Cathegory</th>
                   <th>Action</th>

                 </tr>
               </thead>
               <tbody>
                 @foreach($produits as $produit)
                   <tr>
                   <td scope="row">{{$produit->designation}} </td>
                   <td>{{formatPrixBf($produit->prix)}}</td>
                   <td>{{$produit->description}}</td>
                   <td>{{$produit->category ? $produit->category->libelle : "non categorisé"}}</td>
                  <td>
                  <a href="{{ route("produits.edit",$produit) }}" class="btn btn-primary btn-sm mr-2" ><i class="fas fa-edit    "></i></a>
                  <a href="#" class="btn btn-danger btn-sm" onClick="suppressionConfirm('{{ $produit->id }}')"><i class="fas fa-trash    "></i></a>

                  <form id="{{ $produit->id }}" method="post" action="{{ route("produits.destroy", $produit->id) }}">
                      @csrf
                      @method("DELETE")

                  </form>

                </td>
                 </tr>

                 @endforeach
               </tbody>
             </table>
             <div class="mt-5 text-center d-flex justify-content-center">
             {{ $produits->links()}}
              </div>
           </div>

           </div>

      </div>

    </div>
    </x-master-layout>
