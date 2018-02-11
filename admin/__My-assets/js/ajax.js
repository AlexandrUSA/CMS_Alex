window.categories = [
				{
					title: 'Категория 1',
				},
				{
					title: 'Категория 2',
				},
				{
					title: 'Категория 3',
				},
				{
					title: 'Категория 4',
				}
]

document.querySelector('body').addEventListener('click', () => {
	console.log(1);
})


axios.get('Model/Ajax.php')
  .then(function (response) {
  	window.categories = response.data;
    console.log(window.categories);
  })
  .catch(function (error) {
    console.log(error);
});
