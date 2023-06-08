<template>
  <section>
    <div class="ouija_board">
      <img class="cursor" ref="cursor" :src="board.cursor" alt="cursor">
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
            top: '140px',
            left: '95px'
          },
          b: {
            top: '134px',
            left: '138px'
          },
          c: {
            top: '131px',
            left: '178px'
          },
          d: {
            top: '130px',
            left: '211px'
          },
          e: {
            top: '130px',
            left: '248px'
          },
          f: {
            top: '130px',
            left: '284px'
          },
          g: {
            top: '132px',
            left: '322px'
          },
          h: {
            top: '134px',
            left: '360px'
          },
          i: {
            top: '137px',
            left: '394px'
          },
          j: {
            top: '197px',
            left: '101px'
          },
          k: {
            top: '194px',
            left: '139px'
          },
          l: {
            top: '194px',
            left: '179px'
          },
          m: {
            top: '192px',
            left: '221px'
          },
          n: {
            top: '192px',
            left: '268px'
          },
          o: {
            top: '193px',
            left: '306px'
          },
          p: {
            top: '193px',
            left: '340px'
          },
          q: {
            top: '199px',
            left: '379px'
          },
          r: {
            top: '261px',
            left: '78px'
          },
          s: {
            top: '259px',
            left: '116px'
          },
          t: {
            top: '256px',
            left: '152px'
          },
          u: {
            top: '255px',
            left: '192px'
          },
          v: {
            top: '254px',
            left: '232px'
          },
          w: {
            top: '254px',
            left: '280px'
          },
          x: {
            top: '256px',
            left: '325px'
          },
          y: {
            top: '258px',
            left: '364px'
          },
          z: {
            top: '261px',
            left: '402px'
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
section {
  display: flex;
  gap: 20px;

  .ouija_board {
    width: 50%;
    background-image: url("@/assets/images/other/ouija_board.png");
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    position: relative;

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

        input, textarea {
          background-color: var(--vt-gray-black);
          border: none;
          width: 100%;
          min-height: 40px;
          padding-left: 10px;
          resize: vertical;
          color: var(--vt-c-white);
        }

        textarea {
          padding-top: 10px;
        }

        .submit {
          border: none;
          color: var(--color-submit-text);
          height: 40px;
          width: 150px;
          background-color: var(--vt-gray-black);
        }
      }

    }
  }
}

</style>