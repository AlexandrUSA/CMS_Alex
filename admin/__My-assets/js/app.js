document.getElementById('test').addEventListener('click', () => {

//http://cms/admin/api/getCategories.php

	// fetch('api/getCategories.php')
  // .then(response => response.json())
  // .then(data => {
  //   console.log(data);
  // })
  //   .catch(error => console.log(error))
	axios.get('Model/Category.php')
  .then(function (response) {
    console.log(response.data);
  })
  .catch(function (error) {
    console.log(error);
  });
})