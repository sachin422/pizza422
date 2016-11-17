function loadVendorCategories(callback) {

    var load_parent = callback;

    $('#vendors-drop-down').actionAjax({

        url: base_url + '/vendor/categories',
        method: 'get',
        before: function (config) {
            config.data = {'vendor': $('#vendors-drop-down').val()};
        },
        trigger: false,
        debug: true,
        container: null,
        success: function (o) {

            if (typeof o === 'object') {
                var dom = '<option>-- select product type --</option>';
                for (var index in o) {

                    var selected = old_product_type == o[index].id ? 'selected' : '';

                    dom += '<option value="' + o[index].id + '" ' + selected + '>' + o[index].title + '</option>';
                }

                $('#top-level-category').html(dom);
            }

            if (typeof load_parent === 'function') {
                load_parent();
            }


        }

    });


}

function loadProductCategories() {

   // var product_type = typeof type !== 'undefined' ? type : $('#top-level-category').val();

    //$('#top-level-category').actionAjax({
    $('#vendors-drop-down').actionAjax({
        url: base_url + '/product/category/product-categories',
        method: 'get',
        before: function (config) {
            config.data = {'vendor': $('#vendors-drop-down').val()};
        },
        trigger: false,
        debug: true,
        container: null,
        success: function (o) {

            if (typeof o === 'object') {
                var dom = '<option>-- select product category --</option>';
                for (var index in o) {

                    var selected = old_product_category == o[index].id ? 'selected' : '';
                    dom += '<option value="' + o[index].id + '" ' + selected + ' >' + o[index].title + '</option>';
                }

                $('#product-categories').html(dom);
            }

           

        }
    });
}