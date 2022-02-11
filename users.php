<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>USERS REGISTRATION</title>
</head>
<body ng-controller = "userController">
   <div class="container-fluid">
   	<div class="row-fluid">
   		<div class="col-md-3">
   		<label>login name</label>
   		<input type="text" id="loginname" class="form-control" ng-model ="plist.loginname">
   		<label>password</label>
   		<input type="password" id="pswd" class="form-control" ng-model ="plist.pswd">
   		<label>account type</label>
   		<input type="text" id="status" class="form-control" ng-model ="plist.status">
   		<label>user name</label>
   		<input type="text" id="usname" class="form-control" ng-model="plist.usname">

         <input type="button" id="btn" class="btn btn-primary btn-md" value="Register User" ng-click ="AddProducts()">


 </div>
   	</div>

      <div class="col-md-4">
         <table class="table table-responsive table-bordered">
            <thead ng-show = "names.length > 0">
               <tr >
                  <th>login name</th>
                  <th>password</th>
                  <th>status</th>
                  <th>username</th>
               </tr>
            </thead>

             <tbody>
                <tr ng-repeat = "nx in names">
                   <td>{{nx.loginname}}</td>
                   <td>{{nx.pswd}}</td>
                   <td>{{nx.status}}</td>
                   <td>{{nx.usname}}</td>
                   <td ng-click ="DeleteData(nx)">delete</td>
                </tr>
             </tbody>

         </table>

      </div>

   </div>


</body>
</html>