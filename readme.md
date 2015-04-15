#Dummy Image Placeholder

Yet another simple image placeholder service.

##How to
You just need to put the image size after our URL to get a dummy image.

	http://dummy-image-placeholder.c238.com.ar/100x150

You also can use it directly in your code:

####HTML
```html
<img src="http://dummy-image-placeholder.c238.com.ar/100x150" alt="" >
```

####CSS
```css
.div{
	background: url(http://dummy-image-placeholder.c238.com.ar/100x150) no-repeat center center;
}
```

##Examples
###Add custom colors

You can pass a background color and a text color as hexadecimal values.

	http://localhost/dummy-image-placeholder/example/350x150/7E6979/EFCFAB

![alt text](http://dummy-image-placeholder.c238.com.ar/350x150/7E6979/EFCFAB)
	

###Add custom text
You can define a custom text, insted of the image dimension.

	http://localhost/dummy-image-placeholder/example/350x150&t=Hello word!
	
![alt text](http://dummy-image-placeholder.c238.com.ar/350x150&t=Hello word!)

###Add multiple lines of text
You can add a break line adding two consecutive lower dash characters.

	http://dummy-image-placeholder.c238.com.ar/350x150&t=Hello__World!

![alt text](http://dummy-image-placeholder.c238.com.ar/350x150&t=Hello__World!)
	
	
##Technical
- Background color: #cccccc;
- Text color: #888888;
- Font family: BebasNeue Regular - TTF
- Image format: PNG;