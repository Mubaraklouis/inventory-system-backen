import Swal from 'sweetalert2'

export  function  useAlert(title ,text, icon ){
   const Alert = Swal.fire({
        title: 'warning!',
        text: 'Do you want to continue',
        icon: 'warning',
        confirmButtonText: 'confirm'
    })
    let isConfirm = Swal.isConfirmed
    return {
       Alert,
        isConfirmed
    }
}

