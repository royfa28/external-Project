var app = angular.module('myApp', []);

app.controller('MenuItemController', function ($scope, $http) {

  angular.element(document).ready(function () {
    $scope.URL = 'http://ec2-3-14-6-238.us-east-2.compute.amazonaws.com:3000';

    $scope.menus = [];
    $scope.getMenus();

    $scope.menuTypes = [];
    $scope.getMenuTypes();

    $scope.meatTypes = [];
    $scope.getMeatTypes();
  });

  $scope.getMenus = function(){
    $http.get($scope.URL + "/api/menus/get/all")
    .then(function mySuccess(response) {
        $scope.menus = response.data.data;
        //console.log($scope.menus);
    }, function myError(response) {
        alert("Failed to get menu");
    });
  }

  $scope.getMenuTypes = function(){
    $http.get($scope.URL + "/api/menus/get/all/menuType")
    .then(function mySuccess(response) {
        $scope.menuTypes = response.data.data;
        //console.log($scope.menuTypes);
    }, function myError(response) {
        alert("Failed to get menu type");
    });
  }

  $scope.getMeatTypes = function(){
    $http.get($scope.URL + "/api/menus/get/all/meatType")
    .then(function mySuccess(response) {
        $scope.meatTypes = response.data.data;
        //console.log($scope.menus);
    }, function myError(response) {
        alert("Failed to get meat types");
    });
  }

  // add order 
  $scope.addNewMenuItem = function(name, description, price, menuTypeID){
    $http.post($scope.URL + "/api/menus/addNew",{
      name: name,
      description: description,
      //pictureName: null,
      price: price,
      isAvailable: 1,
      isSelectMeatChoice: 0,
      menuTypeId: menuTypeID
    })
    .then(function mySuccess(response) {
      //console.log(response);
      alert( name + " has been added");
      $scope.getMenus();
    }, function myError(response) {
        console.log(response);
      alert("Failed to add new menu.");
    });
  }

//ADD NEW MEAT TYPE
  $scope.addNewMeat = function(meatName){
      console.log(meatName);
    $http.post($scope.URL + "/api/menus/addNew/meatType",{
      name: meatName
    })
    .then(function mySuccess(response) {
      alert( meatName + " has been added");
      $scope.getMeatTypes();
    }, function myError(response) {
      console.log(response);
      alert("Failed to add new meat type.");
    });
  }

//ADD NEW MENU TYPE
  $scope.addNewMenuType = function(newTypeName){
    console.log(newTypeName);
    $http.post($scope.URL + "/api/menus/addNew/menuType",{
      name: newTypeName
    })
    .then(function mySuccess(response) {
      alert( newTypeName + " has been added");
      $scope.getMenuTypes();
    }, function myError(response) {
      console.log(response);
      alert("Failed to add new menu type.");
    });
  }

  $scope.changeAvailability = function(menuID, menuName, menuDescription, menuPicture, menuPrice, availability, menuMeat, menuType){
    $http.put($scope.URL + "/api/menus/update",{
      id: menuID,
      name: menuName,
      description: menuDescription,
      pictureName: menuPicture,
      price: menuPrice,
      isAvailable: availability,
      isSelectMeatChoice: menuMeat,
      menuTypeId: menuType
    })
    .then(function mySuccess(response) {
      $scope.getMenus();
      console.log(response);
    }, function myError(response) {
      console.log(response);
      alert("failed to change availabilty");
    });
  }
  

  //delete
  $scope.deleteMenuItem = function(menuItemID){
    console.log(menuItemID);
    $http.delete($scope.URL + "/api/menus/delete/" + menuItemID)
    .then(function mySuccess(response) {
      alert("menu item has been deleted");
      $scope.getMenus();
    }, function myError(response) {
      console.log(response);
    });
  }

//DELETE MENUTYPE
  $scope.deleteMenuType = function(menuTypeID){
    $http.delete($scope.URL + "/api/menus/delete/menuType/" + menuTypeID)
    .then(function mySuccess(response) {
      alert("menu Type has been deleted");
      $scope.getMenuTypes();
    }, function myError(response) {
      console.log(response);
    });
  }

//DELETE MEATTYPE
  $scope.deleteMeatType = function(meatTypeID){
      console.log(meatTypeID);
    $http.delete($scope.URL + "/api/menus/delete/meatType/" + meatTypeID)
    .then(function mySuccess(response) {
      alert("meat Type has been deleted");
      $scope.getMeatTypes();
    }, function myError(response) {
      console.log(response);
    });
  }

});
