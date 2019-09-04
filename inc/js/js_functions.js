// Open Search Area 
function Search(action) {
	var searchArea = document.getElementById('search-area')
	var actions = {
		'open' : function () {
			searchArea.style.top = '0';
		},
		'close' : function () {
			searchArea.style.top = '-100%';
		},
		'do' : function () {
			
		}
	}
	actions[action]();
}

function slideshow($slideshow_selector) {
	var i = 0;
	if ($($slideshow_selector + ' .slide-item').length > 1) {
		setInterval(()=> {
			var slides = $($slideshow_selector + ' .slide-item');
			if (slides[i].style.display === 'block') {
				if (i < slides.length -1) {
					slides[i].style.display = 'none'
			    	slides[i + 1].style.display = 'block'
					i++;
				}else{
					slides[0].style.display = 'block'
			    	slides[slides.length - 1].style.display = 'none'
			    	i = 0;
				}
			}
	    } ,5*1000);
	}
}


window.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('.post-thumbnail img').addLoader()
    document.querySelectorAll('.wp-block-image img').addLoader()
});
HTMLElement.prototype.applayLoader = function() {
	this.classList.add('hp-img-loader-img');
	var loaderNode = document.createElement('div');
	loaderNode.className = 'hp-img-loader'
	loaderNode.innerHTML = '<p class="hp-img-loader-txt">جاري تحميل الصورة</p>'
	this.parentElement.appendChild(loaderNode)
	this.addEventListener('load', () => {
		loaderNode.style.opacity = '0'
    });
    this.addEventListener('error', () => {
		loaderNode.innerHTML = '<p class="hp-img-loader-txt">نعتذر فقد حدث خطاء اثناء تحميل الصورة</p>'
    });
}

NodeList.prototype.addLoader = function(e) {
	for (var i = 0 ; i < this.length ; i++) {

		if (!this[i].complete) {
			this[i].applayLoader()
		}
	}
}

