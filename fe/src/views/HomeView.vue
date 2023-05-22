<template>
  <main>
    <div class="header-animation" ref="flicker">
      <div class="right-side">
        <img class="animation item1" :src="item1" alt="">
        <img class="animation item2" :src="item2" alt="">
        <img class="animation item3" :src="item3" alt="">
        <img class="animation item4" :src="item4" alt="">
        <img class="animation item5" :src="item5" alt="">
        <img class="animation item6" :src="item6" alt="">
        <img class="animation item7" :src="item7" alt="">
        <img class="animation item8" :src="item8" alt="">
        <img class="animation item9" :src="item9" alt="">
        <img class="animation item10" :src="item10" alt="">
        <img class="animation item11" :src="item11" alt="">
        <img class="animation item12" :src="item12" alt="">
        <img class="animation item13" :src="item13" alt="">
      </div>
      <div class="left-side">
        <img class="animation item1" :src="item1" alt="">
        <img class="animation item2" :src="item2" alt="">
        <img class="animation item3" :src="item3" alt="">
        <img class="animation item4" :src="item4" alt="">
        <img class="animation item5" :src="item5" alt="">
        <img class="animation item6" :src="item6" alt="">
        <img class="animation item7" :src="item7" alt="">
        <img class="animation item8" :src="item8" alt="">
        <img class="animation item9" :src="item9" alt="">
        <img class="animation item10" :src="item10" alt="">
        <img class="animation item11" :src="item11" alt="">
        <img class="animation item12" :src="item12" alt="">
        <img class="animation item13" :src="item13" alt="">
      </div>
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

export default {
  props: {
    scroll: Number
  },
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
    }
  },
  mounted() {
    setTimeout(() => this.$refs.flicker.classList.add('flicker'), 3500)
  },
  methods: {
    animation() {
      this.$refs.animation.classList.add('start')
    }
  },
  watch: {
    scroll(val) {
      if (val > 300) this.animation()
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
    }

    .left-side {
      .item1 {
        top: 346px;
        left: 274px;
        animation: zoom-transform-left 6s 7s both;
      }

      .item2 {
        top: 402px;
        left: 296px;
        animation: zoom-transform-left 6s 8s both;
      }

      .item3 {
        top: 404px;
        left: 213px;
        animation: zoom-transform-left 6s 8s both;
      }

      .item4 {
        top: 216px;
        left: 154px;
        animation: zoom-transform-left 6s 6s both;
      }

      .item5 {
        top: 291px;
        left: 134px;
        animation: zoom-transform-left 6s 9s both;
      }

      .item6 {
        top: 225px;
        left: 250px;
        animation: zoom-transform-left 6s 6s both;
      }

      .item7 {
        top: 164px;
        left: 284px;
        animation: zoom-transform-left 6s 8s both;
      }

      .item8 {
        top: 500px;
        left: 397px;
        animation: zoom-transform-left 6s 7s both;
      }

      .item9 {
        top: 345px;
        left: 198px;
        animation: zoom-transform-left 6s 6s both;
      }

      .item10 {
        top: 361px;
        left: 234px;
        animation: zoom-transform-left 6s 9s both;
      }

      .item11 {
        top: 260px;
        left: 199px;
        animation: zoom-transform-left 6s 7s both;
      }

      .item12 {
        top: 242px;
        left: 243px;
        animation: zoom-transform-left 6s 8s both;
      }

      .item13 {
        top: 191px;
        left: 204px;
        animation: zoom-transform-left 6s 9s both;
      }
    }

    .right-side {

      .item1 {
        top: 346px;
        right: 260px;
        animation: zoom-transform-right 6s 6s both;
      }

      .item2 {
        top: 402px;
        right: 296px;
        animation: zoom-transform-right 6s 7s both;
      }

      .item3 {
        top: 404px;
        right: 213px;
        animation: zoom-transform-right 6s 8s both;
      }

      .item4 {
        top: 216px;
        right: 154px;
        animation: zoom-transform-right 6s 8.5s both;
      }

      .item5 {
        top: 291px;
        right: 134px;
        animation: zoom-transform-right 6s 7s both;
      }

      .item6 {
        top: 225px;
        right: 250px;
        animation: zoom-transform-right 6s 8s both;
      }

      .item7 {
        top: 164px;
        right: 284px;
        animation: zoom-transform-right 6s 9s both;
      }

      .item8 {
        top: 500px;
        right: 397px;
        animation: zoom-transform-right 6s 8s both;
      }

      .item9 {
        top: 345px;
        right: 198px;
        animation: zoom-transform-right 6s 8s both;
      }

      .item10 {
        top: 361px;
        right: 234px;
        animation: zoom-transform-right 6s 8s both;
      }

      .item11 {
        top: 260px;
        right: 199px;
        animation: zoom-transform-right 6s 6s both;
      }

      .item12 {
        top: 242px;
        right: 243px;
        animation: zoom-transform-right 6s 9s both;
      }

      .item13 {
        top: 191px;
        right: 204px;
        animation: zoom-transform-right 6s 7s both;
      }
    }

    @keyframes zoom-transform-left {
      0% {
        transform: scale(0);
      }
      70% {
        transform: scaleX(-1);
      }
      80% {
        transform: scaleX(1);
      }
      100% {
        transform: scaleX(-1);
      }
    }
    @keyframes zoom-transform-right {
      0% {
        transform: scale(0);
      }
      50% {
        transform: scale(1);
      }
      80% {
        transform: scaleX(-1);
      }
      100% {
        transform: scale(1);
      }
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
