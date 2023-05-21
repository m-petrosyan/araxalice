<template>
  <main>
    <header>
      <div class="header-animation" ref="flicker">
        <img class="animation item1" :src="item1" alt="">
        <img class="animation item2" :src="item2" alt="">
        <img class="animation item3" :src="item3" alt="">
        <img class="animation item4" :src="item4" alt="">
        <img class="animation item5" :src="item5" alt="">
        <img class="animation item6" :src="item6" alt="">
      </div>
    </header>
    <div class="content">
      <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio dolor earum eum exercitationem harum
        ipsum nemo neque nobis omnis, porro possimus provident qui ratione reprehenderit tenetur totam, velit
        voluptatibus.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio dolor earum eum exercitationem harum
        ipsum nemo neque nobis omnis, porro possimus provident qui ratione reprehenderit tenetur totam, velit
        voluptatibus.
      </p>
    </div>
    <div class="content">
      <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio dolor earum eum exercitationem harum
        ipsum nemo neque nobis omnis, porro possimus provident qui ratione reprehenderit tenetur totam, velit
        voluptatibus.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio dolor earum eum exercitationem harum
        ipsum nemo neque nobis omnis, porro possimus provident qui ratione reprehenderit tenetur totam, velit
        voluptatibus.
      </p>
    </div>
    <div class="content">
      <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio dolor earum eum exercitationem harum
        ipsum nemo neque nobis omnis, porro possimus provident qui ratione reprehenderit tenetur totam, velit
        voluptatibus.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio dolor earum eum exercitationem harum
        ipsum nemo neque nobis omnis, porro possimus provident qui ratione reprehenderit tenetur totam, velit
        voluptatibus.
      </p>
    </div>
    <div class="content">
      <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio dolor earum eum exercitationem harum
        ipsum nemo neque nobis omnis, porro possimus provident qui ratione reprehenderit tenetur totam, velit
        voluptatibus.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio dolor earum eum exercitationem harum
        ipsum nemo neque nobis omnis, porro possimus provident qui ratione reprehenderit tenetur totam, velit
        voluptatibus.
      </p>
    </div>
    <div class="content">
      <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio dolor earum eum exercitationem harum
        ipsum nemo neque nobis omnis, porro possimus provident qui ratione reprehenderit tenetur totam, velit
        voluptatibus.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio dolor earum eum exercitationem harum
        ipsum nemo neque nobis omnis, porro possimus provident qui ratione reprehenderit tenetur totam, velit
        voluptatibus.
      </p>
    </div>
    <div class="content">
      <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio dolor earum eum exercitationem harum
        ipsum nemo neque nobis omnis, porro possimus provident qui ratione reprehenderit tenetur totam, velit
        voluptatibus.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio dolor earum eum exercitationem harum
        ipsum nemo neque nobis omnis, porro possimus provident qui ratione reprehenderit tenetur totam, velit
        voluptatibus.
      </p>
    </div>
    <div class="content">
      <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio dolor earum eum exercitationem harum
        ipsum nemo neque nobis omnis, porro possimus provident qui ratione reprehenderit tenetur totam, velit
        voluptatibus.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio dolor earum eum exercitationem harum
        ipsum nemo neque nobis omnis, porro possimus provident qui ratione reprehenderit tenetur totam, velit
        voluptatibus.
      </p>
    </div>
    <img class="scrol-animation an1" ref="animation" :src="item6" alt="">
  </main>
</template>

<script>
import arax from '@/assets/images/header_animation/arax.png'
import item1 from '@/assets/images/header_animation/item1.png'
import item2 from '@/assets/images/header_animation/item2.png'
import item3 from '@/assets/images/header_animation/item3.png'
import item4 from '@/assets/images/header_animation/item4.png'
import item5 from '@/assets/images/header_animation/item5.png'
import item6 from '@/assets/images/header_animation/item6.png'
import item7 from '@/assets/images/header_animation/item7.png'
import item8 from '@/assets/images/header_animation/item8.png'
import item9 from '@/assets/images/header_animation/item9.png'
import item10 from '@/assets/images/header_animation/item10.png'
import item11 from '@/assets/images/header_animation/item11.png'
import item12 from '@/assets/images/header_animation/item12.png'
import item13 from '@/assets/images/header_animation/item13.png'
import item14 from '@/assets/images/header_animation/item14.png'

