(function() {
	var CtrlModule = angular.module('starter.controllers', [])

	CtrlModule.controller('GrxxCtrl', ['$scope', 'HttpServ', function($scope, HttpServ) {
		HttpServ.Grxx().then(function(data) {
			$("#content").html(data);
		});
	}]);
})();