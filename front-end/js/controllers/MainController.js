app.controller('MainController', ['$scope', function($scope) { 
  $scope.title = 'WitchCrafted'; 
  $scope.products = [
  	{ 
    	name: 'The Book of Spell', 
    	price: 19, 
    	cover: 'img/article-2_4.png'
  	}, 
  	{ 
    	name: 'Aspen Stake', 
    	price: 11.99,  
    	cover: 'img/items_weapons_stake.png'
  	}, 
  	{ 
    	name: 'Cauldron for Potions', 
    	price: 7.99, 
    	cover: 'img/PAB5654.jpg' 
  	},
    { 
    	name: 'Hand of Zombie', 
    	price: 7.99, 
    	cover: 'img/Zombie_Hand_002.jpgcfb6a1cb-4318-48d6-8fd5-bb2fb64e324eOriginal.jpg' 
  	},
      { 
    	name: 'Vampire Cloak', 
    	price: 4.32, 
    	cover: 'img/shop_items_catalog_image689.jpg' 
  	},
    { 
    	name: 'Book of Warlock', 
    	price: 23.5, 
    	cover: 'img/psd_isxodnik_-_kniga_kolduna.jpg' 
  	}
  ];
}]);