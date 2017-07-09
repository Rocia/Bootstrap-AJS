 var app = angular.module("myapp",[]);  
 app.controller("usercontroller", function($scope, $http){  
		$scope.rowCount = 10;
		$scope.sortColumn = "name";
		$scope.reverseSort = false;
		$scope.sortData = function (column) {
		$scope.reverseSort = ($scope.sortColumn == column) ?
		!$scope.reverseSort : false;
		$scope.sortColumn = column;
		$scope.tempUser = {};
	
		
		
		
											}
		$scope.getSortClass = function (column) {
		if ($scope.sortColumn == column) {
		return $scope.reverseSort? 'arrow-down': 'arrow-up';
										}
		return '';
												}
		$scope.insertData = function(){  
           $http.post(  
                "insert.php",  
                {'abc':$scope.tempUser.pname, 'ba':$scope.lastname}  
           ).success(function(data){  
                alert(data);  
                $scope.tempUser.pname = null;  
                $scope.lastname = null;  
                $scope.displayData();  
           });  
		   
		   
      }  
	  
	  
	  $scope.delete = function(id){ 
//alert(id); 	  
             
			  $http.post(  
                "delete.php",  
                {'abc':id}
           ).success(function(data){  
                //alert(data);  
                  
                $scope.displayData();  
           });
		   
		   
      }  
	   
	  
    

		 
             
		    
			
			 $scope.edit = function (x) {
				 alert(x);
				 $scope.tempUser = {
			pid: x.pid,
			pname : x.pname,
			pcost : x.ptype,
			pbrand : x.pbrand,
			pcost : x.pcost,
			pimage:x.pimage
					};
				 //console.log(Object.values( $scope.tempUser));
				 	$scope.editMode = true;
				 
				}
				
				$scope.editUser = function(user){
		$scope.tempUser = {
			id: user.id,
			name : user.name,
			email : user.email,
			companyName : user.companyName,
			designation : user.designation
		};
		$scope.editMode = true;
		$scope.index = $scope.post.users.indexOf(user);
	}

				
			
			
      $scope.displayData = function(){  
           $http.get("data.php")  
           .success(function(data){  
                $scope.names = data;  
			
           });  
      }
			
 });  
 </script> 