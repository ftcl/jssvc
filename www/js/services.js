(function() {
	var ServModule = angular.module('starter.services', []);
	ServModule.factory('HttpServ', ['$http', '$q', 'PopupServ',
		function($http, $q, PopupServ) {

			var service = {
				Login: Login,
				Grxx: Grxx,
				Mmxg: Mmxg
			};

			return service;

			//Post方法
			function Post(postdata) {
				var q = $q.defer();
				$http({
					method: 'POST',
					url: 'http://192.168.1.105:3305/index.php',
					data: $.param({
						query: postdata,
						userID: "146309125",
						userPassword: "123456.77",
						newPassword: "123456.77"
					}),
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded'
					}
				}).success(function(response) {
					q.resolve(response);
				}).error(function(data, header, config, status) {
					q.reject(data);
				});

				return q.promise;
			};

			/*登录*/
			function Login() {

			};
			/*个人信息*/
			function Grxx() {
				var q = $q.defer();
				var str = "?__VIEWSTATE=dDwyOTIzOTAzMDY7Oz701B5ima43iVSTgVtHyF4XgQER9g==&__VIEWSTATEGENERATOR=92719903&";
				var strPost = "TextBox1=146309125&TextBox2=123456.77&RadioButtonList1=学生&Button1=";
				Post(str + strPost).then(function(data) {
					q.resolve(data);
				}, function(error) {
					PopupServ.Alert("登录错误", error);
				})
				return q.promise;
			};
			/*密码修改*/
			function Mmxg() {

			};
		}

	]);
	ServModule.factory('PopupServ', ['$ionicPopup', '$q',
		function($ionicPopup, $q) {

			var service = {
				Alert: Alert,
				Confirm: Confirm
			};

			return service;

			//Post方法
			function Alert(title, template) {
				var alertPopup = $ionicPopup.alert({
					title: title,
					template: template,
					okText: "确认"
				});
				alertPopup.then(function(res) {

				});
			};

			function Confirm(title, template) {
				var q = $q.defer();
				var confirmPopup = $ionicPopup.confirm({
					title: title,
					template: template,
					okText: "确认",
					cancelText: "取消"
				});
				confirmPopup.then(function(res) {
					if (res) {
						q.resolve();
					} else {
						q.reject();
					}
				});
				return q.promise;
			}
		}
	])
})();