    <x-master-layout>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-4">
            <h1 class="text-center">Tous nos produits</h1>
            <hr/>
        </div>
           <div class="row">
            <div class="col-md-12">
             <table class="table">
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
                   <td>{{$produit->prix}}</td>
                   <td>{{$produit->description}}</td>
                   <td>{{$produit->category ? $produit->category->libelle : "non categorisé"}}</td>
                  <td>
                  <a href="#" class="btn btn-primary btn-sm mr-2" ><i class="fas fa-edit    "></i></a>
                  <a href="#" class="btn btn-danger btn-sm " ><i class="fas fa-trash"></i>
                                    </a>
                  </td>
                 </tr>
                 <tr>
                   <td scope="row"></td>
                   <td></td>
                   <td></td>
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
