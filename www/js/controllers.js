(function() {
	var CtrlModule = angular.module('starter.controllers', [])

	CtrlModule.controller('GrxxCtrl',['$scope','HttpServ',function($scope,HttpServ) {
		HttpServ.Login().then(function(data){
			$scope.data = data;
		});
	}]);
})();