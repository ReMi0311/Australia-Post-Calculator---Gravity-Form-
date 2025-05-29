jQuery(document).ready(function ($) {
  const countryField = $('select[name="input_4.6"]'); // Country dropdown
  const totalField = $('#input_14'); // Total field
  const shippingField = $('<div id="shipping-cost-display" style="margin: 10px 0; font-weight: bold;">Shipping: $0.00</div>');
  totalField.before(shippingField); // Add shipping display above the total field

  const basePrice = parseFloat(AusPostGF.basePrice);

  function updateShipping(cost) {
    $('#shipping-cost-display').text(`Shipping: $${cost.toFixed(2)}`);
  }

  countryField.on('change', function () {
    const country = $(this).val().trim();

    if (country.toLowerCase() === 'australia') {
      updateShipping(0);
      totalField.val(`$${basePrice.toFixed(2)}`);
    } else {
      $.get(`${AusPostGF.ajaxUrl}?action=get_auspost_shipping&country=${country}&weight=0.5`, function (data) {
        const shipping = parseFloat(data.shipping_cost);
        const total = basePrice + shipping;
        updateShipping(shipping);
        totalField.val(`$${total.toFixed(2)}`);
      }).fail(function () {
        updateShipping(0);
        totalField.val(`$${basePrice.toFixed(2)} (Shipping Error)`);
      });
    }
  });
});
