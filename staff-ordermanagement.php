<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>3 Season Thai - staff order management page</title>
  <link rel="stylesheet" type="text/css" href="./css/staff.css">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

  <!-- Add loading overlay user to show loading sign when need user waiting for the process -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.3/dist/loadingoverlay.min.js"></script>
  <script>
    $(document).ready(function() {
      var text = "Loading...";
      $.LoadingOverlay("show", {
        text: text,
        progress: false,
        fade: [400, 0],
        maxsize: 10,
        size: 10
      });

      // Hide it after 3 seconds
      setTimeout(function() {
        $.LoadingOverlay("hide");
      }, 1000);
    });
  </script>

  <style>
    /* The Modal (background) */
    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      padding-top: 30px;
      /* Location of the box */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */

      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      position: relative;
      background-color: #fefefe;
      margin: auto;
      padding: 0;
      border: 1px solid #888;
      width: 90%;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      -webkit-animation-name: animatetop;
      -webkit-animation-duration: 0.4s;
      animation-name: animatetop;
      animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
      from {
        top: 0px;
        opacity: 0
      }

      to {
        top: 0;
        opacity: 1
      }
    }

    @keyframes animatetop {
      from {
        top: 0px;
        opacity: 0
      }

      to {
        top: 0;
        opacity: 1
      }
    }

    /* The Close Button */
    .close {
      color: white;
      float: right;
      font-size: 20px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    .modal-header {
      padding: 8px 14px;
      background-color: #007acc;
      color: white;
      font-size: 16px;
    }

    .modal-body {
      padding: 4px 14px;
    }

    .modal-footer {
      padding: 2px 4px;
      background-color: #007acc;
      color: white;
      margin-top: 20px;
    }
  </style>

</head>


<body onFocus="parent_disable();" onclick="parent_disable();">

  <!-- load alert audio -->
  <audio id="alert-sound" src="audios/alert.mp3" preload="auto"></audio>

  <div ng-app="myApp" ng-controller="OrderManagementCtrl" id="order-container" class="order-container">
    <div class="title">ORDER MANAGEMENT</div>

    <div class="orderList" ng-repeat="order in orders">
      <div class="order-number" ng-if="order.status!='Finish'">
        <div class="n">{{ $index +1 }}</div>
      </div>
      <div class="order-detail">
        <ul>
          <li >
            <div class="order-datetime">
              <div class="label">ORDER TIME:</div>
              <div>{{ order.orderDate | date: 'dd/MM/yy hh:mm' }}</div>
            </div>

            <div class="order-customer">
              <div class="label">CUSTOMER DETAIL:</div>
              <div ng-repeat="deliveryAddress in deliveryAddresses | filter: {id: order.deliveryAddressId }">{{deliveryAddress.contactName}} - {{deliveryAddress.telephone}}
                <br>{{deliveryAddress.address}}
              </div>
            </div>

          </li>

          <li >

          </li>

          <li class="order-list">
            <div class="label">ORDER DETAIL:</div>
            <div ng-repeat="item in orderList | filter: {orderId: order.id}" style="padding-top: 4px; padding-bottom: 4px;">
              {{item.qty}} x
              {{item.menuName}}
              <div ng-if="item.meatTypeId">({{item.meatTypeId}})</div>
              <div style="width: 300px; font-size: 12px;">Price: {{item.price | number:2 }}</div>
              <div style="width: 300px; font-size: 12px;">Amount: ${{item.amount | number:2 }}</div>


            </div>
          </li>
        </ul>
      </div>

      <div class="order-totalAmount">
        {{order.totalAmount | number:2}}
      </div>

      <div class="order-status">
        <img class="order-alert-img" src="images/alert.gif" alt="alert" ng-if="order.status=='New Order'">{{order.status}}
      </div>

      <div class="order-action">


        <button id="cooking-btn" ng-click="changeOrderStatus(order.id,'Cooking');" ng-if="order.status=='New Order'">
          Cooking
        </button>

        <button id="delivery-btn" ng-click="changeOrderStatus(order.id,'Delivery');" ng-if="order.status=='Cooking'">
          Delivery
        </button>

        <button id="finish-btn" ng-click="changeOrderStatus(order.id,'Finish');" ng-if="order.status=='Delivery'">
          Finish
        </button>

        <button id="cancel-btn" ng-click="cancelOrder(order.id);" ng-if="order.status!='Cancel' && order.status!='Finish'">
          Cancel
        </button>
      </div>
    </div>

    <!--
    <table id="table-header-blue">

      <thead>
        <tr>
          <th class="col-no">No</th>
          <th class="col-dateTime">Date/Time</th>
          <th class="col-deliveryDetail">Delivery Detail</th>
          <th class="col-totalAmount">Total Amount</th>
          <th class="col-status">Status</th>
          <th class="col-action">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="order in orders">

          <td>{{ $index +1 }}</td>
          <td>{{ order.orderDate | date: 'dd/MM/yy hh:mm' }}</td>
          <td>
            <div ng-repeat="deliveryAddress in deliveryAddresses | filter: {id: order.deliveryAddressId }">
              {{deliveryAddress.contactName}} Telephone: {{deliveryAddress.telephone}}
              <br>{{deliveryAddress.address}}
              <br><br>



            </div>
            <div ng-repeat="item in orderList | filter: {orderId: order.id}">
              {{item.qty}} X
              {{item.menuName}}
              <div ng-if="item.meatTypeId">({{item.meatTypeId}})</div>


              {{item.price | number:2 }}
              {{item.amount | number:2 }}
            </div>
          </td>
          <td>{{ order.totalAmount | number:2 }}</td>
          <td>{{ order.status }}</td>
          <td>

            <img class="oder-alert-img" src="images/alert.gif" alt="alert" ng-if="order.status=='New Order'">

            <button id="cooking-btn" ng-click="changeOrderStatus(order.id,'Cooking');" ng-if="order.status=='New Order'">
              Cooking
            </button>

            <button id="delivery-btn" ng-click="changeOrderStatus(order.id,'Delivery');" ng-if="order.status=='Cooking'">
              Delevery
            </button>

            <button id="finish-btn" ng-click="changeOrderStatus(order.id,'Finish');" ng-if="order.status=='Delivery'">
              Finish
            </button>

            <button id="cancel-btn" ng-click="changeOrderStatus(order.id,'Cancel');" ng-if="order.status!='Cancel' && order.status!='Finish'">
              Cancel Order
            </button>

          </td>
        </tr>
      </tbody>
    </table>
  -->

    <!-- The Notification Modal -->
    <div id="modal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <span class="close" onclick="closeModal();">&times;</span>
        </div>

        <div class="modal-body">

          Test Modal
          <button>OK</button>

        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>




    <!-- Script to show modal -->
    <script>
      // Get the modal
      //var modal = document.getElementById('modalNotification');

      // Get the <span> element that closes the modal
      //var span = document.getElementsByClassName("close")[0];

      // When the user clicks on <span> (x), close the modal
      //span.onclick = function() {
      //modal.style.display = "none";
      //}

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          closeModal();
        }
      }

      function closeModal() {
        modal.style.display = "none";
        var scope = angular.element(document.getElementById('recordList')).scope();
        scope.studentDetails = "";
        scope.comunications = "";
        scope.classEnrolmentDetails = "";
      }


      /*
              function showNotificationModal(student) {

                var studentId = student.getAttribute("studentId");
                var studentName = student.getAttribute("studentName");
                document.getElementById('notificationStudent').innerHTML = "Communication record : " + studentId + " " + studentName;

                var scope = angular.element(document.getElementById('recordList')).scope();
                scope.getNotification(studentId);
                scope.docStudentID = studentId;

                //var status = scope.aaa();
                //alert("aaa");
                modal = document.getElementById('modalNotification');
                modal.style.display = "block";
              }
              */
    </script>
    <script src="js/myApp.js"></script>
    <script src="js/myCtrl.js"></script>
    <script src="js/js-function.js"></script>
</body>

</html>