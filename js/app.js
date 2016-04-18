var app = angular.module('Pripomienky', []);

app.controller('HlCtrl', ['$http', function($http) {
	_this = this;

	_this.odosliNaSpracovanie = function() {
		$http({
			method: 'POST',
			url: 'angdata.php',
			data: {'co': 'spracujTxt'}
		}).then(function(data) {
			console.log(data);
			_this.spracovanyTxt = data.data;
		});
	}
}])