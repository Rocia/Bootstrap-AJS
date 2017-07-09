var myApp = angular.module("myModule", []);  

myApp.controller("myController", function ($scope,$http) {  

$scope.SortColumn = "name";
$scope.rowCount = 3;  
$scope.reverseSort = false;  
$scope.sortData = function(column){
	$scope.reverseSort = ($scope.sortColumn == column) ? 
		!$scope.reverseSort:false;
	$scope.sortColumn = column;             
	}  
$scope.getSortClass = function (column) {  
    if ($scope.sortColumn == column) {                     
		return $scope.reverseSort                       
		? 'arrow-down'                       
		: 'arrow-up';                 
	}  
	return '';             
}    



$scope.insertData= function(){
$http.post(
"insert.php",
{'name':$scope.tempUser.name,'email':$scope.email,'contact':$scope.contact,'pwd':$scope.pwd}
).success(function(data){
alert(data)
$scope.tempUser.name=null;
$scope.email=null;
$scope.contact=null;
$scope.pwd=null;
$scope.displayData();
});
}

$scope.delete = function(id){
	//alertId
	$http.post(
	"delete.php",
	{'abc':id}
	)
}

$http.get("data.php")
.then(function (response) {
$scope.students = response.data;
})
})

$scope.displayData = function(id){
$http.get(data.php)
}
});