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


<body>
  <div class="orderhistory" ng-app="myApp" ng-controller="OrderHistoryCtrl" id="orderhistory-container">
    <div class="title">ORDER HISTORY</div>

    <div class="content">
		<div>
      <div class="filter-section">
        <div>Summary:</div>
        <label for="selMonth">Month</label>
        <select id="selMonth" ng-model="selMonth">
          <option ng-repeat="m in month" value="{{m}}">{{ m }}</option>
        </select>
        <label for="selYear">Year</label>
        <select id="selYear" ng-model="selYear">
          <option ng-repeat="y in year" value="{{y}}">{{ y }}</option>
        </select>
        <button id="searchSummary" ng-click="searchSummaryClick(selYear,selMonth)">Get data</button>
      </div>
      

			<table class="table-summary table-header-blue">
				<tr>
					<th class="col-40">No.</th>
					<th class="col-80">Date</th>
					<th class="col-100">Total Amount</th>
					<th class="col-80">Action</th>
				</tr>
				<tr ng-repeat="order in orderSummarys">
					<td class="col-center ">{{ $index +1 }}</td>
					<td class="col-center col-80">{{ order.orderDate | date: 'dd/MM/yy' }}</td>
					<td class="col-right col-80">{{order.sumTotalAmount | number:2}}</td>
					<td class="col-center col-80">
						<button id="showOrderHistoryDetail-btn" ng-click="showOrderHistoryDetail(order.orderDate);">
								Display
						</button>
					</td>
				</tr>
      </table>
      <div>Summary total amount: {{ summaryTotalAmount | number:2 }}</div> 
		</div>


    <div>
        <div class="filter-section">
        <div>Order record</div>
        </div>
			<table class="table-record table-header-blue">
				<tr>
					<th class="col-40">No.</th>
					<th class="col-300">Customer</th>
					<th class="col-100">Total Amount</th>
				</tr>
				<tr ng-repeat="order in orders">
					<td class="col-center col-40">{{ $index +1 }}</td>
					<td class="col-300 col-left">
						<div ng-repeat="deliveryAddress in deliveryAddresses | filter: {id: order.deliveryAddressId }">
							{{deliveryAddress.contactName}} - {{deliveryAddress.telephone}}
							<br>{{deliveryAddress.address}}
						</div>
					</td>
					<td class="col-right col-100">{{order.totalAmount | number:2}}</td>
				</tr>
			</table>
		</div>
    </div>

    

    
    

    



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
    <script src="js/OrderHistoryCtrl.js"></script>
    <script src="js/js-function.js"></script>
   
</body>

</html>