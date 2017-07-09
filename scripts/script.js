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
"insert.php",{'name':$scope.tempUser.name,'email':$scope.tempUser.email,'contact':$scope.tempUser.contact,'pwd':$scope.tempUser.pwd}
)
.success(function(data){
alert(data)
$scope.tempUser.name=null;
$scope.tempUser.email=null;
$scope.tempUser.contact=null;
$scope.tempUser.pwd=null;
$scope.DisplayData();
})
};


$scope.DisplayData = function(){
$http.get(data.php)
}
});