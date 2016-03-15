angular.module('starter', ['ionic', 'starter.controllers', 'starter.services'])

.run(function($ionicPlatform) {
	$ionicPlatform.ready(function() {
		if (window.cordova && window.cordova.plugins.Keyboard) {
			cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
			cordova.plugins.Keyboard.disableScroll(true);

		}
		if (window.StatusBar) {
			StatusBar.styleDefault();
		}
	});
})

.config(function($stateProvider, $urlRouterProvider) {
	$stateProvider

		.state('app', {
			url: '/app',
			abstract: true,
			templateUrl: 'templates/menu.html'
		})
		.state('app.tzgg', {
			url: '/tzgg',
			views: {
				'menuContent': {
					templateUrl: 'templates/tzgg.html'
				}
			}
		})
		/*信息维护*/
		.state('app.xxwh', {
			url: '/xxwh',
			views: {
				'menuContent': {
					templateUrl: 'templates/xxwh/xxwh.html'
				}
			}
		})
		/*个人信息*/
		.state('app.grxx', {
			url: '/grxx',
			views: {
				'menuContent': {
					templateUrl: 'templates/xxwh/grxx.html',
					controller:'GrxxCtrl'
				}
			}
		})
		/*密码修改*/
		.state('app.mmxg', {
			url: '/mmxg',
			views: {
				'menuContent': {
					templateUrl: 'templates/xxwh/mmxg.html'
				}
			}
		})
		/*信息查询*/
		.state('app.xxcx', {
			url: '/xxcx',
			views: {
				'menuContent': {
					templateUrl: 'templates/xxcx/xxcx.html'
				}
			}
		})
		/*专业推荐课表查询*/
		.state('app.zytjkbcx', {
			url: '/zytjkbcx',
			views: {
				'menuContent': {
					templateUrl: 'templates/xxcx/zytjkbcx.html'
				}
			}
		})
		/*教师个人课表查询*/
		.state('app.jsgrkbcx', {
			url: '/jsgrkbcx',
			views: {
				'menuContent': {
					templateUrl: 'templates/xxcx/jsgrkbcx.html'
				}
			}
		})
		/*学生个人课表*/
		.state('app.xsgrkb', {
			url: '/xsgrkb',
			views: {
				'menuContent': {
					templateUrl: 'templates/xxcx/xsgrkb.html'
				}
			}
		})
		/*成绩查询*/
		.state('app.cjcx', {
			url: '/cjcx',
			views: {
				'menuContent': {
					templateUrl: 'templates/xxcx/cjcx.html'
				}
			}
		})
		/*等级考试查询*/
		.state('app.djkscx', {
			url: '/djkscx',
			views: {
				'menuContent': {
					templateUrl: 'templates/xxcx/djkscx.html'
				}
			}
		})
		/*教学质量评价*/
		.state('app.jxzlpj', {
			url: '/jxzlpj',
			views: {
				'menuContent': {
					templateUrl: 'templates/xxcx/jxzlpj.html'
				}
			}
		})
		;
	$urlRouterProvider.otherwise('/app/tzgg');
});