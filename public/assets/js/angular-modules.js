'use strict';

/* App Module */

var pizza = angular.module('pizza', [
    'ngRoute',
    'angular-loading-bar'
]);



/* Controllers */



pizza.controller('categoryController', ['$scope', '$http', '$location',
    function($scope, $http, $location) {

        $('.vendor-top-categories').removeClass('top-level-category-active');

        var currentCategory = $location.path();
        currentCategory = currentCategory.replace('/', '');


        var cat_id = 1;

        for (var index in top_level_categories) {
            if (top_level_categories[index]['slug'] === currentCategory) {
                cat_id = top_level_categories[index]['id'];
            }
        }

        $scope.multi_level_categories = 'yes';

        $http.get(base_url + '/site/vendor?category_id=' + cat_id).success(function(data) {
            // add active class


            $scope.vendors = data.vendors;
            $scope.is_single = data.is_single;
            $scope.vendor_categories = data.vendor_categories;
            $scope.category_slug = currentCategory;
            $scope.has_multi_level = (data.is_single === true && data.vendors.length && data.vendors[0].multi_level_categories) ?  true : false;

            if (data.vendors.length <= 0) {
                $(document).find(".ng-empty-alert").removeClass('hidden');
            }

            console.log("Vendors length: " + data.vendors.length);
            console.log("Vendors category length: " + data.vendor_categories.length);

            $("."+currentCategory).parent('li').addClass('top-level-category-active');

        });



        // $scope.vendorConfig = 'id';

    }]);

pizza.controller('multiLevelCategoryController', ['$scope', '$http', '$routeParams',
    function($scope, $http, $routeParams) {

        $http.get(base_url + '/site/vendor/screen/' + $routeParams.vendor_slug).success(function(data) {
            // add active class
            $scope.vendor_categories = data.vendor_categories;
            $scope.vendor_slug = $routeParams.vendor_slug;
            $scope.currentCategory = data.currentCategory;

            if (data.vendor_categories.length <= 0) {
                $(document).find(".ng-empty-alert").removeClass('hidden');
            }

        });

}]);

pizza.controller('vendorController', ['$scope', '$http', '$routeParams',
    function($scope, $http) {

        $http.get(base_url + '/site/vendor/screen/' + $routeParams.slug);


    }]);

pizza.controller('productController', ['$scope', '$http', '$routeParams',
    function($scope, $http, $routeParams) {

        $scope.main = {
            page: 1
        };

        $scope.loadPage = function() {
            // You could use Restangular here with a route resource.
            $http.get(base_url + '/site/vendor/products?category=' + current_category + '&product_category=' + $routeParams.category + '&vendor=' + current_vendor + '&page=' + $scope.main.page).success(function(data){

                // number of pages of users
                $scope.main.pages = data.pages;
                $scope.products = data.products;

                if (data.products.length <= 0) {
                    $(document).find(".ng-empty-alert").removeClass('hidden');
                }

                $scope.productCategory = data.category;

            });
        };

        //$scope.vendor = current_vendor_name;
        $scope.category = current_category_name;

        //$scope.product_category = current_product_category_name;
        $(".product-cat-item").parent('li').removeClass('active');
        $("."+$routeParams.category).parent('li').addClass('active');


        $scope.nextPage = function() {
            if ($scope.main.page < $scope.main.pages) {
                $scope.main.page++;
                $scope.loadPage();
            }
        };

        $scope.previousPage = function() {
            if ($scope.main.page > 1) {
                $scope.main.page--;
                $scope.loadPage();
            }
        };

        $scope.loadPage();

    }]);