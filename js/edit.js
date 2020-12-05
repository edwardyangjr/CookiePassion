
$(document).ready(function () {
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });
    $('#editModal').modal('hide');
    $(".shop-item-edit-button").each(function () {
        $(this).click(function () {
            $('#editModal').modal('show');
            $('#editModal').attr('data-id', $(this).data('id'));
            $('#editModal').find('.modal-title').text('Edit for ID ' + $(this).data('id'))
            $('#editModal').find('#cookie-name').val($(this).data('name'))
            $('#editModal').find('#description-text').val($(this).data('description'))
            $('#editModal').find('#price-text').val($(this).data('price'))
            $('#editModal').find('#inventory-num').val($(this).data('inventory'))
            $('#editModal').find('#ingredients-text').val($(this).data('ingredients'))
            $('#editModal').find('#imageLocation-text').val($(this).data('imagelocation'))
            $('#editModal').find('#del-num').val($(this).data('del'))
        });
    });
    $('#editDoneButton').click(function () {
        if ($('#editModal').data('id') == "new") {
            $.post("lib/getProjectBrowse.php",
                {
                    action: "addCookie",
                    cookieName: $('#editModal').find('#cookie-name').val(),
                    description: $('#editModal').find('#description-text').val(),
                    price: $('#editModal').find('#price-text').val(),
                    inventory: $('#editModal').find('#inventory-num').val(),
                    ingredients: $('#editModal').find('#ingredients-text').val(),
                    imageLocation: $('#editModal').find('#imageLocation-text').val(),
                    del: $('#editModal').find('#del-num').val()
                },
                function (data, status) {
                    alert("Add: " + status);
                    location.reload();
                });
        }
        else {
            $.post("lib/getProjectBrowse.php",
                {
                    action: "updateCookie",
                    cookieName: $('#editModal').find('#cookie-name').val(),
                    description: $('#editModal').find('#description-text').val(),
                    price: $('#editModal').find('#price-text').val(),
                    inventory: $('#editModal').find('#inventory-num').val(),
                    ingredients: $('#editModal').find('#ingredients-text').val(),
                    imageLocation: $('#editModal').find('#imageLocation-text').val(),
                    del: $('#editModal').find('#del-num').val(),
                    id: $('#editModal').data('id')
                },
                function (data, status) {
                    alert("Update: " + status);
                    location.reload();
                });
        }
    });
});