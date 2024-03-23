jQuery(document).ready(function ($) {
  // Function to handle product selection
  function handleProductSelection(productId, productTitle) {
    // You can perform any additional actions here, such as adding the selected product to a list
    // For demonstration purposes, let's just log the selected product title and ID
    console.log("Selected product ID: " + productId);
    console.log("Selected product title: " + productTitle);
  }

  // Variables for debouncing search input
  var searchTimer;
  var debounceDelay = 300; // milliseconds

  // Event listener for keyup event on search input
  $("#bought_together_search").on("input", function () {
    var searchTerm = $(this).val().trim();

    // Check if the search term has reached the minimum length
    if (searchTerm.length >= 3) {
      // Adjusted the minimum length to 3 characters
      clearTimeout(searchTimer);
      // Debounce the search input to prevent frequent AJAX requests
      searchTimer = setTimeout(function () {
        searchProducts(searchTerm);
      }, debounceDelay);
    } else {
      // Clear the search results if the search term is less than 3 characters
      $("#bought_together_search_results").empty();
    }
  });

  // Function to perform product search
  function searchProducts(searchTerm) {
    $.ajax({
      url: ajax_params.ajax_url,
      type: "POST",
      data: {
        action: "search_products",
        search_term: searchTerm,
        security: ajax_params.search_nonce, // You need to add a security nonce here
      },
      beforeSend: function () {
        // Display a loading spinner or message while waiting for search results
        $("#bought_together_search_results").html("<p>Loading...</p>");
      },
      success: function (response) {
        $("#bought_together_search_results").html(response);
        // Update the data-product-id attribute for each result item
        $("#bought_together_search_results p").each(function (index) {
          $(this).attr("data-product-id", index + 1);
        });
      },
      error: function (xhr, status, error) {
        console.error(status + ": " + error);
      },
    });
  }

  // Clear button functionality
  $("#clear_search").click(function () {
    $("#bought_together_search").val("").focus();
    $("#bought_together_search_results").empty();
  });

  // Event delegation for dynamically added checkboxes (product selection)
  $("#bought_together_search_results").on(
    "change",
    ".product-checkbox",
    function () {
      // Get the selected product ID and title
      var productId = $(this).val();
      var productTitle = $(this).siblings("label").text().trim();
      // Call function to handle the product selection
      handleProductSelection(productId, productTitle);
      // Update selected products (send to server)
      updateSelectedProducts();
    }
  );

  // Function to update selected products
  function updateSelectedProducts() {
    // Get an array of selected product IDs
    var selectedProducts = $(".product-checkbox:checked")
      .map(function () {
        return $(this).val();
      })
      .get();
    // Send the selected product IDs to the server to save
    $.ajax({
      url: ajax_params.ajax_url,
      type: "POST",
      data: {
        action: "save_selected_products",
        current_product_id: ajax_params.current_product_id, // Send the current product ID
        selected_products: selectedProducts,
        security: ajax_params.search_nonce, // You need to add a security nonce here
      },
      success: function (response) {
        console.log("Selected products saved successfully.");
      },
      error: function (xhr, status, error) {
        console.error(status + ": " + error);
      },
    });
  }
});



