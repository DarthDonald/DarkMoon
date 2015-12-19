friends.controller('FriendsController', ['$scope', function($scope) { 
  $scope.title = 'My Friends'; 
  $scope.friends = [
  	{ 
    	name: 'Albert', 
    	secondName: 'Kronstein', 
    	cover: 'img/Albert_Einstein_Head.jpg'
  	}, 
  	{ 
    	name: 'Igor', 
    	secondName: 'Kushinashvili', 
    	cover: 'img/couch.jpg'
  	}, 
  	{ 
    	name: 'Maya', 
    	secondName: 'Waterfall',  
    	cover: 'img/sana_navya.jpg_480_480_0_64000_0_1_0.jpg'
  	}, 
  	{ 
    	name: 'Serg', 
    	secondName: 'Tamankyan', 
    	cover: 'img/116ec2a9ba9e463f7475ea4b5f21336a_400x400.jpeg' 
  	},
    { 
    	name: 'Serafima', 
    	secondName: 'Trozkaya', 
    	cover: 'img/iphone360_1596760.jpg' 
  	},
      { 
    	name: 'Michael', 
    	secondName: 'Cookie', 
    	cover: 'img/michael_bio_pic.jpg' 
  	}
  ];
}]);