export default {
  data() {
    return {
      arax: arax,
      item1: item1,
      item2: item2,
      item3: item3,
      item4: item4,
      item5: item5,
      item6: item6,
      item7: item7,
      item8: item8,
      item9: item9,
      item10: item10,
      item11: item11,
      item12: item12,
      item13: item13,
      item14: item14,
      scroll: false
    }
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll);
    setTimeout(() => this.$refs.flicker.classList.add('flicker'), 3500)
  },
  methods: {
    handleScroll() {
      if (window.top.scrollY > 300) this.animation()
    },
    animation() {
      this.$refs.animation.classList.add('start')
    }
  },
}
</script>
<style scoped lang="scss">
main {
  position: relative;

  .header-animation {
    position: relative;
    height: 600px;
    background-image: url("@/assets/images/header_animation/arax.png");
    background-repeat: no-repeat;
    background-position: center;
    text-align: center;
    animation: zoom 3s linear;

    @keyframes zoom {
      0% {
        background-size: 0;
      }
      100% {
        background-size: 90%;
      }
    }

    &.flicker {
      animation: flicker 2s linear both;
      @keyframes flicker {
        0% {
          opacity: 1;
        }
        13.9% {
          opacity: 1;
        }
        14% {
          opacity: 0;
          -webkit-box-shadow: none;
          box-shadow: none;
        }
        14.9% {
          opacity: 0;
          -webkit-box-shadow: none;
          box-shadow: none;
        }
        15% {
          opacity: 1;
        }
        22.9% {
          opacity: 1;
        }
        23% {
          opacity: 0;
          -webkit-box-shadow: none;
          box-shadow: none;
        }
        24.9% {
          opacity: 0;
          -webkit-box-shadow: none;
          box-shadow: none;
        }
        25% {
          opacity: 1;
        }
        34.9% {
          opacity: 1;
        }
        35% {
          opacity: 0;
          -webkit-box-shadow: none;
          box-shadow: none;
        }
        39.9% {
          opacity: 0;
          -webkit-box-shadow: none;
          box-shadow: none;
        }
        40% {
          opacity: 1;
        }
        42.9% {
          opacity: 1;
        }
        43% {
          opacity: 0;
          -webkit-box-shadow: none;
          box-shadow: none;
        }
        44.9% {
          opacity: 0;
          -webkit-box-shadow: none;
          box-shadow: none;
        }
        45% {
          opacity: 1;
        }
        50% {
          opacity: 1;
        }
        54.9% {
          opacity: 1;
        }
        55% {
          opacity: 0;
          -webkit-box-shadow: none;
          box-shadow: none;
        }
        69.4% {
          opacity: 0;
          -webkit-box-shadow: none;
          box-shadow: none;
        }
        69.5% {
          opacity: 1;
        }
        69.9% {
          opacity: 1;
        }
        70% {
          opacity: 0;
          -webkit-box-shadow: none;
          box-shadow: none;
        }
        79.4% {
          opacity: 0;
          -webkit-box-shadow: none;
          box-shadow: none;
        }
        79.9% {
          opacity: 1;
        }
        80% {
          opacity: 0;
          -webkit-box-shadow: none;
          box-shadow: none;
        }
        89.8% {
          opacity: 0;
          -webkit-box-shadow: none;
          box-shadow: none;
        }
        89.9% {
          opacity: 1;
          -webkit-box-shadow: none;
          box-shadow: none;
        }
        90% {
          opacity: 0;
          -webkit-box-shadow: none;
          box-shadow: none;
        }
        100% {
          opacity: 1;
        }
      }
    }

    .animation {
      position: absolute;
      //transform: scale(0);

      &.item1 {
        top: 346px;
        right: 268px;
        animation: zoom-transform 3s 6s both;
        transition: all 3s;
      }

      &.item2 {
        top: 402px;
        right: 296px;
        animation: zoom-transform 3s 7s both;
        transition: all 3s;
      }

      &.item3 {
        top: 388px;
        right: 213px;
        animation: zoom-transform 3s 8s both;
        transition: all 3s;
      }

      &.item4 {
        top: 216px;
        right: 154px;
        animation: zoom-transform 3s 8.5s both;
        transition: all 3s;
      }

      &.item5 {
        top: 291px;
        right: 134px;
        animation: zoom-transform 4s 7s both;
        transition: all 3s;
      }

      &.item6 {
        top: 225px;
        right: 250px;
        animation: zoom-transform 4s 8s both;
        transition: all 3s;
      }


      @keyframes zoom-transform {
        0% {
          transform: scale(0);
        }
        100% {
          transform: scale(1);
        }
      }
      //&.rotate-r {
      //  animation: rotate-r 3s 10s infinite;
      //}

      //@keyframes rotate-r {
      //  0% {
      //    transform: rotate(0deg);
      //  }
      //  50% {
      //    transform: rotate(90deg);
      //  }
      //  100% {
      //    transform: rotate(0deg);
      //  }
      //}
    }


  }

  .content {
    margin-top: 100px;
  }

  .scrol-animation {
    visibility: hidden;
    position: absolute;
    transition: all 2s;

    &.an1 {
      top: 800px;
      left: 100%;
      transform: translateX(-150%);


      &.start {
        visibility: visible;
        left: 50%;
        transform: translateX(50vw);
        animation: blur-hide 1.45s .5s both;
        @keyframes blur-hide {
          0% {
            transform: translateY(0) scaleY(1) scaleX(1);
            transform-origin: 50% 0;
            filter: blur(0);
            opacity: 1;
          }
          100% {
            transform: translateY(0) scaleY(1) scaleX(2);
            transform-origin: 50% 0;
            filter: blur(40px);
            opacity: 0;
          }
        }
      }

    }
  }
}
</style>
