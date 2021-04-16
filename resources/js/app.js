require('./bootstrap');

require('alpinejs');

import Swal from "sweetalert2";
window.suppressionConfirm=function(formId){

    Swal.fire({
        title: 'Attention! Sppression de produit',
        text: "êtes-cous sûr de vouloir supprimer ce produit?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, supprmer!',
        cancelButtontext: 'Annule'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById(formId).submit();
        }
      })

}
