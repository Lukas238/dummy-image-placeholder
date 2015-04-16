#Dummy Image Placeholder

####Yet another simple image placeholder service.


[Live site](http://dummy-image-placeholder.c238.com.ar/)


##How to
You just need to put the image size after our URL to get a dummy image.

	http://myserver.com/100x150

You also can use it directly in your code:

####HTML
```html
<img src="http://myserver.com/100x150" alt="" >
```

####CSS
```css
.div{
	background: url(http://myserver.com/100x150) no-repeat center center;
}
```

##Examples
###Add custom colors

You can pass a background color and a text color as hexadecimal values.

	http://myserver.com/350x150/7E6979/EFCFAB

![alt text](http://dummy-image-placeholder.c238.com.ar/350x150/7E6979/EFCFAB)
	

###Add custom text
You can define a custom text, insted of the image dimension.

	http://myserver.com/350x150&t=Hello word!
	
![alt text](http://dummy-image-placeholder.c238.com.ar/350x150&t=Hello word!)

###Add multiple lines of text
You can add a break line adding two consecutive lower dash characters.

	http://myserver.com/350x150&t=Hello__World!

![alt text](http://dummy-image-placeholder.c238.com.ar/350x150&t=Hello__World!)
	

	
##Technical
- Background color: #cccccc;
- Text color: #888888;
- Font family: BebasNeue Regular - TTF
- Image format: PNG;


##Requirements
- PHP5


##To-Do
- Improve .htaccess configuration so redirect to index.php on missing parameters or any error.