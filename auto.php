<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
  <style type="text/css">
    .container{
  width: 100%;
  height: 300px;
}

#searchResult{
  list-style: none;
  padding: 0px;
  width: 250px;
  position: absolute;
  margin: 0;
}

#searchResult li{
  background: lavender;
  padding: 4px;
  margin-bottom: 1px;
}

#searchResult li:nth-child(even){
  background: cadetblue;
  color: white;
}

#searchResult li:hover{
  cursor: pointer;
}

input[type=text]{
  padding: 5px;
  width: 250px;
  letter-spacing: 1px;
}
  </style>
</head>
<body>
<div class='container-fluid' ng-controller="fetchCtrl" ng-click='containerClicked();' >

    <input type='text'
          ng-keyup='fetchUsers()'
          ng-click='searchboxClicked($event);'
          ng-model='searchText'
          placeholder='Enter text'><br>
    <ul id='searchResult' >
      <li ng-click='setValue($index,$event)'
          ng-repeat="result in searchResult" >
          {{ result.pname }}
      </li>
    </ul>

  </div>
</body>
</html>