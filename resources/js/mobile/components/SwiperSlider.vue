<template>
    <div>
        <swiper
            :slides-per-view="3"
            :space-between="50"
            navigation
            :pagination="{ clickable: true }"
            :scrollbar="{ draggable: true }"
            @swiper="onSwiper"
            @slideChange="onSlideChange"
        >
            <swiper-slide>Slide 1</swiper-slide>
            <swiper-slide>Slide 2</swiper-slide>
            <swiper-slide>Slide 3</swiper-slide>
        </swiper>
        
    </div>
</template>
<script>
//swiper core
import SwiperCore , { Navigation, Pagination, Scrollbar, A11y } from 'swiper';

// swuper vue
import {Swiper, SwiperSlide} from 'swiper/vue';

// install Swiper components
SwiperCore.use([Navigation, Pagination, Scrollbar, A11y]);

export default {
    data(){
        return{
            parallaxSwiper
        }
    },
    components:{
        Swiper,
        SwiperSlide,
    },  
};
</script>