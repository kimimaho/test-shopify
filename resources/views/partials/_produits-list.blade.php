<table class="table table-striped ">

    <thead>
      <tr>
        <th>Designation</th>
        <th>Prix</th>
        <th>Description</th>
        <th>Cathegory</th>

      </tr>
    </thead>
    <tbody>
      @foreach($produits as $produit)
        <tr>
        <td scope="row">{{$produit->designation}} </td>
        <td>{{formatPrixBf($produit->prix)}}</td>
        <td>{{$produit->description}}</td>
        <td>{{$produit->category ? $produit->category->libelle : "non categorisé"}}</td>

      </tr>

      @endforeach
    </tbody>
  </table>
