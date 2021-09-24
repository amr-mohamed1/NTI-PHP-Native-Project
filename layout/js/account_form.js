$("document").ready(function () {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
      

      $('.modal').on('shown.bs.modal', function () {
        $('.modal').trigger('focus')
      })
})

