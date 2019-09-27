<!DOCTYPE html>
<html>

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

        <style>
            textarea {
                vertical-align: top;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2
            }
            .viewSide{
                display: flex;
            }
            .viewNormal{
                flex: 2 50%;
            }
            button{
                cursor: pointer;
            }
            .buttonGreen{
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 4px;
            }
            .buttonRed{
                background-color: #f44336;
                color: white;
                border: none;
                border-radius: 4px;
            }
        </style>


    </head>

    <body>
        <h1>MENU ITEMS</h1>
        <div ng-app="myApp" ng-controller="MenuItemController">
            <div class="viewSide">
                <div class="viewNormal">
                    <form>
                        <fieldset>
                            <legend>Add New Menu</legend>
                            <label>Name:</label>
                            <input ng-model="addName" style="margin-left:4.25em" type="text"> <br>
                            
                            <label>Description:</label>
                            <textarea ng-model="addDescription" style="margin-left:1em" rows="10" cols="30"></textarea> <br>

                            <!-- <label>Picture:</label>
                            <input style="margin-left:3.55em"> <br> -->

                            <label>Price:</label>
                            <input ng-model="addPrice" style="margin-left:4.75em" type="text" placeholder="0.00"> <br>

                            <!-- <label>Meat Options:</label>
                            <select style="margin-left:1em" ng-model="addMeatType" ng-options="meatType.name for meatType in meatTypes">
                                <option value="">-- None --</option>
                            </select> -->

                            <label>Menu Type:</label>
                            <select style="margin-left:1em" ng-model="addMenuType" ng-options="menuType.name for menuType in menuTypes">
                                <option value="">-- Choose Menu Type --</option>
                            </select>
                            <br><br>

                            <button type="submit" ng-click="addNewMenuItem(addName, addDescription, addPrice, addMenuType.id)">ADD</button>
                        </fieldset>
                    </form>
                </div>

                    <div class="viewSide">
                        <form>
                            <fieldset>
<!-- EDIT MENU TYPE -->
                                <legend>Edit Menu Categories</legend>
                                <div style="white-space:nowrap;">
                                    <label>Name:</label>
                                    <input ng-model="addMenuTypeName" type="text" placeholder="Appetizers, Main, Dessert, etc.">
                                <button type="submit" ng-click="addNewMenuType(addMenuTypeName)">ADD NEW</button>
                                </div>

                                <table id="pageLayout">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="menuType in menuTypes">
                                            <td>{{menuType.name}}</td>
                                            <td style="white-space:nowrap;">
                                                <button type="submit">EDIT</button>
<!-- DELETE MENU TYPE BUTTON -->
                                                <button type="submit" ng-click="deleteMenuType(menuType.id)">DELETE</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>  
                            </fieldset>
                        </form>

                        <form>
                            <fieldset>
<!-- EDIT MEAT TYPE -->
                                <legend>Edit Meat types</legend>
                                <div style="white-space:nowrap;">
                                    <label>Name:</label>
                                    <input ng-model="addMeatName" type="text" placeholder="chicken, beef, pork, etc.">
                                    <button type="submit" ng-click="addNewMeat(addMeatName)">ADD NEW</button>
                                </div>

                                <table id="pageLayout">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="meatType in meatTypes">
                                            <td>{{meatType.name}}</td>
                                            <td style="white-space:nowrap;">
                                                <button type="submit">EDIT</button>
<!-- DELETE MEAT TYPE BUTTON -->
                                                <button type="submit" ng-click="deleteMeatType(meatType.id)">DELETE</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>  
                            </fieldset>
                        </form>
                    </div>

            </div>


<!-- UPDATE EDIT DELETE -->

            

            <form>
                <fieldset>
                    <legend>Edit Menu</legend>
                    <table id="pageLayout">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Availability</th>
                                <!-- <th>Meat Type</th>
                                <th>Menu Type</th> -->
                                <th><input ng-model="searchText.name" placeholder="Search..."></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="menu in menus | filter: searchText:strict">
                                <td><input style="width:200px" ng-model="menu.name"></td>
                                <td><input ng-model="menu.description"></td>
                                <td>{{menu.price}}</td>
                                <td ng-if="menu.isAvailable==1">Available</td>
                                <td ng-if="menu.isAvailable==0">Sold Out</td>
                                <!-- <td>{{menu.isSelectMeatChoice}}</td>
                                <td>{{menu.menuTypeId}}</td> -->
                                <td style="white-space:nowrap;">
                                    <button class="buttonGreen" ng-click="changeAvailability(menu.id, menu.name, menu.description, menu.pictureName, menu.price, '0', menu.isSelectMeatChoice, menu.menuTypeId)" ng-if="menu.isAvailable == 1">AVAILABLE</button>
                                    <button class="buttonRed" ng-click="changeAvailability(menu.id, menu.name, menu.description, menu.pictureName, menu.price, '1', menu.isSelectMeatChoice, menu.menuTypeId)" ng-if="menu.isAvailable == 0">SOLD OUT</button>
                                    <button type="submit">EDIT</button>
                                    <button type="submit" ng-click="deleteMenuItem(menu.id)">DELETE</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                </fieldset>
            </form>
            
        </div>

        <!-- test edit by aoddy -->
        <div>show purich test</div>


        <script src="js/myApp.js"></script>
        <script src="js/menuItemCtrl.js"></script>
        <script src="js/js-function.js"></script>
    </body>

</html>