$(document).ready(function() {

    $('#subscribe-form').submit(function(e){
      var form = $(this);

      form.find('button').prop('disabled', true);

      Stripe.card.createToken(form, function(status, response) {
        if (response.error){
          form.find('.stripe-errors').text(response.error.message).addClass('alert alert-danger');
          form.find('button').prop('disabled', false);
        }else{
          console.log(response);
          form.append($('<input type="hidden" name="cc_token">').val(response.id));
          form.get(0).submit();
        }
      });

      e.preventDefault();
    });
});
