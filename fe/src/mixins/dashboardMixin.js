import ErrorMessages from "@/components/messages/ErrorMessages.vue";
import PreloaderComponent from "@/components/preloader/PreloaderComponent.vue";

export default {
    data() {
        return {
            loading: true
        }
    },
    methods: {
        validateRequest(method = null, params) {
            this.v$?.$touch()

            if (!this.v$?.$error) {
                this.loading = true
                const action = typeof method === 'string' ? this[method](params) : this.fetchAction()
                action.then(() => {
                    this.loading = false
                    this.v$?.$reset()
                    this.getData()
                })
            }
        }
    },
    components: {ErrorMessages, PreloaderComponent},
}