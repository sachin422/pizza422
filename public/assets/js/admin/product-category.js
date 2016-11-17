
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

                    var selected = old_type_id == o[index].id ? 'selected' : '';

                    dom += '<option value="' + o[index].id + '" ' + selected + '>'+ o[index].title +'</option>';
                }

                $('#top-level-category').html(dom);
            }

            if (typeof load_parent === 'function') {
                load_parent();
            }

        }

    });
}

function loadParentCategories() {

    //var product_type = typeof type !== 'undefined' ? type : $('#top-level-category').val();
    //var product_type = typeof type !== 'undefined' ? type : $('#vendors-drop-down').val();


    $('#parent-categories').actionAjax({
        url: base_url + '/product/category/product-parent-categories',
        method: 'get',
        before: function (config) {
            config.data = {'vendor': $('#vendors-drop-down').val()};
        },
        trigger: false,
        debug: true,
        container: null,
        success: function (o) {
            if (typeof o === 'object') {

                $('#parent-category-div').slideDown();
                var dom = '<option value="0">-- select parent category --</option>';
                for (var index in o) {
                    var selected = old_parent_category == o[index].id ? 'selected' : '';
                    dom += '<option value="' + o[index].id + '" ' + selected + ' >' + o[index].title + '</option>';
                }
                $('#parent-categories').html(dom);
            }
            else {
                $('#parent-category-div').slideUp();

            }

        }
    });
}