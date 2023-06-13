<template>
  <section>
    <div class="ouija_board">
      <div class="board">
        <img class="cursor" ref="cursor" :src="board.cursor" alt="cursor">
      </div>
    </div>
    <div class="form-content">
      <div class="contacts">
        <a class="contact" href="mailto:araxsargsyan@gmail.com">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail-opened" width="44"
               height="44"
               viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
               stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M3 9l9 6l9 -6l-9 -6l-9 6"/>
            <path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10"/>
            <path d="M3 19l6 -6"/>
            <path d="M15 13l6 6"/>
          </svg>
          <p class="info">
            araxsargsyan@gmail.com
          </p>
        </a>
        <a class="contact" href="tel:+17473429919">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone-call" width="44" height="44"
               viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
               stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path
                d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"/>
            <path d="M15 7a2 2 0 0 1 2 2"/>
            <path d="M15 3a6 6 0 0 1 6 6"/>
          </svg>
          <p class="info">
            +1(747) 342-9919
          </p>
        </a>
      </div>
      <form class="form" @submit.prevent="contact">
        <div class="form-group">
          <input type="text" name="message" @input="event => type(event.target.value)" v-model="data.fullname"
                 placeholder="full name">
        </div>
        <div class="form-group">
          <input type="email" name="email" @input="event => type(event.target.value)" v-model="data.email"
                 placeholder="email">
        </div>
        <div class="form-group">
          <textarea name="message" @input="event => type(event.target.value)" v-model="data.message" rows="10"
                    placeholder="message"/>
        </div>
        <div class="form-group">
          <input class="submit" type="submit" value="send">
        </div>
      </form>
    </div>
  </section>
</template>

<script>
import cursor from "@/assets/images/other/cursor.png"

export default {
  name: "ContactView",
  data() {
    return {
      board: {
        cursor: cursor,
        lastLatter: '',
        cordinates: {
          a: {
            top: '132px',
            left: '86px'
          },
          b: {
            top: '129px',
            left: '127px'
          },
          c: {
            top: '126px',
            left: '164px'
          },
          d: {
            top: '124px',
            left: '199px'
          },
          e: {
            top: '125px',
            left: '232px'
          },
          f: {
            top: '126px',
            left: '267px'
          },
          g: {
            top: '128px',
            left: '303px'
          },
          h: {
            top: '130px',
            left: '338px'
          },
          i: {
            top: '133px',
            left: '372px'
          },
          j: {
            top: '191px',
            left: '94px'
          },
          k: {
            top: '186px',
            left: '130px'
          },
          l: {
            top: '186px',
            left: '170px'
          },
          m: {
            top: '184px',
            left: '207px'
          },
          n: {
            top: '184px',
            left: '250px'
          },
          o: {
            top: '187px',
            left: '287px'
          },
          p: {
            top: '188px',
            left: '320px'
          },
          q: {
            top: '193px',
            left: '356px'
          },
          r: {
            top: '253px',
            left: '69px'
          },
          s: {
            top: '251px',
            left: '107px'
          },
          t: {
            top: '248px',
            left: '143px'
          },
          u: {
            top: '247px',
            left: '180px'
          },
          v: {
            top: '246px',
            left: '218px'
          },
          w: {
            top: '246px',
            left: '262px'
          },
          x: {
            top: '248px',
            left: '306px'
          },
          y: {
            top: '250px',
            left: '343px'
          },
          z: {
            top: '253px',
            left: '379px'
          },
        }
      },
      data: {
        fullname: '',
        email: '',
        message: ''
      }
    }
  },
  methods: {
    contact() {

    },
    type(val) {
      this.board.lastLatter = val.slice(-1).toLowerCase();
      this.$refs.cursor.style.top = this.board.cordinates[this.board.lastLatter].top
      this.$refs.cursor.style.left = this.board.cordinates[this.board.lastLatter].left
    },
  },
  watch: {
    'board.lastLatter': function (newVal, oldVal) {
      if (!oldVal) {
        this.$refs.cursor.classList.add('start')
      }
    },
  }
}
</script>

<style scoped lang="scss">
@import "src/assets/styles/vars";

section {
  display: flex;
  gap: 20px;


  .ouija_board {
    width: 50%;
    background-image: url("@/assets/images/other/board_texture.png");
    background-repeat: no-repeat;

    .board {
      width: 598px;
      height: 500px;
      margin: auto;
      background-image: url("@/assets/images/other/ouija_board.png");
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
      position: relative;

      @media all and (max-width: $sm) {
        display: none;
      }

      .cursor {
        position: absolute;
        width: 14%;
        top: 349px;
        left: 44%;
        transition: 1s;

        &.start {
          width: 150px;
        }
      }
    }
  }

  .form-content {
    width: 50%;

    .contacts {
      display: flex;
      flex-direction: column;
      gap: 20px 0;

      .contact {
        display: flex;
        height: 30px;
        line-height: 30px;

        svg {
          height: inherit;
        }

        .info {
          color: var(--vt-c-white);
        }
      }
    }

    .form {
      margin-top: 50px;

      .form-group {
        &:not(:first-child) {
          margin-top: 30px;
        }

        textarea {
          padding-top: 10px;
        }
      }
    }
  }

  @media all and (max-width: $lg) {
    flex-direction: column;
    .ouija_board, .form-content {
      width: 100%;
    }
  }
}

</style>