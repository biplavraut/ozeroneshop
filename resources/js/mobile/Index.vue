<template>
    <div class="swiper-container slider-simple slider-simple slider-simple--vw-width slider-simple--full-height slider-init mb-20" data-paginationtype="bullets" data-spacebetweenitems="0" data-itemsperview="1">
		<div class="swiper-wrapper">
			<div v-for="slider in sliders" :key="slider.id" class="swiper-slide slider-simple__slide" style="background-image:linear-gradient(#29293560 0%, rgba(0, 0, 0, 0.0) 100%), url(mobile/assets/img/tv.jpg);">
				<div class="slider-simple__caption caption caption--centered">
					<div class="caption__content">
						<h2 class="caption__title caption__title--centered">THE COLLECTION OF PERFECT <span>TELEVISION</span> FOR YOUR HOME</h2>
						<a href="#" class="button button--main button--ex-small">View The Collection</a>
					</div>
				</div>
			</div> 
		</div>
		<div class="swiper-pagination slider-simple__pagination"></div>
	</div>
</template>
<script>
import Swiper from 'swiper';
export default {
    data(){
        return{
            sliders : []
        }
    },
    methods: {
    loadSlider(){
        axios.get("../../front-slider").then(({ data }) => (this.sliders = data, this.totalslider = data.total));
    }
},
    created() {
    this.loadSlider(); 
    /*------------------------------------------------------------------
    jQuery document ready
    -------------------------------------------------------------------*/
    $(document).ready(function () {
        "use strict";

            /* Simple Slider */
            var simplesliders = [];
            var simpleslider = [];
            $('.slider-init').each(function(index, element){
                
                var paginationtype = $(this).attr("data-paginationtype");
                var spacebetweenitems = $(this).data("spacebetweenitems");
                var itemsperview = $(this).data("itemsperview");
                $(this).addClass('s'+index);
                $(this).prev().children(".page__title-right").children(".swiper-button-next").addClass('swiper-button-next'+index);
                $(this).prev().children(".page__title-right").children(".swiper-button-prev").addClass('swiper-button-prev'+index);
                $(this).children(".swiper-pagination").addClass('swiper-pagination'+index);
                simpleslider[index] = new Swiper('.s'+index, {
                    direction: 'horizontal',
                    effect: 'slide',
                    slidesPerView: itemsperview,
                    spaceBetween: spacebetweenitems,
                    pagination: {
                    el: '.swiper-pagination'+index,
                    type: paginationtype,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next'+index,
                        prevEl: '.swiper-button-prev'+index
                    }
                    
                    });
                simplesliders.push(simpleslider[index]);
            });
            
    
    });
}
};
</script>