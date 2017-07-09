var app = angular
.module("Demo", ["ngRoute"])
.config(function ($routeProvider) {
$routeProvider
.when("/home", {
template:"<h1>hello All</h1>",
templateUrl: "Templates/home.html",
controller: "homeController",
caseInsensitiveMatch: true
})
.when("/courses", {
templateUrl: "Templates/courses.html",
controller: "coursesController",
caseInsensitiveMatch: true
})
.when("/students", {
templateUrl: "Templates/students.html",
controller: "studentsController",
caseInsensitiveMatch: true
})
.when("/students/:id", {
templateUrl: "Templates/students_details.html",
controller: "studentDetailsController"
})
.otherwise({
redirectTo: "/home"
})
})
.config(['$locationProvider', function($locationProvider) {
$locationProvider.hashPrefix('');
}])
.controller("homeController", function ($scope) {
$scope.message = "Home Page";
$scope.$on("$routeChangeStart", function (event, next, current) {
if (!confirm("Are you sure you want to navigate away from this page")) {
event.preventDefault();
}
});

})
.controller("coursesController", function ($scope) {
	$scope.$on("$routeChangeStart", function (event, next, current) {
if (!confirm("Are you sure you want to navigate away from this page")) {
event.preventDefault();
}
});

$scope.courses = ["PHP", "Android", "Angular JS", "SQL Server"];
})
.controller("studentsController", function ($scope, $http) {
	
	$scope.$on("$routeChangeStart", function (event, next, current) {
if (!confirm("Are you sure you want to navigate away from this page")) {
event.preventDefault();
}
});	


$http.get("data.php")
.then(function (response) {
$scope.students = response.data;
})
})

.controller("studentDetailsController", function ($scope, $http, $routeParams) {
$http({
url: "data1.php?id="+$routeParams.id+"/",
method: "get",

}).then(function (response) {
$scope.student1 = response.data;
})
})