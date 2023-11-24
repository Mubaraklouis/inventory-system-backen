import Swal from 'sweetalert2'

export  function  useAlert(title ,text, icon ){
   const Alert = Swal.fire({
        title: 'Error!',
        text: 'Do you want to continue',
        icon: 'error',
        confirmButtonText: 'confirm'
    })
    let isConfirm = Swal.isConfirmed
    return {
       Alert,
        isConfirmed
    }
}

