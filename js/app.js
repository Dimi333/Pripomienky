var app = angular.module('Pripomienky', []);

app.controller('HlCtrl', ['$http', function($http) {
	_this = this;
	_this.nazovProjektu = "";

	_this.odosliNaSpracovanie = function() {
		$http({
			method: 'POST',
			url: 'angdata.php',
			data: {'co': 'spracujTxt', 'surovyTxt': _this.poleTxt}
		}).then(function(data) {
			console.log(data);
			_this.spracovanyTxt = data.data;
		});
	}

	_this.pridajProjekt = function() {
		$http({
			method: 'POST',
			url: 'angdata.php',
			data: {'co': 'pridajProjekt', 'nazov': _this.nazovProjektu}
		}).then(function(data) {
			_this.projekty = data.data;
		});
	}

	$http({
		method: 'POST',
		url: 'angdata.php',
		data: {'co': 'nacitajProjekty'}
	}).then(function(data) {
		_this.projekty = data.data;
	});
}])