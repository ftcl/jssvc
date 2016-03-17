(function() {
	var CtrlModule = angular.module('starter.controllers', [])

	CtrlModule.controller('GrxxCtrl', ['$scope', 'HttpServ', function($scope, HttpServ) {
		HttpServ.Grxx().then(function(data) {
			var substr = data.match(/<BODY>([\s\S.]*)<\/BODY>/i)[0];
			$("#content").html(substr);
		});
	}]);
})();